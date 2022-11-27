<?php
include("dbcon.php");

session_start();
if(isset($_POST['login_asadminstrator'])){
  $email=mysqli_real_escape_string($con,$_POST['email']);
  $password=mysqli_real_escape_string($con,$_POST['password']);
  $q="select * from admin_mngt where email='$email' and password='$password'";
  $run=mysqli_query($con,$q);
  $rows=mysqli_num_rows($run);
  if($rows>0){
    $data=mysqli_fetch_assoc($run);
    $_SESSION['email']=$data['email'];
    $_SESSION['usertype']=$data['user_type'];
    $_SESSION['name']=$data['name'];
    $_SESSION['image']=$data['image'];
    header('location:index.php');
  }
  else{
    header('location:login.php');
  }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DriftIAS Admin Panel</title>
  <!-- ========== Css Files ========== -->
  <link href="https://medhajnews.in/writerz/css/root.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  .login-form{
    box-shadow: 0 4px 0px 0 rgba(0,0,0,0.2);
  transition: 0.5s;
  }
</style>  
</head>
  <body style="background-color: #f5f5f5;">

    <div class="login-form">
      <form action="" method="Post">
        <div class="top">
          <!-- <img src="https://ik.imagekit.io/xnmbjzq8npo/logo_TINGYZlKR.png?ik-sdk-version=javascript-1.4.3&updatedAt=1662547952987" class="img-thumbnail" width="200px" height="40px"> -->
          <h4>Admin Login</h4>
        </div>
        <div class="form-area">
          <div class="group">
            <input type="text" id="email" name="email" class="form-control" placeholder="Email" required>
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <i class="fa fa-key"></i>
          </div>
          <button type="submit" name="login_asadminstrator" class="btn btn-default btn-block">LOGIN</button>
          
        </div>
      </form>
    </div>
</body>
</html>