<?php 
        $error = '';
        if (isset($_GET['p_id'])) {
        	$the_empl_id = mysqli_real_escape_string($connection,$_GET['p_id']);


        }
                    
      $query = "select * from tbl_employee, tbl_department, tbl_employment_type, tbl_address WHERE id = '$the_empl_id' ";
      $query .= "and dept = dep_id and empttype = id_type and address = adre_id";
      $select_empl_by_id = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_empl_by_id)) {
                    $emply_id = mysqli_real_escape_string($connection,$row['id']);
                    $title = mysqli_real_escape_string($connection,$row['title']);
                    $dept = mysqli_real_escape_string($connection,$row['dept']);
                    $deptname = mysqli_real_escape_string($connection,$row['deptname']);
                    $empttype = mysqli_real_escape_string($connection,$row['empttype']);
                    $empname = mysqli_real_escape_string($connection,$row['name']);                    
                    $maried_status = mysqli_real_escape_string($connection,$row['maried_status']);
                    $fname = mysqli_real_escape_string($connection,$row['firstname']);
                    $midlename = mysqli_real_escape_string($connection,$row['midlename']);
                    $lastname = mysqli_real_escape_string($connection,$row['lastname']);
                    $gender = mysqli_real_escape_string($connection,$row['gender']);
                    $phone = mysqli_real_escape_string($connection,$row['phone']);
                    $email = mysqli_real_escape_string($connection,$row['email']);
                    $birthdate = mysqli_real_escape_string($connection,$row['birthdate']);
                    $salary = mysqli_real_escape_string($connection,$row['salary']);
                    $datejoin = mysqli_real_escape_string($connection,$row['datejoin']);
                    $image = mysqli_real_escape_string($connection,$row['image']);
                    $address = mysqli_real_escape_string($connection,$row['address']);
                  }

      $adrquery = "select * from tbl_address where adre_id = '$address'";
      $select_adre = mysqli_query($connection, $adrquery);

                while ($row = mysqli_fetch_assoc($select_adre)) {
                  $ad_id = mysqli_real_escape_string($connection,$row['adre_id']);
                  $zipcode = mysqli_real_escape_string($connection,$row['zip_cod']);
                  $street = mysqli_real_escape_string($connection,$row['street']);
                  $city = mysqli_real_escape_string($connection,$row['city']);
                  $state = mysqli_real_escape_string($connection,$row['state']);
                  $nation = mysqli_real_escape_string($connection,$row['country']);
                }

        
       
       if (isset($_POST['update_employ'])) {
       
                    $title = mysqli_real_escape_string($connection,$_POST['title']);
                    $fname = mysqli_real_escape_string($connection,$_POST['fname']);
                    $lname = mysqli_real_escape_string($connection,$_POST['lname']);
                    $bdate = mysqli_real_escape_string($connection,$_POST['bdate']);
                    $phone = mysqli_real_escape_string($connection,$_POST['phone']);
                    $zipcode = mysqli_real_escape_string($connection,$_POST['zipcode']);
                    $city = mysqli_real_escape_string($connection,$_POST['city']);
                    $nation = mysqli_real_escape_string($connection,$_POST['nation']);
                    $dept = mysqli_real_escape_string($connection,$_POST['dept']);
                    $empdate = mysqli_real_escape_string($connection,$_POST['empdate']);
                    $maried = mysqli_real_escape_string($connection,$_POST['maried']);
                    $mname = mysqli_real_escape_string($connection,$_POST['mname']);
                    $gender = mysqli_real_escape_string($connection,$_POST['gender']);
                    $email = mysqli_real_escape_string($connection,$_POST['email']);
                    $street = mysqli_real_escape_string($connection,$_POST['street']);
                    $state = mysqli_real_escape_string($connection,$_POST['state']);
                    $emptype = mysqli_real_escape_string($connection,$_POST['emptype']);
                    $salary = mysqli_real_escape_string($connection,$_POST['salary']);
                    
                    $imge = mysqli_real_escape_string($connection,$_FILES['image']['name']);
                    $imge_temp = mysqli_real_escape_string($connection,$_FILES['image']['tmp_name']);

                    $queryad = "update tbl_address set zip_cod = '$zipcode', street = '$street', city = '$city', state = '$state', country = '$nation' where adre_id = '$address' ";
                    $query_addres = mysqli_query($connection, $queryad);

                    confirmQuery($query_addres);

                   if (empty($imge)) {
                   $query = "UPDATE tbl_employee SET ";
                   $query .= "title = '$title', ";
                   $query .= "maried_status = '$maried', ";
                   $query .= "firstname = '$fname', ";
                   $query .= "midlename = '$mname', ";
                   $query .= "lastname = '$lname', ";
                   $query .= "gender = '$gender', ";
                   $query .= "phone = '$phone', ";
                   $query .= "email = '$email', ";
                   $query .= "birthdate = '$bdate', ";
                   $query .= "dept = '$dept', ";
                   $query .= "empttype = '$emptype', ";
                   $query .= "salary = '$salary', ";
                   $query .= "datejoin = '$empdate' ";
                   $query .= "where id = '$the_empl_id'";

                  $update_employ = mysqli_query($connection, $query);
                  confirmQuery($update_employ);
                  header('Location: ./employees.php');

                  }
            else{
                    
              unlink("../resource/images/employeeimage/".$image);
              //echo chdir("./");                   
              move_uploaded_file($imge_temp, "../resource/images/employeeimage/$imge");

                   $query = "UPDATE tbl_employee SET ";
                   $query .= "title = '$title', ";
                   $query .= "maried_status = '$maried', ";
                   $query .= "firstname = '$fname', ";
                   $query .= "midlename = '$mname', ";
                   $query .= "lastname = '$lname', ";
                   $query .= "gender = '$gender', ";
                   $query .= "phone = '$phone', ";
                   $query .= "email = '$email', ";
                   $query .= "birthdate = '$bdate', ";
                   $query .= "dept = '$dept', ";
                   $query .= "empttype = '$emptype', ";
                   $query .= "salary = '$salary', ";
                   $query .= "datejoin = '$empdate', ";
                   $query .= "image = '$imge' ";
                   $query .= "where id = '$the_empl_id'";

                  $update_employ = mysqli_query($connection, $query);
                  confirmQuery($update_employ);

                   header('Location: ./employees.php');

            
                  //$error = "Wrong image type";
                }
            }
?>
<form action="" method="POST" enctype="multipart/form-data">
  
  <div id="page-wrapper">

    <div class="container-fluid">
    <center><h2 class="page-header" style="background-color: #6A5ACD; color: white;">
       Edit Employee Record
    </h2></center><br>
  <div class="row" style="background-color: #D3D3D3;" >
                   
    <div class="col-lg-6 col-md-6">
    <div class="form-group">
    <label for="title">Title (Select title)</label>
    <select class="form-control" name="title" id="">
      <option value="<?php echo $title ?>"><?php echo $title; ?></option>
      <?php 
       // this condition will nerver be true, therefore the else part will always execute
      if ($title == 'Non') {
        echo "<option value='Mr.'>Mr.</option>";
        }
      else{
        echo "<option value='Mr.'>Mr.</option>";
        echo "<option value='Mrs.'>Mrs.</option>";
        echo "<option value='Miss.'>Miss.</option>";
        echo "<option value='Dr.'>Dr.</option>";
      }
      ?>
        
    </select>
    </div>
  <div class="form-group">
    <label for="title">First Name</label>
  <input type="text" name="fname" value="<?php echo $fname;?>" required placeholder="First Name" class="form-control" >
  </div>
    <div class="form-group">
    <label for="title">Last Name</label>
    <input required type="text" name="lname" value="<?php echo $lastname;?>" placeholder="Last Name" class="form-control" >
  </div>
<br>
  <div class="form-group">
    <label for="">Birth Date</label>
    <input required type="date" value="<?php echo $birthdate;?>" name="bdate" class="form-control" >
  </div>
<br>
  <div class="form-group">
    <label for="phone">Phone</label>
    <input required type="text" name="phone" value="<?php echo $phone;?>" placeholder="Phone Number" class="form-control" >
  </div>

  <div class="form-group">
    <label for="">Zip Code</label>
    <input type="text" name="zipcode" value="<?php echo $zipcode;?>" placeholder="Zip Code" class="form-control" >
  </div>
  <div class="form-group">
    <label for="">City</label>
    <input required type="text" name="city" value="<?php echo $city;?>" placeholder="City" class="form-control" >
  </div>
    <div class="form-group">
    <label for="">Nationality</label>
    <input required type="text" name="nation" value="<?php echo $nation;?>" placeholder="Nationality" class="form-control" >
  </div>
   <div class="form-group">
    <label for="title">Department (Select Department)</label>
    <select class="form-control" name="dept" id="">
      <option value="<?php echo $dept;?>" ><?php echo $deptname; ?></option>
         <?php

          $query = "select * from tbl_department";
          $select_dept = mysqli_query($connection, $query);
          
          confirmQuery($select_dept);

          while ($row = mysqli_fetch_assoc($select_dept)) {
          $dept_id = mysqli_real_escape_string($connection,$row['dep_id']);
          $dept_name = mysqli_real_escape_string($connection,$row['deptname']);

          echo "<option value='$dept_id'>$dept_name</option>";
}

        ?>
       </select>
    </div>
    <div class="form-group">
    <label for="">Employment Date</label>
    <input required name="empdate" value="<?php echo $datejoin;?>" type="date" class="form-control" >
  </div>
</div>

<div class="col-xs-6">
  <div class="form-group">
    <label for="title">Marriage Status</label>
      <select class="form-control" name="maried" id="">
        <option value="<?php echo $maried_status;?>"><?php echo $maried_status; ?></option>
        <option value='Single'>Single</option>
        <option value='Married'>Married</option>
        <option value='Divorce'>Divorce</option>
       </select>
    </div>
<div class="form-group">
    <label for="title">Middle Name</label>
  <input type="text" name="mname" value="<?php echo $midlename;?>" placeholder="Middle Name" class="form-control" >
  </div>

    <div class="form-group">
    <label for="title">Gender</label>
       <select class="form-control" name="gender" id="">
       <option value="<?php echo $gender;?>"><?php echo $gender; ?></option>
        <option value='Male'>Male</option>";
        <option value='Female'>Female</option>";
       </select>  
   </div>

   <div class="form-group">
    <label for="">Picture
    <img width="100" src="../resource/images/employeeimage/<?php echo $image; ?>" alt=""></label>
    <input type="file" class="form-control" name="image">
    <font><?php echo "$error"; ?></font>
  </div>

  <div class="form-group">
    <label for="">Email</label>
    <input required type="email" name="email" value="<?php echo $email;?>" placeholder="Email" class="form-control" name="status">
  </div>

  <div class="form-group">
    <label for="">Street Name</label>
    <input type="text" placeholder="Stree Name" value="<?php echo $street;?>" class="form-control" name="street">
  </div>
  <div class="form-group">
    <label for="">State</label>
    <input required type="text" name="state" value="<?php echo $state;?>" placeholder="State" class="form-control" >
  </div>
  <br>
  <div class="form-group">
    <label for="">Employment Type (Select Employment Type)</label>
    <select class="form-control" name="emptype" id="">
      <option value="<?php echo $empttype;?>" ><?php echo $empname; ?></option>
         <?php

          $query = "select * from tbl_employment_type";
          $select_dept = mysqli_query($connection, $query);
          
          confirmQuery($select_dept);

          while ($row = mysqli_fetch_assoc($select_dept)) {
          $emplty_id = mysqli_real_escape_string($connection,$row['id_type']);
          $emplty_name = mysqli_real_escape_string($connection,$row['name']);

          echo "<option value='$emplty_id'>$emplty_name</option>";
}

        ?>
       </select>
    </div>
    <div class="form-group">
    <label for="">Salary</label>
    <input required type="text" placeholder="Salary" value="<?php echo $salary;?>" class="form-control" name="salary">
  </div>
  </div>
</div>
</div>
<center><div class="form-group">
    <input type="submit" class="btn btn-success btn-lg btn-block" name="update_employ" value="Edit Employee">
  </div></center>
</div>
</form>