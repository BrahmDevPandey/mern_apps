<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../dbcon.php';
if(isset($_SESSION['user_email_address'])){
    $rs=mysqli_query($con,"select * from user_mngt where email='".$_SESSION['user_email_address']."'");
    if(!mysqli_num_rows($rs)){
        $qr="insert into user_mngt (name,email,mobile,password,image) values('".$_SESSION['user_first_name']." ".$_SESSION['user_last_name']."','".$_SESSION['user_email_address']."','','','".$_SESSION['user_image']."')";
        if(mysqli_query($con,$qr)){
            echo "<script>alert('New user registered...')</script>";
        }
    }
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <?php
  include 'cdn.php'; 
  ?>
  <style>

.input-page{
  position: relative;
  top: 0;
}
.add-more-files{
  width: 50vw;
  border-radius: 0.3rem;
  padding: 3rem;
  margin:5rem auto;
  text-align: center;
  background: rgba(230, 230, 250, 0.13);
  box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
}
.inp-container{
  cursor: pointer;
  position: relative;
  box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(124, 124, 145, 0.1) 0px 16px 48px;
  height: 15rem;
  background: rgba(154, 127, 228, 0.068);
  width: 15rem;
  border-radius: 50%;
  border: 1px dashed rgb(195, 193, 193);
  margin: auto;
  border-width: 0.15rem;
}
#upload-file{
  opacity: 0;
  display: block;
  height: 16rem;
  width: 100%;
  position: absolute;
  cursor: pointer;
}
.img-icon{
  color:  rgba(128, 144, 238, 0.596);
}
#custom-file{
  color: rgb(96, 102, 155);
  position: relative;
  top: 0.5rem;
  padding: 0.5rem 0.8rem;
  font-size: 1.1rem;
  border-radius: 0.2rem;
  font-weight: 600;
}

span{
  font-size: 1.45rem;
}
.drop{
  margin-top: 3rem;
  font-size: 1rem;
  color: rgb(108, 107, 175);
}

.pdf-page{
  z-index:-1;
  min-height: 90%;
  width:100%;
  display: none;
  overflow: hidden;
}
.create-pdf{
  position: relative;
  padding: 1rem;
  margin: auto;
}
.file-item{
  margin-top: 2rem;
  padding: 0 1rem;
  background: none;
  text-align: center;
  position: relative;
  width: 10rem;
  height: 16rem; 
  text-align: center;
  margin: 1rem;
  display: inline-block;
  transition: 0.3s all ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
}

.img-container{   
  width: 8.5rem;
  margin: auto;
  height: 11rem;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
}
#img{
  position: relative;
  max-width: 9rem;
  max-height: 11rem;
  background: white;
  overflow: hidden;
  box-sizing: border-box;
  border: 0.1rem solid rgb(223, 222, 222);
}
.file-item button{
  background: none;
  border: none;
  outline: none;
  font-size: 1.2rem;
  transition: 0.3s all ease-in-out;
  opacity: 0;
  padding: 0.3rem 0.5rem;

}
.file-item button:hover{
  background: rgb(224, 248, 251);
}
.file-item:hover button{
  opacity: 1;
}
.delete{
  pointer-events: none;
}
#img-name{
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
  width: 8.5rem;
  text-align: center;
  margin: 1rem auto;
}

.add-more-file{
    padding: 0 1rem;
    background: none;
    text-align: center;
    position: relative;
    margin: 0.5rem;
    display: inline-block;
    transition: 0.3s all ease-in-out;   
    width: 10rem;
    height: 16rem; 
    vertical-align: top;
}
 .inp-cont{
  display: flex;
  flex-direction: column;
  flex-flow: column-reverse;
  border-radius: 50%;
  position: relative;
  text-align: center;
  border: none;
  background: rgb(241, 246, 246); 
  width: 9rem;
  height: 9rem;
  margin: 3rem auto;
}
#inp{
  opacity: 0;
  display: block;
  width: 9rem;
  height: 9rem;
  border-radius: 50%;
  position: absolute;
  cursor: pointer;
}

.create-pdf .add-more-file p{
  position: relative;
  top: -3.5rem;
}
  </style>
</head>
<?php 
    include('google_api.php');
    include 'student_dashboard_header.php' ;
    
?>
<body>
<section class="px-2 py-32 md:px-0">
<div class="flex justify-center ">
<div class=" pb-2 mb-10 mx-auto lg:max-w-lg h-auto sm:h-auto bg-white rounded-lg border border-gray-200 shadow-md lg:p-5 sm:py-10 sm:p-10 md:p-10 dark:bg-gray-800 dark:border-gray-700 p-3">
<span class="text-red-900 font-semibold">Welcome to your Free Trial</span><br>
You can submit 2 GS questions and 1 Optional questions for demo evaluation
</div>

</div>
<!-- Section 5 --> 
<section class="w-full grid gap-4 pb-7 md:pt-2 md:pb-24 flex justify-center">
<a href="#" type="button" class="shadow-lg text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
</svg>
Upgrade
</a>
<a href="new_question.php" type="button" class="shadow-lg text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-lg text-sm px-24 py-10 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
</svg>
Submit
</a>
</section>

</section>
</body>

</html>