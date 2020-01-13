<?php 
	$error = '';
	$done ='';

	if (isset($_GET['did']) and isset($_GET['usr'])) {
		$newsid = mysqli($_GET['did']);
		$usr = mysqli($_GET['usr']);

	}

	$query = "select * from tbl_draft_news, tbl_image, tbl_news_category where draft_id = '$newsid' and imge_id = image_id and categoryID = newscat_id";
	$select_query = mysqli_query($connection,$query);

	confirmQuery($select_query);

	while ($row = mysqli_fetch_assoc($select_query)) {
		$news_title = mysqli($row['tittle']);
		$descript = mysqli($row['description']);
		$catid = mysqli($row['categoryID']);
		$catname = mysqli($row['newscat_name']);
		$langu = mysqli($row['language']);
		$newsdetail = $row['details'];
		$image = mysqli($row['path']);
		$status = mysqli($row['draft_status']);
		$imge_id = mysqli($row['imge_id']);
	}

if (isset($_POST['update_draft'])) {

		  $query = "SELECT * from tbl_draft_news WHERE draft_id = $newsid";
          $select_empl_by_id = mysqli_query($connection, $query); 

          while ($row = mysqli_fetch_assoc($select_empl_by_id)) {

            $dstatus = mysqli($row['draft_status']);
          }

          
	$username = mysqli($_POST['username']);
	$newscat = mysqli($_POST['newscat']);
	$lang = mysqli($_POST['lang']);
	$title = mysqli($_POST['newstitle']);
	$news_discrpt = mysqli($_POST['news_discrpt']);
	$news_content = mysqli($_POST['news_content']);
    $imge = mysqli($_FILES['image']['name']);
    $imge_temp = mysqli($_FILES['image']['tmp_name']);

    $query = "select * from tbl_employee_login where username = '$username'";
    $select_query = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_query)) {
    	
    	$empid = mysqli($row['empID']);
    }

    if ($dstatus != "Drafting") {

            echo "<script>alert('Sorry this news is aready Published and cannot be updated!'); window.location='./news.php?source=edit_compose&did=$newsid&usr=$username'</script>";
             
          }

    elseif (empty($imge)) {
    	$query = "UPDATE tbl_draft_news SET ";
    	$query .= "tittle = '$title', ";
    	$query .= "description = '$news_discrpt', ";
    	$query .= "details = '$news_content', ";
    	$query .= "categoryID = '$newscat', ";
    	$query .= "language = '$lang', ";
    	$query .= "draft_user = '$username' ";
    	$query .= "where draft_id = '$newsid'";

    	$update_news = mysqli_query($connection, $query);
        confirmQuery($update_news);

        $queryimg = "UPDATE tbl_image SET ";
    	$queryimg .= "detail = '$news_discrpt' ";
    	$queryimg .= "where image_id = '$newsid'";

    	$update_image = mysqli_query($connection, $queryimg);
        confirmQuery($update_image);

    	header("Location: news.php?source=edit_compose&did=$newsid&usr=$username"); 
    }
	else{
		unlink("../resource/images/newsimage/".$image);
		move_uploaded_file($imge_temp, "../resource/images/newsimage/$imge");

		$query = "UPDATE tbl_draft_news SET ";
    	$query .= "tittle = '$title', ";
    	$query .= "description = '$news_discrpt', ";
    	$query .= "details = '$news_content', ";
    	$query .= "categoryID = '$newscat', ";
    	$query .= "language = '$lang', ";
    	$query .= "draft_user = '$username' ";
    	$query .= "where draft_id = '$newsid'";

    	$update_news = mysqli_query($connection, $query);
        confirmQuery($update_news);

        $queryimg = "UPDATE tbl_image SET ";
    	$queryimg .= "name = '$imge', ";
    	$queryimg .= "path = '$imge', ";
    	$queryimg .= "detail = '$news_discrpt' ";
    	$queryimg .= "where image_id = '$imge_id'";

    	$update_image = mysqli_query($connection, $queryimg);
        confirmQuery($update_image);

    	header("Location: news.php?source=edit_compose&did=$newsid&usr=$username"); 

	}
}

?>


<form action="" method="POST" enctype="multipart/form-data">
	
	<div id="page-wrapper">

    <div class="container-fluid">
    <center><h2 class="page-header" style="background-color: #4B0082; color: white;">
       Edit News
    </h2></center>
	<div class="row" style="background-color: #F8F8FF;" id="draft_table">
     	<input type="hidden"  name="username" value="<?php echo $_SESSION['username'];?>" required  class="form-control" >              
    <div class="col-lg-12 col-md-12">
    	<div class="form-group">
    <label for="title">News Category (Select Category)</label>
    <select class="form-control" name="newscat" id="post_category">
    <option value="<?php echo $catid;?>" ><?php echo $catname; ?></option>
    	   <?php

          $query = "select * from tbl_news_category";
          $select_newscat = mysqli_query($connection, $query);
          
          confirmQuery($select_newscat);

          while ($row = mysqli_fetch_assoc($select_newscat)) {
          $newscat_id = mysqli($row['newscat_id']);
          $newscat_name = mysqli($row['newscat_name']);

          echo "<option value='$newscat_id'>$newscat_name</option>";
}

    	  ?>
       </select>
    </div>
    <div class="form-group">
    <label for="title">Language (Select language)</label>
    <select class="form-control" name="lang" id="post_category">
    	  <option value="<?php echo $langu;?>" ><?php echo $langu; ?></option>
    	  <option value='English'>English</option>"
    	  <option value='Hindi'>Hindi</option>"
    </select>
    </div>
	<div class="form-group">
    <label for="title">News Title (Headlines)</label>
	<input type="text" name="newstitle" required value="<?php echo $news_title;?>" class="form-control" >
	</div>

	<label for="news_image">Headline Picture</label>
	<div class="form-group">
		<img width="100" src="../resource/images/newsimage/<?php echo $image; ?>" alt=""></label>
    <input type="file" class="form-control" name="image">
    <font><?php echo "$error"; ?></font>
  </div>
    <div class="form-group">
		<label for="news_description">News Discription</label>
		<textarea class="form-control" name="news_discrpt" value="" id="" cols="30" rows="5"><?php echo $descript;?></textarea>
	</div>
<!-- </div>

<div class="col-lg-6 col-md-6"> -->
	<div class="form-group">
		<label for="post_content">News Content</label>
		<textarea class="form-control" name="news_content" value="" id="body" cols="30" rows="21"><?php echo $newsdetail;?></textarea>
	</div>
	<center><div class="form-group">
		<input type="submit" class="btn btn-success btn-lg btn-block" name="update_draft" value="Update">
	</div></center>
</div>

</form>

<!-- Modal form -->
<div id="add_data_modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<center><h4 style="background-color: #2E8B57; color: white;" class="modal-title">Publish News</h4></center>
			</div>
			<div class="modal-body">
				<form method="post" id="insert_form">
					
					<div class="form-group">
    					<label for="title">Publish Date</label>
						<input type="date" name="pdate" id="pdate"  placeholder="News Title" class="form-control" >
					</div>
					<input type="hidden"  name="username" id="username" value="<?php echo $_SESSION['username'];?>" required  class="form-control" >  

					<input type="hidden"  name="idnews" id="idnews" value="<?php echo $newsid;?>"   class="form-control" >

					<input type="hidden"  name="status" id="status" value="<?php echo $status;?>"   class="form-control" >                          


					<div class="form-group">
						<label for="post_image">End Date</label>
						<input  type="date" class="form-control" name="enddate" id="enddate"> 
					</div>

				    <input type="submit" class="btn btn-success btn-block" name="insert" id="insert" value="Publish News">
			</div>
			<div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
		</div>
	</div>
</div>
<div align="left">
<button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_modal" class="btn btn-primary btn-lg btn-block"class="btn btn-primary">Publish</button></div>
	<!-- <font style="color:rgb(255, 95, 66);; font:bold 18px 'Aleo';"><?php //echo $done;?> -->
		
	<!-- </font> <br> -->

</div>
</form>
 <script>
 $(document).ready(function(){
 	$('#insert_form').on('submit', function(event){
		event.preventDefault();
		if($('#pdate').val() == "")
		{
			alert("Publish date is required");
		}
		else if($('#enddate').val() == "")
		{
			alert("End date is required");
		}
		// else if($('#status').val() == "Published")
		// {
		// 	alert("Sorry this News is published aready.");
		// }
		else
		{
			$.ajax({
				url:"include/editorpublish.php",
				method:"POST",
				data:$('#insert_form').serialize(),
				success:function(data)
				{
					$('#insert_form')[0].reset();
					$('#add_data_modal').modal('show');
					$('#draft_table').html(data);
				}
			});
		}
	});	
});
 </script>

<script>
	//$(document).ready(function(){

	ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        });
 </script>