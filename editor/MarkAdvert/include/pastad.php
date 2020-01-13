<center><h1 class="page-header" style="background-color: #191970; color: white;">
    Past Advertisements 
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

    $cdate = date("Y-m-d");

    $query_count = "SELECT * from tbl_adverts, tbl_advert_packages, tbl_clients, tbl_user where duedate  < now()";

    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

    ?>
  <h2><?php //echo "$count"; ?></h2>
<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Business Name</th>
                        <th>Person</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Package</th>
                        <th>Date</th>
                        <th>Duedate</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php
        if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];  
  }

  $query = "SELECT * from tbl_adverts, tbl_advert_packages, tbl_clients, tbl_user where duedate  < now() order by advert_id LIMIT $page1,5";

  $select_query = mysqli_query($connection,$query);

  confirmQuery($select_query);

  while ($row = mysqli_fetch_assoc($select_query)) {
    
    
    echo "<tr>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td></td>";
    echo "<td><a href='news.php?source=prev&did='>View</a></td>";
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='news.php?source=news_archived&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='news.php?source=news_archived&page={$i}'>{$i}</a></li>";
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