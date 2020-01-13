    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">

         <?php if(isset($_GET['did'])){
          $nid =  $_GET['did'];
      }
          $query = "SELECT  * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and editorid = id and categoryID = newscat_id and img_id = image_id and newss_id = '$nid'";
  
    $select_query = mysqli_query($connection,$query);
    confirmQuery($select_query);

   while ($row = mysqli_fetch_assoc($select_query)) {
    $newsid = $row['newss_id'];
    $news_title = mysqli($row['tittle']);
    $autfname = mysqli($row['firstname']);
    $autlname = mysqli($row['lastname']);
    $image = mysqli($row['path']);
    $descript = $row['details'];
    $date = mysqli($row['datecreated']);
    $publishdate = mysqli($row['date_published']);
    
  
           ?>            
                <h2>
                    <a href="#"><?php echo $news_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="./profile.php"><?php echo $autfname." ".$autlname; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $publishdate; ?></p>
                <hr>
                <img class="img-responsive" src="../resource/images/newsimage/<?php echo $image ?>" alt="">
                <hr>
                <p><?php echo $descript; ?></p>
                <a class="btn btn-primary" href="#">Move up <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>


                <?php }    
                ?>

                 <!-- Blog Comments -->

                 <?php

                 if (isset($_POST['create_comment'])) {
                     # code...
                    $comment_author = mysqli($_POST['comment_author']);
                    $comment_email = mysqli($_POST['comment_email']);
                    $comment_content = mysqli($_POST['comment_content']);
                    $newsid = $nid;

                    $query = "insert into tbl_comments (comment_news_id,comment_author,comment_email,comment_content,comment_date)";
                    $query .= "value ('$newsid','$comment_author','$comment_email','$comment_content',now())";
                    $query_comment = mysqli_query($connection, $query);

                    confirmQuery($query_comment);
                    
                    $query = "update tbl_news set comment_count = comment_count + 1 ";
                    $query .= "where newss_id = $newsid ";

                    $update = mysqli_query($connection, $query);

                    confirmQuery($query_comment);

                 }
                 ?>
                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment Admin:</h4>
                    <form action="" method="post" role="form">
                        <div class="form-group">
                            <label for="author">Author</label>
                            <input type="text" required class="form-control" name="comment_author">                       
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" required class="form-control" name="comment_email">
                        </div>
                        
                        <div class="form-group">
                            <label for="comment">Your comment</label>
                            <textarea class="form-control" required name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php
                    $query = "select * from tbl_comments where comment_news_id = $nid";
                    //$query.=" and comment_status = 'Approved' ";
                    $query.=" order by comment_id desc";    
                    $select_comment = mysqli_query($connection, $query);
                
                    confirmQuery($select_comment);

                   while ($row = mysqli_fetch_assoc($select_comment)) {
                    
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];

                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" width='100' height='50' src="../resource/images/newsimage/<?php echo $image ?>" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>

                <?php } ?>