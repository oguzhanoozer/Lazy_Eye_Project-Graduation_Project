
</div><!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
    font-family: Arial;
}

* {
    box-sizing: border-box;
}


form.example button {

    width:60px;
	height:40px;
    padding: 10px;
    background: #2196F3;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
	border-radius:5px;	
   margin-left:1%;
	
}

form.example button:hover {
    background: #0b7dda;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}

select{
	
	width:200px;
	height:50px;

	margin-left:40%;
}
body{
	background-color:#F7F5F6;
}

div{
	
	
	margin-left:40%;
	margin-top:10%;
	margin-bottom:1%;
	
}

</style>
</head>
<body>

<form class="example" method="post" action="graph.php" >

<div style="font-size:1.2vw;">  Select username:</div>

<?php include 'db.php'; 
$query = mysqli_query($con,"SELECT * FROM users")or die ("Username check query failed"); 

echo"<select name='option' id='option'>";
 while ($row=mysqli_fetch_assoc($query)){
	 
     echo"<option value='".$row['username']."'>" .$row['username']. "</option>";
 }
  echo "</select>";
 ?>
  


<button type="submit"><i class="fa fa-search" value=" "></i></button>
</form>

	</body>
	</html> 

</form>
</body>
</html>



