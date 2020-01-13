<?php include "include/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        
                      <div class="col-xs-6">
                        <center><h2 class="page-header" style="background-color: #008B8B; color: white;">
                           Add New Department
                        </h2></center>

                      <?php insert_department(); ?>


                      <form action="" method="post">
                        <label for="dept_name">Department Name</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="dept_name"></div> 
                      <label for="dept_name">Department Location</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="dept_location"></div> 
                      <label for="dept_name">Department Head</label>
                      <div class="form-group">
                        <select class="form-control" name="dept_head" id="add_deptment">
                        <?php

                        $query = "select * from tbl_employee";
                        $select_dept = mysqli_query($connection, $query);
          
                        confirmQuery($select_dept);

                        while ($row = mysqli_fetch_assoc($select_dept)) {
                        $dept_id = $row['dep_id'];
                        $first = $row['firstname'];
                        $last = $row['lastname'];
                        $first = $row['firstname'];
                        $name = $first ." ". $last;

                        echo "<option value='$name'>$name</option>";
                        }

                        ?>

                        </select>
                      </div>  
                      <label for="dept_name">Department Description</label>             
                     <div class="form-group">
                      <input class="form-control" required type="text" name="detail">
                    </div>  
                      <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="submit" value="Add Department"> 
                        
                      </div>    
                      </form>

                 <?php 
                    // update and include query
                    if (isset($_GET['edit'])) {
                    $dept_id = $_GET['edit'];

                    include "include/update_department.php";
                                              }
                 ?>
                  </div>

                <div class="col-xs-6">
                <center><h2 class="page-header" style="background-color: #DB7093; color: white;">
                           View Department
                </h2></center>
                <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <table class="table table-bordered table-hover">
                    <thead>
                       <tr>
                         <!-- <th>Id</th> -->
                         <th>Dept</th>
                         <th>Head</th>
                         <th>No.OfEmp</th>
                         <th>Location</th>
                         <th>Detail</th>
                         <th>Manage</th>
                       </tr>
                    </thead>
                    <tbody id="myTable">
                 <?php findAllDepartment(); ?>

                <?php deleteDepartment(); ?>
                  </tbody>
                  </table>
                  <hr>
                <ul class="pager">
                  <?php 
                   pagination();
                  ?>
                </ul>
                </div>


                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/admin_footer.php"?>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

