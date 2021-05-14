<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachinePlanPm;
use App\Models\Machine\MasterIMPSGroup;
use App\Models\Machine\Pmplanresult;
use App\Models\MachineAddTable\MachinePmTemplateDetail;
use App\Models\MachineAddTable\MachinePmTemplateList;
use App\Models\MachineAddTable\MachinePmTemplate;
use App\Models\Machine\MachineLine;
use App\Models\Machine\Uploadimg;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Http\Controllers\Machine\UploadImgController;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\SettingMenu\MailSetup;
use Auth;
use File;




class MachinePlanController extends Controller
{
  protected  $paging =10;

  public function __construct(){
    $this->middleware('auth');
  }
  public function randUNID($table){
    $number = date("ymdhis", time());
    $length=7;
    do {
      for ($i=$length; $i--; $i>0) {
        $number .= mt_rand(0,9);
      }
    }
    while ( !empty(DB::table($table)
    ->where('UNID',$number)
    ->first(['UNID'])) );
    return $number;
  }
  public function PMPlanList(Request $request){
    $PLAN_YEAR = $request->PLAN_YEAR != NULL ? $request->PLAN_YEAR : date('Y');
    $MACHINE_CODE = $request->MACHINE_CODE;
    $MACHINE_LINE = $request->MACHINE_LINE;
    if ($MACHINE_CODE or $MACHINE_LINE ) {
      $MACHINE_CODE = $MACHINE_CODE != NULL ? '%'.$MACHINE_CODE.'%' : '%';
      $MACHINE_LINE = $MACHINE_LINE != NULL ? '%'.$MACHINE_LINE.'%' : '%';
      $MACHINE_CODE = str_replace('%','',$MACHINE_CODE);
      $MACHINE_LINE = str_replace('%','',$MACHINE_LINE);
    }else {
      $MACHINE_CODE = "";
      $MACHINE_LINE = "";

    }
    $machineline = MachineLine::select('LINE_NAME','LINE_CODE')->where('LINE_NAME','like','%'.'Line'.'%')->get();

    return view('machine.plan.pmplanlist',compact('machineline','MACHINE_CODE','MACHINE_LINE','PLAN_YEAR'));

  }

  public function CreatePlan($pm_lastdate,$machine_unid,$masterimpsunid){
    $UNID =  $this->randUNID('PMCS_MACHINE_PLAN_PM');
    $machine = Machine::where('UNID',$machine_unid)->first();
    $pmnext_date = Carbon::parse($pm_lastdate)->addmonth($machine->MACHINE_RANK_MONTH);

    $masterplandata = MachinePmTemplate::where('UNID',$masterimpsunid)->first();

    MachinePlanPm::insert([
      'UNID'            => $UNID,
      'PLAN_YEAR'       => $pm_lastdate->format('Y'),
      'PLAN_MONTH'      => $pm_lastdate->format('m'),
      'PLAN_DATE'       => $pm_lastdate,
      'PLAN_NEXTDATE'   => $pmnext_date,
      'PLAN_DOCNO'      => "",
      'MACHINE_UNID'    => $machine->UNID,
      'MACHINE_NAME'    => $machine->MACHINE_NAME,
      'MACHINE_CODE'    => $machine->MACHINE_CODE,
      'MACHINE_LINE'    => $machine->MACHINE_LINE,
      'PLAN_PERIOD'     => $machine->MACHINE_RANK_MONTH,
      'PLAN_RANK'       => $machine->MACHINE_RANK_CODE,
      'PM_TYPE'         => 'PLAN',
      'PM_MASTER_NAME'  => $masterplandata->PM_TEMPLATE_NAME,
      'PM_MASTER_UNID'  => $masterplandata->UNID,
      'PLAN_STATUS'     => 'NEW',
      'PLAN_RE_MARK'    =>  "",
      'CREATE_BY'       =>   Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'MODIFY_BY'       =>   Auth::user()->name,
      'MODIFY_TIME'     => Carbon::now(),
    ]);

  }
  public function PMPlanCheckForm($UNID){
    $PM_PLANSHOW = MachinePlanPm::where('UNID','=',$UNID)->first();
    $PM_PLAN = MachinePlanPm::where('UNID','=',$UNID)->get();
    $PM_LIST = MasterIMPSGroup::where('MACHINE_UNID','=',$PM_PLAN[0]->MACHINE_UNID)
                              ->where('PM_TEMPLATE_UNID_REF',$PM_PLAN[0]->PM_MASTER_UNID)
                              ->orderBy('PM_TEMPLATELIST_INDEX','ASC')
                              ->get();
    $PM_DETAIL = MachinePmTemplateDetail::orderBy('PM_DETAIL_INDEX','ASC')->get();
    $PMPLANRESULT = Pmplanresult::where('PM_PLAN_UNID',$UNID)->count();
    $PLAN_UPLOAD_IMG = Uploadimg::where('UNID_REF','=',$UNID)->get();




   return view('machine.plan.pmplancheck',
   compact('PM_PLAN','PM_LIST','PM_DETAIL','PM_PLANSHOW','PLAN_UPLOAD_IMG'));
  }
  public function PMPlanShow($UNID){

    $PM_PLANSHOW = MachinePlanPm::where('UNID','=',$UNID)->first();
    $PM_PLAN = MachinePlanPm::where('UNID','=',$UNID)->get();
    $PM_LIST = MasterIMPSGroup::where('MACHINE_UNID','=',$PM_PLAN[0]->MACHINE_UNID)
                              ->where('PM_TEMPLATE_UNID_REF',$PM_PLAN[0]->PM_MASTER_UNID)
                              ->orderBy('PM_TEMPLATELIST_INDEX','ASC')
                              ->get();
    $PM_DETAIL = MachinePmTemplateDetail::orderBy('PM_DETAIL_INDEX','ASC')->get();
    $PLAN_UPLOAD_IMG = Uploadimg::where('UNID_REF','=',$UNID)->get();
    $PMPLANRESULT = Pmplanresult::where('PM_PLAN_UNID',$UNID)->count();
    if ($PMPLANRESULT > 0) {
      $PMPLANRESULT = Pmplanresult::where('PM_PLAN_UNID',$UNID)->orderBy('PM_MASTER_DETAIL_INDEX','ASC')->get();
      $PMPLANRESULT_FIRST = Pmplanresult::where('PM_PLAN_UNID',$UNID)->orderBy('PM_MASTER_DETAIL_INDEX','ASC')->first();
    }else {
      alert()->error('เกิดข้อผิดพลาด','ไม่พบข้อมูล');
      return redirect()->back();
    }



   return view('machine.plan.pmplanshow',
   compact('PM_PLAN','PM_LIST','PM_DETAIL','PM_PLANSHOW','PLAN_UPLOAD_IMG','PMPLANRESULT','PMPLANRESULT_FIRST'));
  }
  public function PMPlanListSave(Request $request){

    $PM_PLAN_UNID   = $request->PM_PLAN_UNID;
    $PM_PLAN_DATE   = $request->PLAN_DATE;
    $PM_MASTER_UNID = $request->PM_MASTER_UNID;
    $PM_MASTER_NAME = $request->PM_MASTER_NAME;
    $PM_USER_CHECK  = $request->PM_USER_CHECK;
    $CHECK_DATE     = $request->CHECK_DATE;
    $validated = $request->validate([
        'PM_USER_CHECK' => 'required|max:255',
        'CHECK_DATE' => 'required',
      ],[
        'PM_USER_CHECK.required' => 'กรุณากรอกชื่อผู้ทำการตรวจเช็ค',
        'PM_USER_CHECK.max' =>  'ไม่สามารถใส่ตัวอักษรมากกว่า 255 ตัวได้',
        'CHECK_DATE.required'  => 'กรุณาใส่วันที่ทำการตรวจเช็ค',
    ]);
    $machine_unid = Machine::where('UNID','=',$request->MACHINE_PLAN_UNID)->first();
    $countpmplaresult = Pmplanresult::where('PM_PLAN_UNID','=',$PM_PLAN_UNID)->count();
    if ($countpmplaresult > 0) {
      $pmplanresult = Pmplanresult::where('PM_PLAN_UNID',$PM_PLAN_UNID)->get();
      alert()->error('เกิดข้อผิดพลาด','ไม่สามารถบันบึกได้');
      return redirect('machine/pm/plancheck/'.$PM_PLAN_UNID)->with(compact('pmplanresult'));
    }else {
      foreach ($request->INPUT_ as $key => $value) {
        $detail_name = MachinePmTemplateDetail::where('UNID',$key)->first();
        $template_list = MachinePmTemplateList::where('UNID',$detail_name->PM_TEMPLATELIST_UNID_REF)->first();
        if (!$detail_name) {
          $detail_name = '';
        }
        $INPUT_TYPE = $detail_name->PM_TYPE_INPUT;
        $VALUE_INPUT = $value;
        $VALUE_STD = $detail_name->PM_DETAIL_STD;
        $VALUE_MIN = $detail_name->PM_DETAIL_STD_MIN != NULL ? $detail_name->PM_DETAIL_STD_MIN : 0 ;
        $VALUE_MAX = $detail_name->PM_DETAIL_STD_MAX != NULL ? $detail_name->PM_DETAIL_STD_MAX : 0 ;

        $PM_MASTER_DETAIL_RESULT = $this->CheckResult($INPUT_TYPE,$VALUE_INPUT,$VALUE_STD,$VALUE_MIN,$VALUE_MAX);

        Pmplanresult::insert([
          'UNID'                            => $this->randUNID('PMCS_CMMS_PM_RESULT'),
          'PM_PLAN_UNID'                    => $PM_PLAN_UNID,
          'PLAN_DATE'                       => $PM_PLAN_DATE,
          'MACHINE_PLAN_UNID'               => $machine_unid->UNID,
          'MACHINE_CODE'                    => $machine_unid->MACHINE_CODE,
          'MACHINE_LINE'                    => $machine_unid->MACHINE_LINE,
          'MACHINE_NAME'                    => $machine_unid->MACHINE_NAME,
          'PM_MASTER_UNID'                  => $PM_MASTER_UNID,
          'PM_MASTER_NAME'                  => $PM_MASTER_NAME,
          'PM_MASTER_DETAIL_NAME'           => $detail_name->PM_DETAIL_NAME,
          'PM_MASTER_DETAIL_UNID'           => $detail_name->UNID,
          'PM_MASTER_DETAIL_INPUT'          => $VALUE_INPUT,
          'PM_MASTER_DETAIL_VALUE_STD'      => $VALUE_STD,
          'PM_MASTER_DETAIL_VALUE_STD_MIN'  => $VALUE_MIN,
          'PM_MASTER_DETAIL_VALUE_STD_MAX'  => $VALUE_MAX,
          'PM_MASTER_DETAIL_TYPE_INPUT'     => $INPUT_TYPE,
          'PM_MASTER_DETAIL_INDEX'          => $detail_name->PM_DETAIL_INDEX,
          'PM_MASTER_DETAIL_RESULT'         => $PM_MASTER_DETAIL_RESULT,
          'PM_MASTER_STATUS'                => 'COMPLETE',
          'PM_MASTERPLPAN_REMARK'           => $request->PM_MASTERPLPAN_REMARK,
          'PM_USER_CHECK'                   => $PM_USER_CHECK,
          'PM_MASTER_LIST_UNID'             => $template_list->UNID,
          'PM_MASTER_LIST_NAME'             => $template_list->PM_TEMPLATELIST_NAME,
          'PM_MASTER_LIST_INDEX'            => $template_list->PM_TEMPLATELIST_INDEX,
          'CHECK_DATE'                      => $CHECK_DATE,
          'CREATE_BY'                       => Auth::user()->name,
          'CREATE_TIME'                     => Carbon::now(),
          'MODIFY_BY'                       => Auth::user()->name,
          'MODIFY_TIME'                     => Carbon::now(),
        ]);
      }
      MachinePlanPm::where('UNID',$PM_PLAN_UNID)->update([
        'PLAN_STATUS'                     => 'COMPLETE',
        'MODIFY_BY'                       => Auth::user()->name,
        'MODIFY_TIME'                     => Carbon::now(),

      ]);
    }
    $pmplanresult = Pmplanresult::where('PM_PLAN_UNID',$PM_PLAN_UNID)->get();

    return redirect('machine/pm/plancheck/'.$PM_PLAN_UNID)->with(compact('pmplanresult'));

  }
  public function PMPlanListUpload(Request $request){
      $image = $request->file('FILE_NAME');
      $plan_unid = $request->IMG_PLAN_UNID;
      $new_name = rand() . '.' . $image->getClientOriginalExtension();
      $img_ext = $image->getClientOriginalExtension();
      $image_resize = Image::make($image->getRealPath());
      $img_widht  = Image::make($image)->width();
      $img_height = Image::make($image)->height();
      $new_widht = 800;
      $new_height = 800;
      //หากภาพ V 3840 มากกว่า H 2160 ทำการ resize
      if ($img_widht > $img_height ) {
        if ($img_widht > $new_widht) {
        $image_resize->resize(550,400);
        }
      }
    //หากภาพ H 3840 มากกว่า V 2160 ทำการ Rotate ก่อน จากนั้น resize
      if ($img_widht < $img_height ) {
        if ($img_height > $new_height ) {
          $image_resize->rotate(-90);
         $image_resize->resize(550,400);
        }
      }

      $path = public_path('image/planresult/'.$plan_unid);
        if(!File::isDirectory($path)){
        File::makeDirectory($path, 0777, true, true);
        }
        $dataimgshow = false;
      if ($image_resize->save($path.'/'.$new_name)) {
        $saveimg = new UploadImgController;
        $dataimgshow = $saveimg->SaveImg($plan_unid,$new_name,$img_ext);
        alert()->success('บันทึกภาพสำเร็จ');
      }
      $dataimg = Uploadimg::where('UNID_REF','=',$plan_unid)->get();
      $PMPLANRESULT = Pmplanresult::where('PM_PLAN_UNID',$plan_unid)->count();
      if ($PMPLANRESULT > 0) {
        return redirect('machine/pm/planshow/'.$plan_unid)->with('autofocus','BTN_UPLOAD');
      }

      return redirect()->back()->with('autofocus','BTN_UPLOAD');


  }
  public function DeleteImg(Request $request){
    $imgunid = $request->imgunid;

      $deletestep = Uploadimg::where('UNID','=',$imgunid)->first();
      $plan_unid = $deletestep->UNID_REF;
      $filename = $deletestep->FILE_NAME;
      $data  = array();
    if ($plan_unid != '') {

       $deteletimg = Uploadimg::where('UNID','=',$imgunid)->delete();
       if ($deteletimg) {
         $pathfile = public_path('image/planresult/'.$plan_unid.'/'.$filename);
         File::delete($pathfile);

         $data['result'] = true;
         $data['imgunid'] = $imgunid;
       }
    }else {
      $data['result'] = false;
      $data['imgunid'] = '';
    }




    return response()->json($data);

  }
  public function CheckResult($TYPE = '',$INPUT = 0,$STD = 0,$MIN = 0 ,$MAX = 0){

    if (strtoupper($TYPE) == 'RADIO') {
      if ($INPUT == $STD) {
        return 'PASS';
      }else {
        return 'FAIL';
      }
    }elseif (strtoupper($TYPE) == 'NUMBER') {
      if ($MIN > 0 && $MAX > 0) {
        if($INPUT >= $MIN && $INPUT <= $MAX){
          return 'PASS';
        }else {
          return 'FAIL';
        }
      }elseif ($MIN == 0 && $MAX == 0 ) {
          if ($INPUT == $STD) {
            return 'PASS';
          }else {
            return 'FAIL';
          }
      }elseif ($MIN == 0 && $MAX > 0) {
        if($INPUT >= $STD && $INPUT <= $MAX){
          return 'PASS';
        }else {
          return 'FAIL';
        }
      }elseif ($MIN > 0 && $MAX == 0) {
        if($INPUT >= $MIN && $INPUT <= $STD){
          return 'PASS';
        }else {
          return 'FAIL';
        }
      }
    }
  }
  public function PMPlanPDF(){

  return view('/machine/plan/planpm');
}




















  public function EditDatePlan($pm_plandate,$machine_unid,$pmmaster_template_unid) {
    $machine = Machine::where('UNID',$machine_unid)->first();
    $pmnext_date = Carbon::parse($pm_plandate)->addmonth($machine->MACHINE_RANK_MONTH);
    MachinePlanPm::where('PM_MASTER_UNID',$pmmaster_template_unid)->where('MACHINE_UNID',$machine_unid)->update([
      'PLAN_YEAR'       => $pm_plandate->format('Y'),
      'PLAN_MONTH'      => $pm_plandate->format('m'),
      'PLAN_DATE'       => $pm_plandate,
      'PLAN_NEXTDATE'   => $pmnext_date,
      'MODIFY_BY'       => Auth::user()->name,
      'MODIFY_TIME'     => Carbon::now(),
    ]);
  }

}
