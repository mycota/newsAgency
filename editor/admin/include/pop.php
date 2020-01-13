<!-- Modal form -->
<div id="add_data_modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 style="background-color: #2E8B57; color: white;" class="modal-title"><?php echo $news_title?></h4></center>
      </div>
        <?php if(isset($_GET['did'])){
          $nid =  $_GET['did'];

          $query = "SELECT  * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and editorid = id and categoryID = newscat_id and img_id = image_id and newss_id = '$nid'";
  
  $select_query = mysqli_query($connection,$query);
  confirmQuery($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {
    $newsid = mysqli_real_escape_string($connection,$row['newss_id']);
    $news_title1 = mysqli_real_escape_string($connection,substr($row['tittle'],0,20));
    $catname = mysqli_real_escape_string($connection,$row['newscat_name']);
    $autfname = mysqli_real_escape_string($connection,$row['firstname']);
    $autlname = mysqli_real_escape_string($connection,$row['lastname']);
    $editfname = mysqli_real_escape_string($connection,$row['firstname']);
    $editlname = mysqli_real_escape_string($connection,$row['lastname']);
    $image = mysqli_real_escape_string($connection,$row['path']);
    $descript = mysqli_real_escape_string($connection,substr($row['description'],0,20));
    $date = mysqli_real_escape_string($connection,$row['datecreated']);
    $publishdate = mysqli_real_escape_string($connection,$row['date_published']);
    $endate = mysqli_real_escape_string($connection,$row['end_date']);
    $reads = mysqli_real_escape_string($connection,$row['read_count']);
    $shared = mysqli_real_escape_string($connection,$row['shared_count']);
    $comment = mysqli_real_escape_string($connection,$row['comment_count']);
    $lang = mysqli_real_escape_string($connection,$row['language']);
    $did = mysqli_real_escape_string($connection,$row['draft_ids']);
    }
  }
        ?>

      <div class="modal-body">
        <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
              <h1 class="page-header"><?php echo $news_title1?></h1>

        <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php //echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php //echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php //echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php //echo $post_image; ?>" alt="">
                <hr>
                <p><?php //echo $post_content; ?></p>

                <hr>
  
          </div>
        </div>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>