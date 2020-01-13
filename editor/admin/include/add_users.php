<?php 
$empid = '';
$dept = '';
if (isset($_GET['p_id'])) {
        	$the_empl_id = mysqli($_GET['p_id']);

          $query = "SELECT * from tbl_employee_login, tbl_department WHERE empID = $the_empl_id";
          $select_empl_by_id = mysqli_query($connection, $query);    
          while ($row = mysqli_fetch_assoc($select_empl_by_id)) {

            $empid = mysqli($row['empID']);
            $dept = mysqli($row['deptname']); 
          }

          if ($empid == $the_empl_id) {

            echo "<script>alert('Sorry this employees is aready part of the system, you can update the account'); window.location='./employees.php?source='</script>";  
          }

          // $userlist = array('Editorials','Writers and Reporter','Admin','Marketing & Advertisment','Accounting');

          // foreach ($userlist as $user) {
          //   if ($user != $dept) {
          //       echo "<script>alert('Sorry this employees cannot be a system user due to the department'); window.location='./employees.php?source='</script>";  
          //   }
          // }



        }                
       $query = "SELECT * from tbl_employee WHERE id = '$the_empl_id'";
       $select_empl_by_id = mysqli_query($connection, $query);
                
                 while ($row = mysqli_fetch_assoc($select_empl_by_id)) {
                    $emply_id = mysqli($row['id']);
                    $fname = mysqli($row['firstname']);
                    $lastname = mysqli($row['lastname']);
                    $email = mysqli($row['email']);
                    $image = mysqli($row['image']);
                  }

if (isset($_POST['add_user'])) {
	
    $the_empl_id = mysqli($_GET['p_id']);
	  $username = mysqli($_POST['username']);
	  $role = mysqli_real_escape_string($connection,$_POST['role']);
	  $status = mysqli_real_escape_string($connection,$_POST['status']); 
    $pass = mysqli_real_escape_string($connection,$_POST['pass']);

    $hashformat = "$2y$10$";
    $salt = "iloveyouGodcositisyou1";
    $hashsalt = $hashformat.$salt;
    $pass = crypt($pass,$hashsalt);  

    $query = "INSERT into tbl_employee_login (empID, username, passcode, role, status, datecreated, reset)";
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
		 <h4>Username: (You can change the Username)</h4><input type="text" class="form-control" value="<?php echo $email;?>" name="username">
	</div>
    
	<div class="form-group">
    	<h4><span>User Role:</span></h4><select class="form-control" name="role" id="post_category">
          <option value="Editorials">Editorials</option>
          <option value="Writers and Reporters">Writer/Reporter</option>
          <option value="Admin">Admin</option>
          <option value="Marketing & Advertisment">Marketing & Advertisement</option>
        <option value="Accounting">Accounts</option>
          <!-- <option value="Advertisment">Advertisment</option> -->

       </select>
    </div>
	<div class="form-group">
    	<h4><span>Status:</span></h4><select class="form-control" name="status" id="post_category">
    	  <option value="Unblocked">Unblocked</option>
    	  <option value="Block">Blocked</option>
       </select>
    </div>
    <input type="text" class="form-control" value="<?php echo $generatepass;?>" readonly name="pass">

    Please kindly communicate the password to the user.
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