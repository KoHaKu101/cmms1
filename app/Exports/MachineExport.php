<?php

namespace App\Exports;

use App\Models\Machine\Machnie;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;



class MachineExport implements FromView
{
  use Exportable;
  /**
    *@return \Illuminate\Support\Collection
    */

  public function view(): View
  {
      $data_set = Machnie::all();
      return view('machine.export.machine',compact(['data_set']));
  }
}
