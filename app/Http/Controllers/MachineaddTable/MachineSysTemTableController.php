<?php

namespace App\Http\Controllers\MachineaddTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineSysTemTable;
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

  public function Index(){

    $dataset = MachineSysTemTable::paginate(10);

    return View('machine/add/system/systemlist',compact('dataset'));
  }
  public function Create(){
    return View('machine/add/machinesystemtable/form');
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'SYSTEM_CODE'           => 'required|unique:PMCS_CMMS_MACHINE_SYSTEMTABLE|max:255',
      'SYSTEM_NAME'           => 'required|unique:PMCS_CMMS_MACHINE_SYSTEMTABLE|max:255',
      ],
      [
      'SYSTEM_CODE.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      'SYSTEM_CODE.unique'    => 'มีรหัสระบบเครื่องจักรนี้แล้ว',
      'SYSTEM_NAME.required'  => 'กรุณาใสรายการระบบเครื่องจักร',
      'SYSTEM_NAME.unique'    => 'มีรายการระบบเครื่องจักรนี้แล้ว'
      ]);


    MachineSysTemTable::insert([
      'SYSTEM_CODE'       => $request->SYSTEM_CODE,
      'SYSTEM_NAME'       => $request->SYSTEM_NAME,
      'SYSTEM_STATUS'     => $request->SYSTEM_STATUS,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_MACHINE_SYSTEMTABLE'),
    ]);
    $dataset = MachineSysTemTable::paginate(10);
    return Redirect()->route('machinesystemtable.list',compact('dataset'))->with('success','ลงทะเบียน สำเร็จ');
  }
  public function Edit($UNID) {
    $dataset = MachineSysTemTable::where('UNID','=',$UNID)->first();
    return view('machine/add/system/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {

  $data_set = MachineSysTemTable::where('UNID',$UNID)->update([
    'SYSTEM_CODE'       => $request->SYSTEM_CODE,
    'SYSTEM_NAME'       => $request->SYSTEM_NAME,
    'SYSTEM_STATUS'     => $request->SYSTEM_STATUS,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),

  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {


    $dataset = MachineSysTemTable::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}

}
