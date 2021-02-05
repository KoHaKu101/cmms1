<?php

namespace App\Exports;

use App\Models\Machine\Machnie;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class MachineExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         return Machnie::all();
//     }
// }
class MachineExport implements FromCollection
{
  public function view(): View
  {
    return view(View 'machine-excel',[
      'posts' => Post::all()
    ]);
  }
}
