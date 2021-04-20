<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MachineRepair;

class searchrepairmachine extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $search = "";

  protected $queryString = ['search'];

  public function render(){
      $dataset = MachineRepair::orwhere('MACHINE_CODE','like', '%'.$this->search.'%')
                              ->orwhere('MACHINE_DOCNO','like', '%'.$this->search.'%')
                              ->orderby('CLOSE_STATUS','DESC')
                              ->orderBy('MACHINE_DOCDATE','DESC')
                              ->paginate(10);
    return view('livewire.searchrepair',['dataset' => $dataset]);
  }
}
