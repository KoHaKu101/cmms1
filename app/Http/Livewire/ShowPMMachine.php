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
  public $PM_TEMPLATE_UNID_REF;
  public $open = '0';
  public $RANK;

  public function show($datamasterimps){

    $this->open = '1';
    $this->PM_TEMPLATE_UNID_REF = $datamasterimps;

  }
  public function save(){

  }
  public function render(){
    if ($this->RANK != NULL) {
       $update = MasterIMPS::select('PM_LAST_DATE')->where('MACHINE_CODE',$this->MACHINE_CODE)->first();
       MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->update(['PM_NEXT_DATE' => Carbon::parse($update->PM_LAST_DATE)->addMonth($this->RANK)]);
       $date = MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->first();
    }else {
      $date = MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->first();
    }

  if ($this->open == '1') {
    $masterimpsgroup = MasterIMPSGroup::where('MACHINE_CODE',$this->MACHINE_CODE)
                                      ->where('PM_TEMPLATE_UNID_REF',$this->PM_TEMPLATE_UNID_REF)
                                      ->where('PM_TEMPLATELIST_STATUS','=','1')
                                      ->orderBy('CREATE_TIME','ASC')->get();
    $machinepmtemplatadetail = MachinePmTemplateDetail::all();

  }else {

    $masterimpsgroup = NULL;
    $machinepmtemplatadetail = NULL;
  }
    return view('livewire.detaileditpmmachine',['masterimps' => MasterIMPS::where('MACHINE_CODE',$this->MACHINE_CODE)->orderBy('CREATE_TIME','ASC')->get()
                                              ,'masterimpsgroup' => $masterimpsgroup
                                              ,'machinepmtemplatadetail' => $machinepmtemplatadetail
                                              ,'date' => $date ]);
  }
}
