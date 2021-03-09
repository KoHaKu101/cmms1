<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineRepair;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Codedge\Fpdf\Fpdf\Fpdf;



class MachinePDFController extends Controller
{

  protected $pdf;

  public function __construct(\App\Models\PDF\PdfMachine $pdf){

    $this->middleware('auth');

      $this->fpdf = $pdf;

  }

  public function MachinePdf()
    {

      $dataset = Machine::all();
     //add font


     $this->fpdf->AddFont('THSarabunNew','','THSarabunNew.php');
     $this->fpdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
     //หน้ากระดาษ
     $this->fpdf->SetFont('THSarabunNew','',14 );
     $this->fpdf->AliasNbPages();
     $this->fpdf->AddPage('P','A4');

     // $this->fpdf->SetFont('THSarabunNew','',14 );



      $this->fpdf->SetFont('THSarabunNew','',12);
  foreach($dataset as $row){


    $this->fpdf->Cell(22,6,iconv('UTF-8', 'cp874', $row->MACHINE_CODE),1,0,'');
    $this->fpdf->Cell(32,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->MACHINE_NAME),1,0,'');
    $this->fpdf->Cell(10,6,iconv('UTF-8', 'cp874', $row->MACHINE_LINE),1,0,'C');
    $this->fpdf->Cell(25,6,iconv('UTF-8', 'cp874', ($row->MACHINE_CHECK == '1' ? 'หยุดทำงาน'
                                      :( $row->MACHINE_CHECK == '2' ? 'เครื่องทำงาน'
                                      :( $row->MACHINE_CHECK == '3' ? 'เครื่องกำลังซ่อม'
                                      :( $row->MACHINE_CHECK == '4' ? 'เครื่องจำหน่าย' : 'สถานะไม่แน่ชัด' )))) ),1,0,'C');
    $this->fpdf->Cell(22,6,iconv('UTF-8', 'cp874', $row->MACHINE_STARTDATE),1,0,'');
    $this->fpdf->SetFont('THSarabunNew','',11);
    $this->fpdf->Cell(53,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->PURCHASE_FORM),1,0,'');
    $this->fpdf->SetFont('THSarabunNew','',12);
    $this->fpdf->Cell(30,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->MACHINE_TYPE),1,0,'');

    $this->fpdf->Ln();
      }
      $this->fpdf->Output();


     exit;

  }
}
