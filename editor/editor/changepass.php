<?php include "include/editor_header.php"; 
$error = '';
$db_pass = '';

if (isset($_SESSION['username'])) {
    $username = mysqli_real_escape_string($connection,$_SESSION['username']);
}
      
       if (isset($_POST['update_pass']) and isset($_SESSION['username'])) {
       
                    $username = mysqli_real_escape_string($connection,$_POST['username']);
                    $oldpass = mysqli_real_escape_string($connection,$_POST['oldpass']);
                    $password = mysqli_real_escape_string($connection,$_POST['newpass']);
                    $confirmpass = mysqli_real_escape_string($connection,$_POST['confirmpass']);

                    $hashformat = "$2y$10$";
                    $salt = "iloveyouGodcositisyou1";
                    $hashsalt = $hashformat.$salt;
                    $oldpass = crypt($oldpass,$hashsalt); 

                    $get_data = "SELECT * from tbl_employee_login, tbl_employee where username = '$username' and empID = id";
                    $select_user = mysqli_query($connection,$get_data);
                    confirmQuery($select_user);

                    while($row = mysqli_fetch_array($select_user))
                    {
                      $db_pass.= $row['passcode'];
                    }

                    if ($oldpass !== $db_pass ) {
                      $error.="Old password donot match !!";
                    }
                    elseif ($password !== $confirmpass) {
                      $error.="Passwords donot match !!";
                    }
                    elseif ($confirmpass < 7) {
                      $error.="Password length is less than 8 !!";
                    }
                    else{

                    $hashformat = "$2y$10$";
                    $salt = "iloveyouGodcositisyou1";
                    $hashsalt = $hashformat.$salt;
                    $pass = crypt($confirmpass,$hashsalt); 

                    $get_data = "UPDATE tbl_employee_login set passcode = '$pass' where username = '$username'";
                    $update_pass = mysqli_query($connection,$get_data);

                    confirmQuery($update_pass);

                   header('Location: ../../editor/logout.php');
            
                }
              }
            
?>

    <div id="wrapper">

        <!-- Navigation -->

<?php include "include/editor_navigation.php" ?>



        <form action="" method="POST" enctype="multipart/form-data">
  
  <div id="page-wrapper">

    <div class="container-fluid">
      <h1 class="page-header">
                            Welcome Editor 
                            <small><?php echo $_SESSION['fname']?></small>
                        </h1>
    <center><h2 class="page-header" style="background-color: #663399; color: white;">
       Change Password
    </h2></center><br>
  <center><font style="color:rgb(255, 95, 66);; font:bold 17px 'Aleo';"><?php echo $error?></font></center>
  <div class="row" style="background-color: ;" >          
    <div class="col-lg-6 col-md-6">
  
  <div class="form-group">
    <label for="title">Username</label>
  <input type="text" name="username" readonly value="<?php echo $username;?>" class="form-control" >
  </div>
    <div class="form-group">
    <label for="title">New Password</label>
    <input required type="password" minlengt="8" name="newpass" placeholder="Enter Password" class="form-control" >
  </div>
<br>  
</div>

<div class="col-xs-6">
  <div class="form-group">
    <label for="title">Old Password</label>
  <input required type="password" name="oldpass" placeholder="Enter Old Password" class="form-control" >
  </div>
<div class="form-group">
    <label for="title">Confirm Password</label>
  <input required type="password" name="confirmpass" minlengt="8" placeholder="Confirm Password" class="form-control" >
  </div>
  
  </div>
</div>
</div>
<center><div class="form-group">
    <input type="submit" class="btn btn-success btn-lg btn-block" name="update_pass" value="Change Password">
  </div></center>
</div>
</form>
<?php include "include/editor_footer.php"?>

