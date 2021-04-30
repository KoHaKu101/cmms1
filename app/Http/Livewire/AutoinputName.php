<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MachineEMP;
use App\Models\Machine\EMPAll;

class autoinputname extends Component{

  public $search = "";
  public $emp;
  public function render(){
          $this->emp = EMPAll::where('EMP_CARD_NO',$this->search)->first();
    return view('livewire.empname');
}
}
