<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;
use PDF;

class TsetController extends Controller
{
  public function HtmlToPDF(){

  $data=Machnie::all();
  $view = view('machine/pdf/machinepdf',compact(['data']));
  $html_content = $view->render();
  
  PDF::SetFont("thsarabun");
  PDF::SetTitle('machinepdf');
  PDF::Addpage("L","A4");
  PDF::writeHTML($html_content,true,false,true,false,'');
  PDF::Output("machinelist","I");
}
}
