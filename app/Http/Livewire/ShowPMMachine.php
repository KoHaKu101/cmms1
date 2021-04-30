<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MasterIMPSGroup;
use App\Models\Machine\MasterIMPS;
use App\Models\MachineaddTable\MachinePmTemplate;
use App\Models\MachineaddTable\MachinePmTemplateDetail;
use Carbon\Carbon;


class showpmmachine extends Component{

  // public $machinecode;
  public $MACHINE_CODE ;
  public $RANK;

  public function render(){
    if ($this->RANK != NULL) {
      $rank = $this->RANK;
    }else {
      $rank = NULL;
    }

    $masterimps =  MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->orderBy('CREATE_TIME','ASC')->get();
    $masterimpsfirst =  MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->orderBy('CREATE_TIME','ASC')->first();
    // dd($masterimpsfirst->PM_TEMPLATE_UNID_REF);
    $masterimpsgroup = MasterIMPSGroup::all();
    $pmlistdetail = MachinePmTemplateDetail::all();

    return view('livewire.detaileditpmmachine',['masterimps' => $masterimps
                                              ,'rank' => $rank
                                              ,'masterimpsgroup' => $masterimpsgroup
                                              ,'pmlistdetail' => $pmlistdetail]);
  }
}
