<?php 

// Include mpdf library file
require_once __DIR__ . '/DriftIASPDF/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();

// Database Connection 

$pdfcontent = '<h1>Welcome to DriftIAS.com</h1>
		<h2>Employee Details</h2>
		<table autosize="1">
		<tr>
		<td style="width: 33%"><strong>NAME</strong></td>
		<td style="width: 36%"><strong>ADDRESS</strong></td>
		<td style="width: 30%"><strong>PHONE</strong></td>
		</tr>
		
		</table>';

$mpdf->WriteHTML($pdfcontent);

$mpdf->SetDisplayMode('fullpage');
$mpdf->list_indent_first_level = 0; 

//call watermark content and image
$mpdf->SetWatermarkText('DriftIAS');
$mpdf->showWatermarkText = true;
$mpdf->watermarkTextAlpha = 0.1;

//output in browser
$mpdf->Output();		
?>