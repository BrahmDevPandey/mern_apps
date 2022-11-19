<?php
    $servername="localhost";
	$username="root";
	$password="";
	$dbname="driftdb";
	$con=mysqli_connect($servername,$username,$password,$dbname);
	if(!$con)
	{
		echo"error in connection";
	}


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


?>