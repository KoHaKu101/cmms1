<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MachineExport;
// use Maatwebsite\Excel\Excel;
use Excel;
use App\Models\Machine\Machine;



class MachineExportController extends Controller
{

  public function export()
    {

        return Excel::download(new MachineExport, 'Machinelist.xlsx');
    }
    public function exportline($LINE_CODE)
      {

          return Excel::download(new MachineLineExport, 'Machinelinelist.xlsx');
      }
  }
