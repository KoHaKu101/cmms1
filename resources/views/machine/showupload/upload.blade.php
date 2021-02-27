<?php


		require '../vendor/autoload.php';
		use PhpOffice\PhpSpreadsheet\Spreadsheet;
		use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
		Use PhpOffice\PhpSpreadsheet\IOFactory;
		use PhpOffice\PhpWord\PhpWord;
		// use Illuminate\Contracts\Routing\ResponseFactory;
		use setasign\Fpdi\Fpdi;
		use setasign\Fpdi\PdfReader;
		use Codedge\Fpdf\Fpdf\Fpdf;

		// $inputFileName = 'storage/'.$location->FILE_UPLOAD;
		// $inputFileType = 'Xlsx';
		// $sheetname = 'Data Sheet #3';

		if($location->FILE_UPLOAD != '')
	{
			$fileType = File::extension($location->FILE_UPLOAD);
			//****************	Mircrosoft Excel ********************************
			if ($fileType = 'xls'&&'xlsx') {
				$extension_xls = array('xls');
				$extension_xlsx = array('xlsx');
			  $file_array = explode(".", $location->FILE_UPLOAD );
			  $file_extension = end($file_array);

			  if(in_array($file_extension, $extension_xls)){
			   $reader = IOFactory::createReader('Xls');
			   $spreadsheet = $reader->load('storage/'.$location->FILE_UPLOAD );
			   $writer = IOFactory::createWriter($spreadsheet, 'Html');
			   $message = $writer->save('php://output');

			 }if(in_array($file_extension, $extension_xlsx)){
				$reader = IOFactory::createReader('Xlsx');
				$spreadsheet = $reader->load('storage/'.$location->FILE_UPLOAD );
				$writer = IOFactory::createWriter($spreadsheet, 'Html');
				$message = $writer->save('php://output');
			}

			//****************	Mircrosoft Word ********************************
		}if ($fileType = 'doc'&&'docx') {
				$extension_doc = array('doc');
				$extension_docx = array('docx');
				$file_array = explode(".", $location->FILE_UPLOAD );
				$file_extension = end($file_array);

					if(in_array($file_extension, $extension_doc)){

							$fileword = 'storage/'.$location->FILE_UPLOAD;
							$phpWord = \PhpOffice\PhpWord\IOFactory::createReader('MSDOC')->load($fileword);
							$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
							$message = $objWriter->save('php://output');

						}if (in_array($file_extension,$extension_docx)) {
							$fileword = 'storage/'.$location->FILE_UPLOAD;
							$phpWord = \PhpOffice\PhpWord\IOFactory::createReader('Word2007')->load($fileword);
							$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
							$message = $objWriter->save('php://output');
						}
			}if ($fileType = 'pdf') {

				$filename = 'storage/'.$location->FILE_UPLOAD;

				// Header content type
				header("Content-type: application/pdf");

				header("Content-Length: " . filesize($filename));

				// Send the file to the browser.
				$message = readfile($filename);



			}else{
			  $message = '<div class="alert alert-danger">ไม่รองรับไฟล์ชนิดนี้</div>';
			 }

}else{
 $message = '<div class="alert alert-danger">Please Select File</div>';
}

echo $message;
?>
