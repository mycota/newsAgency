    <center><h1 class="page-header" style="background-color: #4B0082; color: white;">
        Current Employees of the System</h1></center>
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
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_employee_login, tbl_employee where empID = id order by status";

    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);


    ?>

<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Username</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Last Login</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
                    
       $query = "SELECT * from tbl_employee_login, tbl_employee where empID = id order by status LIMIT $page1,4";
                $select_comment = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_comment)) {
                    $emplog_id = mysqli_real_escape_string($connection,$row['log_id']);
                    $username = mysqli_real_escape_string($connection,$row['username']);
                    $firstname = mysqli_real_escape_string($connection,$row['firstname']);
                    $lastname = mysqli_real_escape_string($connection,$row['lastname']);
                    $role = mysqli_real_escape_string($connection,$row['role']);
                    $status = mysqli_real_escape_string($connection,$row['status']);
                    $date_added = mysqli_real_escape_string($connection,$row['datecreated']);
                    $lastlogin = mysqli_real_escape_string($connection,$row['lastlogin']);
                    

                    echo "<tr>";
                    echo "<td>$username</td>";
                    echo "<td>$firstname</td>";
                    echo "<td>$lastname</td>";                      
                    echo "<td>$role</td>";
                    echo "<td>$status</td>";
                    echo "<td>$date_added</td>";
                    echo "<td>$lastlogin</td>";
                    echo "<td><a href='users.php?block=$emplog_id='>Block</a> |  <a href='users.php?unblock=$emplog_id'>Unblock</a> |  <a href='users.php?source=resetpass&resetpass=$emplog_id'>ResetPassword</a> | <a href='users.php?delete=$emplog_id'>Delete</a></td>";
                    
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='users.php?source=none&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='users.php?source=none&page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>


                <?php 
                
                // for deleting a comment
                if (isset($_SESSION['role'])) {

                  if($_SESSION['role'] == 'Admin'){

                if(isset($_GET['delete'])) {
                  
                  $the_user_id = mysqli_real_escape_string($connection,$_GET['delete']);

                  $query = "DELETE from tbl_employee_login where log_id = '$the_user_id'";

                  $delete_query = mysqli_query($connection, $query);

                  confirmQuery($delete_query);

                  header("Location: users.php");
                }
                  // for unapprove
                  if(isset($_GET['unblock'])) {
                  $the_user_id = mysqli_real_escape_string($connection,$_GET['unblock']);

                  $query = "UPDATE tbl_employee_login set status = 'Unblocked' where log_id = '$the_user_id'";

                  $unapprove_comment_query = mysqli_query($connection, $query);

                  confirmQuery($unapprove_comment_query);

                  header("Location: users.php");
                }

                // for unapprove
                  if(isset($_GET['block'])) {
                  $the_user_id = mysqli_real_escape_string($connection,$_GET['block']);

                  $query = "UPDATE tbl_employee_login set status = 'Blocked' where log_id = '$the_user_id'";

                  $unapprove_comment_query = mysqli_query($connection, $query);

                  confirmQuery($unapprove_comment_query);

                  header("Location: users.php");
                }

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
});
</script>
