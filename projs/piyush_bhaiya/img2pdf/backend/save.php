<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");

date_default_timezone_set("Asia/Calcutta"); //India time (GMT+5:30)
$date = date('d-m-Y H:i:s');
$random = mt_rand(1000, 9999);
$file_name = "backend/bd_" . $random . ".pdf";
$pdfData = $_POST['pdfData'];
if (isset($pdfData)) {
    if (file_put_contents($file_name, base64_decode($pdfData))) {
        echo "Data Saved";
    }
}
?>
?>