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
use App\Models\Machine\MachineSysTemSubCheck;
use App\Models\Machine\MachineSysTemCheck;
use App\Models\MachineAddTable\MachineSysTemTable;
use App\Models\MachineAddTable\MachineSysTemSubTable;
//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;



class SysCheckSubController extends Controller
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

  public function Show($UNID){
    // dd($UNID);
    $m = 'PMCS_CMMS_MACHINE_SYSTEMTABLE';
    $s = 'PMCS_CMMS_MACHINE_SYSTEMCHECK';

    $dataname = MachineSysTemCheck::select($s.'.MACHINE_UNID_REF',$s.'.SYSTEM_MONTHCHECK',$s.'.SYSTEM_MONTH',$m.'.SYSTEM_NAME',$s.'.SYSTEM_CODE',$s.'.UNID')
                                        ->leftJoin($m,$m.'.SYSTEM_CODE',$s.'.SYSTEM_CODE')
                                        ->where($s.'.UNID',$UNID)
                                        ->first();
    $databack = Machine::where('UNID',$dataname->MACHINE_UNID_REF)->first();

    $where = ['SYSTEM_CODE' => $dataname->SYSTEM_CODE,'SYSTEMSUB_STATUS' => '9'];
                                        // dd($dataname);
    $dataset = MachineSysTemSubCheck::where('SYSTEMCHECK_UNID_REF',$UNID)->get();
    $machinesystemsub = MachineSysTemSubTable::select('SYSTEM_CODE','SYSTEMSUB_CODE','SYSTEMSUB_NAME','SYSTEMSUB_STATUS')
                                              ->where($where)
                                              // ->orWhere('SYSTEMSUB_STATUS','9')
                                              ->get();

    return View('machine/syscheck/systemsubshow',compact('dataname','machinesystemsub','dataset','databack'));
    // return Response()->json($machinesystemsub);
  }
  public function Showback($UNID){
    // dd($UNID);
    $m = 'PMCS_CMMS_MACHINE_SYSTEMTABLE';
    $s = 'PMCS_CMMS_MACHINE_SYSTEMCHECK';

    $dataname = MachineSysTemCheck::select($s.'.MACHINE_UNID_REF',$s.'.SYSTEM_MONTHCHECK',$s.'.SYSTEM_MONTH',$m.'.SYSTEM_NAME',$s.'.SYSTEM_CODE',$s.'.UNID')
                                        ->leftJoin($m,$m.'.SYSTEM_CODE',$s.'.SYSTEM_CODE')
                                        ->where($s.'.UNID',$UNID)
                                        ->first();
    $databack = Machine::where('UNID',$dataname->MACHINE_UNID_REF)->first();

    $where = ['SYSTEM_CODE' => $dataname->SYSTEM_CODE,'SYSTEMSUB_STATUS' => '9'];
                                        // dd($dataname);
    $dataset = MachineSysTemSubCheck::where('SYSTEMCHECK_UNID_REF',$UNID)->get();
    $machinesystemsub = MachineSysTemSubTable::select('SYSTEM_CODE','SYSTEMSUB_CODE','SYSTEMSUB_NAME','SYSTEMSUB_STATUS')
                                              ->where($where)
                                              // ->orWhere('SYSTEMSUB_STATUS','9')
                                              ->get();

    return View('machine/syscheck/systemsubshowback',compact('dataname','machinesystemsub','dataset','databack'));
    // return Response()->json($machinesystemsub);
  }
  public function Store(Request $request){

    $validated = $request->validate([
      'SYSTEMSUB_CODE'           => 'required',
      ],
      [
      'SYSTEMSUB_CODE.required'  => 'กรุณาเลือกอย่างน้อย 1 ข้อมูล'
      ]);

      if (count($request->SYSTEMSUB_CODE) > 0 ) {
        foreach ($request->SYSTEMSUB_CODE as $dataset => $value) {

          $datasyssub = array(
            'UNID'                 => $this->randUNID('PMCS_CMMS_MACHINE_SYSTEMSUBCHECK'),
            'SYSTEMCHECK_UNID_REF' => $request->SYSTEMCHECK_UNID_REF[$dataset],
            'SYSTEM_CODE'          => $request->SYSTEM_CODE[$dataset],
            'SYSTEMSUB_CODE'         => $request->SYSTEMSUB_CODE[$dataset],
            'SYSTEMSUB_NAME'       => $request->SYSTEMSUB_NAME[$dataset],
            'CREATE_BY'            => Auth::user()->name,
            'CREATE_TIME'          => Carbon::now(),
          );

          MachineSysTemSubCheck::insert($datasyssub);
        }
        return Redirect()->back()->with('success','เพิ่มระบบสำเร็จ');
      }


  }
  public function Update(Request $request,$UNID){

    $validated = $request->validate([
    'SYSTEMSUB_STD'           => 'required',
    ],
    [
    'SYSTEMSUB_STD.required'  => 'ไม่มีข้อมูลบันทึก'
    ]);

    if (count($request->SYSTEMSUB_STD) > 0 ) {
      foreach ($request->SYSTEMSUB_STD as $dataset => $value) {

        $datasys = array(
          'SYSTEMSUB_STD'     => $request->SYSTEMSUB_STD[$dataset],
          'MODIFY_BY'        => Auth::user()->name,
          'MODIFY_TIME'      => Carbon::now(),

        );
        $DATAUNID = array('UNID' => $request->DATAUNID[$dataset],);

        MachineSysTemSubCheck::whereIn('UNID',$DATAUNID)->update($datasys);
      }
      return Redirect()->back()->with('success','บันทึกสำเร็จ');
    }
  }
  public function Delete($UNID){

      $data_up = MachineSysTemSubCheck::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','ลบรายการสำเร็จ');

  }
}
