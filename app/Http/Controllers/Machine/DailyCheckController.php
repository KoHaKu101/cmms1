<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use File;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\Machine\MachineCheckSheet;
use App\Models\Machine\Uploadimg;
//***************** Controller ************************
use App\Http\Controllers\Machine\UploadImgController;

//************** Package form github ***************
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\ImageManagerStatic as Image;


class DailyCheckController extends Controller
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

  //อยู่ใน machine edit
  public function DailyList(Request $request){
     $MACHINE_LINE = $request->MACHINE_LINE != '' ? $request->MACHINE_LINE : '' ;
     $MACHINE_CODE = $request->SEARCH_MACHINE != '' ? $request->SEARCH_MACHINE : '' ;
     $YEAR         = $request->YEAR != '' ? $request->YEAR : '' ;
     $MONTH        = $request->MONTH != '' ? $request->MONTH : '' ;

      return view('machine.dailycheck.dailylist',compact('MONTH','YEAR','MACHINE_LINE','MACHINE_CODE'));
  }

  public function CheckSheetUpload(Request $request) {

    $MACHINE_UNID = $request->MACHINE_UNID;
    $MACHINE_CODE = $request->MACHINE_CODE;
    $CHECK_MONTH = $request->CHECK_MONTH;
    $CHECK_YEAR =  $request->CHECK_YEAR;
    $MACHINE_LINE = $request->MACHINE_LINE;
    $count_machine = MachineCheckSheet::where('MACHINE_UNID','=',$MACHINE_UNID)
                      ->where('CHECK_MONTH','=',$CHECK_MONTH)
                      ->where('CHECK_YEAR','=',$CHECK_YEAR)
                      ->count();
    if ($count_machine > 0) {
        MachineCheckSheet::where('MACHINE_UNID','=',$MACHINE_UNID)
                          ->where('CHECK_MONTH','=',$CHECK_MONTH)
                          ->where('CHECK_YEAR','=',$CHECK_YEAR)
                          ->delete();
    }
    $image = $request->file('FILE_NAME');
    $new_name = rand() . '.' . $image->getClientOriginalExtension();
    $img_ext = $image->getClientOriginalExtension();
    $image_resize = Image::make($image->getRealPath());
    $img_widht  = Image::make($image)->width();
    $img_height = Image::make($image)->height();
    $new_widht = 1200;
    $new_height = 800;
    if ($img_widht > $img_height ) {
      if ($img_widht > $new_widht) {
      $image_resize->resize($new_widht,$new_height);
      }
    }
    if ($img_widht < $img_height ) {
      if ($img_height > $new_height ) {
        $image_resize->rotate(-90);
       $image_resize->resize($new_widht,$new_height);
      }
    }
    $path = public_path('image/checksheet/'.$CHECK_YEAR.'/'.$CHECK_MONTH.'/');
      if(!File::isDirectory($path)){
      File::makeDirectory($path, 0777, true, true);
      }
      $dataimgshow = false;
    if ($image_resize->save($path.'/'.$new_name)) {
      // $saveimg = new UploadImgController;
      // $dataimgshow = $saveimg->SaveImg($MACHINE_UNID,$new_name,$img_ext);
      MachineCheckSheet::insert([
        'UNID' => $this->randUNID('PMCS_CMMS_MACHINE_CHECKSHEET'),
        'MACHINE_UNID' => $MACHINE_UNID,
        'MACHINE_CODE' => $MACHINE_CODE,
        'FILE_NAME' => $new_name,
        'FILE_EXT' => $img_ext,
        'CHECK_YEAR'   => $CHECK_YEAR,
        'CHECK_MONTH'  => $CHECK_MONTH,
        'CREATE_BY'    => Auth::user()->name,
        'CREATE_TIME'  => Carbon::now()
      ]);
      alert()->success('บันทึกภาพสำเร็จ');
    }
      return Redirect()->back()->with( ['MONTH' => $CHECK_MONTH,'YEAR' => $CHECK_YEAR,'MACHINE_LINE' => $MACHINE_LINE,'MACHINNE_CODE' => $request->SEARCH_MACHINE] );
  }

  public function DeleteImg(Request $request ){
    $UNID = $request->UNID;
    $DATA_CHECKSHEET = MachineCheckSheet::Where('UNID','=',$UNID)->count();
    if ($DATA_CHECKSHEET > 0) {
      $DATA_CHECKSHEET = MachineCheckSheet::Where('UNID','=',$UNID)->first();
      $response_array = 'pass';
    }else {
      $response_array = 'fail';
      return Response()->json(['status' => $response_array]);

    }
    $CHECK_YEAR  = $DATA_CHECKSHEET->CHECK_YEAR;
    $CHECK_MONTH = $DATA_CHECKSHEET->CHECK_MONTH;
    $FILE_NAME = $DATA_CHECKSHEET->FILE_NAME;
    $pathfile = public_path('image/checksheet/'.$CHECK_YEAR.'/'.$CHECK_MONTH.'/'.$FILE_NAME);

    if (File::delete($pathfile) == true) {
      File::delete($pathfile);
      MachineCheckSheet::where('UNID',$UNID)->delete();
    }else {
      $response_array = 'fail';
      return Response()->json(['status' => $response_array]);
    }


    return Response()->json(['status' => $response_array]);
  }




  }
