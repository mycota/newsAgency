<center><h2 class="page-header" style="background-color: #2F4F4F; color: white;">
All Employees </h2></center>
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
      //global $page1;
      $page1 = ($page * 5) - 5; 
    }

    $query_count = "SELECT * from tbl_employee, tbl_department, tbl_address, tbl_employment_type where dept = dep_id AND address = adre_id AND empttype = id_type";

    $find_count = mysqli_query($connection,$query_count);
    $count = mysqli_num_rows($find_count);

    $count = ceil($count /5);

    ?>

<table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <!-- <th>Id</th> -->
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Birth Date</th>
                        <th>Department</th>
                        <th>Employment Type</th>
                        <th>Salary</th>
                        <th>Image</th>
                        <th>Employment Date</th>
                        <th>Manage</th>
                      </tr>
                    </thead>     
                  <tbody id="myTable">
        <?php 
                    
       $query = "SELECT * FROM tbl_employee, tbl_department, tbl_address, tbl_employment_type where dept = dep_id AND address = adre_id AND empttype = id_type LIMIT $page1,5";
                $select = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select)) {
                    $emply_id = mysqli_real_escape_string($connection,$row['id']);
                    $name = mysqli_real_escape_string($connection,$row['firstname']." ". $row['midlename']." ". $row['lastname']);
                    $gender = mysqli_real_escape_string($connection,$row['gender']);
                    $phone = mysqli_real_escape_string($connection,$row['phone']);
                    $email = mysqli_real_escape_string($connection,$row['email']);
                    $birthdate = mysqli_real_escape_string($connection,$row['birthdate']);
                    $dept = mysqli_real_escape_string($connection,$row['deptname']);
                    $address = mysqli_real_escape_string($connection,$row['city']);
                    $empttype = mysqli_real_escape_string($connection,$row['name']);
                    $salary = mysqli_real_escape_string($connection,$row['salary']);
                    $otherdetails = mysqli_real_escape_string($connection,$row['otherdetails']);
                    $datejoin = mysqli_real_escape_string($connection,$row['datejoin']);
                    $image = mysqli_real_escape_string($connection,$row['image']);

                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$gender</td>";
                    echo "<td>$phone</td>";                    
                    echo "<td>$email</td>";
                    echo "<td>$birthdate</td>";
                    echo "<td>$dept</td>";
                    echo "<td>$empttype</td>";
                    echo "<td>$salary</td>";
                    echo "<td> <img width='120' height='90' src='../resource/images/employeeimage/$image' alt ='No image'></td>";
                    echo "<td>$datejoin</td>";
                    echo "<td><a href='employees.php?source=edit_employ&p_id=$emply_id'>Edit</a>|<a href='users.php?source=add_users&p_id=$emply_id'>User</a>|<a href='employees.php?delete=$emply_id'>Delete</a></td>";
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
                    echo "<li><a style='background: #000 !important;' class='active_link' href='employees.php?source=none&page={$i}'>{$i}</a></li>";                      
                    }
                  else{
                    echo "<li><a href='employees.php?source=none&page={$i}'>{$i}</a></li>";
                  }

                  }
                  

                  ?>
                </ul>

                <?php 
                  if(isset($_GET['delete'])) {

                  $the_emp_id = mysqli_real_escape_string($connection,$_GET['delete']);

                  $query = "select * from tbl_address, tbl_employee where address = adre_id and id = '$the_emp_id'";
                  $select = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($select)) {
                    $adre_id = mysqli_real_escape_string($connection,$row['adre_id']);
                  }

                  $query = "delete from tbl_employee where id = '$the_emp_id'";
                  $delete_query = mysqli_query($connection, $query);

                  confirmQuery($delete_query);

                  $query = "delete from tbl_address where adre_id = '$adre_id'";
                  $delete_query = mysqli_query($connection, $query);

                  confirmQuery($delete_query);

                  header("Location: employees.php");
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