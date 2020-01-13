<?php	
	session_start();
	if(!isset($_SESSION["add"])){
		$_SESSION["add"]=0;
		//$_SESSION["old"]=1;
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

include('advert.php');

	
		
?>


<head>
	<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
	
</head>

<?php
	

	include("../Pages/Header.html");
	include("../Pages/Add_Registration.html");
	include("../Pages/Footer.html");

	
	
?>