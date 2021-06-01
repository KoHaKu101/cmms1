<?php

namespace App\Http\Controllers\Plan\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachinePlanPm;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Auth;
use App\Models\PDF\PDFPlanYear as PDFPlan;



// class MachineSystemCheckPDFController extends Controller
class PlanYearMachinePm extends Controller
{

  protected $pdf;
  public function __construct(PDFPlan $PDFPlan){
    $this->middleware('auth');
      $this->pdf = $PDFPlan;
  }
  public function PlanYearPDF($YEAR = null){
    $PLAN_YEAR = $YEAR;
    $YEAR_COUNT = MachinePlanPm::where('PLAN_YEAR','=',$PLAN_YEAR)->count();
    if($YEAR_COUNT == 0) {
      return '<body style="background-color:powderblue;">
              <br/><h1 align="center" style="color:red;"> No Data </h1>
              <div align="center">
              <button onclick="javascript:window.close()"
              style="background: #1572e8!important;border-color:#1572e8!important;font-size:14px;
              padding:.65rem 1.4rem;font-size:14px;opacity:1;border-radius: 3px;
              padding: 5px 9px;color:white">
              close </button></div></body>';
    }
    $HEADER    = MachinePlanPm::select('MACHINE_LINE')->where('PLAN_YEAR',$PLAN_YEAR)
                                                      ->groupBy('MACHINE_LINE')
                                                      ->orderBy('MACHINE_LINE','ASC')
                                                      ->get();
  // img
  $month_3 = "assets/img/numberplan/3.png";
  $month_6 = "assets/img/numberplan/6.png";
  $month_12 = "assets/img/numberplan/12.png";

    $rank_A = "assets/img/A_Z/A.png";
    $rank_B = "assets/img/A_Z/B6.png";
    $rank_C = "assets/img/A_Z/C1.png";
    $RANK_CHECK = array('A'=>$rank_A,'B'=>$rank_B,'C'=>$rank_C);
 //end
    $this->pdf->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    $this->pdf->SetFont('THSarabunNew','',6);
    $this->pdf->AliasNbPages();
    $RowH=4;
//ตำแหน่ง array (0,1, 2, 3,  4,5, 6, 7, 8, 9,10,11);
    $cel=array(8,20,35,15,10,10,10,10,7,8,13,28,22);
    foreach ($HEADER as $key => $dataheader) {
      $this->pdf->AddPage("P", ['210', '305'] );
      $this->pdf->header($dataheader->MACHINE_LINE,$PLAN_YEAR);
      $m = 1;
      $DATA_ROW    = MachinePlanPm::select('MACHINE_UNID','PM_MASTER_UNID')->selectRaw('MIN(MACHINE_CODE)MACHINE_CODE
                                            , MIN(PM_MASTER_NAME)PM_MASTER_NAME
                                            , MIN(PLAN_PERIOD)PLAN_PERIOD
                                            , MIN(MACHINE_NAME)MACHINE_NAME
                                            , MIN(MACHINE_LINE)MACHINE_LINE
                                            , MIN(PLAN_RANK)PLAN_RANK
                                            , dbo.decode_utf8(MIN(MACHINE_NAME)) as NAME_MACHINE
                                            , MIN(PLAN_STATUS)PLAN_STATUS
                                            , MIN(COMPLETE_DATE)COMPLETE_DATE')
                                ->where('PLAN_YEAR','=',$PLAN_YEAR)
                                ->where('MACHINE_LINE','=',$dataheader->MACHINE_LINE)
                                ->groupBy('MACHINE_UNID')
                                ->groupBy('PM_MASTER_UNID')
                                ->orderBy('MACHINE_CODE')
                                ->get();
     $PLAN_MONT = MachinePlanPm::select( 'MACHINE_UNID','PLAN_MONTH','PM_MASTER_UNID')
                                ->selectRaw('MAX(COMPLETE_DATE)COMPLETE_DATE, MIN(PLAN_DATE)PLAN_DATE')
                                ->where('PLAN_YEAR','=' ,$PLAN_YEAR)
                                ->groupBy('PM_MASTER_UNID')
                                ->groupBy('MACHINE_UNID')
                                ->groupBy('PLAN_MONTH')
                                ->get();

                                  $PLAN_VALUE = array();
                                  $ACT_VALUE  = array();
                                   foreach($PLAN_MONT as $rowA) {
                                     $_CODE =   $rowA->MACHINE_UNID.$rowA->PLAN_MONTH.($rowA->PM_MASTER_UNID);
                                     // plan
                                     $_VAL  =  date('d', strtotime( $rowA->PLAN_DATE));
                                     $PLAN_VALUE[$_CODE] = $_VAL;
                                     // act
                                     $_dateact =  date('d-m-Y',strtotime($rowA->COMPLETE_DATE));
                                     $_VALACT = '';
                                     if ($_dateact != '01-01-1970') {
                                       $_VALACT = date('d',strtotime($rowA->COMPLETE_DATE));
                                     }
                                     $ACT_VALUE[$_CODE] = $_VALACT;
                                   }
         $limit = 31;
        foreach ($DATA_ROW as $index => $row) {
          $MACHINE_UNID = $row->MACHINE_UNID;
          $this->pdf->Cell($cel[0],$RowH,iconv( 'UTF-8','TIS-620',$m++),'LR',0,'C');
          $this->pdf->SetFont('THSarabunNew','',10);
          $this->pdf->SetFillColor(192,192,192);
          $this->pdf->Cell($cel[11],$RowH, iconv('UTF-8', 'cp874',$row->NAME_MACHINE),'LR',0,'L',);
          $this->pdf->Cell($cel[1],$RowH, $this->normalize($row->MACHINE_CODE),'LR',0,'L');
          $this->pdf->Cell($cel[12],$RowH, iconv( 'UTF-8','cp874',$row->PM_MASTER_NAME),'LR',0,'L');
          // $this->pdf->Cell($cel[9],$RowH, $this->normalize($row->PLAN_RANK),'LR',0,'C');
          $this->pdf->Cell($cel[9],$RowH, $this->pdf->Image($RANK_CHECK[$row->PLAN_RANK],$this->pdf->GetX()+0.5, $this->pdf->GetY()+0.5,7),'LR',0,'C');
          if ($row->PLAN_PERIOD ==  3) {
          $this->pdf->Cell($cel[10],$RowH,$this->pdf->Image($month_3,$this->pdf->GetX()+3, $this->pdf->GetY()+0.5,7),'LR',0,'C');
        }elseif ($row->PLAN_PERIOD == 6) {
          $this->pdf->Cell($cel[10],$RowH,$this->pdf->Image($month_6,$this->pdf->GetX()+3, $this->pdf->GetY()+0.5,7),'LR',0,'C');
        }elseif ($row->PLAN_PERIOD == 12) {
          $this->pdf->Cell($cel[10],$RowH,$this->pdf->Image($month_12,$this->pdf->GetX()-6, $this->pdf->GetY()-3,27),'LR',0,'C');
        }
          // $this->pdf->Cell($cel[10],$RowH,iconv( 'UTF-8','cp874',$row->PLAN_PERIOD.' เดือน'),'LR',0,'C');
          $this->pdf->Cell($cel[4],$RowH,$this->normalize('PLAN'),1,0,'C');
          //plan
          for ($i=1; $i < 13 ; $i++) {
            $MACHINE_CODE_INDEX = $row->MACHINE_UNID.$i.($row->PM_MASTER_UNID);
            $PLAN_DATE = '' ;
            $FILL_COLOR = false;
            $end_month = $i == 12 ? 1 : 0;
            if (isset($PLAN_VALUE[$MACHINE_CODE_INDEX])) {
                $PLAN_DATE = $PLAN_VALUE[$MACHINE_CODE_INDEX];
                $FILL_COLOR = true;
            }
              $this->pdf->Cell($cel[8],$RowH, $PLAN_DATE,1,$end_month,'C',$FILL_COLOR);
            }


          $this->pdf->Cell($cel[0],$RowH,'','LBR',0,'C');
          $this->pdf->Cell($cel[11],$RowH, '','LBR',0,'L');
          $this->pdf->Cell($cel[1],$RowH,'','LBR',0,'L');
          $this->pdf->Cell($cel[12],$RowH, '','LBR',0,'C');
          $this->pdf->Cell($cel[9],$RowH,'','LBR',0,'C');
          $this->pdf->Cell($cel[10],$RowH, '','LBR',0,'C');
          $this->pdf->Cell($cel[4],$RowH, $this->normalize('ACT'),1,0,'C');
          //actture
          for ($i=1; $i < 13 ; $i++) {
            $MACHINE_CODE_INDEX = $row->MACHINE_UNID.$i.($row->PM_MASTER_UNID);
            $DOC_STATUS = $row->PLAN_STATUS;
            $ACT_DATE = '' ;
            $end_month = $i == 12 ? 1 : 0;
            if (isset($ACT_VALUE[$MACHINE_CODE_INDEX]) && $DOC_STATUS == 'COMPLETE') {
                $ACT_DATE = $ACT_VALUE[$MACHINE_CODE_INDEX];
            }
              $this->pdf->Cell($cel[8],$RowH, $ACT_DATE,1,$end_month,'C');
          }
          if ($m == $limit) {
            $limit = $limit+30;
            $this->pdf->AddPage("P", ['210', '305'] );
            $this->pdf->header($dataheader->MACHINE_LINE,$PLAN_YEAR);
          }
        }

        }



    $this->pdf->Output();
     exit;
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
