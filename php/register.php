<?php
include "db.php";
$username = $_GET["users"];
$email = $_GET["email"];
$pass = $_GET["password"];
$name = $_GET["name"];
$surname = $_GET["surname"];
$age = $_GET["age"];


$result = mysqli_query($con,"SELECT username from users WHERE username='".$username."'");
$num = mysqli_num_rows($result);
if((empty($name))) {
	echo "Please fill out name field";
	die;
}
if((empty($surname))) {
	echo "Please fill out surname field";
	die;
}
if((empty($username))) {
	echo "Please fill out username field";
	die;
}
if((empty($age))) {
	echo "Please fill out age field";
	die;
}
if((empty($email))) {
	echo "Please fill out email field";
	die;
}
if((empty($pass))) {
	echo "Please fill out password field";
	die;
}

	
elseif($num == 1){
echo"User name already exists!";
die;
}
else{
	$sql = "INSERT INTO users(username, name, surname, email, password, age)
	VALUES('".$username."','".$name."','".$surname."','".$email."','".$pass."','".$age."')";
     $resut_1 = mysqli_query($con,$sql);
	 
	 if($resut_1)
	 {
		 echo "User ".$username." Registration successful";
	 }	 
		 
     else
		 {
			 die("insert users ".$username." Failed !");
		 }
	  
	}

?>