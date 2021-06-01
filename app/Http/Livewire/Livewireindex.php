<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use \Illuminate\Session\SessionManager;
use App\Models\Machine\SparePartPlan;


class Livewireindex extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $DOC_YEAR;
  public $DOC_MONTH;
  public $SEARCH;
  public $STATUS;
  public $MACHINE_LINE;


  public function render(){
    $DOC_YEAR  = $this->DOC_YEAR > 0 ? $this->DOC_YEAR : date('Y');
    $DOC_MONTH = $this->DOC_MONTH > 0 ? $this->DOC_MONTH : date('n');
    $SEARCH = $this->SEARCH != '' ? '%'.$this->SEARCH.'%' : '%';
    $STATUS = $this->STATUS;
    $MACHINE_LINE = isset($this->MACHINE_LINE) ? $this->MACHINE_LINE : '%';
    if ($STATUS == 'NEW') {
      $DATA_SPAREPLAN = SparePartPlan::select('*')->selectraw("
      CASE
      WHEN DOC_MONTH > MONTH(getdate()) and DOC_YEAR > YEAR(getdate()) THEN 'FALSE'
      WHEN DOC_MONTH > MONTH(getdate()) THEN 'FALSE'
   　 else 'TRUE'
    　    END AS classtext")->where('DOC_YEAR','=',$DOC_YEAR)->where('DOC_MONTH','=',$DOC_MONTH)
                                  ->where(function ($query) use ($SEARCH) {
                                      $query->where('MACHINE_CODE', 'like', $SEARCH)
                                            ->orWhere('SPAREPART_NAME', 'like', $SEARCH);})
                                     ->where('MACHINE_LINE','like',$MACHINE_LINE)
                                     ->where('STATUS','!=','COMPLETE')
                                     ->where('STATUS_OPEN','=','9')
                                     ->orderBy('PLAN_DATE')
                                     ->orderBy('MACHINE_LINE')
                                     ->orderBy('MACHINE_CODE')
                                     ->paginate(10);
    }elseif($STATUS == 'COMPLETE'){
      $DATA_SPAREPLAN = SparePartPlan::
      select('*')->selectraw("
      CASE
      WHEN DOC_MONTH > MONTH(getdate()) and DOC_YEAR > YEAR(getdate()) THEN 'FALSE'
      WHEN DOC_MONTH > MONTH(getdate()) THEN 'FALSE'
   　 else 'TRUE'
    　    END AS classtext")->where('DOC_YEAR','=',$DOC_YEAR)->where('DOC_MONTH','=',$DOC_MONTH)
                                  ->where(function ($query) use ($SEARCH) {
                                      $query->where('MACHINE_CODE', 'like', $SEARCH)
                                            ->orWhere('SPAREPART_NAME', 'like', $SEARCH);})
                                    ->where('MACHINE_LINE','like',$MACHINE_LINE)
                                     ->where('STATUS','=','COMPLETE')
                                     ->where('STATUS_OPEN','=','9')
                                     ->orderBy('PLAN_DATE')
                                     ->orderBy('MACHINE_LINE')
                                     ->orderBy('MACHINE_CODE')
                                     ->paginate(10);
    }else {
      $DATA_SPAREPLAN = SparePartPlan::select('*')->selectraw("
      CASE
      WHEN DOC_MONTH > MONTH(getdate()) and DOC_YEAR > YEAR(getdate()) THEN 'FALSE'
      WHEN DOC_MONTH > MONTH(getdate()) THEN 'FALSE'
   　 else 'TRUE'
    　    END AS classtext")->where('DOC_YEAR','=',$DOC_YEAR)->where('DOC_MONTH','=',$DOC_MONTH)
                                  ->where(function ($query) use ($SEARCH) {
                                      $query->where('MACHINE_CODE', 'like', $SEARCH)
                                            ->orWhere('SPAREPART_NAME', 'like', $SEARCH);})
                                     ->where('MACHINE_LINE','like',$MACHINE_LINE)
                                     ->where('STATUS_OPEN','=','9')
                                     ->orderBy('PLAN_DATE')
                                     ->orderBy('MACHINE_LINE')
                                     ->orderBy('MACHINE_CODE')
                                     ->paginate(10);
    }



    return view('machine.sparepart.report.livewireindex',['DATA_SPAREPLAN' => $DATA_SPAREPLAN]);
  }
}
