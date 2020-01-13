<?php 
if (isset($_GET['resetpass'])) {
        	$the_empl_id = mysqli_real_escape_string($connection,$_GET['resetpass']);


        }
                    
       $query = "SELECT * from tbl_employee_login, tbl_employee WHERE log_id = '$the_empl_id' and empID = id";
       $select_empl_by_id = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_empl_by_id)) {
                    $emply_id = mysqli_real_escape_string($connection,$row['log_id']);
                    $passcode = mysqli_real_escape_string($connection,$row['passcode']);
                    $role = mysqli_real_escape_string($connection,$row['role']);
                    $username = mysqli_real_escape_string($connection,$row['username']);
                    $fname = mysqli_real_escape_string($connection,$row['firstname']);
                    $lastname = mysqli_real_escape_string($connection,$row['lastname']);
                    $image = mysqli_real_escape_string($connection,$row['image']);

                  }


if (isset($_POST['update_user_role'])) {
	
    $the_empl_id = mysqli_real_escape_string($connection,$_GET['resetpass']);
	$username = mysqli_real_escape_string($connection,$_POST['username']);
	$role = mysqli_real_escape_string($connection,$_POST['role']);

    $query = "UPDATE tbl_employee_login set role = '$role' where log_id = '$the_empl_id' ";
    
    $query_user = mysqli_query($connection, $query);

    confirmQuery($query_user);

    header('Location: ./users.php');

}

if (isset($_POST['reset_user_pass'])) {
    
    $the_empl_id = mysqli_real_escape_string($connection,$_GET['resetpass']);
    $pass = mysqli_real_escape_string($connection,$_POST['pass']);

    $hashformat = "$2y$10$";
    $salt = "iloveyouGodcositisyou1";
    $hashsalt = $hashformat.$salt;
    $pass = crypt($pass,$hashsalt);

    $query = "UPDATE tbl_employee_login set passcode = '$pass', reset = '0' where log_id = '$the_empl_id' ";
    
    $query_user = mysqli_query($connection, $query);

    confirmQuery($query_user);

    // Email password to user:
    

    header('Location: ./users.php');

}

?>

<form action="" method="POST" enctype="multipart/form-data">


	<div id="page-wrapper" style="background-color: #5F9EA0;">
        <fieldset>
        <center><legend><h1>Reset User password or Change role</h1></legend></center>
                   

    <div class="container-fluid">

   <div class="row"  >
    
    <div class="col-lg-6">
	

	<div class="form-group">		
		<label for="title"><h2><?php echo $fname." ".$lastname ?></h2></label>
        <br>
		<br>
		 <h4>Username:</h4><input type="text" class="form-control" value="<?php echo $username;?>" readonly name="username">
	</div>
    
	<div class="form-group">
    	<h4><span>Change User Role:</span></h4>
        <select class="form-control" name="role" id="post_category">
          <option value="<?php echo $role;?>"><?php echo $role; ?></option>
    	  <option value="Editorials">Editorials</option>
    	  <option value="Writer/Reporter">Writer/Reporter</option>
    	  <option value="Admin">Admin</option>
          <!-- <option value="Accounts">Accounts</option> -->
          <!-- <option value="Marketing">Marketing</option> -->
          <!-- <option value="Advertisment">Advertisment</option> -->
       </select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user_role" value="Update User Role">
    </div>
	 <input type="text" class="form-control" value="<?php echo $generatepass;?>" readonly name="pass">
    Please kindly communicate the password to the user.
    <div class="form-group">
        <input type="submit" class="btn btn-warning" name="reset_user_pass" value="Reset User Password">
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