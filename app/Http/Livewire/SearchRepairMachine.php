<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MachineRepair;

class searchrepairmachine extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $search;

  protected $queryString = ['search'];

  public function render(){ 
      $SEARCH = isset($this->search) ? '%'.$this->search.'%' : '%';

      $dataset = MachineRepair::where(function ($query) use ($SEARCH) {
                $query->where('MACHINE_CODE', 'like', $SEARCH)
                    ->orWhere('MACHINE_DOCNO', 'like', $SEARCH);})
                              ->orderby('CLOSE_STATUS','DESC')
                              ->orderBy('MACHINE_DOCDATE','DESC')
                              ->paginate(10);
    return view('livewire.searchrepair',['dataset' => $dataset]);
  }
}
