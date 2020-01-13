
                      <form action="" method="post">
                        <div class="form-group">
                      <center><h2 for="dept_name" class="page-header" style="background-color: #000000; color: white;">
                        Edit Employment Type</h2></center>                        <?php 
                      if (isset($_GET['edit'])) {
                          $empl_id = mysqli_real_escape_string($connection,$_GET['edit']);            
                        $query = "SELECT * from tbl_employment_type where id_type = '$empl_id' ";
                       $select_empl_id = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_empl_id)) {
                    $empl_id = mysqli_real_escape_string($connection,$row['id_type']);
                    $empl_name = mysqli_real_escape_string($connection,$row['name']);
                    $detail = mysqli_real_escape_string($connection,$row['detail']);

                      ?>
                    <div hidden="" class="form-group">
                    <input value="<?php if(isset($empl_id)){echo $empl_id; } ?>" class="form-control" required type="text" name="empl_id"> </div>
                    <div class="form-group">
                    <input value="<?php if(isset($empl_name)){echo $empl_name; } ?>" class="form-control" required type="text" name="empl_name"> </div>
                    
                      <div class="form-group">
                    <input value="<?php if(isset($detail)){echo $detail; } ?>" class="form-control" required type="text" name="detail"> </div>

                      
                      <?php }} ?>


                      <?php 
                      // update query

                    if (isset($_POST['update_empl'])) {
                    $empl_id = mysqli_real_escape_string($connection,$_POST['empl_id']);
                    $empl_name = mysqli_real_escape_string($connection,$_POST['empl_name']);
                    $detail = mysqli_real_escape_string($connection,$_POST['detail']);

                  $query = "UPDATE tbl_employment_type set name = '$empl_name', detail = '$detail' where id_type = '$empl_id' ";
                  $update_qeury = mysqli_query($connection, $query);

                  if (!$update_qeury) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }

                     }

                      ?>
                
                    
                      </div>    
                      <div class="form-group">
                      <input class="btn btn-success" type="submit" name="update_empl" value="Update Department"> 
                        
                      </div>    

                      </form>