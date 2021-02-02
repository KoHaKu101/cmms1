<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formfactory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class FormfactoryController extends Controller
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


  public function Create()
  {

    return View('assets.formassete.formfacilities');
  }


  public function Index()
  {
    $form = Formfactory::paginate(12);
    return View('/assets/Facilities',compact(['form']));
  }

  public function Store(Request $request)
  {
    // dd($request);
    $validated = $request->validate([
      'NUMBER_M'           => 'required|max:255'],[
      'NUMBER_M.required'  => 'Please insert Machine NO',
      'NUMBER_M.max'       => 'ใส่ได้ไม่เกิน 255'


      ]);

      Formfactory::insert([

          'NUMBER_M'    => $request->NUMBER_M,
          'PRODUCT_M'   => $request->PRODUCT_M,
          'NAME_M'      =>  $request->NAME_M,
          'MODEL_M'     => $request->MODEL_M,
          'SERIES_M'    => $request->SERIES_M,
          'DATE_M'      => $request->DATE_M,
          'POWER_M'     => $request->POWER_M,
          'WHIGHT_M'    => $request->WHIGHT_M,
          'BUY_M'       => $request->BUY_M,
          'TYPE_M'      => $request->TYPE_M,
          'IMG_M'       => $request->IMG_M,
          'QRCODE_M'    => $request->QRCODE_M,

          'UNID'        => $this->randUNID('formfactories'),
          'CREATE_BY'   => Auth::user()->name,
          'CREATE_TIME' => Carbon::now(),

      ]);
          return Redirect()->route('factoryhome')->with('success','Register Success');
        // return Redirect()->back()->with('success','insert success');
  }
  public function Edit($UNID){

    $data_Form = Formfactory::find($UNID);
    // $data = Mainmenu::where('UNID','=',$UNID)->first();

    return view('assets.edit.edit',compact('data_Form'));

  }



  public function Update(Request $request,$UNID){

    // dd($request);
    $dataunid = Formfactory::find($UNID)->update([
      'NUMBER_M'    => $request->NUMBER_M,
      'PRODUCT_M'   => $request->PRODUCT_M,
      'NAME_M'      =>  $request->NAME_M,
      'MODEL_M'     => $request->MODEL_M,
      'SERIES_M'    => $request->SERIES_M,
      'DATE_M'      => $request->DATE_M,
      'POWER_M'     => $request->POWER_M,
      'WHIGHT_M'    => $request->WHIGHT_M,
      'BUY_M'       => $request->BUY_M,
      'TYPE_M'      => $request->TYPE_M,
      'IMG_M'       => $request->IMG_M,
      'QRCODE_M'    => $request->QRCODE_M,


      'MODIFY_BY'   => Auth::user()->name,
      'MODIFY_TIME' => Carbon::now(),

    ]);

    return Redirect()->route('factoryhome')->with('success','Update Success');

  }

  public function Delete($UNID){
      $delete = Formfactory::onlyTrashed()->find($UNID)->forceDelete();
      return Redirect()->back()-> with('success','Confirm Delete Success');

  }
  // ส่วนลบ

  public function Logout(){
      Auth::logout();
      return Redirect()->route('login')->with('success','User Logout');
  }


}
