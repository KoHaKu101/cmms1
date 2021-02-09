<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;

use Illuminate\Support\Facades\DB;

use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Auth;


class MachineController extends Controller
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

    $data_set = Machnie::paginate(10);
    //dd($data_set);
    return View('machine/assets/machinelist',compact(['data_set']),['data_set' => $data_set]);
  }

  public function Create(){
    return View('machine/assets/form');
  }

  public function Store(Request $request){


    $validated = $request->validate([
      'MACHINE_CODE'           => 'required|max:255',
      ],
      [
      'MACHINE_CODE.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      ]);

      $MACHINE_ICON = $request->file('MACHINE_ICON');

      $name_gen = hexdec(uniqid());

      $img_ext = strtolower($MACHINE_ICON->getClientOriginalExtension());
// dd($name_gen);
      $img_name = $name_gen.'.'.$img_ext;
      $up_location = 'image/machnie/';
      $last_img = $up_location.$img_name;

      $MACHINE_ICON->move($up_location,$img_name);


      Machnie::insert([
          'MACHINE_CODE'         => $request->MACHINE_CODE,
          'MACHINE_NAME'         => $request->MACHINE_NAME,
          'MACHINE_CHECK'        => $request->MACHINE_CHECK,
          'MACHINE_MANU'         => $request->MACHINE_MANU,
          'MACHINE_TYPE'         => $request->MACHINE_TYPE,
          'MACHINE_TYPE_STATUS'  => $request->MACHINE_TYPE_STATUS,
          'MACHINE_STARTDATE'    => $request->MACHINE_STARTDATE,
          'MACHINE_RVE_DATE'     => $request->MACHINE_RVE_DATE,
          'MACHINE_ICON'         => $last_img,
          'MACHINE_PRICE'        => $request->MACHINE_PRICE,
          'MACHINE_LINE'         => $request->MACHINE_LINE,
          'GROUP_NAME'           => $request->GROUP_NAME,
          'MACHINE_MA_COST'      => $request->MACHINE_MA_COST,
          'MACHINE_TOTAL_FEED'   => $request->MACHINE_TOTAL_FEED,
          'MACHINE_TOTAL_STOP'   => $request->MACHINE_TOTAL_STOP,
          'MACHINE_SPEED_UNIT'   => $request->MACHINE_SPEED_UNIT,
          'MACHINE_LOCATION'     => $request->MACHINE_LOCATION,
          'MACHINE_GROUP'        => $request->MACHINE_GROUP,
          'MACHINE_PARTNO'       => $request->MACHINE_PARTNO,
          'MACHINE_MODEL'        => $request->MACHINE_MODEL,
          'MACHINE_SERIAL'       => $request->MACHINE_SERIAL,
          'MACHINE_FACTORY'      => $request->MACHINE_FACTORY,
          'COMPANY_PAY'          => $request->COMPANY_PAY,
          'COMPANY_SETUP'        => $request->COMPANY_SETUP,
          'MACHINE_CAPACITY'     => $request->MACHINE_CAPACITY,
          'MACHINE_SPEED'        => $request->MACHINE_SPEED,
          'MACHINE_MTBF'         => $request->MACHINE_MTBF,
          'MACHINE_MTTF'         => $request->MACHINE_MTTF,
          'MACHINE_MTTR'         => $request->MACHINE_MTTR,
          'MACHINE_EFFICIENCY'   => $request->MACHINE_EFFICIENCY,
          'MACHINE_POWER'        => $request->MACHINE_POWER,
          'MACHINE_WEIGHT'       => $request->MACHINE_WEIGHT,
          'MACHINE_TARGET'       => $request->MACHINE_TARGET,
          'MACHINE_NOTE'         => $request->MACHINE_NOTE,
          'MACHINE_STATUS'       => $request->MACHINE_STATUS,
          'MACHINE_POSTED'       => $request->MACHINE_POSTED,
          'PCDS_MACHINE_CODE'    => $request->PCDS_MACHINE_CODE,
          'WAREHOUSE_CODE'       => $request->WAREHOUSE_CODE,
          'GROUP_CODE'           => $request->GROUP_CODE,
          'LOCATION_CODE'        => $request->LOCATION_CODE,
          'SECTION_CODE'         => $request->SECTION_CODE,
          'SUPPLIER_CODE'        => $request->SUPPLIER_CODE,
          'SUPPLIER_NAME'        => $request->SUPPLIER_NAME,
          'PURCHASE_FORM'        => $request->PURCHASE_FORM,
          'EMP_CODE'             => $request->EMP_CODE,
          'EMP_NAME'             => $request->EMP_NAME,
          'POS_REF_UNID'         => $request->POS_REF_UNID,
          'CREATE_BY'            => Auth::user()->name,
          'CREATE_TIME'          => Carbon::now(),
          // 'MODIFY_BY'            => Auth::user()->name,
          // 'MODIFY_TIME'          => Carbon::now(),
          'UNID'                 => $this->randUNID('PMCS_MACHINES'),
          'SHIFT_TYPE'           => $request->SHIFT_TYPE,
          'ESP_MAC'              => $request->ESP_MAC,
      ]);
      $data_set = Machnie::paginate(12);
      // dd($machine_all);
      return Redirect()->route('machine.list',compact(['data_set']))->with('success','ลงทะเบียน สำเร็จ');
  }

  public function Edit($UNID) {

    $data_set = Machnie::where('UNID',$UNID)->first();
    // $data = Mainmenu::where('UNID','=',$UNID)->first();

    return view('machine/assets/edit',compact('data_set'));

  }

  public function Update(Request $request,$UNID){

    $data_set = Machnie::where('UNID',$UNID)->update([
      'MACHINE_CODE'         => $request->MACHINE_CODE,
      'MACHINE_NAME'         => $request->MACHINE_NAME,
      'MACHINE_CHECK'        => $request->MACHINE_CHECK,
      'MACHINE_MANU'         => $request->MACHINE_MANU,
      'MACHINE_TYPE'         => $request->MACHINE_TYPE,
      'MACHINE_TYPE_STATUS'  => $request->MACHINE_TYPE_STATUS,
      'MACHINE_STARTDATE'    => $request->MACHINE_STARTDATE,
      'MACHINE_RVE_DATE'     => $request->MACHINE_RVE_DATE,
      'MACHINE_ICON'         => $request->MACHINE_ICON,
      'MACHINE_PRICE'        => $request->MACHINE_PRICE,
      'MACHINE_LINE'         => $request->MACHINE_LINE,
      'GROUP_NAME'           => $request->GROUP_NAME,
      'MACHINE_MA_COST'      => $request->MACHINE_MA_COST,
      'MACHINE_TOTAL_FEED'   => $request->MACHINE_TOTAL_FEED,
      'MACHINE_TOTAL_STOP'   => $request->MACHINE_TOTAL_STOP,
      'MACHINE_SPEED_UNIT'   => $request->MACHINE_SPEED_UNIT,
      'MACHINE_LOCATION'     => $request->MACHINE_LOCATION,
      'MACHINE_GROUP'        => $request->MACHINE_GROUP,
      'MACHINE_PARTNO'       => $request->MACHINE_PARTNO,
      'MACHINE_MODEL'        => $request->MACHINE_MODEL,
      'MACHINE_SERIAL'       => $request->MACHINE_SERIAL,
      'MACHINE_FACTORY'      => $request->MACHINE_FACTORY,
      'COMPANY_PAY'          => $request->COMPANY_PAY,
      'COMPANY_SETUP'        => $request->COMPANY_SETUP,
      'MACHINE_CAPACITY'     => $request->MACHINE_CAPACITY,
      'MACHINE_SPEED'        => $request->MACHINE_SPEED,
      'MACHINE_MTBF'         => $request->MACHINE_MTBF,
      'MACHINE_MTTF'         => $request->MACHINE_MTTF,
      'MACHINE_MTTR'         => $request->MACHINE_MTTR,
      'MACHINE_EFFICIENCY'   => $request->MACHINE_EFFICIENCY,
      'MACHINE_POWER'        => $request->MACHINE_POWER,
      'MACHINE_WEIGHT'       => $request->MACHINE_WEIGHT,
      'MACHINE_TARGET'       => $request->MACHINE_TARGET,
      'MACHINE_NOTE'         => $request->MACHINE_NOTE,
      'MACHINE_STATUS'       => $request->MACHINE_STATUS,
      'MACHINE_POSTED'       => $request->MACHINE_POSTED,
      'PCDS_MACHINE_CODE'    => $request->PCDS_MACHINE_CODE,
      'WAREHOUSE_CODE'       => $request->WAREHOUSE_CODE,
      'GROUP_CODE'           => $request->GROUP_CODE,
      'LOCATION_CODE'        => $request->LOCATION_CODE,
      'SECTION_CODE'         => $request->SECTION_CODE,
      'SUPPLIER_CODE'        => $request->SUPPLIER_CODE,
      'SUPPLIER_NAME'        => $request->SUPPLIER_NAME,
      'PURCHASE_FORM'        => $request->PURCHASE_FORM,
      'EMP_CODE'             => $request->EMP_CODE,
      'EMP_NAME'             => $request->EMP_NAME,
      'POS_REF_UNID'         => $request->POS_REF_UNID,
      // 'CREATE_BY'            => Auth::user()->name,
      // 'CREATE_TIME'          => Carbon::now(),
      'MODIFY_BY'            => Auth::user()->name,
      'MODIFY_TIME'          => Carbon::now(),

      'SHIFT_TYPE'           => $request->SHIFT_TYPE,
      'ESP_MAC'              => $request->ESP_MAC,
    ]);
    return Redirect()->route('machine.list')->with('success','Update Success');
  }

  public function Delete($UNID){
      $data_set = Machnie::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','Confirm Delete Success');

  }






  public function Logout(){
      Auth::logout();
      return Redirect()->route('login')->with('success','User Logout');
  }

}
