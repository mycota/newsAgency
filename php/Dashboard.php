<?php
	$reverse="";
	session_start();
	
	if(!isset($_SESSION["add"])){
		$_SESSION["add"]=0;		
	}
	
	
	$usr = " Welcome To NNA";
	$board = "Advertisment";

	$db['db_host'] = "localhost";
	$db['db_user'] = "root";
	$db['db_pass'] = "";
	$db['db_name'] = "cms";

	foreach ($db as $key => $value) {
		define(strtoupper($key), $value);
	}
	
	$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	include('stic.php');

	include('advert.php');
	
	if(isset($_COOKIE["User"])){
		
		$id = $_COOKIE["User"];
		$q = "Select fullname from tbl_user where id=".$id.";";
		//echo $q;
		$r = mysqli_query($connection,$q);
		echo mysqli_error($connection);
		$row = mysqli_fetch_assoc($r);
		$board = "Dashboard";
		$usr .= ", ".$row["fullname"];
		$usr.=" ";
		$style = "margin: auto; display:block; width: 80%; min-width: 490px; position: relative; top: 50px;";
		
	} else {
		$style = "margin: auto; display:block; width: 60%; min-width: 490px; position: relative; top: 50px;";
		//header('Location: HomePage.php');
		//echo "Some error occures...";
	}
	
	
	$sign=0;
	
	if(isset($_COOKIE["User"])){
		$sign=1;
	}
?>

<head>
	<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
</head>

<span id="sign" hidden><?php echo $sign; ?></span>

<script>
	function check(){
		s = document.getElementById("sign");
		if(s.innerHTML=='0'){
			alert("Please Sign In");
			return false;
		}
		else {
			return true;
		}
	}
</script>

<style>
#Addvert{

			background: rgba(0,255,0,0.2);
			color: green;
			//font-weight:bold;
			border-top-right-radius: 30px;
			-webkit-border-bottom-right-radius: 30px;
		}
</style>


<?php


	include("../Pages/Header.html");
	include("../Pages/Dashboard.html");
	include("../Pages/Footer.html");


?>