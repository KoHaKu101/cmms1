<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\Machine\MachineUpload;
use App\Models\Machine\MachineSysTemCheck;

use App\Models\MachineAddTable\MachineSysTemSubTable;
use App\Models\MachineAddTable\MachineSysTemTable;

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

    $dataset = Machine::paginate(10);

    return View('machine/syscheck/syschecklist',compact('dataset'));
  }
  public function Indexline($LINE_CODE){

    $dataset = Machine::where('MACHINE_LINE','=',$LINE_CODE)->paginate(10);

      // return view('machine/assets/machinelist0',compact(['dataset']),['dataset' => $dataset]);
    return View('machine/syscheck/syschecklist',compact(['dataset']),['dataset' => $dataset]);
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'SYSTEM_CODE'           => 'required',
      ],
      [
      'SYSTEM_CODE.required'  => 'กรุณาเลือกอย่างน้อย 1 ข้อมูล'
      ]);

      if (count($request->SYSTEM_CODE) > 0 ) {
        foreach ($request->SYSTEM_CODE as $dataset => $value) {

          $datasys = array(
            'UNID'             => $this->randUNID('PMCS_CMMS_MACHINE_SYSTEMCHECK'),
            'MACHINE_UNID_REF' => $request->MACHINE_UNID_REF[$dataset],
            'SYSTEM_CODE'      => $request->SYSTEM_CODE[$dataset],
            'CREATE_BY'        => Auth::user()->name,
            'CREATE_TIME'      => Carbon::now(),
          );

          MachineSysTemCheck::insert($datasys);
        }
        return Redirect()->back()->with('success','เพิ่มระบบสำเร็จ');
      }


  }
  public function Edit($UNID){

    $m = 'PMCS_CMMS_MACHINE_SYSTEMTABLE';
    $s = 'PMCS_CMMS_MACHINE_SYSTEMCHECK';
    $dataset = Machine::where('UNID',$UNID)->first();
    $machinesystem = MachineSysTemCheck::select($s.'.SYSTEM_MONTHCHECK',$s.'.SYSTEM_MONTH',$m.'.MACHINE_TYPE',$s.'.SYSTEM_CODE',$s.'.UNID')
                                        ->leftJoin($m,$m.'.SYSTEM_CODE',$s.'.SYSTEM_CODE')
                                        ->where('MACHINE_UNID_REF',$UNID)
                                        ->get();
    $machinesystemtable = MachineSysTemTable::select('SYSTEM_CODE','MACHINE_TYPE','SYSTEM_STATUS')
                                            ->where('SYSTEM_STATUS','=','9')
                                            ->get();

    return View('/machine/syscheck/edit',compact('machinesystemtable','machinesystem','dataset'));

  }



  public function Update(Request $request,$UNID){
    $validated = $request->validate([
    'SYSTEM_MONTH'           => 'required',
    ],
    [
    'SYSTEM_MONTH.required'  => 'ไม่มีข้อมูลบันทึก'
    ]);

    if (count($request->SYSTEM_MONTH) > 0 ) {
      foreach ($request->SYSTEM_MONTH as $dataset => $value) {

        $datasys = array(
          'SYSTEM_MONTH'     => $request->SYSTEM_MONTH[$dataset],
          'SYSTEM_MONTHCHECK'=> $request->SYSTEM_MONTHCHECK[$dataset],
          'SYSTEM_MONTHSTORE'=> Carbon::parse($request->SYSTEM_MONTHCHECK[$dataset])->addmonth($request->SYSTEM_MONTH[$dataset]),
          'MODIFY_BY'        => Auth::user()->name,
          'MODIFY_TIME'      => Carbon::now(),

        );
        $DATAUNID = array('UNID' => $request->DATAUNID[$dataset],);

        MachineSysTemCheck::whereIn('UNID',$DATAUNID)->update($datasys);
      }
      return Redirect()->back()->with('success','บันทึกสำเร็จ');
    }
  }
  public function Delete($UNID){

      $data_up = MachineSysTemCheck::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','ลบรายการสำเร็จ');

  }
}
