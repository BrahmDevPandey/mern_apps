<?php
    include 'dbcon.php';
    
     echo $_GET["del_enq"];
    //Delete enquiry
    // if(isset($_GET['del_enq'])){
    //     $id=$_GET['del_enq'];
    //     $qr="delete from enquiry where id=$id";
    //     echo $qr;
    //     if(mysqli_query($con,$qr))
    //         echo '<script>alert("Data deleted...");location.href="enquiry.php";</script>';
    //     else
    //         echo '<script>alert("Error in submition...");location.href="enquiry.php";</script>'; 
    // }
    //Add question
    if(isset($_POST['add_ques'])){
        $ttl=$_POST['title'];
        $yr=$_POST['year'];
        $subcat=$_POST['sub_cat'];
        $cntnt=$_POST['content'];
        $tmpname=$_FILES['files']['tmp_name'];
        $base=explode(".",(basename($tmpname)));
        $ext=explode(".",$_FILES['files']['name']);
        $file=reset($base).".".end($ext);
        if($ttl=="" || $yr=="" || $subcat=="" || $tmpname=="")
        echo '<script>alert("Field can not be empty...");location.href="add_question.php";</script>';
        else{
        $qr="insert into question_paper(category,title,year,content,file_url) values('$subcat','$ttl','$yr','$cntnt','http://localhost/drift_pages/add_questions/ques_file/"."$file')";
        $exct=mysqli_query($con,$qr);
        if($exct){
            if(move_uploaded_file($tmpname,"ques_file/".$file))
                echo '<script>alert("Form is submited");location.href="add_question.php";</script>';
        }
        else{
            echo '<script>alert("Error in submition...");location.href="add_question.php";</script>';
        }
        }
    }
    
    
    require_once __DIR__ . '/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();

    if(isset($_POST['add_ques'])){
        $ttl=$_POST['title'];
        $yr=$_POST['year'];
        $subcat=$_POST['sub_cat'];
        $cntnt=$_POST['content'];
        $tmpname=$_FILES['files']['tmp_name'];
        $base=explode(".",(basename($tmpname)));
        $ext=explode(".",$_FILES['files']['name']);
        $file=reset($base).".".end($ext);
        if($ttl=="" || $yr=="" || $subcat=="" || $tmpname=="")
            echo '<script>alert("Field can not be empty...");location.href="add_question.php";</script>';
        else{
            $qr="insert into question_paper(category,title,year,content,cnt_url,file_url) values('$subcat','$ttl','$yr','$cntnt','https://driftias.prabhamedia.com/admin/Admin_Panel/content_file/cnt_".reset($base).".pdf','https://driftias.prabhamedia.com/admin/Admin_Panel/ques_file/"."$file')";		
            $exct=mysqli_query($con,$qr);
            if($exct){
                $mpdf->WriteHTML($cntnt);
                $mpdf->SetDisplayMode('fullpage');
                $mpdf->list_indent_first_level = 0; 
                //call watermark content and image
                $mpdf->SetWatermarkText('etutorialspoint');
                $mpdf->showWatermarkText = true;
                $mpdf->watermarkTextAlpha = 0.1;
                if(move_uploaded_file($tmpname,"ques_file/".$file)){
                    //output in browser
                    $mpdf->Output("content_file/cnt_".reset($base).".pdf");
                    echo '<script>alert("Form is submited");location.href="add_question.php";</script>';
                }
            }
            else{
                echo '<script>alert("Error in submition...");location.href="add_question.php";</script>';
            }
        }
    }
   
?>