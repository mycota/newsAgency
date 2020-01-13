<center><h2 class="page-header" style="background-color: #006400; color: white;">
    Current news which is live on the site 
</h2></center>

<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  $page1;
  if(isset($_GET['page'])){ 

    $page = mysqli_real_escape_string($connection,$_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      $page1 = ($page * 4) - 4; 
    }

  $cdate = date("Y-m-d");

  $query_count = "SELECT * FROM tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and categoryID = newscat_id and img_id = image_id and '$cdate' < end_date and '$cdate' > date_published";
    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /4);
    ?>
    <h2><?php //echo "$count"; ?></h2>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>Editor</th>
                        <th>Headline Image</th>
                        <th>News Summary</th>
                        <th>View</th>
                        <th>Shared</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Date Published</th>           
                        <th>End Date</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        # working on
    $done = '';
    if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];
    }

  $cdate = date("Y-m-d");
  $query = "SELECT * FROM tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and categoryID = newscat_id and img_id = image_id and '$cdate' < end_date and '$cdate' > date_published order by newss_id LIMIT $page1,4";

  $select_query = mysqli_query($connection,$query);

  confirmQuery($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {
    $newsid = mysqli_real_escape_string($connection,$row['newss_id']);
    $news_title = mysqli_real_escape_string($connection,substr($row['tittle'],0,20));
    $catname = mysqli_real_escape_string($connection,$row['newscat_name']);
    $autfname = mysqli_real_escape_string($connection,$row['firstname']);
    $autlname = mysqli_real_escape_string($connection,$row['lastname']);
    $editfname = mysqli_real_escape_string($connection,$row['firstname']);
    $editlname = mysqli_real_escape_string($connection,$row['lastname']);
    $image = mysqli_real_escape_string($connection,$row['path']);
    $descript = mysqli_real_escape_string($connection,substr($row['description'],0,20));
    $date = mysqli_real_escape_string($connection,$row['datecreated']);
    $publishdate = mysqli_real_escape_string($connection,$row['date_published']);
    $endate = mysqli_real_escape_string($connection,$row['end_date']);
    $reads = mysqli_real_escape_string($connection,$row['read_count']);
    $shared = mysqli_real_escape_string($connection,$row['shared_count']);
    $comment = mysqli_real_escape_string($connection,$row['comment_count']);
    $lang = mysqli_real_escape_string($connection,$row['language']);
    $did = mysqli_real_escape_string($connection,$row['draft_ids']);
    
    echo "<tr>";
    echo "<td>$news_title</td>";
    echo "<td>$catname</td>";
    echo "<td>$autfname $autlname</td>";
    echo "<td>$editfname $editlname</td>";
    echo "<td><a href='news.php?source=prev&did=$newsid'><img width='120' height='50' src='../resource/images/newsimage/$image' alt ='No image'></a></td>";
    echo "<td>$descript</td>";
    echo "<td>$reads</td>";
    echo "<td>$shared</td>";
    echo "<td>$comment</td>";
    echo "<td>$date</td>";
    echo "<td>$publishdate</td>";
    echo "<td>$endate</td>";
    echo "<td><a href='news.php?source=current_news&newsid=$newsid&did=$did'>TakeOff</a> | <a href='news.php?source=prev&did=$newsid'>View</a></td>";
    echo "</tr>";
  }
       ?>
        </tr>
                  </tbody>
                </table>
                <hr>
                <ul class="pager">
                  <?php 
                  for ($i=1; $i <= $count; $i++) {
                    if ($i == $page) {
                    echo "<li><a style='background: #000 !important;' class='active_link' href='news.php?source=current_news&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='news.php?source=current_news&page={$i}'>{$i}</a></li>";
                  }

                  }

                  ?>
                </ul>


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