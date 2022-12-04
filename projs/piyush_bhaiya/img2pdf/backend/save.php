<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
$pdfData = $_POST['pdfData'];
if (isset($pdfData)) {
    if (file_put_contents('brahmdev.pdf', base64_decode($pdfData))) {
        echo "Data saved";
    }
}
?>


<!-- if (file.type === "application/pdf") {
const blob = new Blob([file], { type: "application/pdf;" });
const url = window.URL.createObjectURL(blob);
savePdfToServer(url);
return;
} -->