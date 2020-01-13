	<?php 
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

		if ($status == 'Published') {
			echo "<script>alert('Sorry this News is published aready.'); window.location='./news.php?source=draft_news'</script>";
		}

		$publishdate = mysqli_real_escape_string($connection,$_POST['pdate']);
		$enddate = mysqli_real_escape_string($connection,$_POST['enddate']);
		$idnews = $_POST['idnews'];
		$username = $_POST['username'];

		if ($status == 'Archived') {

				   $query = "select * from tbl_news where draft_ids = $idnews";

  					$select_query = mysqli_query($connection,$query);

  					confirmQuery($select_query);

  					while ($row = mysqli_fetch_assoc($select_query)) {
    				$newsid = $row['newss_id'];
    				}

			       $query = "update tbl_news SET news_status = '', date_published = '$publishdate', end_date = '$enddate' where newss_id = $newsid";
                   $update = mysqli_query($connection,$query);
                   confirmQuery($update);

                   $queryd = "update tbl_draft_news SET draft_status = 'Published' where draft_id = $idnews";
                   $updated = mysqli_query($connection,$queryd);
                   confirmQuery($updated);

                      echo "<script>alert('News has being republished.'); window.location='./news.php?source=current_news'</script>";
		}

		$querydn = mysqli_query($connection, "select * from tbl_draft_news where draft_id = $idnews");

		while ($row = mysqli_fetch_assoc($querydn)) {
			
			$tittle = mysqli_real_escape_string($connection,$row['tittle']);
			$description = mysqli_real_escape_string($connection,$row['description']);
			$details = mysqli_real_escape_string($connection,$row['details']);
			$authorid = $row['authorid'];
			$editorid = $row['editorid'];
			$categoryID = $row['categoryID'];
			$language = $row['language'];
			$datecreated = $row['datecreated'];
			$imge_id = $row['imge_id'];
		}

		$querynews = "insert into tbl_news (draft_ids,tittle, description,details,authorid,editorid,categoryID,language,date_published,end_date,img_id)";
		$querynews .= "value ($idnews,'$tittle', '$description', '$details', $authorid, $editorid,'$categoryID', '$language', '$publishdate', '$enddate','$imge_id')";
		$inserted = mysqli_query($connection,$querynews);

		confirmQuery($inserted);

		$querydraft = mysqli_query($connection, "update tbl_draft_news set draft_status = 'Published' where draft_id = '$idnews'");
		confirmQuery($querydraft);

		
		if ($publishdate == date('Y-m-d')) {
		echo "<script>alert('News has being successfully published'); window.location='./news.php'</script>";
		}
		else{
		echo "<script>alert('News has being successfully scheduled to run form $publishdate to $enddate'); window.location='./news.php?source=draft_news'</script>";
		}
	}
	?>
