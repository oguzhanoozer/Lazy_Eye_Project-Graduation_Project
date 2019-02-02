<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <style> 
input[type=text] {
    width: 50%;
    padding: 8px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid gray;
    border-radius: 4px;
	margin-left: 2%;
	padding: 
}


input[type=password] {
    width: 50%;
    padding: 8px 10px;
    margin: 8px 0;
    box-sizing: border-box;
    border: 2px solid gray;
    border-radius: 4px;
	margin-left: 2%;
	
}


form.example button {

  width:100px;
	height:40px;
    padding: 10px;
    background: #778899;
    color: white;
    font-size: 17px;
    border: 1px solid grey;
    border-radius:5px;	
	margin-left:32%;
  
}

form.example{
	
	width:40%;
	height:300px;
}

form.example button:hover {
    background: #A9A9A9;
}

form.example::after {
    content: "";
    clear: both;
    display: table;
}
	
type{

	margin-left:2%;
	font-style: normal;
}

form{
	
	padding:20px;
	margin-left:35%;
	margin-top:2%;
	
}

body{
	background-color:#E6E7BB;
	font-family: Comic sans MS;

}

h2{
	margin-top:-6%;
	text-align:center;
	font-style: normal;
	color: #5B5C0D;
}

h5{
	margin-top:2%;
	margin-left:60px;
	font-style: normal;
	color: #5B5C0D;
	text-align:center;
}

label{
	color:#2C2D01;
	
}

#inpt{
	margin-left:-1%;
}


#inptt{
	margin-left:-0%;
}



</style>
</head>

<body>

<h5	 style="font-size:4vw;">Lazy Eye Treatment Game</h5>
<h2 style="font-size:4vw;"> Admin Login</h2>

<form class="example" method="post" action="adminLogin.php">
 
   
    <label id="inpt" >Username : </label>
    <input type="text" name="username" placeholder="Username">
    <br>
    
	<label  id="inptt" >Password : </label>
	<input type="password" name="password" placeholder="Password" >
    <br><br>
    
	<button type="submit" value="Login">Login</button>
 	

</form>
</body>
</html>



