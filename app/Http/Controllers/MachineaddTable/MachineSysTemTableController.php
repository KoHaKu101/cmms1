<?php

namespace App\Http\Controllers\MachineaddTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineSysTemTable;
use App\Models\MachineAddTable\MachineSysTemPointTable;
use App\Models\MachineAddTable\MachineTypeTable;
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



    return View('machine/add/system/systemlist');
  }
  public function Create(){
    return View('machine/add/machinesystemtable/form');
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'SYSTEM_CODE'           => 'required|unique:PMCS_CMMS_MACHINE_SYSTEMTABLE|max:50',
      'MACHINE_TYPE'          => 'required|max:200',
      'SYSTEM_MONTH'          => 'required',
      ],
      [
      'SYSTEM_CODE.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      'SYSTEM_CODE.unique'    => 'มีรหัสระบบเครื่องจักรนี้แล้ว',
      'MACHINE_TYPE.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      'SYSTEM_MONTH.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      ]);


    MachineSysTemTable::insert([
      'SYSTEM_CODE'       => $request->SYSTEM_CODE,

      'MACHINE_TYPE'       => $request->MACHINE_TYPE,
      'SYSTEM_MONTH'       => $request->SYSTEM_MONTH,

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
    $datapoint = MachineSysTemPointTable::where('SYSTEMTABLE_UNID_REF',$UNID)->get();
    return view('machine/add/system/edit',compact('dataset','datapoint'));
    }
  public function Update(Request $request,$UNID) {

    $data_set = MachineSysTemTable::where('UNID',$UNID)->update([
      'SYSTEM_CODE'       => $request->SYSTEM_CODE,

      'MACHINE_TYPE'       => $request->MACHINE_TYPE,
      'SYSTEM_MONTH'       => $request->SYSTEM_MONTH,

      'SYSTEM_STATUS'     => $request->SYSTEM_STATUS,
      'MODIFY_BY'       => Auth::user()->name,
      'MODIFY_TIME'     => Carbon::now(),

    ]);

    return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');
    }

  public function Delete($UNID) {


    $dataset = MachineSysTemTable::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
  }

  public function StorePoint(Request $request){
    $validated = $request->validate([
      'SYSTEMPOINT_TABLE_ID'           => 'required',
      'SYSTEMPOINT_TABLE_NAME'          => 'required|max:200',
      ],
      [
      'SYSTEMPOINT_TABLE_ID.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      'SYSTEMPOINT_TABLE_NAME.required'  => 'กรุณาใส่รหัสระบบเครื่องจักร',
      ]);

    MachineSysTemPointTable::insert([
      'SYSTEMPOINT_TABLE_ID'    => $request->SYSTEMPOINT_TABLE_ID,

      'SYSTEMPOINT_TABLE_NAME'  => $request->SYSTEMPOINT_TABLE_NAME,
      'CREATE_BY'               => Auth::user()->name,
      'CREATE_TIME'             => Carbon::now(),
      'SYSTEMTABLE_UNID_REF'    => $request->SYSTEMTABLE_UNID_REF,
      'UNID'                    => $this->randUNID('PMCS_CMMS_MACHINE_SYSTEMPOINTTABLE'),
    ]);

    return Redirect()->back()->with('success','บันทึก สำเร็จ');
  }
  public function DeletePoint($UNID) {
    $dataset = MachineSysTemPointTable::where('UNID','=',$UNID)->delete();
    return Redirect()->back()->with('success','ลบสำเร็จ');
  }

}
