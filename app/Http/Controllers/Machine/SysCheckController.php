<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\Machine\MachinePMCheck;
use App\Models\Machine\MasterIMPS;

use App\Models\Machine\MachinePMCheckDetailStore;
use App\Models\Machine\MasterIMPSGroup;

use App\Models\MachineAddTable\MachinePmTemplateList;
use App\Models\MachineAddTable\MachinePmTemplateDetail;
use App\Models\MachineAddTable\MachinePmTemplate;

//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;



class SysCheckController extends Controller
{
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
  public function Index(){
    $datamachine    = Machine::orderBy('MACHINE_CODE',"ASC")->paginate(10);
    $datapmtemplatelist = MachinePmTemplateList::orderBy('PM_TEMPLATELIST_DUE',"ASC")->paginate(10);
    $datapmtemplatedetail  = MachinePmTemplateDetail::all();
    $machinecheckpm        = MachinePMCheck::all();
    $machinecheckpmdetail = MachinePMCheckDetail::all();
    return view('/machine/syscheck/syschecklist',compact('machinecheckpmdetail','datamachine','datapmtemplatelist','datapmtemplatedetail','machinecheckpm'));

  }
  public function StoreList(Request $request){
    foreach ($request->PM_TEMPLATE_UNID_REF as $dataset => $value) {
      $datapmtemplate = MachinePmTemplate::where('UNID',$request->PM_TEMPLATE_UNID_REF[$dataset])->first();
      $data = array(
        'UNID'                  => $this->randUNID('PMCS_CMMS_MASTER_IMPS'),
        'PM_TEMPLATE_UNID_REF'  => $request->PM_TEMPLATE_UNID_REF[$dataset],
        'MACHINE_CODE'          => $request->MACHINE_CODE,
        'PM_TEMPLATE_NAME'      => $datapmtemplate->PM_TEMPLATE_NAME,
        'CREATE_BY'             => Auth::user()->name,
        'CREATE_TIME'           => Carbon::now(),
        );
      MasterIMPS::insert($data);
    }
    $datapmtemplatelist = MachinePmTemplateList::whereIn('PM_TEMPLATE_UNID_REF',$request->PM_TEMPLATE_UNID_REF)->get();
    foreach ($datapmtemplatelist as $key => $dataitem) {

      $datamasterimpsgroup = array(
        'UNID'                      => $this->randUNID('PMCS_CMMS_MASTER_IMPS_GP'),
        'PM_TEMPLATELIST_UNID_REF'  => $dataitem->UNID,
        'MACHINE_CODE'              => $request->MACHINE_CODE,
        'PM_TEMPLATE_UNID_REF'      => $dataitem->PM_TEMPLATE_UNID_REF,
        'PM_TEMPLATELIST_NAME'      => $dataitem->PM_TEMPLATELIST_NAME,
        'PM_TEMPLATELIST_DAY'       => $dataitem->PM_TEMPLATELIST_DAY,
        'PM_TEMPLATELIST_IMPS'      => $dataitem->PM_TEMPLATELIST_POINT,
        'CREATE_BY'                 => Auth::user()->name,
        'CREATE_TIME'               => Carbon::now(),
        );
      MasterIMPSGroup::insert($datamasterimpsgroup);
    }


    return redirect()->back()->with('success','เพิ่มรายการตรวจเช็คสำเร็จ');
  }
  public function StoreListUpdate(Request $request){
    MachinePMCheck::where('MACHINEPM_UNID_REF',$request->MACHINE_UNID)->where('PM_TEMPLATE_UNID_REF',$request->PM_TEMPLATE_UNID)->delete();
    $datasave = MachinePmTemplateList::where('PM_TEMPLATE_UNID_REF',$request->PM_TEMPLATE_UNID)->get();
    foreach ($datasave as $key => $datasave_pmtemplatelist) {
      MachinePMCheck::insert([
        'UNID'                 => $this->randUNID('PMCS_CMMS_MACHINE_PMLIST'),
        'MACHINEPM_UNID_REF'          => $request->MACHINE_UNID,
        'PM_TEMPLATE_UNID_REF'        => $request->PM_TEMPLATE_UNID,
        'PM_TEMPLATELIST_UNID_REF'    => $datasave_pmtemplatelist->UNID,
        'CREATE_BY'                   => Carbon::now(),
        'CREATE_TIME'                 => Auth::user()->name,
      ]);
    }
    Machine::where('UNID',$request->MACHINE_UNID)->Update([
      'PM_TEMPLATE_UNID_REF' => $request->PM_TEMPLATE_UNID,
      'CREATE_BY'                   => Carbon::now(),
      'CREATE_TIME'                 => Auth::user()->name,
    ]);
    return redirect()->back()->with('success','เพิ่มรายการตรวจเช็คสำเร็จ');
  }
  public function Store(Request $request){

    $validated = $request->validate([
      'MACHINEPM_CHECK'           => 'required',
      'MACHINE_USER_CHECK'        => 'required',
      'MACHINE_CHECK_TIME'        => 'required',
      'MACHINEPM_FAIL_NOTE'       => 'max:500',
      'MACHINEPM_NOTE'            => 'max:500',
      ],
      [
      'MACHINEPM_CHECK.required'     => 'กรุณากรอกข้อมูลให้ครบถ้วน',
      'MACHINE_USER_CHECK.required'  => 'กรุณาใส่ชื่อผู้ตรวจ',
      'MACHINE_CHECK_TIME.required'  => 'กรุณาใส่เวลาที่ทำการตรวจ',
      'MACHINEPM_FAIL_NOTE.max'      => 'ไม่สามารถใส่ตัวอักษรได้เกิน 500 ',
      'MACHINEPM_NOTE.max'      => 'ไม่สามารถใส่ตัวอักษรได้เกิน 500 ',
    ]);
      if (count($request->MACHINEPM_CHECK) > 0 ) {
        if (MachinePMCheckDetail::where('MACHINE_UNID_REF',$request->UNID_MACHINE)->where('MACHINEPM_UNID_REF',$request->UNID_PMLIST) === NULL ) {
          foreach ($request->MACHINEPM_CHECK as $dataset => $value) {
            $data = array(
              'UNID'                  => $this->randUNID('PMCS_CMMS_MACHINE_PM_DEAIL'),
              'MACHINEPM_UNID_REF'    => $request->UNID_PMLIST,
              'MACHINE_UNID_REF'      => $request->UNID_MACHINE,
              'MACHINEPM_CHECK'       => $request->MACHINEPM_CHECK[$dataset+0],
              'MACHINEPM_CHECK_TIME'  => $request->MACHINE_CHECK_TIME,
              'MACHINEPM_NOTE'        => $request->MACHINEPM_NOTE,
              'MACHINE_USER_CHECK'    => $request->MACHINE_USER_CHECK,
              'CREATE_BY'             => Auth::user()->name,
              'CREATE_TIME'           => Carbon::now(),
              );
            MachinePMCheckDetail::insert($data);
          }
      }elseif (MachinePMCheckDetail::where('MACHINE_UNID_REF',$request->UNID_MACHINE)->where('MACHINEPM_UNID_REF',$request->UNID_PMLIST) !== NULL ) {
            MachinePMCheckDetail::where('MACHINE_UNID_REF',$request->UNID_MACHINE)->where('MACHINEPM_UNID_REF',$request->UNID_PMLIST)->delete();
            foreach ($request->MACHINEPM_CHECK as $dataset => $value) {
              $data = array(
                'UNID'                  => $this->randUNID('PMCS_CMMS_MACHINE_PM_DEAIL'),
                'MACHINEPM_UNID_REF'    => $request->UNID_PMLIST,
                'MACHINE_UNID_REF'      => $request->UNID_MACHINE,
                'MACHINEPM_CHECK'       => $request->MACHINEPM_CHECK[$dataset+0],
                'MACHINEPM_CHECK_TIME'  => $request->MACHINE_CHECK_TIME,
                'MACHINEPM_NOTE'        => $request->MACHINEPM_NOTE,
                'MACHINE_USER_CHECK'    => $request->MACHINE_USER_CHECK,
                'CREATE_BY'             => Auth::user()->name,
                'CREATE_TIME'           => Carbon::now(),
                );

              MachinePMCheckDetail::insert($data);
            }
          }
        MachinePMCheck::where('MACHINEPM_UNID_REF',$request->UNID_MACHINE)->where('PM_TEMPLATELIST_UNID_REF',$request->UNID_PMLIST)->update([
          'PM_TEMPLATELIST_LASTDUE'     => $request->MACHINE_CHECK_TIME,
          'MODIFY_BY'                   => Auth::user()->name,
          'MODIFY_TIME'                 => Carbon::now(),
        ]);
        return Redirect('machine/system/edit/'.$request->UNID_MACHINE.'/'.$request->UNID_PMLIST)->with('success','บันทึกสำเร็จ');
      }
  }
  public function Update(Request $request){
      if ($request->MACHINEPM_FIX > NULL ) {
          foreach ($request->MACHINEPM_FIX as $dataset => $value) {
            $data = array(
              'MACHINEPM_CHECK'       => "PASS",
              'MACHINEPM_FIX'         => $request->MACHINEPM_FIX[$dataset+0],
              'MACHINEPM_FIX_NOTE'    => $request->MACHINEPM_FIX_NOTE[$dataset+0],
              'MACHINEPM_FAIL_NOTE'   => $request->MACHINEPM_FAIL_NOTE[$dataset+0],
              'MACHINEPM_NOTE'        => $request->MACHINEPM_NOTE,
              'MODIFY_BY'             => Auth::user()->name,
              'MODIFY_TIME'           => Carbon::now(),
              );
            MachinePMCheckDetail::where('UNID',$request->UNID_MACHINEPMCHECKDETAIL[$dataset+0])->update($data);
          }
        return Redirect()->back()->with('success','บันทึกสำเร็จ');
      }
      elseif ($request->MACHINEPM_FIX == NULL ) {
          foreach ($request->MACHINEPM_FAIL_NOTE as $dataset => $value) {
            $data = array(
              'MACHINEPM_FAIL_NOTE'   => $request->MACHINEPM_FAIL_NOTE[$dataset+0],
              'MACHINEPM_NOTE'        => $request->MACHINEPM_NOTE,
              'MODIFY_BY'             => Auth::user()->name,
              'MODIFY_TIME'           => Carbon::now(),
              );
            MachinePMCheckDetail::where('UNID',$request->UNID_MACHINEPMCHECKDETAIL[$dataset+0])->update($data);
          }
        return Redirect()->back()->with('success','บันทึกสำเร็จ');
      }
  }
  public function check($UNID,$UNIDPM){
    $machinepm        = MachinePmTemplateList::where('UNID',$UNIDPM)->first();
    $machine          = Machine::where('UNID',$UNID)->first();
    $machinepmdetail  = MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$UNIDPM)->get();


      return view("/machine/syscheck/syscheck",compact('machine','machinepm','machinepmdetail'));

  }
  public function Edit($UNID,$UNIDPM){

    $machinepm      = MachinePmTemplateList::where('UNID',$UNIDPM)->first();
    $machine        = Machine::where('UNID',$UNID)->first();
    $machinepmdetail= MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$UNIDPM)->first();

    $machinepmcheckdetail = MachinePMCheckDetail::where('MACHINE_UNID_REF',$UNID)->where('MACHINEPM_UNID_REF',$UNIDPM)->get();
    $machinepmcheckdetailfirst = MachinePMCheckDetail::where('MACHINE_UNID_REF',$UNID)->where('MACHINEPM_UNID_REF',$UNIDPM)->first();



    return View('/machine/syscheck/syscheckedit',compact('machinepmcheckdetailfirst','machinepmcheckdetail','machinepm','machine','machinepmdetail'));

  }
  public function DeletePMMachine($UNID,$MC) {
    // dd(  MachinePmTemplateList::whereIn('UNID',$expolde)->delete());
    if ($UNID >= 1){
    foreach ([$UNID] as $data => $dataset)
    {
      $dataexplode = explode(',',$dataset);
      MasterIMPS::whereIn('PM_TEMPLATE_UNID_REF',$dataexplode)->where('MACHINE_CODE',$MC)->delete();
      MasterIMPSGroup::whereIn('PM_TEMPLATE_UNID_REF',$dataexplode)->where('MACHINE_CODE',$MC)->delete();
    }
      return Redirect()->back()->with('success','ลบข้อมูลสำเร็จ');
    }else {
          dd('no go');
          return Redirect()->back()->with('warning','กรุณาเลือกข้อมูลที่จะทำการลบ');

        }
      }
  public function Paginate(Request $request) {
    if($request->ajax()){
       $machinepmtemplate = MachinePmTemplate::whereNotIn('PM_TEMPLATE_NAME',MasterIMPS::select('PM_TEMPLATE_NAME')->where('MACHINE_CODE','=',$request->mc))->orderBy('CREATE_TIME','ASC')->paginate(6);
      // $data = DB::table('posts')->paginate(5);
      return view('/pagination/modalpm',compact('machinepmtemplate'))->render();
     }
  }
  public function PaginateRemove(Request $request) {
      if($request->ajax()){
           $machinepmtemplateremove = MachinePmTemplate::whereIn('PM_TEMPLATE_NAME',MasterIMPS::select('PM_TEMPLATE_NAME')->where('MACHINE_CODE',$request->mc))->orderBy('CREATE_TIME','ASC')->paginate(6);
          // $data = DB::table('posts')->paginate(5);
          return view('/pagination/modalpmremove',compact('machinepmtemplateremove'));
    }
  }
  }
