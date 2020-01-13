<?php

	
		$q = "Select advertname from tbl_adverts where curdate()<=duedate;";
		$r = mysqli_query($connection,$q);
		$rows1=0;
		while($row = mysqli_fetch_assoc($r)){
		
			$addimg[$rows1]=$row["advertname"];
			$rows1++;
		}
	if(!isset($_SESSION["timgs"])){
		$_SESSION["timgs"]=$rows1-1;
	}


?>