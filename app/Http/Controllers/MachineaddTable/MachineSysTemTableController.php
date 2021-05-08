<?php

namespace App\Http\Controllers\MachineaddTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\MachineAddTable\MachinePmTemplate;
use App\Models\MachineAddTable\MachinePmTemplateList;
use App\Models\MachineAddTable\MachinePmTemplateDetail;
use App\Models\Machine\MasterIMPS;
use App\Models\Machine\MasterIMPSGroup;
use App\Models\Machine\Protected;
//************** Package form github ***************
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;



class MachineSysTemTableController extends Controller
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

  public function Index(Request $request,$UNID = NULL){
    $datapmtemplate           = MachinePmTemplate::orderBy('CREATE_TIME','ASC')->get();
    $countdetail = 0;
    $datapmtemplatelist       = NULL;
    $datapmtemplatefirst      = NULL;
    $datamachine              = NULL;
    if($UNID){
      $datapmtemplatelist       = MachinePmTemplateList::where('PM_TEMPLATE_UNID_REF','=',$UNID)->get();
      $datapmtemplatefirst      = MachinePmTemplate::where('UNID',$UNID)->first();
      $data                     = MasterIMPS::where('PM_TEMPLATE_UNID_REF',$UNID)->first();
      $datamachine              = Machine::where('MACHINE_CODE',$data->MACHINE_CODE)->get();
      $countdetail = $datapmtemplatefirst->count();
    }
    return View('machine/add/system/systemlist',compact('datapmtemplate','datapmtemplatelist','countdetail','datapmtemplatefirst','datamachine'));
  }
  public function StoreTemplate(Request $request){
    $validated = $request->validate([
      'PM_TEMPLATE_NAME'           => 'required|unique:PMCS_CMMS_PM_TEMPLATE|max:200',
      ],
      [
      'PM_TEMPLATE_NAME.required'  => 'กรุณาใส่ชื่อกลุ่ม',
      'PM_TEMPLATE_NAME.unique'    => 'มีชื่อกลุ่มนี้แล้ว',
      'PM_TEMPLATE_NAME.max'  => 'ชื่อยาวเกินไป',
      ]);
    MachinePmTemplate::insert([
      'PM_TEMPLATE_NAME'       => $request->PM_TEMPLATE_NAME,
      'CREATE_BY'              => Auth::user()->name,
      'CREATE_TIME'            => Carbon::now(),
      'UNID'                   => $this->randUNID('PMCS_CMMS_PM_TEMPLATE'),
    ]);
    return Redirect()->back()->with('success','เพิ่มระบบ สำเร็จ');
  }
  public function UpdateTemplate(Request $request) {
   MachinePmTemplate::where('UNID',$request->UNID)->update([
        'PM_TEMPLATE_NAME'      => $request->PM_TEMPLATE_NAME,
        'MODIFY_BY'              => Auth::user()->name,
        'MODIFY_TIME'            => Carbon::now(),
    ]);
    MasterIMPS::where('PM_TEMPLATE_UNID_REF',$request->UNID)->update(['PM_TEMPLATE_NAME' => $request->PM_TEMPLATE_NAME]);
    return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');
  }
  public function DeleteTemplate($UNID) {
      MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$UNID)->delete();
      MachinePmTemplateList::where('PM_TEMPLATE_UNID_REF',$UNID)->delete();
      MachinePmTemplate::where('UNID',$UNID)->delete();

      MasterIMPS::where('PM_TEMPLATE_UNID_REF',$UNID)->delete();
      MasterIMPSGroup::where('PM_TEMPLATE_UNID_REF',$UNID)->delete();
      return Redirect()->back()->with('success','ลบข้อมูลสำเร็จ');

  }
  public function DeleteMachinePm($MC,$UNID) {
    MasterIMPS::where('MACHINE_CODE',$MC)->where('PM_TEMPLATE_UNID_REF',$UNID)->delete();
    MasterIMPSGroup::where('MACHINE_CODE',$MC)->where('PM_TEMPLATE_UNID_REF',$UNID)->delete();
      return Redirect()->back()->with('success','ลบข้อมูลสำเร็จ');

  }

  public function PmTemplateAdd($UNID) {
      $datapmtemplate = MachinePmTemplate::where('UNID',$UNID)->first();
      return view('machine/add/system/add',compact('datapmtemplate'));
      }
  public function StoreList(Request $request){
    $validated = $request->validate([
      'PM_TEMPLATELIST_NAME'            => 'required|max:200',
      'PM_TEMPLATELIST_DAY'             => 'integer|min:1|max:12'
      ],
      [
      'PM_TEMPLATELIST_NAME.required'   => 'กรุณาใส่รายการ Inspection Item',
      'PM_TEMPLATELIST_NAME.max'        => 'ชื่อInspection Item ยาวเกินไป',
      'PM_TEMPLATELIST_DAY.integer'     => 'กรุณาใส่ข้อมูลเป็นตัวเลขและไม่มีจุดทศนิยม',
      'PM_TEMPLATELIST_DAY.min'         => 'ใส่จำนวนเดือนต่ำสุดได้ 1',
      'PM_TEMPLATELIST_DAY.max'         => 'ใส่จำนวนเดือนสูงสุดได้ 12'
      ]);
    MachinePmTemplateList::insert([
      'PM_TEMPLATE_UNID_REF'         => $request->PM_TEMPLATE_UNID_REF,
      'PM_TEMPLATELIST_NAME'         => $request->PM_TEMPLATELIST_NAME,
      'PM_TEMPLATELIST_DAY'          => ($request->PM_TEMPLATELIST_DAY * 30),
      'PM_TEMPLATELIST_STATUS'       => '1',
      'CREATE_BY'                    => Auth::user()->name,
      'CREATE_TIME'                  => Carbon::now(),
      'UNID'                         => $this->randUNID('PMCS_CMMS_PM_TEMPLATE_LIST'),
    ]);
    $MC_CODE = MasterIMPS::select('MACHINE_CODE')->where('PM_TEMPLATE_UNID_REF',$request->PM_TEMPLATE_UNID_REF)->get();
    $lastrecode = MachinePmTemplateList::select('UNID')->latest('UNID')->first();
    foreach ($MC_CODE as $key => $dataset) {
      MasterIMPSGroup::insert([
        'UNID'                      => $this->randUNID('PMCS_CMMS_MASTER_IMPS_GP'),
        'PM_TEMPLATELIST_UNID_REF'  => $lastrecode->UNID,
        'MACHINE_CODE'              => $dataset->MACHINE_CODE,
        'PM_TEMPLATE_UNID_REF'      => $request->PM_TEMPLATE_UNID_REF,
        'PM_TEMPLATELIST_NAME'      => $request->PM_TEMPLATELIST_NAME,
        'PM_TEMPLATELIST_DAY'       => ($request->PM_TEMPLATELIST_DAY * 30),
        'CREATE_BY'                 => Auth::user()->name,
        'CREATE_TIME'               => Carbon::now(),
      ]);
    }
    if ($request->save == "new") {
      return Redirect()->back()->with('success','เพิ่มระบบ สำเร็จ');
    }else {
      $data = MachinePmTemplateList::where('PM_TEMPLATE_UNID_REF',$request->PM_TEMPLATE_UNID_REF)->orderBy('CREATE_TIME','DESC')->first();
          return Redirect('machine/pm/templatelist/edit/'.$data->UNID);
    }
  }
  public function PmTemplateListEdit($UNID){
    $datapmtemplatelist = MachinePmTemplateList::where('UNID',$UNID)->first();
    $datapmtemplate     = MachinePmTemplate::where('UNID',$datapmtemplatelist->PM_TEMPLATE_UNID_REF)->first();
    $datapmtemplatedetail = MachinePmTemplateDetail::select('*')->selectraw("Case When PM_TYPE_INPUT = 'number' then 'ข้อมูลตัวเลข'
	  When PM_TYPE_INPUT = 'text' then 'ข้อมูลเป็นตัวอักษร'
	  When PM_TYPE_INPUT = 'radio' then 'ข้อมูลเป็น ผ่าน ไม่ผ่าน'
	  ELSE 'ไม่พบข้อมูล' END AS PM_TYPE")->where('PM_TEMPLATELIST_UNID_REF',$UNID)->get();

    return View('machine/add/system/edit',compact('datapmtemplatelist','datapmtemplatedetail','datapmtemplate'));
  }
  public function UpdatePMList(Request $request,$UNID) {
    $validated = $request->validate([
      'PM_TEMPLATELIST_NAME'           => 'required|max:200',
      'PM_TEMPLATELIST_DAY'            => 'integer|min:1|max:12'
      ],
      [
      'PM_TEMPLATELIST_NAME.required'  => 'กรุณาใส่รายการ PM',
      'PM_TEMPLATELIST_NAME.max'       => 'ชื่อยาวเกินไป',
      'PM_TEMPLATELIST_DAY.integer'    => 'กรุณาใส่จำนวนวันเป็นตัวเลขและไม่มีจุดทศนิยม',
      'PM_TEMPLATELIST_DAY.min'        => 'ใส่จำนวนเดือนต่ำสุดได้ 1',
      'PM_TEMPLATELIST_DAY.max'        => 'ใส่จำนวนเดือนสูงสุดได้ 12'
      ]);
    MachinePmTemplateList::where('UNID',$UNID)->update([
        'PM_TEMPLATELIST_NAME'      => $request->PM_TEMPLATELIST_NAME,
        'PM_TEMPLATELIST_POINT'     => $request->PM_TEMPLATELIST_POINT,
        'PM_TEMPLATELIST_DAY'       => ($request->PM_TEMPLATELIST_DAY*30),
        'PM_TEMPLATELIST_STATUS'    => $request->PM_TEMPLATELIST_STATUS,
        'MODIFY_BY'              => Auth::user()->name,
        'MODIFY_TIME'            => Carbon::now(),
    ]);
    MasterIMPSGroup::where('PM_TEMPLATELIST_UNID_REF',$UNID)->update([
      'PM_TEMPLATELIST_NAME'      => $request->PM_TEMPLATELIST_NAME,
      'PM_TEMPLATELIST_DAY'       => ($request->PM_TEMPLATELIST_DAY*30),
      'PM_TEMPLATELIST_STATUS'    => $request->PM_TEMPLATELIST_STATUS,
    ]);

        return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');
    }
  public function DeletePMList($UNID) {
        MachinePmTemplateList::where('UNID',$UNID)->delete();
        MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$UNID)->delete();
      return Redirect()->back()->with('success','ลบข้อมูลสำเร็จ');
  }
  public function DeletePMListAll($UNID) {
        MachinePmTemplateList::where('UNID',$UNID)->delete();
        MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$UNID)->delete();
        MasterIMPSGroup::where('PM_TEMPLATELIST_UNID_REF',$UNID)->delete();
      return Redirect()->back()->with('success','ลบข้อมูลทั้งหมดสำเร็จ');
  }

  public function PmTemplateDetailStore(Request $request){
    $validated = $request->validate([
      'PM_DETAIL_NAME'           => 'required|max:200',
      ],
      [
      'PM_DETAIL_NAME.required'  => 'กรุณาใส่ชื่อกลุ่ม',
      'PM_DETAIL_NAME.max'  => 'ชื่อยาวเกินไป',
      ]);
    MachinePmTemplateDetail::insert([
      'PM_DETAIL_NAME'         => $request->PM_DETAIL_NAME,
      'PM_DETAIL_STD'           => $request->PM_DETAIL_STD,
      'PM_TYPE_INPUT'           => $request->PM_TYPE_INPUT,
      'PM_TEMPLATELIST_UNID_REF' => $request->PM_TEMPLATELIST_UNID_REF,
      'CREATE_BY'              => Auth::user()->name,
      'CREATE_TIME'            => Carbon::now(),
      'UNID'                   => $this->randUNID('PMCS_CMMS_PM_TEMPLATE_DETAIL'),
    ]);
    return Redirect()->back()->with('success','เพิ่มระบบ สำเร็จ');
  }
  public function PmTemplateDetailUpdate(Request $request){
    MachinePmTemplateDetail::where('UNID',$request->UNID)->update([
      'PM_DETAIL_NAME'         => $request->PM_DETAIL_NAME,
      'PM_DETAIL_STD'           => $request->PM_DETAIL_STD,
      'PM_TYPE_INPUT'           => $request->PM_TYPE_INPUT,
      'MODIFY_BY'              => Auth::user()->name,
      'MODIFY_TIME'            => Carbon::now(),
    ]);
    return Redirect()->back()->with('success','เพิ่มระบบ สำเร็จ');
  }
  public function DeletePMDetail($UNID) {
    $dataset = MachinePmTemplateDetail::where('UNID','=',$UNID)->delete();
    return Redirect()->back()->with('success','ลบสำเร็จ');
  }


}
