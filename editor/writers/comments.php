<?php include "include/writer_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/writer_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                 <h1 class="page-header">
                            Welcome Writer 
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
<?php  

if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {

  $source = '';
}

switch ($source) {
  case 'prevc':
    include "include/preveiwcomment.php";
    break;
  default:
    include "include/view_all_comments.php";
    break;
}


?>

                        </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/writer_footer.php"?>

