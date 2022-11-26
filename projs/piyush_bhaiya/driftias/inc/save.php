<?php
$pdfData= $_POST['pdfData']; 

if(isset($pdfData)){
// echo $pdfData;
file_put_contents('filename.pdf', base64_decode($pdfData));
}

?>
