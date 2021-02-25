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


    $data_set = Machnie::paginate(10);



    //dd($data_set);
    return View('machine/manual/manuallist',compact(['data_set']),['data_set' => $data_set]);
  }

  public function StoreUpload(Request $request){
  }

  public function Show($UNID) {

    $dataset = Machnie::where('UNID','=',$UNID)->first();

    $dataupload = Upload::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)->get();

    return view('machine/manual/show',compact('dataset','dataupload'));

  }

  public function Update(Request $request,$UNID){

  }
}
