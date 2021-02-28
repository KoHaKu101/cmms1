<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\Machine\MachineUpload;
//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;



class SysCheckController extends Controller
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

    $dataset = Machine::paginate(10);

    return View('machine/syscheck/syschecklist',compact('dataset'));
  }
  public function Indexline($LINE_CODE){

    $dataset = Machine::where('MACHINE_LINE','=',$LINE_CODE)->paginate(10);

      // return view('machine/assets/machinelist0',compact(['dataset']),['dataset' => $dataset]);
    return View('machine/syscheck/syschecklist',compact(['dataset']),['dataset' => $dataset]);
  }
  public function Create(){
    return View('maMachineyscheck/form');
  }

  public function Store(Request $request){
    //code
  }

  public function Edit($UNID) {


    $data_set = Machine::where('UNID','=',$UNID)->first();

    return view('machine/syscheck/edit',compact('data_set'));
}
}
