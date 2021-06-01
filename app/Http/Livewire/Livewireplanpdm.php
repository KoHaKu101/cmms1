<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use \Illuminate\Session\SessionManager;
use App\Models\Machine\MachineSparePart;


class Livewireplanpdm extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $MACHINE_UNID;

  public function render(){

    $machinesparepart = MachineSparePart::where('MACHINE_UNID','=',$this->MACHINE_UNID)
                                   ->paginate(10);


    return view('machine.assets.tab.edit.livewireplanpdm',['machinesparepart' => $machinesparepart]);
  }
}
