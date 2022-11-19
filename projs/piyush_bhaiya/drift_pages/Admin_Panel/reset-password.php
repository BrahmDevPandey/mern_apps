<?php
include '../inc/dbcon.php';
include '../mail.php';
 $key=base64_decode($_GET['key']);
 parse_str($key,$abc);


//  Array ( [user_email] => piyushkant764@gmail.com [user_name] => Piyush [user_ip] => 103.97.211.42 )
$user_email=$abc['user_email'];
$user_name=$abc['user_name'];
$user_ip=$abc['user_ip'];
$q="SELECT * FROM `user_mngt` WHERE `name`='$user_name' and `email`='$user_email'";
$db=mysqli_query($con,$q);
echo $rows=mysqli_num_rows($db);

if($rows>0){
    $ueser_pass=$_POST['password'];
    $qu="UPDATE `user_mngt` SET `password`=' sdfdsf' WHERE `name`='$user_name' and `email`='$user_email'";
    $qr=mysqli_query($con,$qu);
    if ($qr) {
        // echo "Data Updated Successfully";
        # code...
    }
    ?>
    <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <form action="/action_page.php">
    <div class="mb-3 mt-3">
      <label for="Password">Password:</label>
      <input type="password" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-check mb-3">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

</body>
</html>

    <?php
}



?>