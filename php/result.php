
<!DOCTYPE HTML>
<html>
<head>
</head>
<body>


<p id="demo" style="text-align:center;font-size:40px; color:red; margin:20px auto;"> </p>
<h2 style="text-align:center"> Adlı kullanıcının Oyun Score Grafikleri</h2>

<div id="chartContainer" style="height: 370px; width: 700px; margin:100px auto;"></div>
<div id="chartContainerTwo" style="height: 370px; width: 700px; margin:100px auto; "></div>
<div id="chartContainerThree" style="height: 370px; width: 700px; margin:100px auto; "></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



<?php

include "db.php";

$name;

if(!empty($_POST['option'])){
	
	$b=$_POST['option'];
	
  
	$query =mysqli_query($con,"SELECT * FROM users WHERE username LIKE '%".$b."%'")or die ("Username check query failed");
	
	$count=mysqli_num_rows($query);
	

if($count==0)
  {
	echo "There isn't any match.";
	}
	
	while ($row = mysqli_fetch_assoc($query)){
		
	//	echo "USERNAME: " .$row['username']. "<br>"  ;
	//	echo "User id:" .$row['user_id']. "<br>" ;

		$id_of_user = $row['user_id'];
		
		$name = $row['username'];
		
	}
}	
 echo $id_of_user;



function sqlCall($num){
		
	$user_id =  $GLOBALS["id_of_user"];
	  
		$sql = "SELECT game_id,
		if(P1X = ".$num." or P1Y= ".$num.", time1, 0) time1 , if(P2X = ".$num." or P2Y= ".$num.", time2, 0) time2 , if(P3X = ".$num." or P3Y= ".$num.", time3, 0) time3 ,
		if(P4X=  ".$num." or P4Y= ".$num.", time4 , 0) time4, if(P5X = ".$num." or P5Y= ".$num.", time5, 0) time5 , if(P6X= ".$num."  or P6Y= ".$num.", time6 , 0) time6 , 
		if(P7X = ".$num." or P7Y= ".$num.", time7, 0) time7 , if(P8X =  ".$num." or P8Y= ".$num.", time8, 0) time8 , if(P9X = ".$num."  or P9Y= ".$num.", time9, 0) time9 , 
		if(P10X = ".$num." or P10Y= ".$num.", time10, 0) time10  FROM gameinfo where user_id='{$user_id}'and game_dimension =";
		
		return $sql;

}

function gameOne($game_dim,$game_point){
	
	include "db.php";

	$timer = 0;

	$sqll = sqlCall($game_point);
	
	$sql  = $sqll."'{$game_dim}'";
	
	$result = mysqli_query($con, $sql);

	$count=0;

	echo "<br/>";

	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
/*			echo "".$row["game_id"].
				 " time1: ".  number_format((float)$row["time1"], 2, '.', '').
				 " time2: ".  number_format((float)$row["time2"], 2, '.', '').
			     " time3: ".  number_format((float)$row["time3"], 2, '.', '').
				 " time4: ".  number_format((float)$row["time4"], 2, '.', '').
				 " time5: ".  number_format((float)$row["time5"], 2, '.', '').
				 " time6: ".  number_format((float)$row["time6"], 2, '.', '').
				 " time7: ".  number_format((float)$row["time7"], 2, '.', '').
				 " time8: ".  number_format((float)$row["time8"], 2, '.', '').
				 " time9: ".  number_format((float)$row["time9"], 2, '.', '').
				 " time10: ". number_format((float)$row["time10"], 2, '.', '').				 

			"<br>"; 
					
					*/
					
			if($row["time1"]>0.00001)
			{	
				$count++;	
			}if($row["time2"]>0.00001)
			{	
				$count++;	
			}if($row["time3"]>0.00001)
			{	
				$count++;	
			}if($row["time4"]>0.00001)
			{	
				$count++;	
			}if($row["time5"]>0.00001)
			{	
				$count++;	
			}if($row["time6"]>0.00001)
			{	
				$count++;	
			}if($row["time7"]>0.00001)
			{	
				$count++;	
			}if($row["time8"]>0.00001)
			{	
				$count++;	
			}if($row["time9"]>0.00001)
			{	
				$count++;	
			}if($row["time10"]>0.00001)
			{	
				$count++;	
			}
		
		//	echo $count."</br>";
			
			$timer = $timer+ $row["time1"]+$row["time2"]+$row["time3"]+$row["time4"]+$row["time5"]+$row["time6"]+$row["time7"]+$row["time8"]+$row["time9"]+$row["time10"];
			
		
			
		}
	} else {
		echo "0 results";
	}
		
	mysqli_close($con);
	
	echo "<br/>";
	
	 
	 
	return $timer/$count;


}



// for game one 8x6

/*

$timeCount1_1 = gameOne("8x6",1);
$timeCount1_2 = gameOne("8x6",2);
$timeCount1_3 = gameOne("8x6",3);
$timeCount1_4 = gameOne("8x6",4);
$timeCount1_5 = gameOne("8x6",5);
$timeCount1_6 = gameOne("8x6",6);
$timeCount1_7 = gameOne("8x6",8);
$timeCount1_8 = gameOne("8x6",8);




echo number_format((float)$timeCount1_1, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_2, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_3, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_4, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_5, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_6, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_7, 2, '.', '')."<br/>";
echo number_format((float)$timeCount1_8, 2, '.', '')."<br/>";
*/

$timeArrayForOne = array();

	
for ($i = 1; $i <=8; $i++) {
	$timeArrayForOne[$i] = gameOne("8x6",$i);
}

/* for ($i = 1; $i <=8; $i++) {
	// echo number_format((float)$timeArrayForOne[$i], 2, '.', '')."<br/>";
	
 }*/




$dataPoints = array(
	array("y" => $timeArrayForOne[1], "label" => "1.Point"),
	array("y" => $timeArrayForOne[2], "label" => "2.Point"),
	array("y" => $timeArrayForOne[3], "label" => "3.Point"),
	array("y" => $timeArrayForOne[4], "label" => "4.Point"),
	array("y" => $timeArrayForOne[5], "label" => "5.Point"),
	array("y" => $timeArrayForOne[6], "label" => "6.Point"),
	array("y" => $timeArrayForOne[7], "label" => "7.Point"),
	array("y" => $timeArrayForOne[8], "label" => "8.Point")
);


// for game two 12x8

/*

$timeCount2_1 = gameOne("12x8",1);
$timeCount2_2 = gameOne("12x8",2);
$timeCount2_3 = gameOne("12x8",3);
$timeCount2_4 = gameOne("12x8",4);
$timeCount2_5 = gameOne("12x8",5);
$timeCount2_6 = gameOne("12x8",6);
$timeCount2_7 = gameOne("12x8",8);
$timeCount2_8 = gameOne("12x8",8);
$timeCount2_9 = gameOne("12x8",9);
$timeCount2_10 = gameOne("12x8",10);
$timeCount2_11 = gameOne("12x8",10);
$timeCount2_12 = gameOne("12x8",10);


echo number_format((float)$timeCount2_1, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_2, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_3, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_4, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_5, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_6, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_7, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_8, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_9, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_10, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_11, 2, '.', '')."<br/>";
echo number_format((float)$timeCount2_12, 2, '.', '')."<br/>";

*/


$timeArrayForTwo = array();

	
for ($i = 1; $i <=12; $i++) {
	$timeArrayForTwo[$i] = gameOne("12x8",$i);
}

/* for ($i = 1; $i <=12	; $i++) {
	// echo number_format((float)$timeArrayForTwo[$i], 2, '.', '')."<br/>";
	
 } */
 


$dataPointsTwo = array(


	array("y" => $timeArrayForTwo[1], "label" => "1.Point"),
	array("y" => $timeArrayForTwo[2], "label" => "2.Point"),
	array("y" => $timeArrayForTwo[3], "label" => "3.Point"),
	array("y" => $timeArrayForTwo[4], "label" => "4.Point"),
	array("y" => $timeArrayForTwo[5], "label" => "5.Point"),
	array("y" => $timeArrayForTwo[6], "label" => "6.Point"),
	array("y" => $timeArrayForTwo[7], "label" => "7.Point"),
	array("y" => $timeArrayForTwo[8], "label" => "8.Point"),
	array("y" => $timeArrayForTwo[9], "label" => "9.Point"),
	array("y" => $timeArrayForTwo[10], "label" => "10.Point"),
	array("y" => $timeArrayForTwo[11], "label" => "11.Point"),
	array("y" => $timeArrayForTwo[12], "label" => "12.Point")
);



// for game three 16x9

/*


$timeCount3_1 = gameOne("16x9",1);
$timeCount3_2 = gameOne("16x9",2);
$timeCount3_3 = gameOne("16x9",3);
$timeCount3_4 = gameOne("16x9",4);
$timeCount3_5 = gameOne("16x9",5);
$timeCount3_6 = gameOne("16x9",6);
$timeCount3_7 = gameOne("16x9",8);
$timeCount3_8 = gameOne("16x9",8);
$timeCount3_9 = gameOne("16x9",9);
$timeCount3_10 = gameOne("16x9",10);
$timeCount3_11 = gameOne("16x9",11);
$timeCount3_12 = gameOne("16x9",12);
$timeCount3_13 = gameOne("16x9",13);
$timeCount3_14 = gameOne("16x9",14);
$timeCount3_15 = gameOne("16x9",15);
$timeCount3_16 = gameOne("16x9",16);



echo number_format((float)$timeCount3_1, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_2, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_3, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_4, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_5, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_6, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_7, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_8, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_9, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_10, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_11, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_12, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_13, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_14, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_15, 2, '.', '')."<br/>";
echo number_format((float)$timeCount3_16, 2, '.', '')."<br/>";
*/





$timeArrayForThree = array();

	
for ($i = 1; $i <=16; $i++) {
	$timeArrayForThree[$i] = gameOne("16x9",$i);
}

/* for ($i = 1; $i <=16	; $i++) {
	// echo number_format((float)$timeArrayForThree[$i], 2, '.', '')."<br/>";
	
// } */


$dataPointsThree = array(
	array("y" => $timeArrayForThree[1], "label" => "1.Point"),
	array("y" => $timeArrayForThree[2], "label" => "2.Point"),
	array("y" => $timeArrayForThree[3], "label" => "3.Point"),
	array("y" => $timeArrayForThree[4], "label" => "4.Point"),
	array("y" => $timeArrayForThree[5], "label" => "5.Point"),
	array("y" => $timeArrayForThree[6], "label" => "6.Point"),
	array("y" => $timeArrayForThree[7], "label" => "7.Point"),
	array("y" => $timeArrayForThree[8], "label" => "8.Point"),
	array("y" => $timeArrayForThree[9], "label" => "9.Point"),
	array("y" => $timeArrayForThree[10], "label" => "10.Point"),
	array("y" => $timeArrayForThree[11], "label" => "11.Point"),
	array("y" => $timeArrayForThree[12], "label" => "12.Point"),
	array("y" => $timeArrayForThree[13], "label" => "13.Point"),
	array("y" => $timeArrayForThree[14], "label" => "14.Point"),
	array("y" => $timeArrayForThree[15], "label" => "15.Point"),
	array("y" => $timeArrayForThree[16], "label" => "16.Point")
);




?>




<script>


 function codeAddress() {
      var simple = '<?php echo $name; ?>';
		document.getElementById("demo").innerHTML = simple;
        }

window.onload = function () {
	codeAddress();
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Click Time Average Graphic for Game One"
	},
	axisY: {
		title: "Average Click Time for Game One"
	},
	data: [{
		type: "line",
		color: "red",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		
	}]
});
chart.render();

var chartTwo = new CanvasJS.Chart("chartContainerTwo", {
	title: {
		text: "Click Time Average Graphic for Game Two"
	},
	axisY: {
		title: "Average Click Time for Game Two"
	},
	data: [{
		type: "line",
		color: "red",
		dataPoints: <?php echo json_encode($dataPointsTwo, JSON_NUMERIC_CHECK); ?>
		
	}]
});
chartTwo.render();

var chartThree = new CanvasJS.Chart("chartContainerThree", {
	title: {
		text: "Click Time Average Graphic for Game Three"
	},
	axisY: {
		title: "Average Click Time for Game Three"
	},
	data: [{
		type: "line",
		color: "red",
		dataPoints: <?php echo json_encode($dataPointsThree, JSON_NUMERIC_CHECK); ?>
		
	}]
});
chartThree.render();
 
}




</script>



</body>
</html> 





