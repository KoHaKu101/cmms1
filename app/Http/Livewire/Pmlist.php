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


  public function render(){
    $PLAN_YEAR = $this->PLAN_YEAR != NULL ? $this->PLAN_YEAR : date('Y');
    if ($this->MACHINE_CODE or $this->MACHINE_LINE ) {

      $MACHINE_CODE = $this->MACHINE_CODE;
      $MACHINE_LINE = $this->MACHINE_LINE;

      $MACHINE_CODE = $MACHINE_CODE != NULL ? '%'.$MACHINE_CODE.'%' : '%';
      $MACHINE_LINE = $MACHINE_LINE != NULL ? '%'.$MACHINE_LINE.'%' : '%';


        $machinepmplan = MachinePlanPm::select('*')->selectraw("
        CASE
        WHEN DATEDIFF(DAY, PLAN_DATE,GETDATE() ) > 30 THEN 'icon-danger'
        WHEN DATEDIFF(DAY, PLAN_DATE,GETDATE() ) > 7 THEN 'icon-warning'
        ELSE 'icon-success'
        END AS classtext")->where('PLAN_YEAR',$PLAN_YEAR)
                          ->where('MACHINE_CODE','like',$MACHINE_CODE)
                          ->where('MACHINE_LINE','like',$MACHINE_LINE)
                          ->orderby('PLAN_DATE','ASC')
                          ->orderBy('MACHINE_CODE','ASC')
                          ->paginate(20);

      $MACHINE_CODE = str_replace('%','',$MACHINE_CODE);
      $MACHINE_LINE = str_replace('%','',$MACHINE_LINE);
    }else {
      $machinepmplan = MachinePlanPm::select('*')->selectraw("
      CASE
      WHEN DATEDIFF(DAY, PLAN_DATE,GETDATE() ) > 30 THEN 'icon-danger'
      WHEN DATEDIFF(DAY, PLAN_DATE,GETDATE() ) > 7 THEN 'icon-warning'
      ELSE 'icon-success'
      END AS classtext")->where('PLAN_YEAR',$PLAN_YEAR)
                        ->orderby('PLAN_DATE','ASC')
                        ->orderBy('MACHINE_CODE','ASC')
                        ->paginate(20);
    }
    return view('livewire.pmlist',['machinepmplan' => $machinepmplan]);
  }
}
