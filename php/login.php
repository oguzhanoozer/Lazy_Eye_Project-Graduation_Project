<?php
$server = "localhost";
$serveruser = "root";
$serverpassword = "123456";
$db= "lazyeye";


$con = mysqli_connect('localhost','root', '123456', 'lazyeye');
if(mysqli_connect_errno()){
	
   echo "Connection failed";
   exit();
}

$username = $_POST["username"];
$password = $_POST["password"];

$passcheckquery ="SELECT password,username FROM users WHERE password='".$password."' and username='".$username."' ";
$passcheck = mysqli_query($con, $passcheckquery) or die ("Password check query failed");

  if(mysqli_num_rows($passcheck) != 1)
  {
	  echo "Wrong username or password!";
	  exit();
  }

  
  
  echo "0\t";
  
 
?>
