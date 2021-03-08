<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineRepair;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
  public function Sumaryline(){
    //dd($data_set);
    return View('machine/dashboard/sumaryline');
  }
  public function Dashboard(){
    //dashboardสรุป
    $dataset = Machine::where('MACHINE_CHECK','!=','1')->get()->count();
    $dataprocess = Machine::where('MACHINE_CHECK','=','2')->get()->count();
    $datawait = Machine::where('MACHINE_CHECK','=','4')->get()->count();

    //dashboardเครื่องจักรLINE
    $data_line1 = Machine::where('MACHINE_LINE','L1')->get()->count();
    $data_line2 = Machine::where('MACHINE_LINE','L2')->get()->count();
    $data_line3 = Machine::where('MACHINE_LINE','L3')->get()->count();
    $data_line4 = Machine::where('MACHINE_LINE','L4')->get()->count();
    $data_line5 = Machine::where('MACHINE_LINE','L5')->get()->count();
    $data_line6 = Machine::where('MACHINE_LINE','L6')->get()->count();
    //แจ้งซ่อม
    $datarepairlist = MachineRepair::select('MACHINE_CODE','MACHINE_TYPE','MACHINE_DOCDATE','MACHINE_CAUSE')
                                    ->where('CLOSE_STATUS','=','9')->take(9)->get();
    $datarepair = MachineRepair::where('CLOSE_STATUS','=','9')->get()->count();



    // dd($data_set);
    return View('machine/dashboard/dashboard',compact('datarepair','datarepairlist','dataprocess','dataset'
    ,'datawait','data_line1','data_line2','data_line3','data_line4','data_line5','data_line6'));
  }
  public function Notification(Request $request){

    $data = MachineRepair::select('PMCS_REPAIR_MACHINE.MACHINE_DOCDATE','PMCS_MACHINES.MACHINE_LINE','PMCS_REPAIR_MACHINE.MACHINE_CODE')
                          ->leftJoin('PMCS_MACHINES','PMCS_MACHINES.MACHINE_CODE','PMCS_REPAIR_MACHINE.MACHINE_CODE')
                          ->where('CLOSE_STATUS','=','9')->orderBy('MACHINE_TIME','DESC')->take(4)->get();
    // $datacount = MachineRepair::where('CLOSE_STATUS','9')->get()->count();

    return response()->json(['datarepair' => $data]);

  }
  public function NotificationCount(Request $request){

    $data = MachineRepair::where('CLOSE_STATUS','9')->take(4)->get()->count();

    return response()->json(['datacount' => $data]);

  }
}
