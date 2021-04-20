<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\Machine;

class searchmachine extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $search = "";

  protected $queryString = ['search'];
  public $MACHINE_LINE;

  public function render(){
    if ($this->MACHINE_LINE != NULL) {
      $machine = Machine::where('MACHINE_CODE','like', '%'.$this->search.'%')
                        ->where('MACHINE_LINE',$this->MACHINE_LINE)
                        ->where('MACHINE_STATUS','!=','4')
                        ->orderBy('MACHINE_CODE','ASC')->paginate(10);
    }else {
      $machine = Machine::where('MACHINE_CODE','like', '%'.$this->search.'%')
                        ->where('MACHINE_LINE','like', '%'.$this->MACHINE_LINE.'%')
                        ->where('MACHINE_STATUS','!=','4')
                        ->orderBy('MACHINE_CODE','ASC')->paginate(10);
    }


    return view('livewire.searchmachine',['machine' => $machine]);
  }
}
