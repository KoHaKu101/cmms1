<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\VerifyCsrfToken;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\MachineAddTable\MachineRepairTable;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineEMP;
//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

class MachineRepairController extends Controller
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

  public function PrepareSearch(){

    return View('machine/repair/search');
  }

  public function Search(Request $request){

    if($request->has('machine_code'))
  {
    $MACHINE_CODE=$request->machine_code;
    $data = Machine::where('MACHINE_CODE','like','%'.$MACHINE_CODE.'%')->get();
    return response()->json(['dataset'=>$data]);
  }else {
    return View('machine/repair/search');
  }
  }

  public function Create($MACHINE_CODE){

      $dataset = MachineRepairTable::get();
      $datamachine = Machine::where('MACHINE_CODE','=',$MACHINE_CODE)->first();
      $dataemp = MachineEMP::where('MACHINE_CODE','=',$MACHINE_CODE)->get();
    return View('machine/repair/form',compact('dataset','datamachine','dataemp'));
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

      $dataset = MachineRepairTable::get();
    // $data = Mainmenu::where('UNID','=',$UNID)->first();

    return view('machine/repair/edit',compact('dataset'));

  }

}
