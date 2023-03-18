<?php
  
$username="root";
$password="";
$server= "localhost";
$db = "freelance_db";

$con = mysqli_connect($server, $username, $password, $db);

if (!$con) { 
	die("Not Connected".mysqli_connect_error());
}
?>