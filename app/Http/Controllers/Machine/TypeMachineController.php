<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;
use Auth;
class TypeMachineController extends Controller
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


    return View('machine/typemachine/typemachinelist',compact('data_set'));
  }
  public function Create(){
    return View('machine/typemachine/form');
  }

  public function Store(Request $request){
    //code
  }
  public function Edit($UNID) {


    $dataset = Machnie::where('UNID','=',$UNID)->first();

    return view('machine/typemachine/edit',compact('dataset'));
}

}
