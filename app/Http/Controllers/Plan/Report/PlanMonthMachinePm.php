<?php

namespace App\Http\Controllers\Plan\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachinePlanPm;
use App\Models\MachineAddTable\MachineRankTable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Auth;
use App\Models\PDF\PDFPlanMonth as PDFPlan;



// class MachineSystemCheckPDFController extends Controller
class PlanMonthMachinePm extends Controller
{

  protected $pdf;
  public function __construct(PDFPlan $PDFPlan){
    $this->middleware('auth');
      $this->pdf = $PDFPlan;
  }
  public function PlanMonthPDF($YEAR = null,$MONTH = NULL){
    $PLAN_YEAR = $YEAR;
    $YEAR_COUNT = MachinePlanPm::where('PLAN_YEAR','=',$PLAN_YEAR)->where('PLAN_MONTH','=',$MONTH)->count();
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
    $HEADER    = MachinePlanPm::select('MACHINE_LINE')->selectraw('MIN(PLAN_MONTH)PLAN_MONTH')
                                                      ->where('PLAN_YEAR',$PLAN_YEAR)
                                                      ->where('PLAN_MONTH','=',$MONTH)
                                                      ->groupBy('MACHINE_LINE')
                                                      ->orderBy('MACHINE_LINE','ASC')
                                                      ->get();
    // img
    $checkpass = "assets/img/pass.png";
    $month_3 = "assets/img/numberplan/3.png";
    $month_6 = "assets/img/numberplan/6.png";
    $month_12 = "assets/img/numberplan/12.png";

    $rank_A = "assets/img/A_Z/A.png";
    $rank_B = "assets/img/A_Z/B.png";
    $rank_C = "assets/img/A_Z/C.png";
    $RANK_CHECK = array('A'=>$rank_A,'B'=>$rank_B,'C'=>$rank_C);
    $RowH=5;

    $rank_month = MachineRankTable::select('MACHINE_RANK_MONTH')->get();
    //end
    $cel=array(8,20,35,15,13,10,10,10,5,10,11,32,25);
    $this->pdf->AddFont('THSarabunNew','','THSarabunNew.php');
    $this->pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
    $this->pdf->SetFont('THSarabunNew','',6);
    $this->pdf->AliasNbPages();
    foreach ($HEADER as $key => $rowheader) {
      $this->pdf->AddPage("L", ['215', '300'] );
      $this->pdf->header($rowheader->MACHINE_LINE,$YEAR,$MONTH);
      $DATA_ROW    = MachinePlanPm::select('*')->selectRaw('dbo.decode_utf8(MACHINE_NAME) as MACHINE_NAME')
                                ->where('PLAN_YEAR','=',$PLAN_YEAR)
                                ->where('PLAN_MONTH','=',$MONTH)
                                ->where('MACHINE_LINE','=',$rowheader->MACHINE_LINE)
                                ->orderBy('MACHINE_CODE')
                                ->get();
      $array_date_plan = array();
      $array_date_act = array();
        // parameter plan and act
        foreach ($DATA_ROW as $dd => $data_array) {
          //plan
          $_dateplan     = Carbon::parse($data_array->PLAN_DATE)->isoFormat('D');
          $_code = $data_array->MACHINE_UNID.$_dateplan;
          $_val  = $_dateplan;
          $array_date_plan[$_code] = $_val;
          //act
          $_datecomplete = Carbon::parse($data_array->COMPLETE_DATE)->isoFormat('D');
          $_codeact = $data_array->MACHINE_UNID.$_datecomplete;
          $_valact  = $_datecomplete;
          $array_date_act[$_codeact] = $_valact;
        }
        // end
        $row_count = 1;
        $limit = 16;

        foreach ($DATA_ROW as $index => $row) {
          $MACHINE_UNID = $row->MACHINE_UNID;

            $this->pdf->Cell($cel[0],$RowH,iconv( 'UTF-8','TIS-620',$row_count++),'LTR',0,'C');
            $this->pdf->SetFont('THSarabunNew','',10);

            $this->pdf->Cell($cel[11],$RowH, iconv('UTF-8', 'cp874',$row->MACHINE_NAME),'LTR',0,'L',);
            $this->pdf->Cell($cel[1],$RowH, $this->normalize($row->MACHINE_CODE),'LTR',0,'L');
            $this->pdf->Cell($cel[12],$RowH, iconv( 'UTF-8','cp874',$row->PM_MASTER_NAME),'LTR',0,'L');
            $this->pdf->Cell($cel[9],$RowH, $this->pdf->Image($RANK_CHECK[$row->PLAN_RANK],$this->pdf->GetX()+2, $this->pdf->GetY()+1,7),'LR',0,'C');
            // $this->pdf->Cell($cel[9],$RowH, $this->normalize($row->PLAN_RANK),'LR',0,'C');


            // $this->pdf->Cell($cel[10],$RowH,iconv( 'UTF-8','cp874',$row->PLAN_PERIOD.' เดือน'),'LR',0,'C');
            if ($row->PLAN_PERIOD == $rank_month[0]->MACHINE_RANK_MONTH) {
            $this->pdf->Cell($cel[10],$RowH,$this->pdf->Image($month_3,$this->pdf->GetX()+2, $this->pdf->GetY()+1,7),'LR',0,'C');
          }elseif ($row->PLAN_PERIOD == $rank_month[1]->MACHINE_RANK_MONTH) {
            $this->pdf->Cell($cel[10],$RowH,$this->pdf->Image($month_6,$this->pdf->GetX()+2, $this->pdf->GetY()+1,7),'LR',0,'C');
          }elseif ($row->PLAN_PERIOD == $rank_month[2]->MACHINE_RANK_MONTH) {
            $this->pdf->Cell($cel[10],$RowH,$this->pdf->Image($month_12,$this->pdf->GetX()-7, $this->pdf->GetY()-2,26),'LR',0,'C');
          }
            $this->pdf->Cell($cel[4],$RowH,$this->normalize('PLAN'),1,0,'C');
            //plan


            for ($i=1; $i <32 ; $i++) {
              $date_current = $MACHINE_UNID.$i;
              $plan_date = false;
              $end_date = $i == 31 ? 1 : 0;
              if (isset($array_date_plan[$date_current])) {
                  $plan_date = true;
                  $this->pdf->SetFillColor(20,63,255);
              }else {
                $this->pdf->SetFillColor(236,236,236);
              }
              $this->pdf->Cell($cel[8],$RowH,'',1,$end_date,'C',true);
            }
            // ส่วนเสริม
            $this->pdf->Cell($cel[0],$RowH,'','LBR',0,'C');
            $this->pdf->Cell($cel[11],$RowH, '','LBR',0,'L');
            $this->pdf->Cell($cel[1],$RowH,'','LBR',0,'L');
            $this->pdf->Cell($cel[12],$RowH, '','LBR',0,'C');
            $this->pdf->Cell($cel[9],$RowH, '','LBR',0,'C');
            $this->pdf->Cell($cel[10],$RowH,'','LBR',0,'C');
            //actture
            $this->pdf->Cell($cel[4],$RowH, $this->normalize('ACT'),1,0,'C');
            for ($i=1; $i <32 ; $i++) {
              $date_current = $MACHINE_UNID.$i;
              $end_date = $i == 31 ? 1 : 0;
              $act_date = '';
              if (isset($array_date_act[$date_current]) && $row->PLAN_STATUS == 'COMPLETE') {
                $act_date = $this->pdf->Image($checkpass,$this->pdf->GetX()+0.5, $this->pdf->GetY(),5);
              }
                $this->pdf->Cell($cel[8],$RowH,$act_date,1,$end_date,'C');
            }
            //เงือนไขการสร้างหน้าใหม่เมื่อครบกำหนดบรรทัด
            if ($row_count == $limit) {
              $limit = $limit+15;
              $this->pdf->AddPage("L", ['215', '300'] );
              $this->pdf->header($rowheader->MACHINE_LINE,$YEAR,$MONTH);
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
