<?php 
include_once('../editor/resource/db/db.php');

if (!empty($_GET['scrh'])) {
	$search = mysqli_real_escape_string($connection,$_GET['scrh']);
	
	$query = "SELECT * from tbl_news where tittle like '%$search%' or description like '%$search%' or details like '%$search%'";

	$result = mysqli_query($connection,$query);

	while ($row = mysqli_fetch_assoc($result)) {
		
		echo '<a>'.$row['tittle'].$row['description'].$row['details'].'</a>';
	}
}
?>