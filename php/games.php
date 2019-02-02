<?php
include "db.php";

$game_id = $_POST["game_id"];
$game_randomSeed_id = $_POST["game_randSeed_id"];
$game_dimension = $_POST["game_dimension"];
$username= $_POST["username"];
$PX1 = $_POST["PX1"];
$PY1 = $_POST["PY1"];
$PX2 = $_POST["PX2"];
$PY2 = $_POST["PY2"];
$PX3 = $_POST["PX3"];
$PY3 = $_POST["PY3"];
$PX4 = $_POST["PX4"];
$PY4 = $_POST["PY4"];
$PX5 = $_POST["PX5"];
$PY5 = $_POST["PY5"];
$PX6 = $_POST["PX6"];
$PY6 = $_POST["PY6"];
$PX7 = $_POST["PX7"];
$PY7 = $_POST["PY7"];
$PX8 = $_POST["PX8"];
$PY8 = $_POST["PY8"];
$PX9 = $_POST["PX9"];
$PY9 = $_POST["PY9"];
$PX10 = $_POST["PX10"];
$PY10 = $_POST["PY10"];

$time1 = $_POST["time1"];
$time2 = $_POST["time2"];
$time3 = $_POST["time3"];
$time4 = $_POST["time4"];
$time5 = $_POST["time5"];
$time6 = $_POST["time6"];
$time7 = $_POST["time7"];
$time8 = $_POST["time8"];
$time9 = $_POST["time9"];
$time10 = $_POST["time10"];

$player_id=0;

$query_Select = "select user_id from users where username = '".$username."' ";

$resultSelect = mysqli_query($con, $query_Select);

if(mysqli_num_rows($resultSelect) > 0 ){

$row = mysqli_fetch_assoc($resultSelect);
$user_id =  $row['user_id'];
$player_id = $user_id;

}


$sql = "INSERT INTO gameinfo(game_id,game_dimension,game_randSeed_id,user_id,P1X,P1Y,time1,P2X,P2Y,time2,P3X,P3Y,time3,P4X,P4Y,time4,P5X,P5Y,time5,P6X,P6Y,time6,P7X,P7Y,time7,P8X,P8Y,time8,P9X,P9Y,time9,P10X,P10Y,time10)
VALUES ('".$game_id."' , '".$game_dimension."' ,'".$game_randomSeed_id."','".$player_id."', '".$PX1."', '".$PY1."' ,'".$time1."' , '".$PX2."', '".$PY2."', '".$time2."' ,'".$PX3."', '".$PY3."', '".$time3."' ,'".$PX4."', '".$PY4."', '".$time4."' ,'".$PX5."', '".$PY5."', '".$time5."' ,'".$PX6."', '".$PY6."', '".$time6."' ,'".$PX7."', '".$PY7."', '".$time7."' ,'".$PX8."', '".$PY8."','".$time8."' , '".$PX9."', '".$PY9."', '".$time9."' ,'".$PX10."', '".$PY10."','".$time10."')";

$sqlPoint = "INSERT INTO gameinfo_insert(game_dimension,game_randSeed_id,user_id,P1X,P1Y,P2X,P2Y,P3X,P3Y,P4X,P4Y,P5X,P5Y,P6X,P6Y,P7X,P7Y,P8X,P8Y,P9X,P9Y,P10X,P10Y)
VALUES ('".$game_dimension."' , '".$game_randomSeed_id."' ,'".$player_id."', '".$PX1."', '".$PY1."' , '".$PX2."', '".$PY2."', '".$PX3."', '".$PY3."', '".$PX4."', '".$PY4."', '".$PX5."', '".$PY5."',
 '".$PX6."', '".$PY6."', '".$PX7."', '".$PY7."', '".$PX8."', '".$PY8."', '".$PX9."', '".$PY9."', '".$PX10."', '".$PY10."')";


if(mysqli_query($con, $sql) && mysqli_query($con, $sqlPoint) ){
    echo "Records inserted successfully.";
	
} else{
    echo "ERROR: Could not able to execute $sql.";
}

	


?>