<?php

namespace App\Models\PDF;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Codedge\Fpdf\Fpdf\Fpdf;

class PdfRepair extends Fpdf
{
  function Header()
{
    $logo = "assets/img/logo13.jpg";
    // Logo
    $this->Cell(26,22,$this->Image($logo,12,11,22),1,0,'C',false);
    // font
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    // Arial bold 15
    $this->SetFont('THSarabunNew','b',20);
    $this->Cell(100, 22, iconv('UTF-8', 'cp874', 'ใบแจ้งซ้อมเครื่องจักร / อุปกรณ์'),1,0,'C');
    // header
    $this->SetFont('THSarabunNew','',13 );
      $this->MultiCell(64, 22, iconv('UTF-8', 'cp874', ''),1,0,'',false);
      $this->Text(147.9,16,iconv('UTF-8', 'cp874', 'เลขที่ :'));
      $this->Text(139,22,iconv('UTF-8', 'cp874', 'วันที่แจ้งซ่อม :'));
      $this->Text(139,28,iconv('UTF-8', 'cp874', 'เวลาแจ้งซ่อม :'));
    //line header
    $this->SetFont('THSarabunNew','B',14 );
      $this->Text(158.5,16,iconv('UTF-8', 'cp874', '____________________'));
      $this->Text(158.5,22,iconv('UTF-8', 'cp874', '____________________'));
      $this->Text(158.5,28,iconv('UTF-8', 'cp874', '____________________'));
    $this->Ln(0);
    //secondary
    $this->Cell(190, 6, iconv('UTF-8', 'cp874', 'ผู้แจ้งซ่อมกรอกรายละเอียด'),1,0,'C');
    $this->Ln(6);
}
// Page footer
function Footer()
  {
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    $this->SetY(-20);
    // footer
    $this->SetX(15);
      $this->SetFont('THSarabunNew','b',13);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', 'ต้นฉบับ'),0,0,'C');
      $this->SetX(14.9);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', '______'),0,0,'C');
      $this->SetX(35);
      $this->SetFont('THSarabunNew','',13);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', 'เก็บไว้ที่แผนกซ่อมบำรุง'),0,0,'C');
      $this->SetFont('THSarabunNew','b',13);
      $this->SetX(70);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', 'สำเนาที่1'),0,0,'C');
      $this->SetX(69.9);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', '_______'),0,0,'C');
      $this->SetX(110);
      $this->SetFont('THSarabunNew','',13);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', 'เก็บไว้ที่ผู้แจ้งซ่อม(หลังบึนทึกผลการตรวจสอบเบื้องต้น)'),0,0,'C');
      $this->SetX(180);
      $this->SetFont('THSarabunNew','',13);
      $this->Cell(1, 8, iconv('UTF-8', 'cp874', 'FM-MA-05 REV.4:15 Aug 18'),0,0,'C');

    // Page number
    // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
