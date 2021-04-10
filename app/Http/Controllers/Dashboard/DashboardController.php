<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineRepair;
use App\Models\Machine\MachineSysTemCheck;
// use App\Models\Machine\MachineRepair;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
  public function Sumaryline(){
    //dd($data_set);
    return View('machine/dashboard/sumaryline');
  }
  public function Dashboard(){
    //dashboardสรุป
    $dataset = Machine::where('MACHINE_CHECK','!=','1')->count();
    $dataprocess = Machine::where('MACHINE_CHECK','=','2')->count();
    $datawait = Machine::where('MACHINE_CHECK','=','4')->count();

    //dashboardเครื่องจักรLINE
    $data_line1 = Machine::select('MACHINE_LINE')->where('MACHINE_LINE','L1')->count();
    $data_line2 = Machine::select('MACHINE_LINE')->where('MACHINE_LINE','L2')->count();
    $data_line3 = Machine::select('MACHINE_LINE')->where('MACHINE_LINE','L3')->count();
    $data_line4 = Machine::select('MACHINE_LINE')->where('MACHINE_LINE','L4')->count();
    $data_line5 = Machine::select('MACHINE_LINE')->where('MACHINE_LINE','L5')->count();
    $data_line6 = Machine::select('MACHINE_LINE')->where('MACHINE_LINE','L6')->count();
    //แจ้งซ่อม
    $datarepairlist = MachineRepair::select('MACHINE_CODE','MACHINE_TYPE','MACHINE_DOCDATE','MACHINE_CAUSE')
                                    ->where('CLOSE_STATUS','=','9')->orderBy('MACHINE_DOCDATE','DESC')->take(9)->get();
    $datarepair = MachineRepair::where('CLOSE_STATUS','=','9')->count();



    // dd($data_set);
    return View('machine/dashboard/dashboard',compact('datarepair','datarepairlist','dataprocess','dataset'
    ,'datawait','data_line1','data_line2','data_line3','data_line4','data_line5','data_line6'));
  }
  public function Notification(Request $request){
    $data = MachineRepair::select('PMCS_REPAIR_MACHINE.UNID','PMCS_REPAIR_MACHINE.MACHINE_DOCDATE','PMCS_MACHINE.MACHINE_LINE','PMCS_REPAIR_MACHINE.MACHINE_CODE')
                          ->leftJoin('PMCS_MACHINE','PMCS_MACHINE.MACHINE_CODE','PMCS_REPAIR_MACHINE.MACHINE_CODE')
                          ->where('CLOSE_STATUS','=','9')->orderBy('MACHINE_TIME','DESC')->take(4)->get();
    // $datacount = MachineRepair::where('CLOSE_STATUS','9')->get()->count();

    return response()->json(['datarepair' => $data]);
  }
  public function NotificationCount(Request $request){
    $data = MachineRepair::where('CLOSE_STATUS','9')->take(4)->get()->count();
    return response()->json(['datacount' => $data]);
  }
  public function SystemcheckMonthly(Request $request){
    $systemcheck = 'PMCS_CMMS_MACHINE_SYSTEMCHECK';
    $systemtable = 'PMCS_CMMS_MACHINE_SYSTEMTABLE';
    $machine = 'PMCS_MACHINE';
    $data = MachineSysTemCheck::select($systemcheck.'.MACHINE_UNID_REF',$systemtable.'.SYSTEM_NAME'
                                ,$machine.'.MACHINE_LINE',$machine.'.MACHINE_CODE',$systemcheck.'.SYSTEM_MONTHSTORE')
                          ->leftJoin($systemtable,$systemtable.'.SYSTEM_CODE',$systemcheck.'.SYSTEM_CODE')
                          ->leftJoin($machine,$machine.'.UNID',$systemcheck.'.MACHINE_UNID_REF')
                          ->whereDate('SYSTEM_MONTHSTORE','<=',Carbon::now('Asia/Bangkok'))
                          ->orderBy('SYSTEM_MONTHSTORE','DESC')->take(4)->get();
    // $notify = (Carbon::now() >= $data->SYSTEM_MONTHSTORE) ? $data->get()  : ""  ;
    // $datacount = MachineRepair::where('CLOSE_STATUS','9')->get()->count();
    // dd($data);

    return response()->json(['datamonth' => $data]);
  }
  public function SystemcheckMonthlycount(Request $request){
    $data = MachineSysTemCheck::select('SYSTEM_MONTHSTORE')->whereDate('SYSTEM_MONTHSTORE','<=',Carbon::now('Asia/Bangkok'))->take(4)
                                ->get()->count();
    return response()->json(['datamonthcount' => $data]);
  }









  //**********************************************************************************************************//
  public function Logout(){
      Auth::logout();
      return Redirect()->route('login')->with('success','User Logout');
  }
}
