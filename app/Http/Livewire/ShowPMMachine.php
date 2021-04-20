<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MasterIMPSGroup;
use App\Models\Machine\MasterIMPS;
use App\Models\MachineaddTable\MachinePmTemplate;

class showpmmachine extends Component{

  // use WithPagination;

  // protected $paginationTheme = 'bootstrap';

  // public $machinecode;
  public $MACHINE_CODE ;
  public $PM_TEMPLATE_UNID_REF;

  protected $listeners = [
    'show'
  ];
  public function show($datamasterimps,$MACHINE_CODE){
  // $datamasterimps,$MACHINE_CODE
  $this->MACHINE_CODE = $MACHINE_CODE;
  $this->PM_TEMPLATE_UNID_REF = $datamasterimps;

  }

  public function render(){

    $masterimpsgroup = MasterIMPSGroup::where('MACHINE_CODE',$this->MACHINE_CODE)->where('PM_TEMPLATE_UNID_REF',$this->PM_TEMPLATE_UNID_REF)->where('PM_TEMPLATELIST_STATUS','1')->orderBy('CREATE_TIME','ASC')->get();
    $masterimps      = MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->orderBy('CREATE_TIME','ASC')->get();

    return view('livewire.detaileditpmmachine',['masterimpsgroup' => $masterimpsgroup,'masterimps' => $masterimps]);
  }
}
