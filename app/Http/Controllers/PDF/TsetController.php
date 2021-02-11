<?php

namespace App\Http\Controllers\PDF;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Machine\Machnie;

class TsetController extends Controller
{
  public function HtmlToPDF(){

    $defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];
    $defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];
    $html = view('machine/pdf/machinepdf')->render();
    $mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => 'A4-L',
    'fontDir' => array_merge($fontDirs, [
    storage_path('fonts/'),
    ]),
    'fontdata' => $fontData + [
    'sarabun_new' => [
    'R' => 'THSarabunNew.ttf',
    'I' => 'THSarabunNew Italic.ttf',
    'B' => 'THSarabunNew Bold.ttf',
    ],
    ],
    'default_font' => 'sarabun_new',
    ]);
    $mpdf->WriteHTML($html);
    $mpdf->Output();
    return $mpdf->Output();
    }
}
