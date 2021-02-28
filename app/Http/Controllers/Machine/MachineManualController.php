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
use RealRashid\SweetAlert\Facades\Alert;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;



class MachineManualController extends Controller
{

  public function Index(){

    $dataset = Machine::paginate(10);

    //dd($data_set);
    return View('machine/manual/manuallist',compact(['dataset']),['dataset' => $dataset]);
  }

  public function Show($UNID) {

    $dataset = Machine::where('UNID','=',$UNID)->first();

    $dataupload = MachineUpload::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)->get();

    return view('machine/manual/show',compact('dataset','dataupload'));

  }
  public static function Download($UNID){
    // dd($UNID);
      $dataset = MachineUpload::find($UNID);
      $download = $dataset->FILE_UPLOAD;
      // $data_set = Upload::where('UNID','=',$UNID)->first();
      // return Response::disk('public')->file($download);
      return Storage::disk('public')->download($download);

  }
}
