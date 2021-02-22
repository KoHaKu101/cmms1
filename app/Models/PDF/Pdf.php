<?php

namespace App\Models\PDF;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Codedge\Fpdf\Fpdf\Fpdf;

class Pdf extends Fpdf
{
  function Header()
{
    // Logo
    $this->Image('assets/img/logo13.jpg',15,6,20);
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    // Arial bold 15
    $this->SetFont('THSarabunNew','b',20);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(20, 10, iconv('UTF-8', 'cp874', 'ใบแจ้งซ้อมเครื่องจักร / อุปกรณ์'));
    // Line break(UTF-8,30,10,'',0,0,'C');
    $this->Ln(20);
      $this->SetFont('THSarabunNew','',16);
    $this->Cell(20, 10, iconv('UTF-8', 'cp874', 'วันที่'));
}
// Page footer
function Footer()
  {
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}
