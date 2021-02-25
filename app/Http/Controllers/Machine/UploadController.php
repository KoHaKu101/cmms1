<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Upload;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;
use Auth;
use Response;

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


  public function Edit($UNID){
    $dataset = Upload::where('UNID',$UNID)->first();
    return view('machine/manual/edit',compact('dataset'));

  }
  public function Update(Request $request,$UNID){


    //ตัวแปร ชื่อ
      $TOPIC_NAME = $request->TOPIC_NAME;
    $MACHINE_CODE = $request->MACHINE_CODE;
    //ตัวแปรไฟล์
      $update = $request->FILE_UPDATE;
      $fileupdate = $request->FILE_SIZE;
      $nameupdate = $request->FILE_NAME;
      $extensionupdate = $request->FILE_EXTENSION;
      $datetimeupdate = $request->FILE_UPLOADDATETIME;

    // $nameupdate =
        // $FILE_UPLOAD = request()->file('FILE_UPLOAD');
    if ($request->hasFile('FILE_UPLOAD')) {
      if ($request->file('FILE_UPLOAD')->isValid()) {
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
         $filenamemaster = uniqid().basename($request->file('FILE_UPLOAD')->getClientOriginalName());
         $FILE_UPLOADDATETIME = Carbon::now()->format('Y-m-d');
         //pathfile
          $last_upload = $request->file('FILE_UPLOAD')->storeAs('upload/manual',$filenamemaster,'public');
         //สิ้นสุดส่วนของไฟล์
         // dd($filenamemaster);

      }
  }  else {
        $last_upload = $update;
        $FILE_SIZE = $fileupdate;
        $FILE_EXTENSION =  $extensionupdate;
        $FILE_NAME =  $nameupdate;
        $FILE_UPLOADDATETIME =  $datetimeupdate;
      }

  // if ($request->TOPIC_NAME) {




    $dataupload = Upload::where('UNID',$UNID)->update([

      'MACHINE_CODE'         => $MACHINE_CODE,
      'TOPIC_NAME'         => $TOPIC_NAME,
      'FILE_UPLOAD'          => $last_upload,
      'FILE_SIZE'          => $FILE_SIZE,
      'FILE_NAME'          => $FILE_NAME,
      'FILE_EXTENSION'      => $FILE_EXTENSION,
      'FILE_UPLOADDATETIME'    => $FILE_UPLOADDATETIME,
      'MODIFY_BY'            => Auth::user()->name,
      'MODIFY_TIME'          => Carbon::now(),

    ]);

    return Redirect()->back();

  }
  public function Delete($UNID){
    // dd($UNID);
      $data_set = Upload::where('UNID','=',$UNID)->delete();

      return Redirect()->back()-> with('success','Confirm Delete Success');

  }
  public static function Download($UNID){
    // dd($UNID);
      $dataset = Upload::find($UNID);
      $download = $dataset->FILE_UPLOAD;
      // $data_set = Upload::where('UNID','=',$UNID)->first();
      // return Response::disk('public')->file($download);
      return Storage::disk('public')->download($download);

  }

}
