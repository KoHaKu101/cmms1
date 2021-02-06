<?php

namespace App\Http\Controllers\Import;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Excel;
use App\Models\Machine\Machnie;
use App\Imports\MachineImport;

class MachineImportController extends Controller
{
    public function show(){
      return view('import.machine');
    }
    public function store(Request $request){
      $file = $request->file('file');

      Excel::import(new MachineImport, $file);

      return back()->withStatus('Excel file success');
    }
}
