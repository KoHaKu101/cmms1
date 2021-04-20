<?php

namespace App\Models\PDF;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Machine\Machine;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfMachine extends Fpdf
{
  function Header($LINE = NULL)
{
    if ($LINE != NULL) {
      $dataset = Machine::where('MACHINE_LINE',$LINE)->first();
    }else {
      $dataset = Machine::all();
    }

    $logo = "assets/img/logo13.jpg";
    // Logo
    $this->Cell(26,22,$this->Image($logo,12,11,22),1,0,'C',false);
    // font
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    // Arial bold 15
    $this->SetFont('THSarabunNew','b',20);
    $this->Cell(124, 22, iconv('UTF-8', 'cp874', 'เครื่องจักรทั้งหมด'),1,0,'C');
    // header
    $this->SetFont('THSarabunNew','',13 );
      $this->MultiCell(44, 22, iconv('UTF-8', 'cp874', ''),1,0,'',false);
      $this->Text(163.9,18,iconv('UTF-8', 'cp874', 'จำนวนหน้า :'));
      $this->Text(162,27,iconv('UTF-8', 'cp874', 'จำนวนเครื่อง :'));

    //line header
    $this->SetFont('THSarabunNew','B',14 );
      $this->Text(180.5,18,iconv('UTF-8', 'cp874', '___________'));
      $this->Text(180.5,27,iconv('UTF-8', 'cp874', '___________'));
    $this->Ln(0);
    $this->Text(185,18,iconv('UTF-8', 'cp874', $this->PageNo().'/{nb}'   ));
    $this->Text(185,27,iconv('UTF-8', 'cp874', $dataset->count()));
    //data header
     $this->SetFont('THSarabunNew','B',13);
     $this->Cell(22,8,iconv('UTF-8', 'cp874', 'รหัสเครื่องจักร'),1,0,'C');
     $this->Cell(32,8,iconv('UTF-8', 'cp874', 'ชื่อเครื่องจกัร'),1,0,'C');
     $this->Cell(10,8,iconv('UTF-8', 'cp874', 'Line'),1,0,'C');
     $this->Cell(25,8,iconv('UTF-8', 'cp874', 'สถานะเครื่องจักร'),1,0,'C');
     $this->Cell(22,8,iconv('UTF-8', 'cp874', 'วันที่เริ่มใช้งาน'),1,0,'C');
     $this->Cell(53,8,iconv('UTF-8', 'cp874', 'ซื้อจากบริษัท'),1,0,'C');
     $this->Cell(30,8,iconv('UTF-8', 'cp874', 'ชนิดเครื่องจักร'),1,0,'C');
     $this->Ln();

}
// Page footer
function Footer()
  {
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    $this->SetY(-20);
    // footer
    $this->SetX(15);


    // Page number
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');

  }

}
