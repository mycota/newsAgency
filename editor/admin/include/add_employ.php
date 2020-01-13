<?php 
	$error = '';
	$done ='';

if (isset($_POST['add_employee'])) {
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
	
    $image = mysqli_real_escape_string($connection,$_FILES['image']['name']);
    $imge_temp = mysqli_real_escape_string($connection,$_FILES['image']['tmp_name']);

    
    move_uploaded_file($imge_temp, "../resource/images/employeeimage/$image");

    // insert the addree into address table 

    $queryad = "INSERT into tbl_address (zip_cod,street,city,state,country,datecreated)";
    $queryad .= "value ('$zipcode','$street','$city','$state','$nation',now())";
    $query_addres = mysqli_query($connection, $queryad);

    confirmQuery($query_addres);

    
    $last_id = mysqli_insert_id($connection);

	

    // insert the employee into employee table 
    $query = "insert into tbl_employee (title,maried_status,firstname,midlename,lastname,gender,phone,email,birthdate,dept,address,empttype,salary,datejoin,image,systdate)";
    $query .= "value ('$title','$maried','$fname','$mname','$lname','$gender','$phone','$email','$bdate','$dept','$last_id','$emptype','$salary','$empdate','$image',now())";
    $query_emp = mysqli_query($connection, $query);

    confirmQuery($query_emp);

    $done.= "Employee successfully added: ". " ". "<a href='./employees.php'>View all Employees</a> ";
	
}

?>

<form action="" method="POST" enctype="multipart/form-data">
	
	<div id="page-wrapper">

    <div class="container-fluid">
    <center><h2 class="page-header" style="background-color: #4B0082; color: white;">
       Add New Employee
    </h2></center><br>
    <font><?php echo $done; ?></font><br>
	<div class="row" style="background-color: #F8F8FF;" >
                   
    <div class="col-lg-6 col-md-6">
    <div class="form-group">
    <label for="title">Title (Select title)</label>
    <select class="form-control" name="title" id="post_category">
    	  <option value='Mr.'>Mr.</option>";
    	  <option value='Miss.'>Miss.</option>";
    	  <option value='Mrs.'>Mrs.</option>";
    	  <option value='Dr.'>Dr.</option>";
    </select>
    </div>
	<div class="form-group">
    <label for="title">First Name</label>
	<input type="text" name="fname" required placeholder="First Name" class="form-control" >
	</div>
    <div class="form-group">
		<label for="title">Last Name</label>
		<input required type="text" name="lname" placeholder="Last Name" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_status">Birth Date</label>
		<input required type="date" name="bdate" class="form-control" >
	</div>

	<div class="form-group">
		<label for="phone">Phone</label>
		<input required type="text" name="phone" placeholder="Phone Number" class="form-control" >
	</div>

	<div class="form-group">
		<label for="post_tags">Zip Code</label>
		<input type="text" name="zipcode" placeholder="Zip Code" class="form-control" >
	</div>
	<div class="form-group">
		<label for="post_tags">City</label>
		<input required type="text" name="city" placeholder="City" class="form-control" >
	</div>
    <div class="form-group">
		<label for="post_tags">Nationality</label>
		<input required type="text" name="nation" placeholder="Nationality" class="form-control" >
	</div>
   <div class="form-group">
    <label for="title">Department (Select Department)</label>
    <select class="form-control" name="dept" id="post_category">
    	   <?php

          $query = "SELECT * from tbl_department";
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
		<label for="post_status">Employment Date</label>
		<input required name="empdate" type="date" class="form-control" >
	</div>
</div>

<div class="col-xs-6">
	<div class="form-group">
		<label for="title">Marriage Status</label>
    	<select class="form-control" name="maried" id="post_category">
    	  <option value='Single'>Single</option>";
    	  <option value='Married'>Married</option>";
    	  <option value='Divorce'>Divorce</option>";
       </select>
    </div>
<div class="form-group">
    <label for="title">Middle Name</label>
	<input type="text" name="mname" placeholder="Middle Name" class="form-control" >
	</div>

    <div class="form-group">
		<label for="title">Gender</label>
       <select class="form-control" name="gender" id="post_category">
    	  <option value='Male'>Male</option>";
    	  <option value='Female'>Female</option>";
       </select>	
   </div>
   <div class="form-group">
		<label for="post_image">Picture</label>
		<input required type="file" class="form-control" name="image">
		<font><?php echo "$error"; ?></font>
	</div>

	<div class="form-group">
		<label for="post_status">Email</label>
		<input required type="email" name="email" placeholder="Email" class="form-control" name="status">
	</div>

	<div class="form-group">
		<label for="post_tags">Street Name</label>
		<input type="text" placeholder="Stree Name" class="form-control" name="street">
	</div>
	<div class="form-group">
		<label for="post_tags">State</label>
		<input required type="text" name="state" placeholder="State" class="form-control" >
	</div>
	<br>
	<br>
	<br>
	<br>

	<div class="form-group">
    <label for="title">Employment Type (Select Employment Type)</label>
    <select class="form-control" name="emptype" id="post_category">
    	   <?php

          $query = "SELECT * from tbl_employment_type";
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
		<label for="post_tags">Salary</label>
		<input required type="text" placeholder="Salary" class="form-control" name="salary">
	</div>
	</div>
</div>
</div>
<center><div class="form-group">
		<input type="submit" class="btn btn-success btn-lg btn-block" name="add_employee" value="Add Employee">
	</div></center>
</div>
</form>