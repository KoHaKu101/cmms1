<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\PDF\Pdf;
// use Codedge\Fpdf\Fpdf\Fpdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;



class TsetController extends Controller
{
  protected $pdf;

  public function __construct(\App\Models\PDF\Pdf $pdf){

    $this->middleware('auth');

      $this->fpdf = $pdf;

  }
  // public function randUNID($table){
  //   $number = date("ymdhis", time());
  //   $length=7;
  //   do {
  //     for ($i=$length; $i--; $i>0) {
  //       $number .= mt_rand(0,9);
  //     }
  //   }
  //   while ( !empty(DB::table($table)
  //   ->where('UNID',$number)
  //   ->first(['UNID'])) );
  //   return $number;
  // }

  public function HtmlToPDF()
  {
     // $this->fpdf = new Fpdf('P','mm','A4');
     $this->fpdf->SetFont('Arial','B',16);
     $this->fpdf->AddPage();
     $this->fpdf->SetFont('Arial','B',10);
     $this->fpdf->Output();
     exit;
  }
}
