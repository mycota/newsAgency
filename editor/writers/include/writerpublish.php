	<?php 
	//ob_start();
     // include "../resource/db/db.php"; 
     //  include "../resource/db/function.php";  
      
		$error = '';

		$db['db_host'] = "localhost";
        $db['db_user'] = "root";
		$db['db_pass'] = "mac802.11";
		$db['db_name'] = "newsagency";

		foreach ($db as $key => $value) {
			define(strtoupper($key), $value);
		}

		$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

		function confirmQuery($result){
      
      	global $connection;
    
    	if (!$result) {
    	die("Query Failed !!" .mysqli_error($connection));
    	}
	}

	if (!empty($_POST)) {

		$output = '';
		$status = $_POST['status'];

		if ($status == 'Pending') {
			echo "<script>alert('Sorry this News is alredy submited to editor.'); window.location='./news.php?source=draft_news'</script>";
		}

		
		$idnews = $_POST['idnews'];
		$username = $_POST['username'];
		$editorid = $_POST['editor'];

        $queryd = "update tbl_draft_news SET draft_status = 'Pending', editorid = '$editorid' where draft_id = $idnews";
        $updated = mysqli_query($connection,$queryd);
        confirmQuery($updated);

        echo "<script>alert('News has being submited and is waiting for approval.'); window.location='./news.php?source=draft_news'</script>";

		
	}
	?>
