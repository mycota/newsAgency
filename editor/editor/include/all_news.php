<center><h1 class="page-header" style="background-color: #4B0082; color: white;">
    All news 
</h1></center>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  $page1;
  $username = mysqli($_SESSION['username']);

  if(isset($_GET['page'])){ 

  $page = mysqli($_GET['page']);
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 4) - 4; 
    }

    $query_count = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where editorid = id and email = '$username' and categoryID = newscat_id and img_id = image_id ";

    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /4);


    ?>

<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Author</th>
                        <!-- <th>Editor</th> -->
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
    $username = mysqli($_SESSION['username']);
    
  }
  $query = "SELECT * from tbl_news, tbl_image, tbl_news_category, tbl_employee where editorid = id and  email = '$username' and categoryID = newscat_id and img_id = image_id order by newss_id desc LIMIT $page1,4";
  
  $select_query = mysqli_query($connection,$query);
  confirmQuery($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {
    $newsid = mysqli($row['newss_id']);
    $news_title = mysqli(substr($row['tittle'],0,20));
    $catname = mysqli($row['newscat_name']);
    $autfname = mysqli($row['firstname']);
    $autlname = mysqli($row['lastname']);
    $editfname = mysqli($row['firstname']);
    $editlname = mysqli($row['lastname']);
    $image = mysqli($row['path']);
    $descript = mysqli(substr($row['description'],0,20));
    $date = mysqli($row['datecreated']);
    $publishdate = mysqli($row['date_published']);
    $endate = mysqli($row['end_date']);
    $reads = mysqli($row['read_count']);
    $shared = mysqli($row['shared_count']);
    $comment = mysqli($row['comment_count']);
    $lang = mysqli($row['language']);
    $did = mysqli($row['draft_ids']);

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
    echo "<td>$autfname $autlname</td>";
    // echo "<td>$editfname $editlname</td>";
    echo "<td><a href='news.php?source=prev&did=$newsid'><img width='120' height='50' src='../resource/images/newsimage/$image' alt ='No image'></a></td>";
    echo "<td>$descript</td>";
    echo "<td>$reads</td>";
    echo "<td>$shared</td>";
    echo "<td>$comment</td>";
    echo "<td>$date</td>";
    echo "<td>$publishdate</td>";
    echo "<td>$endate</td>";
    echo "<td>$newstatus</td>";
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