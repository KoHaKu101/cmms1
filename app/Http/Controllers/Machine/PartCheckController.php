<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;
use App\Models\Machine\Upload;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Auth;

class PartCheckController extends Controller
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
    $data_line6 = DB::table('pmcs_machines')->where('MACHINE_LINE','L6')->get()->count();
    //dd($data_set);
    return View('machine/partcheck/partchecklist',compact('data_set','data_line6'));
  }
  public function Create(){
    return View('machine/partcheck/form');
  }

  public function Store(Request $request){
    //code
  }
  // public function Edit($UNID) {
  //
  //   $data_set = Machnie::where('UNID',$UNID)->first();
  //   // $data = Mainmenu::where('UNID','=',$UNID)->first();
  //
  //   return view('machine/assets/edit',compact('data_set'));
  //
  // }
  public function Edit($UNID) {


    $dataset = Machnie::where('UNID','=',$UNID)->first();

    return view('machine/partcheck/edit',compact('dataset'));
}
public function Editmain($UNID) {


  $dataset = Machnie::where('UNID','=',$UNID)->first();

  return view('machine/partcheck/editmain',compact('dataset'));
}
}
