   <center><h1 class="page-header" style="background-color: #708090; color: white;">
Comment on this news</h1></center>
   <!-- Posted Comment -->
                <?php
                if(isset($_GET['did'])){
          $nid =  $_GET['did'];
          $cid =  $_GET['cid'];

      }
                    $query = "select * from tbl_comments where comment_id = $cid";
                    //$query.=" and comment_status = 'Approved' ";
                    $query.=" order by comment_id desc";    
                    $select_comment = mysqli_query($connection, $query);
                
                    confirmQuery($select_comment);

                   while ($row = mysqli_fetch_assoc($select_comment)) {
                    
                    $comment_author = $row['comment_author'];
                    $comment_content = $row['comment_content'];
                    $comment_date = $row['comment_date'];
                    $comment_email = $row['comment_email'];

                ?>

                <!-- Comment -->
                <div class="media">
                    
                <p><span class="glyphicon glyphicon-user"></span> <?php echo $comment_author;; ?></p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $comment_date; ?></p>
                <p><span class="glyphicon glyphicon-envelope"></span> <?php echo $comment_email; ?></p>
                <p><?php echo $comment_content ?></p>
                                <hr>

                
                </div>

                <?php } ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!--  Entries Column -->
            <div class="col-md-12">

    <?php 

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

               <?php }    
                ?>

