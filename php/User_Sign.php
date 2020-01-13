<?php	
	session_start();
	if(!isset($_SESSION["add"])){
		$_SESSION["add"]=0;
		//$_SESSION["old"]=1;
	}
	$error ="";
		
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

if(isset($_POST["submit"])){
	$u = $_POST["name"];
	$p = $_POST["pwd"];
	
	$q = "select * from tbl_user where usr_name=\"".$u."\";";
	echo $q;
	$r = mysqli_query($connection,$q);
	echo mysqli_error($connection);
	$rows=0;
	$id=0;
	while($row = mysqli_fetch_assoc($r)){
		$rows++;
		$id=$row["id"];
	}
	if($rows==0){
		$error="* User not exist... please sign up first...";
	} else {
		if($rows==1){
			$q = "select password from tbl_user where id=".$id;
			echo $q;
			$r = mysqli_query($connection,$q);
			echo mysqli_error($connection);
			$row = mysqli_fetch_assoc($r);
			$pass = $row["password"];
			if($pass==md5($p)){
				setcookie("User",$id,time()+(86400)*7,"/");
				header('Location: Dashboard.php');
			} else {
				$error="* user name or password is not correct";
			}
		} else{
			$error=" Some error occure... please try again letter..";
		}
	}
	
}


?>


<head>
	<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
	<style>
		#usr{
	
	background: rgba(0,255,0,0.2);
	color: green;
	//font-weight:bold;
	border-top-right-radius: 30px;
	-webkit-border-bottom-right-radius: 30px;
}
	</style>
</head>

<?php
	

	include("../Pages/Header.html");
	include("../Pages/User_Sign.html");
	include("../Pages/Footer.html");

	
?>