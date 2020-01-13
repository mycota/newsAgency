<?php include "include/editor_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/editor_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                 
                        </h2></center>
<?php  

if (isset($_GET['source'])) {
  $source = mysqli_real_escape_string($connection,$_GET['source']);
} else {

  $source = '';
}

switch ($source) {
  case 'add_employ':
    include "include/add_employ.php";
    break;
  case '34':
    echo "Nice 34"; 
    break;
    case 'edit_employ':
    include "include/edit_employ.php";
      break;
      case '200':
        echo "Nice 200";
        break;
  
  default:
    include "include/view_all_employ.php";
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
<?php include "include/editor_footer.php"?>

