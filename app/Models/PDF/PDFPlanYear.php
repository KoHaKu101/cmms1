<?php

namespace App\Models\PDF;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Codedge\Fpdf\Fpdf\Fpdf;
use App\Models\Machine\MachinePlanPm;
use App\Models\Machine\Pmplanresult;

class PDFPlanYear extends Fpdf
{
  private $LINE;
  function Header($MACHINE_LINE = NULL,$PLAN_YEAR = NULL){
    if ($MACHINE_LINE){
       $this->LINE = $MACHINE_LINE ;

    $cel=array(8,20,35,10,15,10,10,10,8,8);
    $RowH=4;
        $this->SetTitle('รายงานประจำปี '.$PLAN_YEAR,'isUTF8');
    $logo = "assets/img/logo13.jpg";
    // Logo

    // font
    $this->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    $this->Rect(10, 10, 193, 262, 'D');
    // Arial bold 15
    $this->SetFont('THSarabunNew','b',18);
    $this->Cell(26,11,$this->Image($logo,$this->GetX()+3, $this->GetY()+2,20),'LTR',0,'C',false);
    $this->Cell(107, 11, $this->normalize('Preventive Maintenance Plan'),'LTR',0,'C');

    $this->SetFont('THSarabunNew','b',14);
    $this->Cell(20,11, $this->normalize('Approved'),'LTBR',0,'C');
    $this->Cell(20,11, $this->normalize('Checked'),'LTBR',0,'C');
    $this->Cell(20,11, $this->normalize('Issued'),'LTBR',1,'C');
    $this->Cell(26,11,'','LBR',0,'C',false);

    $this->SetFont('THSarabunNew','b',18);
    $this->Cell(107, 11, iconv('UTF-8', 'cp874', ' ปี '.$PLAN_YEAR.' LINE : '.$this->LINE.''),'LBR',0,'C');
    $this->Cell(20,11, '','LTBR',0,'C');
    $this->Cell(20,11, '','LTBR',0,'C');
    $this->Cell(20,11, '','LTBR',1,'C');

    $this->SetFont('THSarabunNew','',10);
    $cel=array(8,20,35,15,10,10,10,10,7,8,13,28,22);
    $rHigeht=8;
    $this->Cell($cel[0],$rHigeht,$this->normalize('NO.'),1,0,'C');
    $this->Cell($cel[11],$rHigeht,$this->normalize('Machine Name.'),1,0,'C');
    $this->Cell($cel[1],$rHigeht,$this->normalize('Machine No'),1,0,'C');
    $this->Cell($cel[12],$rHigeht,$this->normalize('Machine Type'),1,0,'C');
    $this->Cell($cel[9],$rHigeht,$this->normalize('Rank'),1,0,'C');
    $this->Cell($cel[10],$rHigeht,$this->normalize('Periods'),1,0,'C');
    $this->Cell($cel[4],$rHigeht,$this->normalize('TYPE'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('JAN'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('FEB'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('MAR'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('APR'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('MAY'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('JUN'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('JUL'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('AUG'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('SEP'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('OCT'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('NOV'),1,0,'C');
    $this->Cell($cel[8],$rHigeht,$this->normalize('DEC'),1,0,'C');
    $this->Ln($rHigeht);
  }
}
function Footer(){
  // Position at 1.5 cm from bottom
 $this->SetY(-20);
 // Arial italic 8
 $this->SetFont('Arial','B',8);
 // Page number
  $this->SetFont('THSarabunNew','B',12);
  $this->Cell(130,7, iconv('UTF-8', 'cp874','อายุการจัดเก็บ : 2 ปี'),0,0,'L',);
  $this->Cell(63,7, iconv('UTF-8', 'cp874','FM-MA-04 REV.7 : 1 Nov 09'),0,1,'R',);

}
protected function normalize($word)
   {
     // Thanks to: http://stackoverflow.com/questions/3514076/special-characters-in-fpdf-with-php

     $word = str_replace("✓","%42",$word);
     $word = str_replace("@","%40",$word);
     $word = str_replace("`","%60",$word);
     $word = str_replace("¢","%A2",$word);
     $word = str_replace("£","%A3",$word);
     $word = str_replace("¥","%A5",$word);
     $word = str_replace("|","%A6",$word);
     $word = str_replace("«","%AB",$word);
     $word = str_replace("¬","%AC",$word);
     $word = str_replace("¯","%AD",$word);
     $word = str_replace("º","%B0",$word);
     $word = str_replace("±","%B1",$word);
     $word = str_replace("ª","%B2",$word);
     $word = str_replace("µ","%B5",$word);
     $word = str_replace("»","%BB",$word);
     $word = str_replace("¼","%BC",$word);
     $word = str_replace("½","%BD",$word);
     $word = str_replace("¿","%BF",$word);
     $word = str_replace("À","%C0",$word);
     $word = str_replace("Á","%C1",$word);
     $word = str_replace("Â","%C2",$word);
     $word = str_replace("Ã","%C3",$word);
     $word = str_replace("Ä","%C4",$word);
     $word = str_replace("Å","%C5",$word);
     $word = str_replace("Æ","%C6",$word);
     $word = str_replace("Ç","%C7",$word);
     $word = str_replace("È","%C8",$word);
     $word = str_replace("É","%C9",$word);
     $word = str_replace("Ê","%CA",$word);
     $word = str_replace("Ë","%CB",$word);
     $word = str_replace("Ì","%CC",$word);
     $word = str_replace("Í","%CD",$word);
     $word = str_replace("Î","%CE",$word);
     $word = str_replace("Ï","%CF",$word);
     $word = str_replace("Ð","%D0",$word);
     $word = str_replace("Ñ","%D1",$word);
     $word = str_replace("Ò","%D2",$word);
     $word = str_replace("Ó","%D3",$word);
     $word = str_replace("Ô","%D4",$word);
     $word = str_replace("Õ","%D5",$word);
     $word = str_replace("Ö","%D6",$word);
     $word = str_replace("Ø","%D8",$word);
     $word = str_replace("Ù","%D9",$word);
     $word = str_replace("Ú","%DA",$word);
     $word = str_replace("Û","%DB",$word);
     $word = str_replace("Ü","%DC",$word);
     $word = str_replace("Ý","%DD",$word);
     $word = str_replace("Þ","%DE",$word);
     $word = str_replace("ß","%DF",$word);
     $word = str_replace("à","%E0",$word);
     $word = str_replace("á","%E1",$word);
     $word = str_replace("â","%E2",$word);
     $word = str_replace("ã","%E3",$word);
     $word = str_replace("ä","%E4",$word);
     $word = str_replace("å","%E5",$word);
     $word = str_replace("æ","%E6",$word);
     $word = str_replace("ç","%E7",$word);
     $word = str_replace("è","%E8",$word);
     $word = str_replace("é","%E9",$word);
     $word = str_replace("ê","%EA",$word);
     $word = str_replace("ë","%EB",$word);
     $word = str_replace("ì","%EC",$word);
     $word = str_replace("í","%ED",$word);
     $word = str_replace("î","%EE",$word);
     $word = str_replace("ï","%EF",$word);
     $word = str_replace("ð","%F0",$word);
     $word = str_replace("ñ","%F1",$word);
     $word = str_replace("ò","%F2",$word);
     $word = str_replace("ó","%F3",$word);
     $word = str_replace("ô","%F4",$word);
     $word = str_replace("õ","%F5",$word);
     $word = str_replace("ö","%F6",$word);
     $word = str_replace("÷","%F7",$word);
     $word = str_replace("ø","%F8",$word);
     $word = str_replace("ù","%F9",$word);
     $word = str_replace("ú","%FA",$word);
     $word = str_replace("û","%FB",$word);
     $word = str_replace("ü","%FC",$word);
     $word = str_replace("ý","%FD",$word);
     $word = str_replace("þ","%FE",$word);
     $word = str_replace("ÿ","%FF",$word);

     return urldecode($word);
   }
}
// Page footer
