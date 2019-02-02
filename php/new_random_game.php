
<?php

include "db.php";


$username = $_POST["username"];

$user_id;


$query_Select = "select user_id from users where username = '".$username."' ";

$resultSelect = mysqli_query($con, $query_Select);

if(mysqli_num_rows($resultSelect) > 0 ){

$row = mysqli_fetch_assoc($resultSelect);
$user_id =  $row['user_id'];

}

$result =  mysqli_query($con,"SELECT P1X,P1Y,P2X,P2Y,P3X,P3Y,P4X,P4Y,P5X,P5Y,P6X,P6Y,P7X,P7Y,P8X,P8Y,P9X,P9Y,P10X,P10Y from gameinfo_insert where user_id='".$user_id."'");

while($row = mysqli_fetch_assoc($result)) 
{
	
echo $row["P1X"];
echo ".";
echo $row["P1Y"];
echo ".";
echo $row["P2X"];
echo ".";
echo $row["P2Y"];
echo ".";
echo $row["P3X"];
echo ".";
echo $row["P3Y"];
echo ".";
echo $row["P4X"];
echo ".";
echo $row["P4Y"];
echo ".";
echo $row["P5X"];
echo ".";
echo $row["P5Y"];
echo ".";
echo $row["P6X"];
echo ".";
echo $row["P6Y"];
echo ".";
echo $row["P7X"];
echo ".";
echo $row["P7Y"];
echo ".";
echo $row["P8X"];
echo ".";
echo $row["P8Y"];
echo ".";
echo $row["P9X"];
echo ".";
echo $row["P9Y"];
echo ".";
echo $row["P10X"];
echo ".";
echo $row["P10Y"];
echo ".";
			}




?>