<?php
session_start();
$name=$_SESSION['abc']="test";
print_r($name);
?>