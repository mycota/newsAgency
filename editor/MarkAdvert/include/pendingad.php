<center><h1 class="page-header" style="background-color: #4B0082; color: white;">
    All news 
</h1></center>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  $page1;
  $username = $_SESSION['username'];

  if(isset($_GET['page'])){ 

  $page = $_GET['page'];
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id ";

    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);


    ?>

<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <!-- <th>Author</th> -->
                        <th>Editor</th>
                        <th>Headline Image</th>
                        <th>News Summary</th>
                        <th>View</th>
                        <th>Shared</th>
                        <th>Comments</th>
                        <th>Date</th>
                        <th>Date Published</th>           
                        <th>End Date</th>
                        <th>Status</th>           
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        # working on
    $done = '';
    $newstatus = '';
    $cdate = date("Y-m-d");

    if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
  }
  $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id order by newss_id LIMIT $page1,5";
  
  $select_query = mysqli_query($connection,$query);
  confirmQuery($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {
    $newsid = $row['newss_id'];
    $news_title = substr($row['tittle'],0,20);
    $catname = $row['newscat_name'];
    $autfname = $row['firstname'];
    $autlname = $row['lastname'];
    $editfname = $row['firstname'];
    $editlname = $row['lastname'];
    $image = $row['path'];
    $descript = substr($row['description'],0,20);
    $date = $row['datecreated'];
    $publishdate = $row['date_published'];
    $endate = $row['end_date'];
    $reads = $row['read_count'];
    $shared = $row['shared_count'];
    $comment = $row['comment_count'];
    $lang = $row['language'];
    $did = $row['draft_ids'];

    if ($cdate < $endate) {
      $newstatus ='Online';
    }
    else if ($cdate < $publishdate) {
      $newstatus ='Pending';
    }
    else{
      $newstatus ='Archived';
    }
    
    echo "<tr>";
    echo "<td>$news_title</td>";
    echo "<td>$catname</td>";
    // echo "<td>$autfname $autlname</td>";
    echo "<td>$editfname $editlname</td>";
    echo "<td><a href='news.php?source=prev&did=$newsid'><img width='120' height='50' src='../resource/images/newsimage/$image' alt ='No image'></a></td>";
    echo "<td>$descript</td>";
    echo "<td>$reads</td>";
    echo "<td>$shared</td>";
    echo "<td>$comment</td>";
    echo "<td>$date</td>";
    echo "<td>$publishdate</td>";
    echo "<td>$endate</td>";
    echo "<td>$newstatus</td>";
    echo "<td><a href='news.php?source=prev&did=$newsid'>View</a></td>";
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='news.php?source=none&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='news.php?source=none&page={$i}'>{$i}</a></li>";
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