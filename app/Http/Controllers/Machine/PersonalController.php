<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;
//******************** model ***********************
use App\Models\Machine\MachinEMP;
use App\Models\Machine\MachineLine;
//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;



class PersonalController extends Controller
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

    $dataset = MachinEMP::paginate(10);
    //dd($data_set);
    return View('machine/personal/personallist',compact('dataset'));
  }
  public function Create(){

    $datalineselect = MachineLine::all();

    return View('machine/personal/form',compact('datalineselect'));
  }

  public function Store(Request $request){
    $validated = $request->validate([
      'EMP_CODE'           => 'required|max:255',
      'EMP_NAME'           => 'required|max:255'
      ],
      [
      'EMP_CODE.required'  => 'กรุณราใส่รหัสพนักงาน',
      'EMP_NAME.required'  => 'กรุณราใส่ชื่อพนักงาน'
      ]);


      if ($request->hasFile('EMP_ICON')) {
        if ($request->file('EMP_ICON')->isValid()) {

             // $filenamemaster = uniqid()."_".basename($request->file('MACHINE_ICON')->getClientOriginalName());
            $EMP_ICON = $request->file('EMP_ICON');
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($EMP_ICON->getClientOriginalExtension());
            $img_name = $name_gen.'.'.$img_ext;
            $up_location = 'image/EMP/';
            $last_img = $up_location.$img_name;
            $EMP_ICON->move($up_location,$img_name);;
        }
    } else {
        $last_img = "";
    }
    MachinEMP::insert([

      'EMP_CODE'         => $request->EMP_CODE,
      'EMP_NAME'         => $request->EMP_NAME,
      'EMP_ICON'         => $last_img,
      'EMP_GROUP'        => $request->EMP_GROUP,
      'EMP_NOTE'         => $request->EMP_NOTE,
      'EMP_STATUS'           => $request->EMP_STATUS,
      'CREATE_BY'            => Auth::user()->name,
      'CREATE_TIME'          => Carbon::now(),
      // 'MODIFY_BY'            => Auth::user()->name,
      // 'MODIFY_TIME'          => Carbon::now(),
      'UNID'                 => $this->randUNID('PMCS_EMP_NAME'),

    ]);
    $dataset = MachinEMP::paginate(12);

    return Redirect()->route('personal.list',compact(['dataset']))->with('success','ลงทะเบียน สำเร็จ');

  }
  public function Edit($UNID) {
    $dataset = MachinEMP::where('UNID','=',$UNID)->first();
    $datalineselect = MachineLine::all();
    return view('machine/personal/edit',compact('dataset','datalineselect'));

  }
  public function Update(Request $request,$UNID){
    if ($request->hasFile('EMP_ICON')) {
      if ($request->file('EMP_ICON')->isValid()) {

           // $filenamemaster = uniqid()."_".basename($request->file('MACHINE_ICON')->getClientOriginalName());
          $EMP_ICON = $request->file('EMP_ICON');
          $name_gen = hexdec(uniqid());
          $img_ext = strtolower($EMP_ICON->getClientOriginalExtension());
          $img_name = $name_gen.'.'.$img_ext;
          $up_location = 'image/EMP/';
          $last_img = $up_location.$img_name;
          $EMP_ICON->move($up_location,$img_name);;
      }
  } else {
      $last_img = "";
  }
  $dataset = MachinEMP::where('UNID',$UNID)->update([

    'EMP_CODE'         => $request->EMP_CODE,
    'EMP_NAME'         => $request->EMP_NAME,
    'EMP_ICON'         => $last_img,
    'EMP_GROUP'        => $request->EMP_GROUP,
    'EMP_NOTE'         => $request->EMP_NOTE,
    'EMP_STATUS'           => $request->EMP_STATUS,
    // 'CREATE_BY'            => Auth::user()->name,
    // 'CREATE_TIME'          => Carbon::now(),
    'MODIFY_BY'            => Auth::user()->name,
    'MODIFY_TIME'          => Carbon::now(),

  ]);

  return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');
  }
  public function Delete($UNID){
      $data_up = MachinEMP::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','Confirm Delete Success');

  }
}
