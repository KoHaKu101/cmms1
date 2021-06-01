<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;
use \Illuminate\Session\SessionManager;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineCheckSheet;


class dailylist extends Component{

  use WithPagination;

  protected $paginationTheme = 'bootstrap';

  public $MACHINE_CODE;
  public $MACHINE_LINE;
  public $YEAR;
  public $MONTH;


  public function render(){
    $MACHINE_LINE = $this->MACHINE_LINE != '' ? '%'.$this->MACHINE_LINE.'%' : '%' ;
    $MACHINE_CODE = $this->MACHINE_CODE != '' ? '%'.$this->MACHINE_CODE.'%' : '%' ;

    $DATA_MACHINE = Machine::select('*')->selectRaw('dbo.decode_utf8(MACHINE_NAME) as MACHINE_NAME_V2')
                                        ->where('MACHINE_CODE','like',$MACHINE_CODE)
                                        ->where('MACHINE_LINE','like',$MACHINE_LINE)
                                        ->where('MACHINE_STATUS','=','9')
                                        ->orderBy('MACHINE_CODE')
                                        ->paginate(10);

   $DATA_CHECKSHEET = MachineCheckSheet::where('CHECK_MONTH','=',$this->MONTH)
                                         ->where('CHECK_YEAR','=',$this->YEAR)
                                         ->get();


    return view('livewire.dailylist',['DATA_MACHINE' => $DATA_MACHINE,'DATA_CHECKSHEET' => $DATA_CHECKSHEET ]);
  }
}
