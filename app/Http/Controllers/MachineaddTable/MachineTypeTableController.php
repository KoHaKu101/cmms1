<?php

namespace App\Http\Controllers\MachineaddTable;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineTypeTable;
use App\Models\Machine\Protected;
//************** Package form github ***************
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;



class MachineTypeTableController extends Controller
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

    $dataset = MachineTypeTable::paginate(10);

    return View('machine/add/typemachine/typemachinelist',compact('dataset'));
  }
  public function Create(){
    return View('machine/add/typemachine/form');
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'TYPE_CODE'           => 'required|unique:PMCS_MACHINE_TYPE|max:255',
      'TYPE_NAME'           => 'required|unique:PMCS_MACHINE_TYPE|max:255',
      ],
      [
      'TYPE_CODE.required'  => 'กรุณราใส่รหัสประเภทเครื่องจักร',
      'TYPE_CODE.unique'    => 'มีรหัสประเภทเครื่องจักรนี้แล้ว',
      'TYPE_NAME.required'  => 'กรุณาใสรายการประเภทครื่องจักร',
      'TYPE_NAME.unique'    => 'มีรายการประเภทเครื่องจักรนี้แล้ว'
      ]);

      if ($request->hasFile('TYPE_ICON')) {
        if ($request->file('TYPE_ICON')->isValid()) {
            $TYPE_ICON = $request->file('TYPE_ICON');
            $img_name = uniqid()."_".strtolower($TYPE_ICON->getClientOriginalName());
            // $name_gen = uniqid().basename($TYPE_ICON->getClientOriginalName());
            // $img_ext = strtolower($TYPE_ICON->getClientOriginalExtension());
            // $img_name = $name_gen.'.'.$img_ext;
            $last_img = $request->file('TYPE_ICON')->storeAs('img/typemachine',$img_name,'public');
        }
    } else {
        $last_img = "";
    }
    MachineTypeTable::insert([
      'TYPE_CODE'       => $request->TYPE_CODE,
      'TYPE_NAME'       => $request->TYPE_NAME,
      'TYPE_NOTE'       => $request->TYPE_NOTE,
      'TYPE_STATUS'     => $request->TYPE_STATUS,
      'TYPE_ICON'       => $last_img,
      'TYPE_STATUS'     => $request->TYPE_STATUS,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_MACHINE_TYPE'),
    ]);
    $dataset = MachineTypeTable::paginate(10);
    return Redirect()->route('machinetypetable.list',compact('dataset'))->with('success','ลงทะเบียน สำเร็จ');
  }
  public function Edit($UNID) {
    $dataset = MachineTypeTable::where('UNID','=',$UNID)->first();
    return view('machine/add/typemachine/edit',compact('dataset'));
}
public function Update(Request $request,$UNID) {
  $imgupdate = $request->imgupdate;
  if ($request->hasFile('TYPE_ICON')) {
    if ($request->file('TYPE_ICON')->isValid()) {
        $TYPE_ICON = $request->file('TYPE_ICON');
        $img_name = uniqid()."_".strtolower($TYPE_ICON->getClientOriginalName());
        $last_img = $request->file('TYPE_ICON')->storeAs('img/typemachine',$img_name,'public');

    }
} else {
    $last_img = $imgupdate;
}
  $data_set = MachineTypeTable::where('UNID',$UNID)->update([
    'TYPE_CODE'       => $request->TYPE_CODE,
    'TYPE_NAME'       => $request->TYPE_NAME,
    'TYPE_NOTE'       => $request->TYPE_NOTE,
    'TYPE_STATUS'     => $request->TYPE_STATUS,
    'TYPE_ICON'       => $last_img,
    'TYPE_STATUS'     => $request->TYPE_STATUS,
    'MODIFY_BY'       => Auth::user()->name,
    'MODIFY_TIME'     => Carbon::now(),

  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {


    $dataset = MachineTypeTable::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}

}
