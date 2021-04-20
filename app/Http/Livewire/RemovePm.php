<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Machine\MasterIMPS;
use App\Models\MachineaddTable\MachinePmTemplate;


class removepm extends Component{
  
  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $machinecode;

  public function render(){
          $machinepmtemplateremove = MachinePmTemplate::whereIn('PM_TEMPLATE_NAME',MasterIMPS::select('PM_TEMPLATE_NAME')->where('MACHINE_CODE',$this->machinecode))->orderBy('CREATE_TIME','ASC')->paginate(6);

    return View('pagination/modalpmremove',['machinepmtemplateremove' => $machinepmtemplateremove,]);

  }
}
