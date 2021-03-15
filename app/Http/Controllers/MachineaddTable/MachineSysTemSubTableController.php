<?php

namespace App\Http\Controllers\MachineaddTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineSysTemSubTable;
use App\Models\MachineAddTable\MachineSysTemTable;
use App\Models\Machine\Protected;
//************** Package form github ***************
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;



class MachineSysTemSubTableController extends Controller
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
    $m = 'PMCS_CMMS_MACHINE_SYSTEMTABLE';
    $s = 'PMCS_CMMS_MACHINE_SYSTEMSUBTABLE';
    $dataset = MachineSysTemSubTable::select($s.'.SYSTEMSUB_STATUS',$m.'.SYSTEM_NAME',$s.'.SYSTEM_CODE',$s.'.UNID',$s.'.SYSTEMSUB_NAME',$s.'.SYSTEMSUB_CODE')
                                    ->leftJoin($m,$m.'.SYSTEM_CODE',$s.'.SYSTEM_CODE')
                                    ->paginate(10);
    $system = MachineSysTemTable::where('SYSTEM_STATUS','=','9')->get();
    $systemshow = MachineSysTemTable::where('SYSTEM_STATUS','=','9')->first();

    return View('machine/add/systemsub/systemsublist',compact('dataset','system','systemshow'));
  }

  public function Store(Request $request){

    $validated = $request->validate([

      'SYSTEMSUB_CODE'           => 'required|unique:PMCS_CMMS_MACHINE_SYSTEMSUBTABLE|max:255',
      'SYSTEMSUB_NAME'           => 'required|unique:PMCS_CMMS_MACHINE_SYSTEMSUBTABLE|max:255',
      ],
      [
      'SYSTEMSUB_CODE.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      'SYSTEMSUB_CODE.unique'    => 'มีรหัสระบบเครื่องจักรนี้แล้ว',
      'SYSTEMSUB_NAME.required'  => 'กรุณาใสรายการระบบเครื่องจักร',
      'SYSTEMSUB_NAME.unique'    => 'มีรายการระบบเครื่องจักรนี้แล้ว'
      ]);


    MachineSysTemSubTable::insert([
      'SYSTEM_CODE'       => $request->SYSTEM_CODE,
      'SYSTEMSUB_CODE'       => $request->SYSTEMSUB_CODE,
      'SYSTEMSUB_NAME'       => $request->SYSTEMSUB_NAME,
      'SYSTEMSUB_STATUS'     => $request->SYSTEMSUB_STATUS,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_MACHINE_SYSTEMSUBTABLE'),
    ]);
    $dataset = MachineSysTemSubTable::paginate(10);
    return Redirect()->route('machinesystemsubtable.list',compact('dataset'))->with('success','ลงทะเบียน สำเร็จ');
  }
  public function Edit($UNID) {
    $dataset = MachineSysTemSubTable::where('UNID','=',$UNID)->first();
    $system = MachineSysTemTable::where('SYSTEM_STATUS','=','9')->get();
    return view('machine/add/systemsub/edit',compact('dataset','system'));
}
public function Update(Request $request,$UNID) {
  

  $dataset = MachineSysTemSubTable::where('UNID',$UNID)->update([
    'SYSTEM_CODE'       => $request->SYSTEM_CODE,
    'SYSTEMSUB_CODE'       => $request->SYSTEMSUB_CODE,
    'SYSTEMSUB_NAME'       => $request->SYSTEMSUB_NAME,
    'SYSTEMSUB_STATUS'     => $request->SYSTEMSUB_STATUS,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),

  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {


    $dataset = MachineSysTemSubTable::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}

}
