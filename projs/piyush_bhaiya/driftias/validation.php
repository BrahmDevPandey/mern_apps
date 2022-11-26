<?php
    include 'dbcon.php';
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    //index.php
    include 'mail.php';
    //Include Configuration File
    include('google_api.php');
    
    if(isset($_POST['reg_btn'])){
        $name=$_POST['name'];
        $email=$_POST['email'];
        $mobile=$_POST['phone'];
        $pass=$_POST['password'];
        $rs=mysqli_query($con,"select * from user_mngt where email='$email'");
        if(mysqli_num_rows($rs)){
            echo '<script>alert("Email already registered...");location.href="inc/student_dashboard_index.php";</script>';
        }else{
            $qr="insert into user_mngt (name,email,mobile,password,image) values('$name','$email','$mobile','$pass','https://driftias.prabhamedia.com/user_image/user_img.png')";
            if(mysqli_query($con,$qr)){
                echo '<script>alert("Registration success...");location.href="inc/student_dashboard_index.php";</script>';
                unset($_SESSION['em']);
            }else
                echo '<script>alert("Error...");location.href="index.php";</script>';
        }
        
    }
    
    if(isset($_POST['cnt_btn'])){
        $email=$_POST['c_email'];
        $mobile=$_POST['c_mobile'];
        $subj=$_POST['c_subj'];
        $msg=$_POST['c_msg'];
        $qr="insert into enquiry (email,mobile,subject,message) values('$email','$mobile','$subj','$msg')";
        if(mysqli_query($con,$qr))
            echo '<script>alert("Message send \nWe will contact you soon...");location.href="index.php";</script>';
        else
            echo '<script>alert("Error...");location.href="index.php";</script>';
    }

    if (isset($_POST['email'])) {
        $to = $_POST['email'];
        $msg = rand(1111, 9999);
        $_SESSION['em']=$to;
        $_SESSION['cd']=$msg;
        smtp_mailer($to, "DriftIAS Alert", $msg);
        echo "OTP send on your mail..";
    }
    if(isset($_POST['otp'])){
        if($_POST['otp']==$_SESSION['cd']){
            unset($_SESSION['cd']);
            echo "";
        }else 
            echo "OTP not match...";
    }
    
        //Update header
    if(isset($_POST['updhead'])){
      $hed1=$_POST['hed1'];
      $hed2=$_POST['hed2'];
      $para=$_POST['para'];
      $exct=mysqli_query($con,"update header set header1='$hed1',header2='$hed2',para='$para' where 1");
        if($exct){
          echo "Data updated...";
        }else echo "Error...";
    }
    //Add blog
    if(isset($_POST['add_blog'])){
      $date=$_POST['blog_date'];
      $para1=$_POST['blog_para1'];
      $para2=$_POST['blog_para1']; 
      $tmpname=$_FILES['blog_img']['tmp_name'];
      $base=explode(".",(basename($tmpname)));
      $ext=explode(".",$_FILES['blog_img']['name']);
      $img=reset($base).".".end($ext);
      if($date=="" || $para1=="" || $para2=="" || $tmpname=="")
            echo '<script>alert("Field can not be empty...");location.href="dyn_index.php";</script>';
      else{
          $qr="insert into blogs(image,date,para1,para2) values('https://driftias.prabhamedia.com/blog_images/"."$img','$date','$para1','$para2')";
          $exct=mysqli_query($con,$qr);
          if($exct){
            if(move_uploaded_file($tmpname,"blog_images/".$img))
              echo '<script>alert("New blog added...");location.href="dyn_index.php";</script>';
            else
              echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
          }
          else
            echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
      } 
    }
    //Delete blog
    if(isset($_GET['del_blog'])){
        $id=$_GET['del_blog'];
        $rs=mysqli_fetch_array(mysqli_query($con,"select * from blogs where id=".$id));
        $r=explode("blog_images",$rs['image']);
        if(unlink("blog_images".end($r))){
          $exc=mysqli_query($con,"delete from blogs where id=".$id);
          if($exc)
            echo "<script>alert('Data deleted...');location.href='dyn_index.php';</script>";
          else
            echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
        }else
          echo '<script>alert("Error...");location.href="dyn_index.php";</script>';     
        
    }
    //Add evaluation pdf
    if(isset($_POST['add_eval_pdf'])){
      $tmpname=$_FILES['eval_pdf']['tmp_name'];
      $base=explode(".",(basename($tmpname)));
      $ext=explode(".",$_FILES['eval_pdf']['name']);
      $pdf=reset($base).".".end($ext);
      $qr="insert into sample_eval(pdf) values('https://driftias.prabhamedia.com/eval_pdf/"."$pdf')";
      if(move_uploaded_file($tmpname,"eval_pdf/".$pdf)){
        $exct=mysqli_query($con,$qr);
        if($exct)
          echo '<script>alert("New evaluation pdf added...");location.href="dyn_index.php";</script>';
        else
          echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
      }else
        echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
    }
    //Delete evaluation pdf
    if(isset($_GET['del_eval_pdf'])){
      $id=$_GET['del_eval_pdf'];
      $rs=mysqli_fetch_array(mysqli_query($con,"select * from sample_eval where id=".$id));
      $r=explode("eval_pdf",$rs['pdf']);
      if(unlink("eval_pdf".end($r))){
        $exc=mysqli_query($con,"delete from sample_eval where id=".$id);
        if($exc)
          echo "<script>alert('Data deleted...');location.href='dyn_index.php';</script>";
      }else
        echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
    }
    //Update evoluation plan
    if(isset($_POST['updplan'])){
      $cnt=$_POST['cnt'];
      $cat=$_POST['cat'];
      $prs=$_POST['prs'];
      $exct=mysqli_query($con,"update eval_plan set price='$prs' where content='$cnt' and category='$cat'");
      if($exct){
        echo "Data updated...";
      }else echo "Error...";
    }
    //Add FAQ
    if(isset($_POST['add_faq'])){
      $qus=$_POST['ques'];
      $ans1=$_POST['ans1'];
      $ans2=$_POST['ans2'];
      $exc=mysqli_query($con,"insert into faques(question,answer1,answer2) values('$qus','$ans1','$ans2')");
      if($exc)
        echo "<script>alert('New FAQ added...');location.href='dyn_index.php';</script>";
      else
        echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
    }
    //Delete FAQ
    if(isset($_GET['del_faq'])){
      $id=$_GET['del_faq'];
      $exc=mysqli_query($con,"delete from faques where id=".$id);
      if($exc)
        echo "<script>alert('Data deleted...');location.href='dyn_index.php';</script>";
      else
        echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
    }
    //Add testimonials
    if(isset($_POST['add_tm'])){
      $str=$_POST['tm_str'];
      $name=$_POST['tm_name'];
      $bio=$_POST['tm_bio'];
      $tmpname=$_FILES['tm_img']['tmp_name'];
      $base=explode(".",(basename($tmpname)));
      $ext=explode(".",$_FILES['tm_img']['name']);
      $img=reset($base).".".end($ext);
      if($str=="" || $name=="" || $bio=="" || $tmpname=="")
            echo '<script>alert("Field can not be empty...");location.href="dyn_index.php";</script>';
      else{
          $qr="insert into testimonials(image,name,bio,star) values('https://driftias.prabhamedia.com/testimonial_images/"."$img','$name','$bio','$str')";
          $exct=mysqli_query($con,$qr);
          if($exct){
            if(move_uploaded_file($tmpname,"testimonial_images/".$img))
              echo '<script>alert("New testimonial added...");location.href="dyn_index.php";</script>';
            else
              echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
          }
          else
            echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
      } 
    }
    //Delete testimonials
    if(isset($_GET['del_tm'])){
      $id=$_GET['del_tm'];
      $rs=mysqli_fetch_array(mysqli_query($con,"select * from testimonials where id=".$id));
      $r=explode("testimonial_images",$rs['image']);
      if(unlink("testimonial_images".end($r))){
        $exc=mysqli_query($con,"delete from testimonials where id=".$id);
        if($exc)
          echo "<script>alert('Data deleted...');location.href='dyn_index.php';</script>";
        else
          echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
      }else
        echo '<script>alert("Error...");location.href="dyn_index.php";</script>';
    }

?>