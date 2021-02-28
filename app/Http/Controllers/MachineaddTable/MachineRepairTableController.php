<?php

namespace App\Http\Controllers\MachineaddTable;

//******************** laravel *********************
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineRepair;
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

    $dataset = MachineRepair::paginate(10);

    return View('machine/add/repair/repairlist',compact('dataset'));
  }
  public function Create(){
    return View('machine/add/repair/form');
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'REPAIR_CODE'           => 'required|unique:PMCS_CMMS_REPAIR_CHECKBOX|max:255',
      'REPAIR_NAME'           => 'required|unique:PMCS_CMMS_REPAIR_CHECKBOX|max:255',
      ],
      [
      'REPAIR_CODE.required'  => 'กรุณราใส่รหัส',
      'REPAIR_CODE.unique'    => 'มีรหัสแล้ว',
      'REPAIR_NAME.required'  => 'กรุณราใส่ชื่ออาการ',
      'REPAIR_NAME.unique'    => 'มีรหัสอาการชนิดนี้แล้ว'
      ]);
    MachineRepair::insert([
      'REPAIR_CODE'     => $request->REPAIR_CODE,
      'REPAIR_NAME'     => $request->REPAIR_NAME,
      'REPAIR_TYPE_CODE'=> $request->REPAIR_TYPE_CODE,
      'REPAIR_NOTE'     => $request->REPAIR_NOTE,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_REPAIR_CHECKBOX'),
    ]);
    $dataset = MachineRepair::paginate(10);
    return Redirect()->route('tablerepair.list',compact('dataset'))->with('success','บันทึก สำเร็จ');
  }

  public function Edit($UNID) {
    $dataset = MachineRepair::where('UNID','=',$UNID)->first();
    return view('machine/add/repair/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {

    $dataset = MachineRepair::where('UNID',$UNID)->update([
    'REPAIR_CODE'     => $request->REPAIR_CODE,
    'REPAIR_NAME'     => $request->REPAIR_NAME,
    'REPAIR_TYPE_CODE'=> $request->REPAIR_TYPE_CODE,
    'REPAIR_NOTE'     => $request->REPAIR_NOTE,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),
  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {

    $dataset = MachineRepair::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}
}
