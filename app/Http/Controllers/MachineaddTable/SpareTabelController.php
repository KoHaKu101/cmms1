<?php

namespace App\Http\Controllers\MachineAddTable;
//******************** laravel *********************
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\SpareTabel;
use App\Models\Machine\Protected;
//******************** github **********************
use RealRashid\SweetAlert\Facades\Alert;

class SpareTabelController extends Controller
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

    $dataset = SpareTabel::paginate(10);

    return View('machine/add/sparepart/tablesparelist',compact('dataset'));
  }
  public function Create(){
    return View('machine/add/sparepart/form');
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'SPAREPART_CODE'           => 'required|unique:PMCS_CMMS_SPARE_PART_TABLE|max:255',
      'SPAREPART_NAME'           => 'required|unique:PMCS_CMMS_SPARE_PART_TABLE|max:255',
      ],
      [
      'SPAREPART_CODE.required'  => 'กรุณาใส่รหัสอะไหล่',
      'SPAREPART_CODE.unique'    => 'มีรหัสนี้แล้ว',
      'SPAREPART_NAME.required'  => 'กรุณราใส่ชื่ออะไหล่',
      'SPAREPART_NAME.unique'    => 'มีชื่อนี้แล้ว'
      ]);
    SpareTabel::insert([
      'SPAREPART_CODE'  => $request->SPAREPART_CODE,
      'SPAREPART_NAME'  => $request->SPAREPART_NAME,
      'SPAREPART_PRICE' => $request->SPAREPART_PRICE,
      'SPAREPART_NOTE'  => $request->SPAREPART_NOTE,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_SPARE_PART_TABLE'),
    ]);
    $dataset = SpareTabel::paginate(10);
    return Redirect()->route('tablesparepart.list',compact('dataset'))->with('success','บันทึก สำเร็จ');
  }

  public function Edit($UNID) {
    $dataset = SpareTabel::where('UNID','=',$UNID)->first();
    return view('machine/add/sparepart/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {

    $dataset = SpareTabel::where('UNID',$UNID)->update([
    'REPAIR_CODE'     => $request->REPAIR_CODE,
    'REPAIR_NAME'     => $request->REPAIR_NAME,
    'REPAIR_TYPE_CODE'=> $request->REPAIR_TYPE_CODE,
    'REPAIR_NOTE'     => $request->REPAIR_NOTE,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),
  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {

    $dataset = MachineType::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}
}
