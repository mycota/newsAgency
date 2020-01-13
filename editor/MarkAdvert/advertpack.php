<?php include "include/markad_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/markad_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
                      <div class="col-xs-6">
                        <center><h2 class="page-header" style="background-color: #5F9EA0; color: white;">
                           Add New Advertisement Package
                        </h2></center>

                      <?php insert_packages(); ?>


                      <form action="" method="post">
                      <label for="">Package Name</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="pack_name"></div>
                      <label for="">Amount</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="pack_amount"></div>                       
                      <div class="form-group">
                        <label for="">Package Details</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="pack_detail"></div>
                      <label for="">Package Benefits</label>
                      <div class="form-group">
                    <textarea class="form-control" name="pack_benefit" id="" cols="30" rows="5"></textarea>
                    </div>
                      <input class="btn btn-primary" type="submit" name="submitem" value="Add Advertisement Package"> 
                        
                      </div>    
                      </form>

                 <?php 
                    // update and include query
                    if (isset($_GET['edit'])) {
                    $dept_id = mysqli($_GET['edit']);

                    include "include/update_package.php";
                                              }
                 ?>
                  </div>

                <div class="col-xs-6">
                  <center><h2 class="page-header" style="background-color: #4682B4; color: white;">
                           Advertisement Packages
                        </h2></center>
                        <br>
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <table class="table table-bordered table-hover">
                    <thead>
                       <tr>
                         <th>Package</th>
                         <th>Amount</th>
                         <th>Details</th>
                         <th>Manage</th>
                       </tr>
                    </thead>
                    <tbody id="myTable">
                 <?php findAllpackages(); ?>

                <?php deletepack(); ?>
                  </tbody>
                  </table>
                  <hr>
                <ul class="pager">
                  <?php 
                   paginationpack();
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
<?php include "include/markad_footer.php"?>
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
