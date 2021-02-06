<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\MachineExport;
use Maatwebsite\Excel\Excel;
use App\Models\Machine\Machnie;



class MachineExportController extends Controller
{
  private $excel;

  public function __construct(Excel $excel){
    $this->excel = $excel;
  }
  public function export()
    {

        return $this->excel->download(new MachineExport, 'Machinelist.xlsx');
    }
  }
