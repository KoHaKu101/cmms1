<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Upload;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Auth;

class UploadController extends Controller
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

  public function Update(Request $request,$UNID){

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
     $filePath = "/uploadfile/" . "manual/"  . $MACHINE_CODE . "/" . $FILE_NAME;
     $filenamemaster = uniqid()."_".basename($request->file('FILE_UPLOAD')->getClientOriginalName());
     //สิ้นสุดส่วนของไฟล์
     //ชื่อ
    if(!empty($TOPIC_NAME)) {
        $TOPIC_NAME = $TOPIC_NAME;
    } else {
      $TOPIC_NAME = $FILE_NAME;
      // dd($TOPIC_NAME);
    }

    $dataupload = Upload::where('UNID',$UNID)->update([


      'UPLOAD_UNID_REF'     => $UPLOAD_UNID_REF,
      'MACHINE_CODE'         => $MACHINE_CODE,
      'TOPIC_NAME'         => $TOPIC_NAME,
      'FILE_UPLOAD'          => $filenamemaster,
      'FILE_SIZE'          => $FILE_SIZE,
      'FILE_NAME'          => $FILE_NAME,
      'FILE_EXTENSION'      => $FILE_EXTENSION,
      'FILE_UPLOADDATETIME'    => $FILE_UPLOADDATETIME,
      // 'CREATE_BY'            => Auth::user()->name,
      // 'CREATE_TIME'          => Carbon::now(),
      'MODIFY_BY'            => Auth::user()->name,
      'MODIFY_TIME'          => Carbon::now(),
      // 'UNID'                 => $this->randUNID('UPLOAD'),
    ]);

    return Redirect()->back();
  }
  public function Delete($UNID){
    // dd($UNID);
      $data_set = Upload::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','Confirm Delete Success');

  }
  public function Download($UNID){
    // dd($UNID);
      $data_set = Upload::find($UNID);
      // $data_set = Upload::where('UNID','=',$UNID)->first();

      return Storage::download($data->FILE_UPLOAD);

  }

}
