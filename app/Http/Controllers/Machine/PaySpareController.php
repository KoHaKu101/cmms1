<?php

namespace App\Http\Controllers\Machine;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaySpareController extends Controller
{
  public function Index(){

    // $data_set = Machnie::paginate(10);
    //dd($data_set);
    return View('machine/payspare/paysparelist');
  }
}
