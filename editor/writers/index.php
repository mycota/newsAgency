<?php include "include/writer_header.php";
$username = $_SESSION['username'];
$cdate = date("Y-m-d");?>

    <div id="wrapper">




        <?php if ($connection) {
            # code...
        } ?>

        <!-- Navigation -->

<?php include "include/writer_navigation.php" ?>



        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Writer:  
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
                        
                        </div>
                </div>
                <!-- /.row -->
<!-- <h2>NEWS</h2> -->
                <div class="row">
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

            <?php
            $query = "SELECT * FROM tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id and '$cdate' < end_date and '$cdate' > date_published";
            $select_query = mysqli_query($connection, $query);
            $count_news = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_news</div>"
            ?>
                        <div>Current News</div>
                    </div>
                </div>
            </div>
            <a href="./news.php?source=current_news">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <?php
            $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id and '$cdate' < date_published";
            $select_query = mysqli_query($connection, $query);
            $count_newsp = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsp</div>"
            ?>
                      <div>Pending News</div>
                    </div>
                </div>
            </div>
            <a href="./news.php?source=pending_news">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <?php
            $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id and '$cdate' > end_date";
            $select_query = mysqli_query($connection, $query);
            $count_newsa = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsa</div>"
            ?>
                        <div> Archived News</div>
                    </div>
                </div>
            </div>
            <a href="./news.php?source=news_archived">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
    
 <!-- /.row -->

<!-- <h2>SECTIONS</h2> -->
<div class="row">
<div class="col-lg-4 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id";
            $select_query = mysqli_query($connection, $query);
            $count_newsaa = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_newsaa</div>"
            ?>
                         <div>All News</div>
                    </div>
                </div>
            </div>
            <a href="./news.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id";
            $select_query = mysqli_query($connection, $query);
            $count_comment = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_comment</div>"
            ?>                        <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="./comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
            <?php
            /*$query = "select * from tbl_advert_category";
            $select_query = mysqli_query($connection, $query);
            $count_advert = mysqli_num_rows($select_query);

            echo "<div class='huge'>$count_advert</div>"*/
            ?>
                         <div>Profile</div>
                    </div>
                </div>
            </div>
            <a href="./profile.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->

                <div class="row">
                    
      <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          <?php

            $array_text = ['Current News', 'Pending News', 'Comments'];
            $count = [$count_news, $count_newsp, $count_comment];

            for($i = 0; $i < 3; $i++){

                echo "['{$array_text[$i]}'" . "," . "{$count[$i]}],";
            }

          ?>
          //['News', 1000],
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


                </div>



            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<?php include "include/writer_footer.php"?>

