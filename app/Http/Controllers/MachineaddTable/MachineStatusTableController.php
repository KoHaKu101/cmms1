<?php

namespace App\Http\Controllers\MachineaddTable;
//laravel
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//model
use App\Models\MachineAddTable\MachineStatus;
use App\Models\Machine\Protected;

class MachineStatusController extends Controller
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

    $dataset = MachineStatus::paginate(10);

    return View('machine/add/machinestatus/machinestatuslist',compact('dataset'));
  }
  public function Create(){
    return View('machine/add/machinestatus/form');
  }

  public function Store(Request $request){
    // dd( $request);
    $validated = $request->validate([
      'STATUS_CODE'           => 'required|unique:PMCS_CMMS_MACHINE_STATUS|max:255',
      'STATUS_NAME'           => 'required|unique:PMCS_CMMS_MACHINE_STATUS|max:255',
      ],
      [
      'STATUS_CODE.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      'STATUS_CODE.unique'    => 'มีรหัสเครื่องแล้ว',
      'STATUS_NAME.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      'STATUS_NAME.unique'    => 'มีรหัสเครื่องแล้ว'
      ]);
    MachineStatus::insert([
      'STATUS_CODE'     => $request->STATUS_CODE,
      'STATUS_NAME'     => $request->STATUS_NAME,
      'STATUS'          => $request->STATUS,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_CMMS_MACHINE_STATUS'),
    ]);
    $dataset = MachineStatus::paginate(10);
    return Redirect()->route('machinestatus.list',compact('dataset'))->with('success','ลงทะเบียน สำเร็จ');
  }
  public function Edit($UNID) {
    // dd($UNID);
    $dataset = MachineStatus::where('UNID','=',$UNID)->first();
    return view('machine/add/machinestatus/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {

  $data_set = MachineStatus::where('UNID',$UNID)->update([
    'STATUS_CODE'     => $request->STATUS_CODE,
    'STATUS_NAME'     => $request->STATUS_NAME,
    'STATUS'          => $request->STATUS,

    'MODIFY_BY'         => Auth::user()->name,
    'MODIFY_TIME'       => Carbon::now(),

  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {


    $dataset = MachineStatus::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}
}
