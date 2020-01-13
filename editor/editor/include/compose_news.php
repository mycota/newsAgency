<?php 
	$error = '';
	$done ='';

if (isset($_POST['add_draft'])) {

	$username = mysqli($_POST['username']);
	$newscat = mysqli($_POST['newscat']);
	$lang = mysqli($_POST['lang']);
	$title = mysqli($_POST['newstitle']);
	$news_discrpt = mysqli($_POST['news_discrpt']);
	$news_content = mysqli($_POST['news_content']);
    $image = mysqli($_FILES['image']['name']);
    $imge_temp = mysqli($_FILES['image']['tmp_name']);

    //$date = date('d-m-y');
    $query = "select * from tbl_employee_login where username = '$username'";
    $select_query = mysqli_query($connection,$query);

    while ($row = mysqli_fetch_assoc($select_query)) {
    	
    	$empid = mysqli($row['empID']);
    }
    
    move_uploaded_file($imge_temp, "../resource/images/newsimage/$image");

     //insert the image into address table 
    $queryad = "insert into tbl_image (emp_id,name,path,detail,image_position)";
    $queryad .= "value ('$empid','$image','$image','$title','Headline')";
    $query_news = mysqli_query($connection, $queryad);

    confirmQuery($query_news);
    $last_image_id = mysqli_insert_id($connection);


    // insert the news into newsdraft table
    $query = "insert into tbl_draft_news (tittle,description,details,authorid,editorid,categoryID,language,draft_status,draft_user,imge_id)";
    $query .= "value ('$title','$news_discrpt','$news_content','$empid','$empid','$newscat','$lang','Drafting','$username','$last_image_id')";
    $query_emp = mysqli_query($connection, $query);

    confirmQuery($query_emp);
    $last_id = mysqli_insert_id($connection);
   

    header("Location: news.php?source=edit_compose&did=$last_id&usr=$username");

}

?>


<form action="" method="POST" enctype="multipart/form-data">
	
	<div id="page-wrapper">

    <div class="container-fluid">
    <center><h2 class="page-header" style="background-color: #4B0082; color: white;">
       Compose News
    </h2></center>
    <font><?php echo $done; ?></font>
	<div class="row" style="background-color: #F8F8FF;" >
     	<input type="hidden"  name="username" value="<?php echo $_SESSION['username'];?>" required  class="form-control" >              
    <div class="col-lg-12 col-md-12">
    	<div class="form-group">
    <label for="title">News Category (Select Category)</label>
    <select class="form-control" name="newscat" id="post_category">
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
    	  <option value='English'>English</option>"
    	  <option value='Hindi'>Hindi</option>"
    </select>
    </div>
	<div class="form-group">
    <label for="title">News Title (Headlines)</label>
	<input type="text" name="newstitle" required placeholder="News Title" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_image">Headline Picture</label>
		<input required type="file" class="form-control" name="image">
		<font><?php echo "$error"; ?></font>
	</div>
    <div class="form-group">
		<label for="post_content">News Discription</label>
		<textarea class="form-control" style="text-color: red;" name="news_discrpt" id="" cols="30" rows="5"></textarea>
	</div>
<!-- </div>
<div class="col-lg-6 col-md-6"> -->
	<div class="form-group">
		<label for="post_content">News Content</label>
		<textarea class="form-control" name="news_content" id="body" cols="30" rows="21"></textarea>
	</div>
</div>



<center><div class="form-group">
		<input type="submit" class="btn btn-success btn-lg btn-block" name="add_draft" value="Save">
	</div></center>
</div>
</form>
<script>
	//$(document).ready(funtion(){

ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        });
//});

</script>