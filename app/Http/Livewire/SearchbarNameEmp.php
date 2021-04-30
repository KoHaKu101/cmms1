<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\EMPAll;

class searchbarnameemp extends Component{

  public $search = "";

  // // protected $queryString = ['search'];
  // protected $queryString = ['search'];

  public function render(){
    $empcode = [];

      $empcode = EMPAll::select('EMP_CODE')->where('EMP_CODE','630')->get();



    return view('livewire.searcbaremp')->with(['empcode' => $empcode]);;

  }
}
