<?php

namespace App\Http\Controllers\MachineAddTable;
//******************** laravel *********************
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineSpareTable;
use App\Models\Machine\Protected;
//******************** github **********************
use RealRashid\SweetAlert\Facades\Alert;

class MachineSpareTableController extends Controller
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



    return View('machine/add/sparepart/tablesparelist');
  }
  public function Store(Request $request){

    $validated = $request->validate([
      'SPAREPART_CODE'           => 'required|unique:PMCS_CMMS_SPARE_PART_TABLE|max:50',
      'SPAREPART_NAME'           => 'required|unique:PMCS_CMMS_SPARE_PART_TABLE|max:250',
      ],
      [
      'SPAREPART_CODE.required'  => 'กรุณาใส่รหัสอะไหล่',
      'SPAREPART_CODE.unique'    => 'มีรหัสนี้แล้ว',
      'SPAREPART_NAME.required'  => 'กรุณาใส่ชื่ออะไหล่',
      'SPAREPART_NAME.unique'    => 'มีชื่อนี้แล้ว'
      ]);
    SpareTabel::insert([
      'SPAREPART_CODE'  => $request->SPAREPART_CODE,
      'SPAREPART_NAME'  => $request->SPAREPART_NAME,
      'SPAREPART_PRICE' => $request->SPAREPART_PRICE,
      'SPAREPART_NOTE'  => $request->SPAREPART_NOTE,
      'SPAREPART_STATUS'=> $request->SPAREPART_STATUS,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_SPARE_PART_TABLE'),
    ]);
    $dataset = MachineSpareTable::paginate(10);
    return Redirect()->route('machinespareparttable.list',compact('dataset'))->with('success','บันทึก สำเร็จ');
  }

  public function Edit($UNID) {
    $dataset = MachineSpareTable::where('UNID','=',$UNID)->first();
    return view('machine/add/sparepart/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {

    $dataset = MachineSpareTable::where('UNID',$UNID)->update([
    'SPAREPART_CODE'     => $request->SPAREPART_CODE,
    'SPAREPART_NAME'     => $request->SPAREPART_NAME,
    'SPAREPART_PRICE'=> $request->SPAREPART_PRICE,
    'SPAREPART_NOTE'     => $request->SPAREPART_NOTE,
    'SPAREPART_STATUS'=> $request->SPAREPART_STATUS,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),
  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {

    $dataset = MachineSpareTable::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}
}
