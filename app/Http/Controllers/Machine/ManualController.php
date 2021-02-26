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

class ManualController extends Controller
{

  public function Index(){

    $dataset = Machnie::paginate(10);

    //dd($data_set);
    return View('machine/manual/manuallist',compact(['dataset']),['dataset' => $dataset]);
  }

  public function Show($UNID) {

    $dataset = Machnie::where('UNID','=',$UNID)->first();

    $dataupload = Upload::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)->get();

    return view('machine/manual/show',compact('dataset','dataupload'));

  }
  public static function Download($UNID){
    // dd($UNID);
      $dataset = Upload::find($UNID);
      $download = $dataset->FILE_UPLOAD;
      // $data_set = Upload::where('UNID','=',$UNID)->first();
      // return Response::disk('public')->file($download);
      return Storage::disk('public')->download($download);

  }
}
