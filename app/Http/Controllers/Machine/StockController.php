<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use App\Models\Machine\Stock;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Auth;

class StockController extends Controller
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

    // $data_set = Machnie::paginate(10);
    //dd($data_set);
    return View('machine/sparepart/stock/stocklist');
  }
  public function Create(){
    return View('machine/sparepart/stock/form');
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
  public function Edit() {


    // $data = Mainmenu::where('UNID','=',$UNID)->first();

    return view('machine/sparepart/stock/edit');

  }
}
