<?php
	session_start();
	
	if(!isset($_SESSION["add"])){
		$_SESSION["add"]=0;		
	}
	
	$db['db_host'] = "localhost";
	$db['db_user'] = "root";
	$db['db_pass'] = "";
	$db['db_name'] = "cms";

	foreach ($db as $key => $value) {
		define(strtoupper($key), $value);
	}
	
	$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	
	include('stic.php');
	
	mysqli_query($connection,'SET character_set_results=utf8');
mysqli_query($connection,'SET names=utf8');
mysqli_query($connection,'SET character_set_client=utf8');
mysqli_query($connection,'SET character_set_connection=utf8');
mysqli_query($connection,'SET character_set_results=utf8');
mysqli_query($connection,'SET collation_connection=utf8_general_ci');
	
	if(isset($_GET["del"])){
		setcookie("User","",time()-3600,"/");
		header("Location: HomePage.php");
	}
?>

<head>
	<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
	<style>
		#hin{

			background: rgba(0,255,0,0.2);
			color: green;
			//font-weight:bold;
			border-top-right-radius: 30px;
			-webkit-border-bottom-right-radius: 30px;
		}
		
		#home{

			background: rgba(135,206,250,0.3);
			color: blue;
			//font-weight:bold;
			border-top-right-radius: 30px;
			-webkit-border-bottom-right-radius: 30px;
		}
		
	</style>
</head>


<?php

	
		
	include("../Pages/HeaderHindi.html");
	include("../Pages/HomepageHindi.html");
	include("../Pages/SlideHindi.html");
	include("../Pages/HomepageHindi.php");
	include("../Pages/FooterHindi.html");


?>