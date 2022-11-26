<?php
session_start();
if(isset($_SESSION['email']) && isset($_SESSION['password']) && isset($_SESSION['usertype'])  && isset($_SESSION['name']))
{
     session_destroy();
    header('location:login.php');

}
else{
    header('location:login.php');
}

?>