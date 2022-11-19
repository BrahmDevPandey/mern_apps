<?php
$servername = "localhost";
$username = "root";
$password = "Mysql@aman123";
$dbname = "driftdb";
$con = mysqli_connect($servername, $username, $password, $dbname);
if (!$con) {
	echo "error in connection";
}
?>