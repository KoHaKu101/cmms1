<!DOCTYPE html>
<html lang="en">
<head>
		<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'charset="utf-8" />
	<title>tittle</title>
</head>

<body >
	<?php
			$file = $dataset->FILE_UPLOAD;
			$filename = $dataset->FILE_NAME;
			header('Content-type: application/pdf');
			header('Content-Disposition:inline:filname="'.$filename.'"');
			// header('Content-Transfer-Endcoding : binary');
			header('Accept-Ranges: bytes');
			readfile($file);
	 ?>
</body>
</head>
