
                      <form action="" method="post">
                        <div class="form-group">
                      <center><h2 for="dept_name" class="page-header" style="background-color: #000000; color: white;">
                        Edit Category Type</h2></center>                        <?php 
                      if (isset($_GET['edit'])) {
                          $advert_id = $_GET['edit'];            
                        $query = "select * from tbl_advert_category where advert_id = '$advert_id' ";
                       $select_advert_id = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_advert_id)) {
                    $adver_id = $row['advert_id'];
                    $advert_name = $row['advert_name'];
                    $detail = $row['advert_detail'];

                      ?>
                    <div hidden="" class="form-group">
                    <input value="<?php if(isset($advert_id)){echo $advert_id; } ?>" class="form-control" required type="text" name="advert_id"> </div>
                    <div class="form-group">
                    <input value="<?php if(isset($advert_name)){echo $advert_name; } ?>" class="form-control" required type="text" name="advert_name"> </div>
                    
                      <div class="form-group">
                    <input value="<?php if(isset($detail)){echo $detail; } ?>" class="form-control" required type="text" name="advert_detail"> </div>

                      
                      <?php }} ?>


                      <?php 
                      // update query

                    if (isset($_POST['update_advert'])) {
                    $advert_id = $_POST['advert_id'];
                    $advert_name = $_POST['advert_name'];
                    $advert_detail = $_POST['advert_detail'];

                  $query = "update tbl_advert_category set advert_name = '$advert_name', advert_detail = '$advert_detail' where advert_id = '$advert_id' ";
                  $update_qeury = mysqli_query($connection, $query);

                  if (!$update_qeury) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }

                     }

                      ?>
                
                    
                      </div>    
                      <div class="form-group">
                      <input class="btn btn-success" type="submit" name="update_advert" value="Update Advert"> 
                        
                      </div>    

                      </form>