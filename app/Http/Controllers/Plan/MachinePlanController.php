<?php

namespace App\Http\Controllers\plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachinePlanPm;
use App\Models\MachineAddTable\MachinePmTemplate;
use App\Models\Machine\MachineLine;
use App\Models\Machine\MachineRepair;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;



class MachinePlanController extends Controller
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
  public function PMPlanList(Request $request){
    // dd($request);
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
