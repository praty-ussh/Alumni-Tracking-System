
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="sblog2.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:900&display=swap" rel="stylesheet">
    <style>
	
.navbar-inverse {
background: #2c3e50;
color: white;
}
.navbar-inverse .navbar-brand, .navbar-inverse a{
color:white;
}
.navbar-inverse .navbar-nav>li>a {
color: white;
}

    div h2
{
	font-family: Source Sans Pro;
	color: #2c3e50;
}
div p:nth-of-type(1){
	color: #3498db;
	text-transform: uppercase;
}
body{
	border:20px #A9A8A7 solid;
    margin-top: 8%;
	margin-left: 15%;
	margin-right: 15%;
}
div{
	margin:5%;
}

        div:nth-of-type(2){
	border-bottom: 1px solid #ECEAE8;
   
}
div p:nth-of-type(3){
	border-left:10px solid #A9A8A7;
	padding-left: 1%;
}
div p:nth-of-type(4){
	border-left:10px solid #A9A8A7;
	padding-left: 1%;
        }
div p:nth-of-type(5){
	border-left:10px solid #A9A8A7;
	padding-left: 1%;
        }
        </style>
</head>
<body>
    <?php include('originalfeed.php') ?>    
	<?php
	
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "Pratyush.123";
	$dbname= "test";
	$connection= new mysqli($host,$dbusername,$dbpassword,$dbname);
	if(mysqli_connect_error()){
		die('Connection Error ('.mysqli_connect_errno .')'.mysqli_connect_error);
	}
	else{
		$select = "SELECT * From feedback LIMIT 1";
		$stmt = $connection->prepare($select);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($bio,$email,$high,$grad,$other,$currpos,$currcomp);
		$stmt->fetch();
		//echo $roll;
	?>
	
	<div id="main">
		<p>Name</p>
        <p><b>Phone No.</b></p>
        <p><b>Email Id:</b></p>
		<h2>This is My First Article</h2>
		<p id="main1"></p>
		<button><a href="#">okay</a></button>
	</div>

</body>
</html>