

<?php 

$usernameOfDetail="unselected";
$useridOfDetail="unselected";
$game_dimensionOfDetail="unselected";
$game_randSeed_idOfDetail="unselected";
$game_pointOfDetail="unselected";

$userid_of_graph='';

include "db.php";
	
	function selectid($username){
			
		include "db.php";
			
		$result =  mysqli_query($con,"SELECT user_id from users WHERE username='".$username."'");

		if (mysqli_num_rows($result) > 0) {
		
		while($row = mysqli_fetch_assoc($result)) {
				
				
				return $row["user_id"];
			}
		
		} else 
		{
			echo "0 results";
		}

	mysqli_close($con);
		
	}

if( isset($_GET['submit_insert_point']) ){
	
	include "db.php";
	
	foreach($_COOKIE['idisi'] as $key => $val);
	{
		$userid_of_graph = $val;
	}	
		
	
	$game_dim = htmlentities($_GET['game_dim_insert']);
	
	$PX1 = htmlentities($_GET['P1X']);
	$PY1 = htmlentities($_GET['P1Y']);
	$PX2 = htmlentities($_GET['P2X']);
	$PY2 = htmlentities($_GET['P2Y']);
	$PX3 = htmlentities($_GET['P3X']);
	$PY3 = htmlentities($_GET['P3Y']);
	$PX4 = htmlentities($_GET['P4X']);
	$PY4 = htmlentities($_GET['P4Y']);
	$PX5 = htmlentities($_GET['P5X']);
	$PY5 = htmlentities($_GET['P5Y']);
	$PX6 = htmlentities($_GET['P6X']);
	$PY6 = htmlentities($_GET['P6Y']);
	$PX7 = htmlentities($_GET['P7X']);
	$PY7 = htmlentities($_GET['P7Y']);
	$PX8 = htmlentities($_GET['P8X']);
	$PY8 = htmlentities($_GET['P8Y']);
	$PX9 = htmlentities($_GET['P9X']);
	$PY9 = htmlentities($_GET['P9Y']);
	$PX10 = htmlentities($_GET['P10X']);
	$PY10 = htmlentities($_GET['P10Y']);
	
	

$sql = "INSERT INTO gameinfo_insert(game_dimension,game_randSeed_id,user_id,P1X,P1Y,P2X,P2Y,P3X,P3Y,P4X,P4Y,P5X,P5Y,P6X,P6Y,P7X,P7Y,P8X,P8Y,P9X,P9Y,P10X,P10Y)
VALUES ('".$game_dim."' , 0 ,'".$userid_of_graph."', '".$PX1."', '".$PY1."' , '".$PX2."', '".$PY2."', '".$PX3."', '".$PY3."', '".$PX4."', '".$PY4."', '".$PX5."', '".$PY5."',
 '".$PX6."', '".$PY6."', '".$PX7."', '".$PY7."', '".$PX8."', '".$PY8."', '".$PX9."', '".$PY9."', '".$PX10."', '".$PY10."')";

	if(mysqli_query($con, $sql)){
		echo "Records inserted successfully.";
		
	} else{
		echo "ERROR: Could not able to execute $sql.";
	}
	
}





if( isset($_GET['submit_graph']) )
{
	$query='';
	
    //be sure to validate and clean your variables
    $username = htmlentities($_GET['username']);
	$game_dim = htmlentities($_GET['game_dim']);
	$rand_seed = htmlentities($_GET['rand_seed']);
	$point = htmlentities($_GET['point']);
	
	$usernameOfDetail = $username;
	$game_dimensionOfDetail=$game_dim;
	$game_randSeed_idOfDetail=$rand_seed;
	$game_pointOfDetail = $point;
	
	
	$time = "time".$point;

	$user_id = selectid($username);
	
	$useridOfDetail=$user_id;
	
	
	
	setcookie('idisi['.$user_id.']', $user_id ,time()+86400);

	
	  //  echo "</br>username : "."$username"." , user id : "."$user_id"." , game_dim : "."$game_dim"." , random seed :  "."$rand_seed"." , point : "."$point";


		if($game_dim=="All" and $rand_seed=="All" and $point=="All"){
		
		$query	= "SELECT date , (time1+time2+time3+time4+time5+time6+time7+time8+time9+time10)/10 AS average FROM gameinfo where user_id='".$user_id."' order by date asc ";
	
		}else if($rand_seed=="All" and $point=="All")	{

		 $query =	"SELECT date , (time1+time2+time3+time4+time5+time6+time7+time8+time9+time10)/10 AS average FROM gameinfo where user_id='".$user_id."' AND  game_dimension='".$game_dim."' order by date asc ";
	
		}
		else if($game_dim=="All" and $point=="All"){
		
		$query = "SELECT date , (time1+time2+time3+time4+time5+time6+time7+time8+time9+time10)/10 AS average FROM gameinfo where  user_id='".$user_id."' AND game_randSeed_id='".$rand_seed."' order by date asc ";

		}else if($game_dim=="All" and $rand_seed=="All"){

		$query = "SELECT date , ".$time." as average FROM gameinfo WHERE user_id='".$user_id."' order by date asc ";
	
		}
		
		else if($game_dim!="All" and $rand_seed!="All" and $point=="All"){

		$query = "SELECT date , (time1+time2+time3+time4+time5+time6+time7+time8+time9+time10)/10 AS average  FROM gameinfo WHERE user_id='".$user_id."' AND  game_dimension='".$game_dim."'  AND game_randSeed_id='".$rand_seed."' order by date asc ";
	
		}
		
		else if($rand_seed=="All" and $game_dim!="All" and $point!="All"){

		$query = "SELECT date , ".$time." as average FROM gameinfo WHERE user_id='".$user_id."' AND game_dimension='".$game_dim."' order by date asc ";
		
		}else if($game_dim=="All" and $rand_seed!="All" and $point!="All") {

		$query = "SELECT date , ".$time." as average FROM gameinfo WHERE user_id='".$user_id."' AND game_randSeed_id='".$rand_seed."' order by date asc ";
	
		}
		
		else if($game_dim!="All" and $rand_seed!="All" and $point!="All"){
		
        $query = "SELECT date , ".$time." AS average FROM `gameinfo` WHERE user_id='".$user_id."' AND game_dimension='".$game_dim."' AND  game_randSeed_id='".$rand_seed."' order by date asc ";
	
		}
		
		
		
	//	echo "</br>".$query;
	//	echo  "<div style='color:red;font-size:60px;text-align:center;margin-top:25px;margin-bottom:-70px;'>Lazy Eye Game Score Graph</div>";

$result = mysqli_query($con, $query);

$arrayDate = array();
$arrayAvg = array();



while($row = mysqli_fetch_array($result))
{
	
	array_push($arrayDate,$row["date"]);	
	array_push($arrayAvg,number_format((float)$row["average"], 2, '.', ''));
}

}

?>


<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  
 <style>
 body {	
    background-color:#E6E7BB;
   font-family: Comic sans MS;

}
		
	#form_detail{
		margin-right:300px;
		margin-top:100px;
		float:right;
		font-size:25px;
		border:1px solid #BCBC8C;
		padding:10px;
		background-color:#FBF9F9;
		width:450px;
		text-align:center;
		font-weight:bold;
		font-size:25px;
		
	}
	
	#form_detail p{
		border-bottom: 1px solid #BCBC8C;
		color:#87891E;
	}
	
	form.myForm{
		margin-left:3%;
		margin-top:7%;
		margin-bottom:1%;
		width:500px;
		height:400px;
		float:left;
		border:1px solid #BCBC8C;
		background-color: #FBF9F9;
		
	
	}
	
	h2{
		font-size:200%;
		color:green;
		margin-left:5%;
		
	}
	
	form.myForm label{
	font-size:25px;
	color:#87891E;
	
	}
	
	select{
		width:200px;
		height:40px;
		
	}
	
	
	.div-inline{
		display:inline-block;
	}
	
	#divCanvas{
		height:300px;
		
	}
	
	form.myForm button {
		width:100px;
		height:40px;
		padding: 10px;
		background: #2196F3;
		color: green;
		font-size: 17px;
		border: 1px solid #BCBC8C;
		border-radius:5px;	
		margin-left:5%;
	}

	form.myForm button:hover {
		background: #0b7dda;
	}

	form.myForm::after {
		content: "";
		clear: both;
		display: table;
	}
	

	form.myForm input[type="submit"] {
		width:200px;
		height:40px;
		padding: 10px;
		background: #D8D9A1;
		color: green;
		font-size: 17px;
		border: 1px solid #BCBC8C;
		border-radius:5px;	
        margin-left:54%;		
	}
	
	form.myForm input[type="submit"]:hover {
		background: #ACBBBE;
	}
	
	
	
	form#assignPoint input[type="submit"] {

		width:200px;
		height:40px;
		padding: 10px;
		background: #D8D9A1;
		color: green;
		font-size: 17px;
		border: 1px solid #BCBC8C;
		border-radius:5px;	
        margin-left:25%;		
	}
	


	form#assignPoint input[type="submit"]:hover {
		background: #ACBBBE;
	}
	
	#formButton{
		width:210px;
		height:40px;
		padding: 3px;
		background: #D8D9A1;
		color: green;
		font-size: 17px;
		border: 1px solid #BCBC8C;
		border-radius:5px;		
		margin-left:-34%;
		margin-top:35%;
	
	}
	
	#formButton:hover {
		background: #ACBBBE;
	}

	#formButton::after {
		content: "";
		clear: both;
		display: table;
	}
		
	
	label{
    display: inline-block;
    float: left;
    clear: left;
    width: 250px;
    text-align: center;padding:10px;
	}	

	#xyx{
		margin-left:6px;
		margin-right:6px;
		margin-bottom:5px;
		margin-top=5px;
	}

	#xbottom{
		margin-left:7.4px;
		margin-right:7.4px;
		margin-bottom:5px;
		margin-top=5px;
	}

	form#assignPoint{
		display:none;
		margin-left:4%;
		float:center;
		border:1px solid #BCBC8C;
		width:22%; 
		padding:10px;
		background-color: #FBF9F9;
		float:left;
		color:#87891E;
		margin-right:80px;
		
	}
	
	form#graphofPoint{
		width:60%;
		height:50%;
		margin-top:-60px;
		float:left;
	}

	#dimensionButton{
		width:260px;
		height:40px;
		padding: 3px;
		background: #D8D9A1;
		color: green;
		font-size: 17px;
		border: 1px solid #BCBC8C;
		border-radius:5px;	
		margin-left:1.5%;
		
	}
	
	#dimensionButton:hover {
		background: #ACBBBE;
	}

	#dimensionButton::after {
		content: "";
		clear: both;
		display: table;
	}
	
	#dimensionOne{
		border:1px solid #BCBC8C; 
		float:left; 
		margin-right:20px;
		margin-left:20px;
		margin-bottom:50px;
	}
	
	#dimensionTwo{
		font-weight:bold;
		font-size:25px;font-family: Comic sans MS; padding-left:20%;
		color:#87891E;
	}
	
	table, th, td {
		border: 1px solid black;
	}
	
	.DimensionButton{
		width:180px;
		height:35px;
		padding: 3px;
		background: #D8D9A1;
		color: green;
		font-size: 17px;
		border: 1px solid #BCBC8C;
		border-radius:5px;	
		margin-left:5%;
	}
	
	.DimensionButton:hover {
		background: #ACBBBE;
	}

	.DimensionButton::after {
		content: "";
		clear: both;
		display: table;
	}
	
	.tables{
		margin-left:80px;
		margin-top:50px;
		margin-bottom:50px;
		text-align:center;
		display:none;
		font-weight:bold;
		font-size:15px;font-family: Comic sans MS;
		color:#87891E;
		
	}
	
 </style>
 
 </head>
 
 <body>
	<h2  style="color:darkgreen;font-size:60px;text-align:center;margin-top:25px;margin-bottom:-70px;">Lazy Eye Game Score Graph</h2>

<form  class="myForm" action="" method="get">

   <h2 style="margin-left:100px">Please Choose Details</h2>  
  
 <label>Select username : </label>

	<?php include 'db.php'; 
	$query =mysqli_query($con,"SELECT * FROM users")or die ("Username check query failed"); 

	echo"<select name='username' id='username'>";
	 while ($row=mysqli_fetch_assoc($query)){
		 
		 echo"<option value='".$row['username']."'>" .$row['username']. "</option>";
	 }
	  echo "</select>";
 ?>
	
	<br></br>

 <label>Game Dimension : </label>

	<select class="div-inline" name='game_dim' id="game_dim">
     <option value='All' >All</option>
	 <option value='8x6' >8x6</option>
     <option value='12x8'>12x8</option>
     <option value='16x9'>16x9</option>
     </select>

	<br></br>

 <label>Random Seed : </label>


	<select class="div-inline" name='rand_seed' id="rand_seed">
	 <option value='All' >All</option>
	  <option value='0'>0</option>	
	 <option value='1'>1</option>
     <option value='2'>2</option>
     <option value='3'>3</option>
     </select>
	 
	 <br></br>

 <label>Points : </label>

	 <select class="div-inline" name='point' id="point">
      <option value='All' >All</option>
	 <option value='1'>1</option>
     <option value='2'>2</option>
     <option value='3'>3</option>
	 <option value='4'>4</option>
     <option value='5'>5</option>
     <option value='6'>6</option>
	 <option value='7'>7</option>
     <option value='8'>8</option>
     <option value='9'>9</option>
	 <option value='10'>10</option>

     </select>

	</br></br>
  
  <input type="submit"  name="submit_graph" value="Show Graph"></input>

    </form>
	
 </br>
	
	<div id="form_detail">
	<p> Username : <?php echo  $usernameOfDetail; ?> </p>
	<p> User ID  : <?php echo $useridOfDetail; ?> </p>
	<p> Game Dimension : <?php echo  $game_dimensionOfDetail; ?> </p>
 	<p> Random Seed : <?php echo  $game_randSeed_idOfDetail; ?> </p>
	<p>	Point : <?php echo  $game_pointOfDetail; ?> </p>
	</div>


	<button id="formButton" onclick="myFunction()">Show Form of Input Points</button>
	<button id="dimensionButton" >Display Game Dimensions Panel</button> </br></br>

	
<form id="assignPoint" action="" method="get">
</br>

	Game Dimension:
	<select name='game_dim_insert' id="game_dim" style="width:190px;">
	 <option value='8x6' >8x6</option>
     <option value='12x8'>12x8</option>
     <option value='16x9'>16x9</option>
     </select>
	 
	 </br></br>	

	Point 1 X : <input type="text" name="P1X" size="5" id="xbottom" >
	Point 1 Y : <input type="text" name="P1Y" size="5" id="xbottom" ><br>
	Point 2 X : <input type="text" name="P2X" size="5" id="xyx">
	Point 2 Y : <input type="text" name="P2Y" size="5" id="xyx"><br>
	Point 3 X : <input type="text" name="P3X" size="5" id="xyx">
	Point 3 Y : <input type="text" name="P3Y" size="5" id="xyx"><br>
	Point 4 X : <input type="text" name="P4X" size="5" id="xyx">
	Point 4 Y : <input type="text" name="P4Y" size="5" id="xyx"><br>
	Point 5 X : <input type="text" name="P5X" size="5" id="xyx">
	Point 5 Y : <input type="text" name="P5Y" size="5" id="xyx"><br>
	Point 6 X : <input type="text" name="P6X" size="5" id="xyx">
	Point 6 Y : <input type="text" name="P6Y" size="5" id="xyx"><br>
	Point 7 X : <input type="text" name="P7X" size="5" id="xyx">
	Point 7 Y : <input type="text" name="P7Y" size="5" id="xyx"><br>
	Point 8 X : <input type="text" name="P8X" size="5" id="xyx">
	Point 8 Y : <input type="text" name="P8Y" size="5" id="xyx"><br>
	Point 9 X : <input type="text" name="P9X" size="5" id="xyx">
	Point 9 Y : <input type="text" name="P9Y" size="5" id="xyx"><br>
	Point 10 X:<input type="text" name="P10X" size="5" id="xyx">
	Point 10 Y: <input type="text" name="P10Y" size="5" id="xyx"><br><br>
	
	<input type="submit"  value="Submit Points" name="submit_insert_point">
	
</form>

</br></br>

<form id="graphofPoint">

     <canvas id="line-chart" ></canvas>

</form>

<br/>
<br/>

<div style="margin-top:410px;">
	<button class="DimensionButton" id="Dim8x6Rand" style="margin-left:5%;" >8x6 Random Display</button>
	<button class="DimensionButton" id="Dim12x8Rand" >12x8 Random Display</button> 
	<button class="DimensionButton" id="Dim16x9Rand">16x9 Random Display</button>
</div>




<div class="tables" id="8x6Random-1" style="float:left;">
<table>
	<tr>
		<th>Random Seed-1</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
		<td>Point 1</td>
		<td>1 , 2</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>6 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>5, 2</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>1 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>2 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>2 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>1 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>3 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>1 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>6 , 4</td> 
	</tr> 
 </table>
</div>

<div class="tables" id="8x6Random-2" style="float:left;">
<table>
	<tr>
		<th>Random Seed-2</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
		<td>Point 1</td>
		<td>4 , 2</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>7 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>3, 4</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>3 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>3 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>5 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>6 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>7 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>5 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>6 , 2</td> 
	</tr> 
 </table>
</div>

<div class="tables"  id="8x6Random-3" style="float:left;width:500px;">

<table>
	<tr>
		<th>Random Seed-3</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>7 , 1</td>
	</tr>
	<tr>
		 <td>Point 2</td>	
		 <td>4 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>3, 2</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>1 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>4 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>6 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>1 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>7 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>3 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>5 , 5</td> 
	</tr> 
 </table>
</div>


<div class="tables" id="12x8Random-1" style="float:left;">
<table>
	<tr>
		<th>Random Seed-1</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>8 , 4</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>2 , 6</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>7, 2</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>4 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>5 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>1 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>8 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>8 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>7 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>5 , 4</td> 
	</tr> 
 </table>
</div>

<div class="tables" id="12x8Random-2" style="float:left;">
<table>
	<tr>
		<th>Random Seed-2</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>11 , 3</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>9 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>6 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>5 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>9 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>8 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>7 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>5 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>9 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>1 , 3</td> 
	</tr> 
 </table>
</div>

<div class="tables" id="12x8Random-3" style="float:left;width:500px;">
<table>
	<tr>
		<th>Random Seed-3</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>5 , 2</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>5 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>7 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>10 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>1, 2</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>4 , 6</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>11 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>7 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>6 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>6 , 1</td> 
	</tr> 
 </table>
</div>


<div class="tables" id="16x9Random-1" style="float:left;">
<table>
	<tr>
		<th>Random Seed-1</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>2 , 7</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>8 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>7 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>5 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>14 , 4</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>9 , 5</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>1 , 11</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>10 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>3 , 6</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>8 , 5</td> 
	</tr> 
 </table>
</div>

<div class="tables" id="16x9Random-2" style="float:left;">
<table>
	<tr>
		<th>Random Seed-2</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>1 , 7</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>12 , 8</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>15 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>6 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>6 , 8</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>6 , 6</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>6 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>2 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>4 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>12 , 7</td> 
	</tr> 
 </table>
</div>

<div class="tables" id="16x9Random-3" style="float:left;width:500px;">
<table>
	<tr>
		<th>Random Seed-3</th> 
		<th>X-Y</th> 	
	</tr> 
	<tr> 
	     <td>Point 1</td>
		 <td>7 , 5</td>
	</tr>
	<tr>
		 <td>Point 2</td>
		 <td>11 , 6</td> 
	</tr> 
	<tr>
		 <td>Point 3</td>
		 <td>4 , 2</td> 
	</tr> 
	<tr>
		 <td>Point 4</td>
		 <td>4 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 5</td>
		 <td>8 , 3</td> 
	</tr> 
	<tr>
		 <td>Point 6</td>
		 <td>8 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 7</td>
		 <td>2 , 7</td> 
	</tr> 
	<tr>
		 <td>Point 8</td>
		 <td>5 , 6</td> 
	</tr> 
	<tr>
		 <td>Point 9</td>
		 <td>7 , 1</td> 
	</tr> 
	<tr>
		 <td>Point 10</td>
		 <td>6 , 7</td> 
	</tr> 
 </table>
</div>


<form id="dimension" action="" method="get" style="display:none; margin-top:50px;"> 
	<div id="dimensionOne"><div id="dimensionTwo">8X6 Game Dimension  </div><img style="margin-top:30px;margin-bottom:-10px;" src="8x66.png" alt="" height="355" width="430"/></div>
	<div id="dimensionOne"><div id="dimensionTwo">12X8 Game Dimension </div><img style="margin-top:30px;margin-bottom:-10px" src="12x88.png" alt="" height="355" width="430"/></div>
	<div id="dimensionOne"><div id="dimensionTwo">16X9 Game Dimension </div><img style="margin-top:30px;margin-bottom:-10px" src="16x99.png" alt="" height="355" width="430"/></div>
</form>


</body>
</html>	
<script type="text/javascript">

$(document).ready(function(){
    $("#formButton").click(function(){
        $("#assignPoint").toggle();
    });
});

$(document).ready(function(){
    $("#dimensionButton").click(function(){
        $("#dimension").toggle();
    });
});

$(document).ready(function(){
    $("#Dim8x6Rand").click(function(){
		$("#12x8Random-1").hide();
		$("#12x8Random-2").hide();
		$("#12x8Random-3").hide();
		$("#16x9Random-1").hide();
		$("#16x9Random-2").hide();
		$("#16x9Random-3").hide();
        $("#8x6Random-1").toggle();
		$("#8x6Random-2").toggle();
		$("#8x6Random-3").toggle();
    });
});

$(document).ready(function(){
    $("#Dim12x8Rand").click(function(){
		$("#8x6Random-1").hide();
		$("#8x6Random-2").hide();
		$("#8x6Random-3").hide();
		$("#16x9Random-1").hide();
		$("#16x9Random-2").hide();
		$("#16x9Random-3").hide();
        $("#12x8Random-1").toggle();
		$("#12x8Random-2").toggle();
		$("#12x8Random-3").toggle();
    });
});

$(document).ready(function(){
    $("#Dim16x9Rand").click(function(){
		$("#12x8Random-1").hide();
		$("#12x8Random-2").hide();
		$("#12x8Random-3").hide();
		$("#8x6Random-1").hide();
		$("#8x6Random-2").hide();
		$("#8x6Random-3").hide();
		$("#16x9Random-1").toggle();
		$("#16x9Random-2").toggle();
		$("#16x9Random-3").toggle();

    });
});




var arrayDate = <?php echo json_encode($arrayDate) ?>;

var arrayAvg = <?php echo json_encode($arrayAvg) ?>;



new Chart(document.getElementById("line-chart"), {
  type: 'line',
  data: {
    labels: arrayDate,
    datasets: [{ 
        data: arrayAvg,
        label: "Score Graph Avearage",
        borderColor: "#87891E",
        fill: false
      }
    ]
  },
  options: {
    title: {
      display: true,
      text: 'Game Score Visualization'
    }
  }
});


</script>
