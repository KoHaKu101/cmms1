<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Upload;
// use App\Models\PDF\Pdf;
// use Codedge\Fpdf\Fpdf\Fpdf;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;



class UploadPdfController extends Controller
{
  protected $pdf;

  public function __construct(){

    $this->middleware('auth');

  }

  public function Uploadpdf($UNID)
  {
    $dataset = Upload::where('UNID',$UNID)->get();
    $dataupload =  Upload::readfile('FILE_UPLOAD',$dataset->FILE_UPLOAD)->first();
  }
}
