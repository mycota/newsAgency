<?php 
if (isset($_GET['p_id'])) {
        	$the_empl_id = $_GET['p_id'];


        }                
       $query = "select * from tbl_employee WHERE id = '$the_empl_id'";
       $select_empl_by_id = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_empl_by_id)) {
                    $emply_id = $row['id'];
                    $fname = $row['firstname'];
                    $lastname = $row['lastname'];
                    $email = $row['email'];
                    $image = $row['image'];
                  }


if (isset($_POST['add_user'])) {
	
    $the_empl_id = $_GET['p_id'];
	  $username = $_POST['username'];
	  $role = $_POST['role'];
	  $status = $_POST['status']; 
    $pass = $_POST['pass'];

    $hashformat = "$2y$10$";
    $salt = "iloveyouGodcositisyou1";
    $hashsalt = $hashformat.$salt;
    $pass = crypt($pass,$hashsalt);  

    $query = "insert into tbl_employee_login (empID, username, passcode, role, status, datecreated, reset)";
    $query .= "value ('$the_empl_id','$username','$pass','$role','$status', now(), '0')";
    $query_user = mysqli_query($connection, $query);

    confirmQuery($query_user);

    // Email password to user:


    header('Location: ./users.php');

}

?>

<form action="" method="POST" enctype="multipart/form-data">


	<div id="page-wrapper" style="background-color: #8FBC8F;">
        <fieldset>
        <center><legend><h1>Add Employee As System User</h1></legend></center>
                   

    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">
	

	<div class="form-group">		
		<label for="title"><h2><?php echo $fname." ".$lastname ?></h2></label>
        <br>
		<br>
		 <h4>Username: (You can change the Username)</h4><input type="text" class="form-control" value="<?php echo $email;?>" name="username">
	</div>
    
	<div class="form-group">
    	<h4><span>User Role:</span></h4><select class="form-control" name="role" id="post_category">
    	  <option value="Accounts">Accounts</option>
          <option value="Marketing">Marketing</option>
          <option value="Advertisment">Advertisment</option>
          <option value="Editor">Editor</option>
          <option value="Writer/Reporter">Writer/Reporter</option>
          <option value="Admin">Admin</option>

       </select>
    </div>
	<div class="form-group">
    	<h4><span>Status:</span></h4><select class="form-control" name="status" id="post_category">
    	  <option value="Unblocked">Unblocked</option>
    	  <option value="Block">Blocked</option>

       </select>
    </div>
    <input type="text" class="form-control" value="<?php echo $generatepass;?>" readonly name="pass">

    Email with a generated password will sent to the employee's email address, so kindly inform them
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Create User">
    </div>
</div>

    <div class="col-lg-6 col-md-6">
<br>
<div class="form-group">
    <img width="200" height="200" src="../resource/images/employeeimage/<?php echo $image; ?>" alt=""></label>
  </div>
</div>

		</fieldset>
</form>