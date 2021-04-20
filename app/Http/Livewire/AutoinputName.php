<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MachineEMP;

class autoinputname extends Component{

  public $search = "";

  // // protected $queryString = ['search'];
  // protected $queryString = ['search'];

  public function render(){

    $emp = MachineEMP::where('EMP_CODE',$this->search)->first();

    return view('livewire.empname',['emp' => $emp]);

  }
}
