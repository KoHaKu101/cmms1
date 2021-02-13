<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
  public function Sumaryline(){
    //dd($data_set);
    return View('machine/dashboard/sumaryline');
  }
  public function Dashboard(){
    //dashboardสรุป
    $data_setall = Machnie::all()->count();
    $data_check = DB::table('pmcs_machines')->where('MACHINE_CHECK','2')->get()->count();
    $data_nocheck = DB::table('pmcs_machines')->where('MACHINE_CHECK','1')->get()->count();

    //dashboardเครื่องจักรLINE
    $data_line1 = DB::table('pmcs_machines')->where('MACHINE_LINE','L1')->get()->count();
    //data_line คือตัวแปร = db::table คือ ตำแหน่งของtable ในฐานข้อมูล where คือการตามหา machinec_line คือ คอลัมที่ต้องการหา L1 คือชื่อในคอลัมนั้นที่เราต้องการหา get คือนำข้อมูลที่หามาเก็บไว้
    //count คือการนับจำนวนที่ get เก็บมา
    $data_line2 = DB::table('pmcs_machines')->where('MACHINE_LINE','L2')->get()->count();
    $data_line3 = DB::table('pmcs_machines')->where('MACHINE_LINE','L3')->get()->count();
    $data_line4 = DB::table('pmcs_machines')->where('MACHINE_LINE','L4')->get()->count();
    $data_line5 = DB::table('pmcs_machines')->where('MACHINE_LINE','L5')->get()->count();
    $data_line6 = DB::table('pmcs_machines')->where('MACHINE_LINE','L6')->get()->count();
    //แจ้งซ่อม
    $data_set = DB::table('pmcs_machines')->limit(9)->get();

    // dd($data_set);
    return View('machine/dashboard/dashboard',compact('data_set','data_setall','data_check','data_nocheck','data_line1','data_line2','data_line3','data_line4','data_line5','data_line6'));
  }
}
