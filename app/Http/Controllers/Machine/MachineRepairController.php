<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineRepairTable;
use App\Models\Machine\Machine;
//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

class RepairController extends Controller
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
    return View('machine/repair/repairlist');
  }
  public function Create(){
      $dataset = MachineRepairTable::get();
    return View('machine/repair/form',compact('dataset'));
  }
  public function Search($MACHINE_CODE){

      $dataupload = Machine::where('MACHINE_CODE','=',$MACHINE_CODE)->get();
    return compact('dataupload');
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

    return view('machine/repair/edit');

  }

}
