<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineRepair;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Auth;



// class MachineSystemCheckPDFController extends Controller
class MachineHistoryRepairPDFController extends Fpdf
{
  public function RepairHistory($UNID)
    {
      $dataset = Machine::where('UNID',$UNID)->first();
      $machinerepair = MachineRepair::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)
                                      ->where('MACHINE_DOCNO','like','%'.'RE'.'%')
                                      ->get();
      $count = MachineRepair::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)
                                      ->get()->count();
     //add font
     $pdf = new FPDF();
     $logo = "assets/img/logo13.jpg";
     $pdf->AddFont('THSarabunNew','','THSarabunNew.php');
     $pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');

     //หน้ากระดาษ
     $pdf->SetFont('Arial','B',16);
     $pdf->AliasNbPages();
     $pdf->AddPage('P','A4');
     //data header

     // Logo
     $pdf->Cell(26,22,$pdf->Image($logo,12,11,22),1,0,'C',false);

     // Arial bold 15
     $pdf->SetFont('THSarabunNew','b',20);
     $pdf->SetTitle('ประวัติการซ่อม','isUTF8');

     $pdf->Cell(124, 22, iconv('UTF-8', 'cp874', 'ประวัติการซ่อม : '.$dataset->MACHINE_CODE),1,0,'C');
     // header
     $pdf->SetFont('THSarabunNew','',13 );
       $pdf->MultiCell(44, 22, iconv('UTF-8', 'cp874', ''),1,0,'',false);
       $pdf->Text(165.9,18,iconv('UTF-8', 'cp874', 'จำนวนหน้า :'));
       $pdf->Text(161,27,iconv('UTF-8', 'cp874', 'จำนวนการซ่อม :'));
     //line header
     $pdf->SetFont('THSarabunNew','B',14 );
       $pdf->Text(182.5,18,iconv('UTF-8', 'cp874', '______'));
       $pdf->Text(182.5,27,iconv('UTF-8', 'cp874', '______'));
       $pdf->Text(185,18,iconv('UTF-8', 'cp874', $pdf->PageNo().'/{nb}'   ));
       $pdf->Text(185,27,iconv('UTF-8', 'cp874', $count   ));
     $pdf->Ln(0);
     //secondary
     $pdf->SetFont('THSarabunNew','B',16 );
     $pdf->Cell(40,6,iconv('UTF-8', 'cp874', 'รหัสเอกสาร'),1,0);
     $pdf->Cell(32,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', 'วันที่แจ้ง'),1,0,'');
     $pdf->Cell(78,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', 'อาการเสีย'),1,0,'');
     $pdf->Cell(44,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', 'สถานะ'),1,0,'');
     $pdf->Ln();
     $pdf->SetFont('THSarabunNew','',14 );
     foreach ($machinerepair as $row) {
       $pdf->Cell(40,6,iconv('UTF-8', 'cp874', $row->MACHINE_DOCNO),1,0,'');
       $pdf->Cell(32,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $row->MACHINE_DOCDATE),1,0,'');
       $array = array($row->MACHINE_NOTE,$row->MACHINE_CAUSE);

       $detail = implode(" ",$array);
       $pdf->Cell(78,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', $detail),1,0,'');
       $pdf->Cell(44,6,iconv('UTF-8//IGNORE', 'cp874//IGNORE', ($row->status = '9')? 'ดำเนินการสำเร็จ' : 'กำลังดำเนินการ'),1,0,'');

       $pdf->Ln();
     }

     $pdf->Output();

     exit;

  }
  public function PdfPlanPm(){
    $this->pdf = new FPDF();
    $this->pdf->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');

    $this->pdf->SetFont('THSarabunNew','',6);
    $this->pdf->AliasNbPages();
    $this->pdf->AddPage("P", ['210', '297'] );
    $this->pdf->Header('12');


    $date = Carbon::now();//2021-02-15
    $daysToAdd=7;
    $DateEnd = $date->addDays($daysToAdd)->format('Y-m-d');



      $cel=array(8,20,35,10,15,10,10,10,8,8);
      $RowH=4;
      $this->pdf->SetFont('THSarabunNew','',18);
      $this->pdf->Cell(10);
      $this->pdf->Cell(65,10,iconv('UTF-8','TIS-620','Preventive Maintenance Plan  '.'2020 LINE : 1'),0,0,'C');
      $this->pdf->Cell(10);
      $this->pdf->SetFont('THSarabunNew','',12);
      $this->pdf->Cell(110,10,'Page '.$this->pdf->PageNo().'/{nb}',0,0,'R');
      $this->pdf->Ln(10);
    //  $this->Rect( 15,  49, 40, 11, 'D');
    //   $this->SetXY( 15,  54);

      $this->pdf->SetFont('THSarabunNew','',10);
      $this->pdf->Cell(1);
      $cel=array(8,20,35,15,10,10,10,10,8,8);
      $rHigeht=8;
      $this->pdf->Cell($cel[0],$rHigeht,iconv('UTF-8','TIS-620','NO.'),1,0,'C');
      $this->pdf->Cell($cel[1],$rHigeht,iconv('UTF-8','TIS-620','Machine Name.'),1,0,'C');
      $this->pdf->Cell($cel[1],$rHigeht,iconv('UTF-8','TIS-620','Machine No'),1,0,'C');
      $this->pdf->Cell($cel[1],$rHigeht,iconv('UTF-8','TIS-620','Machine Type'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','Rank'),1,0,'C');
      $this->pdf->Cell($cel[4],$rHigeht,iconv('UTF-8','TIS-620','Periods'),1,0,'C');
      $this->pdf->Cell($cel[4],$rHigeht,iconv('UTF-8','TIS-620','TYPE'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','JAN'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','FEB'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','MAR'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','APR'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','MAY'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','JUN'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','JUL'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','AUG'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','SEP'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','OCT'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','NOV'),1,0,'C');
      $this->pdf->Cell($cel[8],$rHigeht,iconv('UTF-8','TIS-620','DEC'),1,0,'C');
      $this->pdf->Ln($rHigeht);
      $m = 0;
      for ($i=0; $i < 30 ; $i++) {
        $this->pdf->Cell(1);
        $this->pdf->Cell($cel[0],$RowH,iconv( 'UTF-8','TIS-620',$i+1),'LR',0,'C');

        $this->pdf->SetFont('THSarabunNew','',10);
      //  $this->pdf->SetTextColor(0,0,0);

        $this->pdf->SetFillColor(192,192,192);
        $this->pdf->Cell($cel[1],$RowH, $this->normalize('TAKAMAZ   - 0T'),'LR',0,'L',);
        $this->pdf->Cell($cel[1],$RowH, $this->normalize('MC-00'.$m++),'LR',0,'L');
        $this->pdf->SetFont('THSarabunNew','',10);
        //$this->pdf->Cell($cel[3],10,iconv( 'UTF-8','TIS-620',$row->PERIOD_DATE_INTERVAL),1,0,'C');

        $this->pdf->Cell($cel[1],$RowH, iconv( 'UTF-8','TIS-620','CNC-LATHE'),'LR',0,'C');
          $this->pdf->SetFont('THSarabunNew','',10);
        $this->pdf->Cell($cel[8],$RowH, $this->normalize('A'),'LR',0,'C');
        $this->pdf->Cell($cel[4],$RowH,iconv( 'UTF-8','TIS-620','3 เดือน'),'LR',0,'C');
        $this->pdf->Cell($cel[4],$RowH,$this->normalize('Plan'),1,0,'C');

          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // มกรา( jan )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          //  กุมภา( FEB )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // มีนา( MAR )
          $this->pdf->Cell($cel[8],$RowH, '02',1,0,'C',true);   // เมษา( APR )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // พฤษภา( MAY )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // มิถุนา( JUN )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // กรกฏา( JUL )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // สิงหา( AUG )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // กันยา( SEP )
          $this->pdf->Cell($cel[8],$RowH, '02',1,0,'C',true);   // ตุลา( OCT )
          $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');          // พฤศจิกา( NOV )
          $this->pdf->Cell($cel[8],$RowH, '',1,1,'C');          // ธันวา( DEC )

        // }

      //  Action
      $this->pdf->Cell(1);
      $this->pdf->Cell($cel[0],$RowH,'','LBR',0,'C');
      $this->pdf->Cell($cel[1],$RowH, '','LBR',0,'L');
      $this->pdf->Cell($cel[1],$RowH,'','LBR',0,'L');

      $this->pdf->Cell($cel[1],$RowH, '','LBR',0,'C');
      $this->pdf->Cell($cel[8],$RowH,'','LBR',0,'C');
      $this->pdf->Cell($cel[4],$RowH, '','LBR',0,'C');
      $this->pdf->Cell($cel[4],$RowH, $this->normalize('ACT'),1,0,'C');


        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');
        $this->pdf->Cell($cel[8],$RowH, '',1,0,'C');

        $this->pdf->Cell($cel[8],$RowH, '',1,1,'C');
      }


    $this->pdf->Output();
 }




 protected function normalize($word)
    {
      // Thanks to: http://stackoverflow.com/questions/3514076/special-characters-in-fpdf-with-php

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
