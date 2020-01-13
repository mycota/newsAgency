
                      <form action="" method="post">
                        <div class="form-group">
                      <center><h2 for="dept_name" class="page-header" style="background-color: #000000; color: white;">
                        Edit Pakages</h2></center>                       
                <?php 
                      if (isset($_GET['edit'])) {
                          $pack_id = mysqli($_GET['edit']);            
                        $query = "select * from tbl_advert_packages where pack_id = '$pack_id' ";
                       $select_advert_id = mysqli_query($connection,$query);
                      while ($row = mysqli_fetch_assoc($select_advert_id)) {
                    $packid = mysqli($row['pack_id']);
                    $packname = mysqli($row['pack_name']);
                    $packdetail = mysqli($row['pack_detail']);
                    $packbenefit = mysqli($row['pack_benefits']);
                    $packamount = mysqli($row['pack_amount']);

                ?>
                    <div hidden="" class="form-group">
                    <input value="<?php if(isset($packid)){echo $packid; } ?>" class="form-control" required type="text" name="pack_id"> </div>
                    <div class="form-group">
                    <input value="<?php if(isset($packname)){echo $packname; } ?>" class="form-control" required type="text" name="pack_name"> </div>
                    
                      <div class="form-group">
                    <input value="<?php if(isset($packamount)){echo $packamount; } ?>" class="form-control" required type="text" name="pack_amount"> </div>

                    <div class="form-group">
                    <input value="<?php if(isset($packdetail)){echo $packdetail; } ?>" class="form-control" required type="text" name="pack_detail"> </div>

                    <div class="form-group">
                    <textarea class="form-control" name="pack_benefit" value="" id="" cols="30" rows="5"><?php if(isset($packbenefit)){echo $packbenefit; } ?></textarea>
                    </div>
                      <?php }} ?>


                      <?php 
                      // update query

                    if (isset($_POST['update_pack'])) {
                         $pack_name = mysqli($_POST['pack_name']);
                         $pack_amount = mysqli($_POST['pack_amount']);
                         $pack_detail = mysqli($_POST['pack_detail']);
                         $pack_benefit = mysqli($_POST['pack_benefit']);

                  $query = "update tbl_advert_packages set pack_name = '$pack_name', pack_amount = '$pack_amount',pack_detail = '$pack_detail',pack_benefits = '$pack_benefit' where pack_id = '$packid' ";
                  $update_qeury = mysqli_query($connection, $query);

                  if (!$update_qeury) {
                    die("QUERY FAILED" . mysqli_error($connection));
                  }

                     }

                      ?>
                
                    
                      </div>    
                      <div class="form-group">
                      <input class="btn btn-success" type="submit" name="update_pack" value="Update Package"> 
                        
                      </div>    

                      </form>