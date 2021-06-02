<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machine;
use App\Models\Machine\MachineRepairREQ;
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
      $machinerepair = MachineRepairREQ::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)
                                      ->where('MACHINE_DOCNO','like','%'.'RE'.'%')
                                      ->get();
      $count = MachineRepairREQ::where('MACHINE_CODE','=',$dataset->MACHINE_CODE)
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

}
