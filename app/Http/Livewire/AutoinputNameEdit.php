<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\EMPAll;

class autoinputnameedit extends Component{

  // public $empcode;

  public $search = "";

  public function render(){

      $emp = EMPALL::select('*')->selectraw("dbo.decode_utf8(EMP_TH_TITLE_CODE) as EMP_TH_NAME_TITLE,
                                             dbo.decode_utf8(EMP_TH_NAME_FIRST) as EMP_TH_NAME_FIRST,
                                             dbo.decode_utf8(EMP_TH_NAME_LAST) as EMP_TH_NAME_LAST")->where('EMP_CODE',$this->search)->first();

    return view('livewire.empname',['emp' => $emp]);

  }
}
