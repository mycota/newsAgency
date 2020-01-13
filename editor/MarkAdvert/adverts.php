<?php include "include/markad_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/markad_navigation.php" ?>

<?php //include "include/deletemodal.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                 <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
<?php  

if (isset($_GET['source'])) {
  $source = $_GET['source'];
} else {

  $source = '';
}

switch ($source) {
  case 'adcust':
    include "include/adcust.php";
    break;
	
  case 'custrequest':
	include "include/custrequest.php";
    break;
	
  case 'running':
    include "include/runningad.php";
      break;
	  
  case 'pendingad':
      include "include/pendingad.php";
        break; 
		
  case 'suspended':
    include "include/suspendedad.php";
      break;
	case 'pastad':
    include "include/pastad.php";      
      break;	
  case 'allclients':
    include "include/allclients.php";
    break;
  default:
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
<?php include "include/markad_footer.php"?>

