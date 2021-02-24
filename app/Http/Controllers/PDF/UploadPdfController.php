<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Upload;
// use App\Models\PDF\Pdf;
// use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Storage;
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

    $dataset = Upload::where('UNID',$UNID)->first();
    $file = Storage::url($dataset->FILE_UPLOAD);
    return "<img src='".$file."'/>";

  }
}
