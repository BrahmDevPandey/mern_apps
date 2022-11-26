<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['name']) && isset($_SESSION['image']))
{
     
}
else{
    header('location:login.php');
}

?>