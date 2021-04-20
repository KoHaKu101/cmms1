<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\Machine;

class searchnewrepair extends Component{

  public $search = "";

  protected $queryString = ['search'];


  public function render(){
    if (strlen($this->search) > 3) {
      $machine = Machine::where('MACHINE_CODE','like', '%'.$this->search.'%')
                        ->where('MACHINE_STATUS','!=','4')
                        ->orderBy('MACHINE_CODE','ASC')->get();
    }else {
      $machine = NULL;
    }


    return view('livewire.searchnewrepair',['machine' => $machine]);
  }
}
