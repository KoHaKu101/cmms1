<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//model
use App\Models\Machine\MachineType;
use App\Models\Machine\Protected;
//github
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;
//laravel
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class TypeMachineController extends Controller
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

    $dataset = MachineType::paginate(10);

    return View('machine/typemachine/typemachinelist',compact('dataset'));
  }
  public function Create(){
    return View('machine/typemachine/form');
  }

  public function Store(Request $request){

    $validated = $request->validate([
      'TYPE_CODE'           => 'required|unique:PMCS_MACHINE_TYPE|max:255',
      'TYPE_NAME'           => 'required|unique:PMCS_MACHINE_TYPE|max:255',
      ],
      [
      'TYPE_CODE.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      'TYPE_CODE.unique'    => 'มีรหัสเครื่องแล้ว',
      'TYPE_NAME.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      'TYPE_NAME.unique'    => 'มีรหัสเครื่องแล้ว'
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
    MachineType::insert([
      'TYPE_CODE'       => $request->TYPE_CODE,
      'TYPE_NAME'       => $request->TYPE_NAME,
      'TYPE_NOTE'       => $request->TYPE_NOTE,
      'TYPE_STATUS'     => $request->TYPE_STATUS,
      'TYPE_ICON'       => $last_img,
      'CREATE_BY'       => Auth::user()->name,
      'CREATE_TIME'     => Carbon::now(),
      'UNID'            => $this->randUNID('PMCS_MACHINE_TYPE'),
    ]);
    $dataset = MachineType::paginate(10);
    return Redirect()->route('typemachine.list',compact('dataset'))->with('success','ลงทะเบียน สำเร็จ');
  }
  public function Edit($UNID) {
    $dataset = MachineType::where('UNID','=',$UNID)->first();
    return view('machine/typemachine/edit',compact('dataset'));
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
  $data_set = MachineType::where('UNID',$UNID)->update([
    'TYPE_CODE'         => $request->TYPE_CODE,
    'TYPE_NAME'         => $request->TYPE_NAME,
    'TYPE_NOTE'         => $request->TYPE_NOTE,
    'TYPE_STATUS'       => $request->TYPE_STATUS,
    'TYPE_ICON'         => $last_img,
    'MODIFY_BY'         => Auth::user()->name,
    'MODIFY_TIME'       => Carbon::now(),

  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');

}  public function Delete($UNID) {


    $dataset = MachineType::where('UNID','=',$UNID)->delete();

    return Redirect()->back()->with('success','ลบสำเร็จ สำเร็จ');
}

}
