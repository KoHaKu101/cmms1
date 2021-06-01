<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use \Illuminate\Session\SessionManager;
use App\Models\Machine\MachinePlanPm;


class pmlist extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $MACHINE_CODE;
  public $MACHINE_LINE;
  public $PLAN_YEAR;
  public $PLAN_STATUS;
  public $PLAN_MONTH;


  public function render(){
    $PLAN_YEAR = $this->PLAN_YEAR != NULL ? $this->PLAN_YEAR : date('Y');
    $MACHINE_CODE = $this->MACHINE_CODE;
    $MACHINE_LINE = $this->MACHINE_LINE;
    $MACHINE_CODE = $MACHINE_CODE != NULL ? '%'.$MACHINE_CODE.'%' : '%';
    $MACHINE_LINE = $MACHINE_LINE != NULL ? '%'.$MACHINE_LINE.'%' : '%';

      $machinepmplan = MachinePlanPm::select('*')->selectraw("
       CASE
       WHEN PLAN_STATUS = 'COMPLETE' THEN 'icon-success'
       WHEN PLAN_STATUS != 'COMPLETE' and DATEDIFF(DAY, GETDATE(),PLAN_DATE ) > ( SELECT PLAN_CHECK FROM PMCS_CMMS_SETUP_MAIL) THEN 'icon-mute'
    　 WHEN PLAN_STATUS != 'COMPLETE' and DATEDIFF(DAY, GETDATE(),PLAN_DATE ) <= -( SELECT PLAN_CHECK FROM PMCS_CMMS_SETUP_MAIL) THEN 'icon-danger'
    　 WHEN PLAN_STATUS != 'COMPLETE' and DATEDIFF(DAY, GETDATE(),PLAN_DATE ) > -( SELECT PLAN_CHECK FROM PMCS_CMMS_SETUP_MAIL) THEN 'icon-warning'
    　    END AS classtext")->where('PLAN_YEAR','=',$PLAN_YEAR)
                        ->where('MACHINE_CODE','like',$MACHINE_CODE)
                        ->where('MACHINE_LINE','like',$MACHINE_LINE)
                        ->where('PLAN_STATUS','like',$this->PLAN_STATUS != '' ? $this->PLAN_STATUS :'%')
                        ->where('PLAN_MONTH','like',$this->PLAN_MONTH > 0 ? $this->PLAN_MONTH : '%')
                        ->orderBy('PLAN_STATUS','DESC')
                        ->orderby('PLAN_DATE','ASC')
                        ->orderBy('MACHINE_CODE','ASC')
                        ->paginate(20);


    return view('livewire.pmlist',['machinepmplan' => $machinepmplan]);
  }
}
