<?php
$server = "localhost";
$serveruser = "root";
$serverpassword = "123456";
$db= "lazyeye";
$con = new mysqli($server,$serveruser,$serverpassword,$db);

if(mysqli_connect_error())
{
	die("connection failed!=".mysqli_connect_error());
}else{
}

	

?>