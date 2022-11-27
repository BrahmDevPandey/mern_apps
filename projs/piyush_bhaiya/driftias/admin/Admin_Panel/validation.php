<?php
    include 'dbcon.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    
    //Delete enquiry
    if(isset($_GET['del_enq'])){
        $id=$_GET['del_enq'];
        $qr="delete from enquiry where id=$id";
        if(mysqli_query($con,$qr))
            echo '<script>alert("Data deleted...");location.href="enquiry.php";</script>';
        else
            echo '<script>alert("Error...");location.href="enquiry.php";</script>'; 
    }
    //Delete Question
    if(isset($_GET['del_ques'])){
        $id=$_GET['del_ques'];
        $rs=mysqli_fetch_array(mysqli_query($con,"select * from question_paper where id=".$id));
        $r=explode("content_file",$rs['cnt_url']);
        if(unlink("content_file".end($r))){
          $exc=mysqli_query($con,"delete from question_paper where id=".$id);
          if($exc)
            echo '<script>alert("Data deleted...");location.href="ques_panel.php";</script>';
          else
            echo '<script>alert("Error...");location.href="ques_panel.php";</script>'; 
        }else
            echo '<script>alert("Error in unlink...");location.href="ques_panel.php";</script>'; 
    }
    //Delete admin
    if(isset($_GET['del_adm'])){
        $id=$_GET['del_adm'];
        $qr="delete from admin_mngt where id=$id";
        if(mysqli_query($con,$qr))
            echo '<script>alert("Data deleted...");location.href="admins.php";</script>';
        else
            echo '<script>alert("Error...");location.href="admins.php";</script>'; 
    }
    //Delete user
    if(isset($_GET['del_usr'])){
        $id=$_GET['del_usr'];
        $qr="delete from user_mngt where id=$id";
        if(mysqli_query($con,$qr))
            echo '<script>alert("Data deleted...");location.href="users.php";</script>';
        else
            echo '<script>alert("Error...");location.href="user.php";</script>'; 
    }
    
    ////////////////////////////////////////////////
    require_once __DIR__ . '/DriftIASPDF/vendor/autoload.php';
    $mpdf = new \Mpdf\Mpdf();
    
    //Add question
    if(isset($_POST['add_ques'])){
        $ttl=$_POST['title'];
        $yr=$_POST['year'];
        $subcat=$_POST['sub_cat'];
        $cntnt=$_POST['content'];
        if($ttl=="" || $yr=="" || $subcat=="")
            echo '<script>alert("Field can not be empty...");location.href="add_question.php";</script>';
        else{
            //Set pdf file name
            $exc=mysqli_query($con,"select max(id) from question_paper");
            $rs=mysqli_fetch_array($exc);
            $file='CNT'.($rs['max(id)']+1001).'.pdf';
            //Mpdf
            $mpdf->WriteHTML($cntnt);
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->list_indent_first_level = 0; 
            //call watermark content and image
            $mpdf->SetWatermarkText('DriftIAS');
            $mpdf->showWatermarkText = true;
            $mpdf->watermarkTextAlpha = 0.1;
            $qr="insert into question_paper(category,title,year,content,cnt_url) values('$subcat','$ttl','$yr','$cntnt','https://driftias.prabhamedia.com/admin/Admin_Panel/content_file/$file')";		
            if(mysqli_query($con,$qr)){
                $mpdf->Output("content_file/$file");
                echo '<script>alert("Question paper added...");location.href="ques_panel.php";</script>';
            }else{
                echo '<script>alert("Data not inserted");location.href="add_question.php";</script>';
            }

        }
    }
    
    //Update Question
    if(isset($_POST['update_ques'])){
        $id=$_POST['update_ques'];
        $ttl=$_POST['title'];
        $yr=$_POST['year'];
        $subcat=$_POST['sub_cat'];
        $cntnt=$_POST['content'];
        
        $rs=mysqli_fetch_array(mysqli_query($con,"select * from question_paper where id=$id"));
        $ex=explode("content_file/",$rs['cnt_url']);
        $file=end($ex);
        //Mpdf
        $mpdf->WriteHTML($cntnt);
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->list_indent_first_level = 0; 
        //call watermark content and image
        $mpdf->SetWatermarkText('DriftIAS');
        $mpdf->showWatermarkText = true;
        $mpdf->watermarkTextAlpha = 0.1;
        //output in browser
        $qr="update question_paper set category='$subcat',title='$ttl',year='$yr',content='$cntnt',cnt_url='https://driftias.prabhamedia.com/admin/Admin_Panel/content_file/$file' where id=$id";		
        if(mysqli_query($con,$qr)){
            $mpdf->Output("content_file/$file");
            echo '<script>alert("Question paper updated...");location.href="ques_panel.php";</script>';
        }else{
            echo '<script>alert("Error...");location.href="add_question.php";</script>';
        }
    }
    
   //Add Admin
   if(isset($_POST['add_admin'])){
       $name=$_POST['adm_name'];
       $email=$_POST['adm_email'];
       $mobile=$_POST['adm_mobile'];
       $type=$_POST['adm_type'];
       $pass=$_POST['adm_password'];
       $ck=mysqli_query($con,"select * from admin_mngt where email='$email'");
       if(mysqli_num_rows($ck)){
            echo '<script>alert("Email already registered...");location.href="admins";</script>';
       }else{
            $qr="insert into admin_mngt (name,email,mobile,type,password,image)values('$name','$email','$mobile','$type','$pass','https://driftias.prabhamedia.com/admin/Admin_Panel/admin_image/adminimg.jpg')";
            if(mysqli_query($con,$qr)){
               echo '<script>alert("New Admin added...");location.href="admins.php";</script>';
            }else{
               echo '<script>alert("Error...");location.href="admins.php";</script>';
            }
       }
       
   }
?>