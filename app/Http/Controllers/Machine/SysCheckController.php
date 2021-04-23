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
use App\Models\SettingMenu\MailSetup;

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
    $machine = Machine::where('MACHINE_STATUS','!=','4')->get();
    $pmlist  = MasterIMPSGroup::all();
    $alert   = MailSetup::select('AUTOMAIL')->first();
    return view('/machine/syscheck/syschecklist',compact('machine','pmlist','alert'));

  }
  public function StoreList(Request $request){
    foreach ($request->PM_TEMPLATE_UNID_REF as $dataset => $value) {
      $datapmtemplate = MachinePmTemplate::where('UNID',$request->PM_TEMPLATE_UNID_REF[$dataset])->first();
      $data = array(
        'UNID'                  => $this->randUNID('PMCS_CMMS_MASTER_IMPS'),
        'PM_TEMPLATE_UNID_REF'  => $request->PM_TEMPLATE_UNID_REF[$dataset],
        'MACHINE_CODE'          => $request->MACHINE_CODE,
        'PM_TEMPLATE_NAME'      => $datapmtemplate->PM_TEMPLATE_NAME,
        'PM_LAST_DATE'          => Carbon::now(),
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
        'PM_TEMPLATELIST_STATUS'    => '1',
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

        return Redirect('machine/system/edit/'.$request->UNID_MACHINE.'/'.$request->UNID_PMLIST)->with('success','บันทึกสำเร็จ');

  }
  public function Update(Request $request){

        return Redirect()->back()->with('success','บันทึกสำเร็จ');
      }

  public function check($UNID,$UNIDPM){
    $machinepm        = MasterIMPSGroup::where('UNID',$UNIDPM)->first();
    $machine          = Machine::where('UNID',$UNID)->first();
    $detail           = MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$machinepm->PM_TEMPLATELIST_UNID_REF)->get();
      return view("/machine/syscheck/syscheck",compact('machine','machinepm','detail'));

  }
  public function Edit($UNID,$UNIDPM){

    $machinepm      = MachinePmTemplateList::where('UNID',$UNIDPM)->first();
    $machine        = Machine::where('UNID',$UNID)->first();
    $machinepmdetail= MachinePmTemplateDetail::where('PM_TEMPLATELIST_UNID_REF',$UNIDPM)->first();

    $machinepmcheckdetail = MachinePMCheckDetail::where('MACHINE_UNID_REF',$UNID)->where('MACHINEPM_UNID_REF',$UNIDPM)->get();
    $machinepmcheckdetailfirst = MachinePMCheckDetail::where('MACHINE_UNID_REF',$UNID)->where('MACHINEPM_UNID_REF',$UNIDPM)->first();



    return View('/machine/syscheck/syscheckedit',compact('machinepmcheckdetailfirst','machinepmcheckdetail','machinepm','machine','machinepmdetail'));

  }

  // edit machine
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

  public function StoreDate(Request $request){
    if($request->ajax()){
      // $time = MasterIMPS::select('PM_TEMPLATELIST_DAY')->where('UNID',$request->unid)->first();
      // $count = $time->PM_TEMPLATELIST_DAY / 30;
      // $countend = Carbon::parse($request->date)->addMonth($count)->format('Y-m-d');
      MasterIMPS::where('UNID',$request->unid)->update([
        'PM_LAST_DATE' => $request->date,
      ]);
      $data = MasterIMPS::select('PM_NEXT_DATE')->where('UNID',$request->unid)->first();
      return response()->json($data);
    }

  }



  }
