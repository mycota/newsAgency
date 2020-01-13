<?php
	$host='LocalHost';
	$user='root';
	$passwd='';
	
	try{
	$connection=mysqli_connect($host,$user,$passwd,"paresh");
	}
	catch(Exception $e){
		echo $e->getMessage()."Error";
	}

	$result = mysqli_query($connection,'Show databases;');
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

	header('Location: ./php/HomePage.php');
?>


<?php
mysqli_close($connection);
?>