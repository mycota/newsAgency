<?php
	session_start();
	
	if(!isset($_SESSION["add"])){
		$_SESSION["add"]=0;		
	}
	
	$addimg[0]="add1.jpg";
	$addimg[1]="add2.jpg";
	$addimg[2]="add3.jpg";
	$addimg[3]="add4.jpg";
	
			$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

include('stic.php');
?>

<head>
	<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
	<style>
		#world{

			background: rgba(135,206,250,0.3);
			color: blue;
			//font-weight:bold;
			border-top-right-radius: 30px;
			-webkit-border-bottom-right-radius: 30px;
		}
	</style>
</head>


<?php


	include("../Pages/Header.html");
	include("../Pages/Homepage.html");
	echo "<div style='height: 100px'> </div>";
	include("../Pages/Homepage.php");
	include("../Pages/Footer.html");


?>