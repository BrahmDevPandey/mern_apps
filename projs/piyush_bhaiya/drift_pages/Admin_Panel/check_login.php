<?php
session_start();
$_SESSION['email'];
$_SESSION['password'];
$_SESSION['usertype'];
if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['usertype'])  && isset($_SESSION['name']))
{
     
}
else{
    header('location:login.php');
}

?>