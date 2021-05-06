<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
//******************** model ***********************
use App\Models\Machine\Machine;
use App\Models\Machine\MachinePMCheck;
use App\Models\Machine\MasterIMPS;
use App\Models\Machine\PMPlan;
use App\Models\Machine\MachinePMCheckDetailStore;

use App\Models\SettingMenu\MailSetup;

use App\Models\MachineAddTable\MachinePmTemplateList;
use App\Models\MachineAddTable\MachinePmTemplateDetail;
use App\Models\MachineAddTable\MachinePmTemplate;


//************** Package form github ***************
use App\Exports\MachineExport;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;
// use Codedge\Fpdf\Fpdf\Fpdf;
use Codedge\Fpdf\Fpdf\Fpdf;



class PlanPmController extends Controller
{
    // protected $pdf;
  public function __construct(){
    $this->middleware('auth');
  }
  public function randUNID($table){
    $number = date("ymdhis", time());
    $length=7;
    do {
      for ($i=$length; $i--; $i>0) {
        $number .= mt_rand(0,9);
      }
    }
    while ( !empty(DB::table($table)
    ->where('UNID',$number)
    ->first(['UNID'])) );
    return $number;
  }
  public function Index(){

    $plan     = MailSetup::select('autoplan')->first();
    $planyear = Carbon::now()->diffInYears(Carbon::now()->addDay($plan->autoplan));
    $year     = -1;
    return view('/machine/plan/planpm',compact('year','planyear'));
}
  public function StorePlan(){

  }

 }
