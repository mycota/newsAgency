<?php include "include/editor_header.php"; ?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/editor_navigation.php" ?>

<?php //include "include/deletemodal.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                 <h1 class="page-header">
                            Welcome Editor 
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
<?php  

if (isset($_GET['source'])) {
  $source = mysqli_real_escape_string($connection,$_GET['source']);
} else {

  $source = '';
}

switch ($source) {
  case 'add_news':
    include "include/add_news.php";
    break;
	
  case 'news_archived':
	include "include/view_all_news_archived.php";
    break;
	
  case 'edit_news':
    include "include/edit_news.php";
      break;
	  
  case 'pending_news':
      include "include/view_all_pending_news.php";
        break; 
		
  case 'current_news':
    include "include/view_current_news.php";
      break;
	case 'compose_news':
    include "include/compose_news.php";      
      break;	
  case 'edit_compose':
    include "include/edit_compose_news.php";
    break;
  case 'viewall':
    include "include/all_news.php";
    break;
  case 'prev':
    include "include/preveiw.php";
    break;
  case'draft_news':
      include "include/view_draft_news.php";  
    break;
  default:
    include "include/all_news.php";
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

