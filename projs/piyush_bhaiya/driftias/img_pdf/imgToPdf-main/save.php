<?php
 $pdfData= $_POST['pdfData']; 


// echo $pdfData;
 echo file_put_contents('filename.pdf', base64_decode($pdfData));
?>