<?php include "include/admin_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/admin_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                      <h1 class="page-header">
                            Welcome Admin 
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
                      <div class="col-xs-6">
                        <center><h2 class="page-header" style="background-color: #5F9EA0; color: white;">
                           Add New Advertisement Type
                        </h2></center>

                      <?php insert_advert_category(); ?>


                      <form action="" method="post">
                      <label for="dept_name">Advertisement Type</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="advert"></div> 
                      <label for="dept_name">Description</label>
                      <div class="form-group">
                      <input class="form-control" required type="text" name="descript"></div>                       
                      <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="submitem" value="Add Advertisement Type"> 
                        
                      </div>    
                      </form>

                 <?php 
                    // update and include query
                    if (isset($_GET['edit'])) {
                    $dept_id = $_GET['edit'];

                    include "include/update_advertcate.php";
                                              }
                 ?>
                  </div>

                <div class="col-xs-6">
                  <center><h2 class="page-header" style="background-color: #4682B4; color: white;">
                           Advertisement Type
                        </h2></center>
                        <br>
                  <input class="form-control" id="myInput" type="text" placeholder="Search..">
                  <table class="table table-bordered table-hover">
                    <thead>
                       <tr>
                         <th>Advert</th>
                         <th>Detail</th>
                         <th>Date</th>
                         <th>Manage</th>
                       </tr>
                    </thead>
                    <tbody id="myTable">
                 <?php findAllAdvertCate(); ?>

                <?php deleteAdvertCate(); ?>
                  </tbody>
                  </table>
                  <hr>
                <ul class="pager">
                  <?php 
                   paginationad();
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
