<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;
use App\Models\Machine\Upload;
use App\Models\Machine\MachineLine;
use RealRashid\SweetAlert\Facades\Alert;
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

    $dataset = MachineLine::all();

    return View('machine/assets/form',compact('dataset'));
  }

  public function Store(Request $request){


    $validated = $request->validate([
      'MACHINE_CODE'           => 'required|max:255',
      ],
      [
      'MACHINE_CODE.required'  => 'กรุณราใส่รหัสเครื่องจักร',
      ]);


  if ($request->hasFile('MACHINE_ICON')) {
    if ($request->file('MACHINE_ICON')->isValid()) {

         // $filenamemaster = uniqid()."_".basename($request->file('MACHINE_ICON')->getClientOriginalName());
        $MACHINE_ICON = $request->file('MACHINE_ICON');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($MACHINE_ICON->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'image/machnie/';
        $last_img = $up_location.$img_name;
        $MACHINE_ICON->move($up_location,$img_name);
        // dd($MACHINE_ICON);
        //
        // $extension = $request->MACHINE_ICON->extension();
        // $url = Storage::url($validated['MACHINE_ICON'].".".$extension);
    }
} else {
    $last_img = "";
}
//   if(!empty($MACHINE_ICON)) {
//     $name_gen = hexdec(uniqid());
//
//     $img_ext = strtolower($MACHINE_ICON->getClientOriginalExtension());
// // dd($name_gen);
//     $img_name = $name_gen.'.'.$img_ext;
//     $up_location = 'image/machnie/';
//     $last_img = $up_location.$img_name;
//

//   } else {
//     $MACHINE_ICON = '';
//   }
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

      return Redirect()->route('machine.list',compact(['data_set']))->with('success','ลงทะเบียน สำเร็จ');
  }

  public function StoreUpload(Request $request){

    //ตัวแปร ชื่อ
    $TOPIC_NAME = $request->TOPIC_NAME;
    $MACHINE_CODE = $request->MACHINE_CODE;
    $UPLOAD_UNID_REF = $request->UPLOAD_UNID_REF;
    //ตัวแปรไฟล์
    $FILE_UPLOAD = request()->file('FILE_UPLOAD');

    //ตัวแปร size
    $FILE_SIZE = 0;
    //ส่วนของไฟล์
    //ส่วนของชื่อไฟล์
     $FILE_NAME = basename($request->file('FILE_UPLOAD')->getClientOriginalName(), '.'.$request->file('FILE_UPLOAD')->getClientOriginalExtension());
    //ส่วนของนามสกุลไฟล์
     $FILE_EXTENSION = $request->file('FILE_UPLOAD')->getClientOriginalExtension();
    //ส่วนของ size ไฟล์
     $FILE_SIZE = $request->file('FILE_UPLOAD')->getSize();
       //ส่วนของกำหนดการแสดงsizeไฟล์
     if ($FILE_SIZE >0 ) {
       $FILE_SIZE = number_format($FILE_SIZE /100000, 2);
     }
      //ส่วนของวันที่ไฟล์
     $FILE_UPLOADDATETIME = Carbon::now()->format('Y-m-d');
     //pathfile
      $filenamemaster = uniqid()."_".basename($request->file('FILE_UPLOAD')->getClientOriginalName(),'.'.$request->file('FILE_UPLOAD')->getClientOriginalExtension());
      $up_location = 'uploadfile/manual'.'/'.$MACHINE_CODE;

       $last_upload = $up_location.'/'.$filenamemaster;
      // dd($last_img);

     $filePath = "/uploadfile/" . "manual/"  . $MACHINE_CODE . "/" . $FILE_NAME;




     //สิ้นสุดส่วนของไฟล์
     //ชื่อ
    if(!empty($TOPIC_NAME)) {
        $TOPIC_NAME = $TOPIC_NAME;
    } else {
      $TOPIC_NAME = $FILE_NAME;
      // dd($TOPIC_NAME);
    }
    //สิ้นสุดชื่อ
    Upload::insert([
      'UPLOAD_UNID_REF'     => $UPLOAD_UNID_REF,
      'MACHINE_CODE'         => $MACHINE_CODE,
      'TOPIC_NAME'         => $TOPIC_NAME,
      'FILE_UPLOAD'          => $last_upload,
      'FILE_SIZE'          => $FILE_SIZE,
      'FILE_NAME'          => $FILE_NAME,
      'FILE_EXTENSION'      => $FILE_EXTENSION,
      'FILE_UPLOADDATETIME'    => $FILE_UPLOADDATETIME,
      'CREATE_BY'            => Auth::user()->name,
      'CREATE_TIME'          => Carbon::now(),
      // 'MODIFY_BY'            => Auth::user()->name,
      // 'MODIFY_TIME'          => Carbon::now(),
      'UNID'                 => $this->randUNID('PMCS_MACHINES_UPLOAD'),
    ]);
    $FILE_UPLOAD->move($up_location,$filenamemaster);

    return Redirect()->back();
  }

  public function Edit($UNID) {

    $dataset = Machnie::where('UNID',$UNID)->first();
    $dataupload = Upload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->get();
    $datauploadedit = Upload::where('MACHINE_CODE',$dataset->MACHINE_CODE)->first();
    $datalineselect = MachineLine::all();

    return view('machine/assets/edit',compact('dataset','dataupload','datalineselect','datauploadedit'));
  }

  public function Update(Request $request,$UNID){

    if ($request->hasFile('MACHINE_ICON')) {
      if ($request->file('MACHINE_ICON')->isValid()) {

           // $filenamemaster = uniqid()."_".basename($request->file('MACHINE_ICON')->getClientOriginalName());
          $MACHINE_ICON = $request->file('MACHINE_ICON');
          $name_gen = hexdec(uniqid());
          $img_ext = strtolower($MACHINE_ICON->getClientOriginalExtension());
          $img_name = $name_gen.'.'.$img_ext;
          $up_location = 'image/machnie/';
          $last_img = $up_location.$img_name;
          $MACHINE_ICON->move($up_location,$img_name);
          // dd($MACHINE_ICON);
          //
          // $extension = $request->MACHINE_ICON->extension();
          // $url = Storage::url($validated['MACHINE_ICON'].".".$extension);
      }
  } else {
      $last_img = "";
  }
    $data_set = Machnie::where('UNID',$UNID)->update([
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
      // 'CREATE_BY'            => Auth::user()->name,
      // 'CREATE_TIME'          => Carbon::now(),
      'MODIFY_BY'            => Auth::user()->name,
      'MODIFY_TIME'          => Carbon::now(),

      'SHIFT_TYPE'           => $request->SHIFT_TYPE,
      'ESP_MAC'              => $request->ESP_MAC,
    ]);

    return Redirect()->back()->with('success','อัพเดทรายการสำเร็จ');
  }

  public function Delete($UNID){
      $data_up = Machnie::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','Confirm Delete Success');

  }






  public function Logout(){
      Auth::logout();
      return Redirect()->route('login')->with('success','User Logout');
  }

}
