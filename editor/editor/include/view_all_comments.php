<center><h1 class="page-header" style="background-color: #8FBC8F; color: white;">
    Readers Comment 
</h1></center>
<input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <?php
  $page1;
  $username = $_SESSION['username'];
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
      //global $page1;
      $page1 = ($page * 4) - 4; 
    }

    $query_count = "select * from tbl_news, tbl_employee, tbl_comments where newss_id = comment_news_id and email = '$username' and editorid = id";

    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /4);


    ?>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- <th>Id</th> -->
                        <th>Author</th>
                        <th>Email</th>
                        <th>Comment</th>
                        <th>In Response to</th>
                        <th>Date</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        $username = $_SESSION['username'];
                    
       $query = "select * from tbl_news, tbl_employee, tbl_comments where newss_id = comment_news_id and email = '$username' and editorid = id order by comment_id desc LIMIT $page1,4";
                $select_comment = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_comment)) {
                    $comment_id = $row['comment_id'];
                    $comment_news_id = $row['comment_news_id'];
                    $comment_author = $row['comment_author'];
                    $comment_content = substr($row['comment_content'], 0,100);
                    $comment_email = $row['comment_email'];
                    $comment_status = $row['comment_status'];
                    $comment_date = $row['comment_date'];
                    $news_id = $row['newss_id'];
                    $news_title = substr($row['tittle'],0,100);
                    
                    echo "<tr>";
                    echo "<td>$comment_author</td>";
                    echo "<td>$comment_email</td>";                                    
                    echo "<td>$comment_content</td>";
                    echo "<td><a href='comments.php?source=prevc&cid=$comment_id&did=$news_id'>$news_title</a></td>";
                  
                    echo "<td>$comment_date</td>";
                    echo "<td><a href='comments.php?source=prevc&cid=$comment_id&did=$news_id'> Veiw Details</a></td>";
                    
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='comments.php?source=none&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='comments.php?source=none&page={$i}'>{$i}</a></li>";
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