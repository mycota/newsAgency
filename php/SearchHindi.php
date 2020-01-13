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
	
	if(isset($_GET["del"])){
		setcookie("User","",time()-3600,"/");
		header("Location: HomePage.php");
	}
?>

<head>
	<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
	<style>
		
	</style>
</head>


<?php

	
		
	include("../Pages/HeaderHindi.html");
	include("../Pages/HomepageHindi.html");
	//include("../Pages/Slide.html");
	include("../Pages/SearchHindi.php");
	include("../Pages/FooterHindi.html");


?>