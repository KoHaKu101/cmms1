<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Menusubitem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MenuSubController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
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

  public function AddMenu(Request $request)
  {
    $validated = $request->validate([
      'SUBMENU_NAME' => 'required|max:255'],[
      'SUBMENU_NAME.required' => 'กรุณราใส่ชื่อ menu',
      'SUBMENU_NAME.max' => 'ใส่ได้ไม่เกิน 255'


      ]);

      Menusubitem::insert([
          'SUBMENU_NAME'=> $request->SUBMENU_NAME,
          'SUBMENU_EN'=> $request->SUBMENU_EN,
          'SUBUNID_REF'=> $request->SUBUNID_REF,
          'SUBMENU_INDEX' =>  $request->SUBMENU_INDEX,
          'SUBMENU_STATUS' => $request->SUBMENU_STATUS,
          'SUBMENU_ICON' => $request->SUBMENU_ICON,
          'SUBMENU_CLASS' => $request->SUBMENU_CLASS,
          'SUBMENU_LINK' => $request->SUBMENU_LINK,
          'UNID'=>$this->randUNID('PMCS_CMMS_MENUSUBITEM'),
          'CREATE_BY'=>Auth::user()->name,
          'CREATE_TIME'=> Carbon::now(),



      ]);


    return Redirect()->back()->with('success','insert success');


  }

  public function AllMenu()
  {
    $datasub = Menusubitem::latest()->paginate(5);
    $trashsub = Menusubitem::onlyTrashed()->latest()->paginate(3);
    // $PMCS_CMMS_MENU = DB::table('PMCS_CMMS_MENU')->latest()->get();
    return View('submenu.indexsubmenu',compact('datasub','trashsub'));

  }


  public function Edit($UNID){

    $datasub = Menusubitem::find($UNID);
    // $data = Menusubitem::where('UNID','=',$UNID)->first();

    return view('submenu/editsubmenu',compact('datasub'));

  }



  public function Update(Request $request,$UNID){


    $datasubunid = Menusubitem::find($UNID)->update([
      'SUBMENU_NAME'  => $request->SUBMENU_NAME,
      'SUBMENU_EN'    => $request->SUBMENU_EN,
      'SUBMENU_INDEX' =>  $request->SUBMENU_INDEX,
      'SUBMENU_STATUS' => $request->SUBMENU_STATUS,
      'SUBMENU_ICON' => $request->SUBMENU_ICON,
      'SUBMENU_CLASS' => $request->SUBMENU_CLASS,
      'SUBMENU_LINK' => $request->SUBMENU_LINK,

      'MODIFY_BY' =>Auth::user()->name,
      'MODIFY_TIME' => Carbon::now(),

    ]);
    $SUBUNID_REF=$request->SUBUNID_REF;

    $datasubmenu = Menusubitem::where('SUBUNID_REF','=',$SUBUNID_REF)->get();

    return Redirect()->route('all.submenu',[$SUBUNID_REF]);

  }



  // ส่วนลบ
  public function SoftDeletes($UNID){
    $delete = Menusubitem::find($UNID)->delete();
    return Redirect()->back()-> with('success','delete Success');
  }
    public function Restore($UNID){
        $delete = Menusubitem::withTrashed()->find($UNID)->Restore();
        return Redirect()->back()-> with('success','Restore Success');

    }
    public function Delete($UNID){
        $delete = Menusubitem::onlyTrashed()->find($UNID)->forceDelete();
        return Redirect()->back()-> with('success','Confirm Delete Success');

    }
    // ส่วนลบ



    public function Viewsubmenu($UNID){
        // $data = Menusubitem::where('UNID','=',$UNID)->first();

        $mainmenu=array();
        $mainmenu["UNID"]=$UNID;

      $datasubmenu = Menusubitem::where('SUBUNID_REF','=',$UNID)->get();
        // $datasubmenu = Menusubitem::where();
    return View('submenu.indexsubmenu',compact('datasubmenu','mainmenu'));
    }
}
