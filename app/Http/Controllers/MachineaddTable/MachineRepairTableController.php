<?php

namespace App\Http\Controllers\MachineaddTable;

//******************** laravel *********************
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineRepairTable;
use App\Models\Machine\Protected;
//******************** github **********************
use RealRashid\SweetAlert\Facades\Alert;



class MachineRepairTableController extends Controller
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

    $dataset = MachineRepairTable::paginate(10);

    return View('machine/add/repair/repairlist',compact('dataset'));
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'REPAIR_CODE'           => 'required|unique:PMCS_CMMS_REPAIR_CHECKBOX|max:50',
      'REPAIR_NAME'           => 'required|unique:PMCS_CMMS_REPAIR_CHECKBOX|max:200',
      ],
      [
      'REPAIR_CODE.required'  => 'กรุณราใส่รหัส',
      'REPAIR_CODE.unique'    => 'มีรหัสแล้ว',
      'REPAIR_NAME.required'  => 'กรุณาใส่ชื่อรายการซ่อม',
      'REPAIR_NAME.unique'    => 'มีรายการซ่อมชนิดนี้แล้ว'
      ]);
    MachineRepairTable::insert([
      'REPAIR_CODE'     => $request->REPAIR_CODE,
      'REPAIR_NAME'     => $request->REPAIR_NAME,
      'REPAIR_TYPE_CODE'=> $request->REPAIR_TYPE_CODE,
      'REPAIR_NOTE'     => $request->REPAIR_NOTE,
      'REPAIR_STATUS'   => $request->REPAIR_STATUS,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_REPAIR_CHECKBOX'),
    ]);
    $dataset = MachineRepairTable::paginate(10);
    return Redirect()->route('machinerepairtable.list',compact('dataset'))->with('success','บันทึก สำเร็จ');
  }

  public function Edit($UNID) {
    $dataset = MachineRepairTable::where('UNID','=',$UNID)->first();
    return view('machine/add/repair/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {

    $dataset = MachineRepairTable::where('UNID',$UNID)->update([
    'REPAIR_CODE'     => $request->REPAIR_CODE,
    'REPAIR_NAME'     => $request->REPAIR_NAME,
    'REPAIR_TYPE_CODE'=> $request->REPAIR_TYPE_CODE,
    'REPAIR_NOTE'     => $request->REPAIR_NOTE,
    'REPAIR_STATUS'   => $request->REPAIR_STATUS,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),
  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {

    $dataset = MachineRepairTable::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}
}
