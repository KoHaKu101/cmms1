<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MachineRepairREQ;

class searchrepairmachine extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $search;

  protected $queryString = ['search'];

  public function render(){
      $SEARCH = isset($this->search) ? '%'.$this->search.'%' : '%';

      $dataset = MachineRepairREQ::where(function ($query) use ($SEARCH) {
                $query->where('MACHINE_CODE', 'like', $SEARCH)
                    ->orWhere('DOC_NO', 'like', $SEARCH);})
                              ->orderby('CLOSE_STATUS','DESC')
                              ->orderBy('DOC_DATE','DESC')
                              ->paginate(10);
    return view('livewire.searchrepair',['dataset' => $dataset]);
  }
}
