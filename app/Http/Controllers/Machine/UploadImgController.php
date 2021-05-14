<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Uploadimg;
//************** Package form github ***************

class UploadImgController extends Controller
{

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
  public function SaveImg($UNIDREF= NULL,$FILE_NAME= NULL,$FILE_EXT= NULL){

    $UNID =  $this->randUNID('PMCS_CMMS_UPLOAD_IMG');
    $savedata =  Uploadimg::insert([
        'UNID'            => $UNID,
        'UNID_REF'        => $UNIDREF,
        'FILE_NAME'       => $FILE_NAME,
        'FILE_EXT'        => $FILE_EXT,
        'CREATE_BY'       => Auth::user()->name,
        'CREATE_TIME'     => Carbon::now(),
        'MODIFY_BY'       => Auth::user()->name,
        'MODIFY_TIME'     => Carbon::now(),
      ]);

      if ($savedata) {
        return true;
      }else {
        return false;
      }

  }
}
