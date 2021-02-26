<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Upload;
// use App\Models\PDF\Pdf;
// use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

use RealRashid\SweetAlert\Facades\Alert;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

Use PhpOffice\PhpSpreadsheet\IOFactory;
use Maatwebsite\Excel\Facades\Excel;



class UploadPdfController extends Controller
{
  protected $pdf;

  public function __construct(){

    $this->middleware('auth');

  }

  public function Uploadpdf($UNID)
  {
    $location = Upload::where('UNID',$UNID)->first();

        return view('machine/showupload/upload', compact('location'));
    // dd($spreadsheet);

  }
}
