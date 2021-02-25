<?php


		require '../vendor/autoload.php';
		use PhpOffice\PhpSpreadsheet\Spreadsheet;
		use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
		Use PhpOffice\PhpSpreadsheet\IOFactory;

		// $inputFileName = 'storage/'.$location->FILE_UPLOAD;
		// $inputFileType = 'Xlsx';
		// $sheetname = 'Data Sheet #3';

		if($location->FILE_UPLOAD != '')
{
 $allowed_extension = array('xls', 'xlsx');
 $file_array = explode(".", $location->FILE_UPLOAD );
 $file_extension = end($file_array);
 if(in_array($file_extension, $allowed_extension))
 {
  $reader = IOFactory::createReader('Xlsx');
  $spreadsheet = $reader->load('storage/'.$location->FILE_UPLOAD );
  $writer = IOFactory::createWriter($spreadsheet, 'Html');
  $message = $writer->save('php://output');
 }
 else
 {
  $message = '<div class="alert alert-danger">Only .xls or .xlsx file allowed</div>';
 }
}
else
{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
?>
