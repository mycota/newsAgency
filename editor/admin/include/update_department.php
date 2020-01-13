
                      <form action="" method="post">
                        <div class="form-group">
                          <center><h2 for="dept_name" class="page-header" style="background-color: #000000; color: white;">
                        Edit Department</h2></center>
                        <?php 
                      if (isset($_GET['edit'])) {
                          $dept_id = mysqli_real_escape_string($connection,$_GET['edit']);            
                        $query = "select * from tbl_department where dep_id = '$dept_id' ";
                       $select_dept_id = mysqli_query($connection, $query);
                            while ($row = mysqli_fetch_assoc($select_dept_id)) {
                    $dept_id = mysqli_real_escape_string($connection,$row['dep_id']);
                    $dept_name = mysqli_real_escape_string($connection,$row['deptname']);
                    $dept_loc = mysqli_real_escape_string($connection,$row['location']);
                    $dept_head = mysqli_real_escape_string($connection,$row['dept_head']);
                    $detail = mysqli_real_escape_string($connection,$row['detail']);

                      ?>
                    <div hidden="" class="form-group">
                    <input value="<?php if(isset($dept_id)){echo $dept_id; } ?>" class="form-control" required type="text" name="dept_id"> </div>
                    <div class="form-group">
                    <input value="<?php if(isset($dept_name)){echo $dept_name; } ?>" class="form-control" required type="text" name="dept_name"> </div>
                    <div class="form-group">
                    <input value="<?php if(isset($dept_loc)){echo $dept_loc; } ?>" class="form-control" required type="text" name="dept_loc"> </div>
                    <div class="form-group">
                    <select class="form-control" name="dept_head" id="add_deptment">
                        <?php

                        $query = "select * from tbl_employee";
                        $select_dept = mysqli_query($connection, $query);
          
                        confirmQuery($select_dept);

                        while ($row = mysqli_fetch_assoc($select_dept)) {
                        $dept_id = mysqli_real_escape_string($connection,$row['dep_id']);
                        $name = mysqli_real_escape_string($connection,$row['firstname']." ".$row['lastname']);
                        $first = mysqli_real_escape_string($connection,$row['firstname']);
                        

                        echo "<option value='$name'>$name</option>";
                        }

                        ?>

                        </select>
                      </div>
                      <div class="form-group">
                    <input value="<?php if(isset($detail)){echo $detail; } ?>" class="form-control" required type="text" name="detail"> </div>

                      
                      <?php }} ?>


                      <?php 
                      // update query

                    if (isset($_POST['update_dept'])) {
                    $dept_id = mysqli_real_escape_string($connection,$_POST['dept_id']);
                    $dept_name = mysqli_real_escape_string($connection,$_POST['dept_name']);
                    $dept_loc = mysqli_real_escape_string($connection,$_POST['dept_loc']);
                    $dept_head = mysqli_real_escape_string($connection,$_POST['dept_head']);
                    $detail = mysqli_real_escape_string($connection,$_POST['detail']);

                  $query = "update tbl_department set deptname = '$dept_name', location = '$dept_loc', dept_head = '$dept_head', detail = '$detail' where dep_id = '$dept_id' ";
                  $update_qeury = mysqli_query($connection, $query);

                  if (!$update_qeury) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }

                  //header("Location: categories.php");
                     }

                      ?>
                
                    
                      </div>    
                      <div class="form-group">
                      <input class="btn btn-success" type="submit" name="update_dept" value="Update Department"> 
                        
                      </div>    

                      </form>