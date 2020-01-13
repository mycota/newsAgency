
                      <form action="" method="post">
                        <div class="form-group">
                      <center><h2 for="dept_name" class="page-header" style="background-color: #000000; color: white;">
                        Edit Category</h2></center>                        
                        <?php 
                      if (isset($_GET['edit'])) {
                          $newscat_id = mysqli_real_escape_string($connection,$_GET['edit']);            
                        $query = "select * from tbl_news_category where newscat_id = '$newscat_id' ";
                       $select_newscat_id = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_newscat_id)) {
                    $newscat_id = mysqli_real_escape_string($connection,$row['newscat_id']);
                    $newscat_name = mysqli_real_escape_string($connection,$row['newscat_name']);
                    $detail = mysqli_real_escape_string($connection,$row['newscat_detail']);

                      ?>
                    <div hidden="" class="form-group">
                    <input value="<?php if(isset($newscat_id)){echo $newscat_id; } ?>" class="form-control" required type="text" name="newscat_id"> </div>
                    <div class="form-group">
                    <input value="<?php if(isset($newscat_name)){echo $newscat_name; } ?>" class="form-control" required type="text" name="newscat_name"> </div>
                    
                      <div class="form-group">
                    <input value="<?php if(isset($detail)){echo $detail; } ?>" class="form-control" required type="text" name="newscat_detail"> </div>

                      
                      <?php }} ?>


                      <?php 
                      // update query
                    $done = '';
                    if (isset($_POST['update_newscat'])) {
                    $newscat_id = mysqli_real_escape_string($connection,$_POST['newscat_id']);
                    $newscat_name = mysqli_real_escape_string($connection,$_POST['newscat_name']);
                    $newscat_detail = mysqli_real_escape_string($connection,$_POST['newscat_detail']);

                  $query = "update tbl_news_category set newscat_name = '$newscat_name', newscat_detail = '$newscat_detail' where newscat_id = '$newscat_id' ";
                  $update_qeury = mysqli_query($connection, $query);

                  if (!$update_qeury) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }
                      $done.= "News category successfully updated ". " ". "<a href='./news_category.php'>View all news category</a> ";

                     }

                      ?>
                
                    
                      </div>    
                      <div class="form-group">
                      <input class="btn btn-success" type="submit" name="update_newscat" value="Update News Category"> 
                        
                      </div>    

                      </form>