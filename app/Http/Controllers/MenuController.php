<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mainmenu;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Auth;


class MenuController extends Controller
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
        'MENU_NAME'           => 'required|max:255'],[
        'MENU_NAME.required'  => 'กรุณราใส่ชื่อ menu',
        'MENU_NAME.max'       => 'ใส่ได้ไม่เกิน 255'


        ]);

        Mainmenu::insert([
            'MENU_NAME'   => $request->MENU_NAME,
            'MENU_EN'     => $request->MENU_EN,
            'MENU_INDEX'  =>  $request->MENU_INDEX,
            'MENU_STATUS' => $request->MENU_STATUS,
            'MENU_ICON'   => $request->MENU_ICON,
            'MENU_CLASS'  => $request->MENU_CLASS,
            'MENU_LINK'   => $request->MENU_LINK,
            'UNID'        => $this->randUNID('PMCS_CMMS_MENU'),
            'CREATE_BY'   => Auth::user()->name,
            'CREATE_TIME' => Carbon::now(),

        ]);

          return Redirect()->back()->with('success','insert success');


    }

    public function AllMenu()
    {
      $data = Mainmenu::paginate(6);
      // $data = DB::table('PMCS_CMMS_MENU')->latest()->paginate(3);
      $trashdata = Mainmenu::onlyTrashed()->latest()->paginate(3);

      return View('menu.index',compact('data','trashdata'));

    }




    public function Edit($UNID){

      $data = Mainmenu::find($UNID);
      // $data = Mainmenu::where('UNID','=',$UNID)->first();

      return view('menu/edit',compact('data'));

    }



    public function Update(Request $request,$UNID){


      $dataunid = Mainmenu::find($UNID)->update([
        'MENU_NAME'   => $request->MENU_NAME,
        'MENU_EN'     => $request->MENU_EN,
        'MENU_INDEX'  =>    $request->MENU_INDEX,
        'MENU_STATUS' => $request->MENU_STATUS,
        'MENU_ICON'   => $request->MENU_ICON,
        'MENU_CLASS'  => $request->MENU_CLASS,
        'MENU_LINK'   => $request->MENU_LINK,

        'MODIFY_BY'   => Auth::user()->name,
        'MODIFY_TIME' => Carbon::now(),

      ]);

      return Redirect()->route('all.menu')->with('success','Update Success');

    }



    // ส่วนลบ
    public function SoftDeletes($UNID){
          $delete = Mainmenu::find($UNID)->delete();
          return Redirect()->back()-> with('success','delete Success');
    }
      public function Restore($UNID){
          $delete = Mainmenu::withTrashed()->find($UNID)->Restore();
          return Redirect()->back()-> with('success','Restore Success');

      }
      public function Delete($UNID){
          $delete = Mainmenu::onlyTrashed()->find($UNID)->forceDelete();
          return Redirect()->back()-> with('success','Confirm Delete Success');

      }
      // ส่วนลบ

      public function Logout(){
          Auth::logout();
          return Redirect()->route('login')->with('success','User Logout');
      }
}
