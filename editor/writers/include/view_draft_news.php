
<center><h2 class="page-header" style="background-color: #008B8B; color: white;">
    Draft news waiting to be submited to Editor 
</h2></center>
<?php include "deletemodal.php"; ?>

<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    
  }
  $page1;
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
    $query_count = "select * from tbl_draft_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and categoryID = newscat_id and imge_id = image_id and draft_user = '$username' and draft_status = 'Drafting' ";
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
                        <th>Status</th>
                        <th>Date</th>
                        <!-- <th>Publish Date</th> -->
                        <!-- <th>End Date</th> -->
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
  $query = "select * from tbl_draft_news, tbl_image, tbl_news_category, tbl_employee where authorid = id and categoryID = newscat_id and imge_id = image_id and draft_user = '$username' and draft_status = 'Drafting' order by draft_id LIMIT $page1,4";
  $select_query = mysqli_query($connection,$query);

  confirmQuery($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {
    $draftid = $row['draft_id'];
    $news_title = $row['tittle'];
    $newscat_name = $row['newscat_name'];
    $catname = $row['newscat_name'];
    $autfname = $row['firstname'];
    $autlname = $row['lastname'];
    $editfname = $row['firstname'];
    $editlname = $row['lastname'];
    $newsdetail = $row['details'];
    $image = $row['path'];
    $date = $row['datecreated'];
    //$publishdate = $row['date_published'];
    $status = $row['draft_status'];
    $descript = $row['description'];
    $details = $row['details'];
    $lang = $row['language'];
    $usr = $_SESSION['username'];
    

    echo "<tr>";
    echo "<td>$news_title</td>";
    echo "<td>$catname</td>";
    // echo "<td>$autfname $autlname</td>";
    echo "<td>$editfname $editlname</td>";
    echo "<td><img width='120' height='50' src='../resource/images/newsimage/$image' alt ='No image'></td>";
    echo "<td>$status</td>";
    echo "<td>$date</td>";
    // echo "<td></td>";
    echo "<td><a href='news.php?source=edit_compose&did=$draftid&usr=$usr&done=$done'>Edit</a>|<a href='news.php?source=edit_compose&did=$draftid&usr=$usr&done=$done'>Publish</a>| <a href='news.php?source=draft_news&delete=$draftid&status=$status'>Delete</a></td>";
    //<a href='news.php?source=draft_news&delete=$draftid'>Delete</a>
    //<a rel='$draftid' class='delete_link' href='javascript:void(0)'>Delete</a>
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='news.php?source=draft_news&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='news.php?source=draft_news&page={$i}'>{$i}</a></li>";
                  }

                  }

                  ?>
                </ul>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Delete Draft News</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <h2>Are you sure you want to delete it!!!</h2>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <a href="" class="btn btn-danger modal_delete_link">Delete</a>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
        </div>
        
      </div>
    </div>
  </div>

                <?php 

                if (isset($_GET['delete'])) {
                  $newsid = $_GET['delete'];
                  $status = $_GET['status'];
                  if ($status == 'Published')
                  {
                      echo "<script>alert('Sorry a published news cannot be Deleteed'); window.location='./news.php?source=draft_news'</script>";
                  } 

                  else{
                  $query = mysqli_query($connection,"delete from tbl_image where news_id = $newsid");
                  confirmQuery($query);

                  $queryd = mysqli_query($connection,"delete from tbl_draft_news where draft_id = $newsid");
                  confirmQuery($queryd);

                  //header("Location: news.php?source=draft_news"); 
                  echo "<script>alert('Draft news has being deleted'); window.location='./news.php?source=draft_news'</script>";
                  }                                 
                }
                ?>

<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

$('.delete_link').on('click', function() {
  var id = $(this).attr("rel");
  var delete_url = "news.php?source=draft_news&delete="+ id +" ";

  $('.modal_delete_link').attr('href', delete_url);
  $('#myModal').modal('show');

  //alert(delete_url);
  //return false;

});

});
</script>