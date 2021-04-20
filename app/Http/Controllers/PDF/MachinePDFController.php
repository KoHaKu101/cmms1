<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;
use Codedge\Fpdf\Fpdf\Fpdf;



class MachinePDFController extends Fpdf
{
  public function MachinePdf($LINE = NULL)
    {
      if ($LINE != NULL) {
        $dataset = Machine::where('MACHINE_LINE',$LINE)->get();
      }else {
        $dataset = Machine::all();
      }
    //setting******************************************************************
      $pdf = new FPDF();
      $logo = "assets/img/logo13.jpg";
      // font
      $pdf->AddFont('THSarabunNew','','THSarabunNew.php');
      $pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
      //หน้ากระดาษ
      $pdf->SetFont('THSarabunNew','',14 );
        $pdf->AliasNbPages();
        $pdf->AddPage('P','A4');
    //end setting**************************************************************
    //head ********************************************************************
      // Logo
      $pdf->Cell(26,22,$pdf->Image($logo,12,11,22),1,0,'C',false);
      // header
      $pdf->SetFont('THSarabunNew','b',20);
        $pdf->Cell(124, 22, iconv('UTF-8', 'cp874', 'เครื่องจักรทั้งหมด'),1,0,'C');
      $pdf->SetFont('THSarabunNew','',13 );
        $pdf->MultiCell(44, 22, iconv('UTF-8', 'cp874', ''),1,0,'',false);
        $pdf->Text(163.9,18,iconv('UTF-8', 'cp874', 'จำนวนหน้า :'));
        $pdf->Text(162,27,iconv('UTF-8', 'cp874', 'จำนวนเครื่อง :'));
      //page NO
      $pdf->SetFont('THSarabunNew','B',14 );
        $pdf->Text(180.5,18,iconv('UTF-8', 'cp874', '___________'));
        $pdf->Text(180.5,27,iconv('UTF-8', 'cp874', '___________'));
        $pdf->Ln(0);
        $pdf->Text(185,18,iconv('UTF-8', 'cp874', $pdf->PageNo().'/{nb}'   ));
        $pdf->Text(185,27,iconv('UTF-8', 'cp874', $dataset->count()));
      //data header
      $pdf->SetFont('THSarabunNew','B',13);
       $pdf->Cell(22,8,iconv('UTF-8', 'cp874', 'รหัสเครื่องจักร'),1,0,'C');
       $pdf->Cell(32,8,iconv('UTF-8', 'cp874', 'ชื่อเครื่องจกัร'),1,0,'C');
       $pdf->Cell(10,8,iconv('UTF-8', 'cp874', 'Line'),1,0,'C');
       $pdf->Cell(25,8,iconv('UTF-8', 'cp874', 'สถานะเครื่องจักร'),1,0,'C');
       $pdf->Cell(22,8,iconv('UTF-8', 'cp874', 'วันที่เริ่มใช้งาน'),1,0,'C');
       $pdf->Cell(53,8,iconv('UTF-8', 'cp874', 'ซื้อจากบริษัท'),1,0,'C');
       $pdf->Cell(30,8,iconv('UTF-8', 'cp874', 'ชนิดเครื่องจักร'),1,0,'C');
       $pdf->Ln();
    //end head ****************************************************************

    //body ********************************************************************
      $pdf->SetFont('THSarabunNew','',12);
        foreach($dataset as $row){
          $pdf->Cell(22,6,iconv('UTF-8', 'cp874', $row->MACHINE_CODE),1,0,'');
          $pdf->Cell(32,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->MACHINE_NAME),1,0,'');
          $pdf->Cell(10,6,iconv('UTF-8', 'cp874', $row->MACHINE_LINE),1,0,'C');
          $pdf->Cell(25,6,iconv('UTF-8', 'cp874', ($row->MACHINE_CHECK == '1' ? 'หยุดทำงาน'
                                        :( $row->MACHINE_CHECK == '2' ? 'เครื่องทำงาน'
                                        :( $row->MACHINE_CHECK == '3' ? 'เครื่องกำลังซ่อม'
                                        :( $row->MACHINE_CHECK == '4' ? 'เครื่องจำหน่าย' : 'สถานะไม่แน่ชัด' ))))
                                ),1,0,'C');
          $pdf->Cell(22,6,iconv('UTF-8', 'cp874', $row->MACHINE_STARTDATE),1,0,'');
          $pdf->SetFont('THSarabunNew','',11);
          $pdf->Cell(53,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->PURCHASE_FORM),1,0,'');
          $pdf->SetFont('THSarabunNew','',12);
          $pdf->Cell(30,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->MACHINE_TYPE),1,0,'');
          $pdf->Ln();
      }
    //end body ****************************************************************

    // footer  ****************************************************************
      $this->AddFont('THSarabunNew','','THSarabunNew.php');
      $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
      $this->SetY(-20);
      $this->SetX(15);
   //end footer  **************************************************************

      $pdf->Output();

     exit;

  }
}
