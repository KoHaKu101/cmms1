<?php

namespace App\Http\Controllers\Plan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\MachinePlanPm;
use App\Models\Machine\Pmplanresult;
use App\Models\Machine\MasterIMPSGroup;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Codedge\Fpdf\Fpdf\Fpdf;
use Auth;
use App\Models\PDF\PDFPlanHeaderFooter as planpdf ;



// class MachineSystemCheckPDFController extends Controller
class MachinePlanPmFormPDF extends Controller
{
  protected $pdf;
  protected $title;
  public function __construct(planpdf $PlanheaderFooter){
    $this->middleware('auth');
      $this->pdf = $PlanheaderFooter;
  }

  public function PDFForm(Request $request,$UNID = NULL)
    {

      $PM_PLAN = MachinePlanPm::where('UNID',$UNID)->first();
      $PM_PLAN_RESULT_FIRST   = Pmplanresult::where('PM_PLAN_UNID',$UNID)->first();

      $PM_PLAN_RESULT_LOOP    = Pmplanresult::select('PM_MASTER_LIST_UNID','PM_MASTER_LIST_NAME','PM_MASTER_LIST_INDEX')
                                         ->where('PM_PLAN_UNID',$UNID)
                                         ->groupBy('PM_MASTER_LIST_NAME')
                                         ->groupBy('PM_MASTER_LIST_INDEX')
                                         ->groupBy('PM_MASTER_LIST_UNID')
                                         ->orderBy('PM_MASTER_LIST_INDEX','ASC')
                                         ->get();
      $PM_PLAN_RESULT_LOOPSUB = Pmplanresult::where('PM_PLAN_UNID',$UNID)
                                            ->get();
     //add font


     $checkpass = "assets/img/pass.png";
     $checkfail = "assets/img/fail.png";
     $this->pdf->AddFont('THSarabunNew','','THSarabunNew.php');
     $this->pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
     $this->pdf->SetFont('Arial','B',16);
     //หน้ากระดาษ
     $this->pdf->AddPage('L','A4');
     $this->pdf->header($UNID);


     $this->pdf->AliasNbPages();

     $this->pdf->SetFont('THSarabunNew','B',14 );
     foreach ($PM_PLAN_RESULT_LOOP as $index => $dataset) {
       $i = 1;
       $this->pdf->SetFont('THSarabunNew','B',18 );
       $this->pdf->Cell(67.5,8, iconv('UTF-8', 'cp874',$dataset->PM_MASTER_LIST_NAME),'LTR',0,'L',);
       $this->pdf->SetFont('THSarabunNew','B',12 );
    foreach ($PM_PLAN_RESULT_LOOPSUB->where('PM_MASTER_LIST_UNID','',$dataset->PM_MASTER_LIST_UNID) as $index => $dataitem) {
       $this->pdf->Cell(125.5,8, iconv('UTF-8', 'cp874',$dataitem->PM_MASTER_DETAIL_NAME),'LBR',0,'L',);
       $this->pdf->Cell(15.5,8, iconv('UTF-8', 'cp874',$dataitem->PM_MASTER_DETAIL_VALUE_STD),'BR',0,'C',);

       $this->pdf->Cell(30.5,8, iconv('UTF-8', 'cp874',(double)$dataitem->PM_MASTER_DETAIL_VALUE_STD_MAX.' / '.(double)$dataitem->PM_MASTER_DETAIL_VALUE_STD_MIN),'BR',0,'C',);
       $this->pdf->SetFont('Arial','B',8 );
       $this->pdf->Cell(20.5,8, iconv('UTF-8', 'cp874',$dataitem->PM_MASTER_DETAIL_INPUT),'BR',0,'C',);
       $this->pdf->SetFont('THSarabunNew','B',12 );
       if ($dataitem->PM_MASTER_DETAIL_RESULT == "PASS") {
         $result = $checkpass;
       }else {
         $result = $checkfail;
       }
        $this->pdf->Cell(20.5,8, iconv('UTF-8', 'cp874',$this->pdf->Image($result,$this->pdf->GetX()+5, $this->pdf->GetY(),10)),'BR',1,'C',);
       if ($i++ == $PM_PLAN_RESULT_LOOPSUB->where('PM_MASTER_LIST_UNID','',$dataset->PM_MASTER_LIST_UNID)->count()) {
       }else {
          $this->pdf->Cell(67.5,8, iconv('UTF-8', 'cp874',''),'LR',0,'C',);
       }
     }
   }
   $this->pdf->Cell(67.5,8, iconv('UTF-8', 'cp874',''),'T',0,'C',);
     $this->pdf->Output();
     exit;

}


}
