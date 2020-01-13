<?php
session_start();
include_once('resource/db/db.php');
include_once('resource/db/function.php');
$error ='';

if(isset($_POST['submit']))
{
$username = mysqli($_POST['username']);
$password = mysqli($_POST['password']);
$confirm = mysqli($_POST['confirm']);

if ($password !== $confirm) {
$error.="Sorry password donot match !!";
}
else{
$hashformat = "$2y$10$";
$salt = "iloveyouGodcositisyou1";
$hashsalt = $hashformat.$salt;
$pass = crypt($confirm,$hashsalt); 

$get_data = "UPDATE tbl_employee_login set passcode = '$pass', reset = 1 where username = '$username'";
$select_user = mysqli_query($connection,$get_data);

confirmQuery($select_user);

header('Location: index.php');
}

}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>
     <!-- My own -->
    <link rel="icon" type="image/jpg" href="resource/images/Newsicon.jpg"/>


    <style type="text/css">
      body{
        background-image: url(resource/images/newsb.jpg);
        background-size: cover;
        color: white;
        background-repeat: no-repeat;
        background-position: center; 
        background-attachment: fixed;
      }
      form{
        background: #4B0082;
        color: white;
        padding: 40px;
        margin-top: 100px;
        padding-bottom: 60px;
        box-shadow: 10px 10px 5px rgba(6, 1, 1, 0.43);
        width: 100% ! important;
      }
      h1{
        text-align: center;
        text-transform: none;
      }
      .btn{
        width: 100%;
        border-radius: 0px;
        
      }
      .form-control{
        border-radius: 0px;
        background-color: white;
        color: black;
        border-radius:1px solid #291212
      }
    </style>

    
    <link href="resource/css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="resourc/css/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="resource/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    
  </head>

  <body>  
  <div id="myNavbar" class="navbar navbar-default navbar-center" role="navigation">
    <center><h1>Almost Done</h1></center>
  <div class="container">  
  </div>
</div>
      <div class="container">
        <div class="row">
          <div class="col-sm-offset-2 col-sm-8">
            <form action="" method="post">
           <center><font style="color:rgb(255, 95, 66);; font:bold 17px 'Aleo';"><?php echo $error?></font></center>
            <h1>Password Reset Before Login</h1>
              <br><br>
              <input hidden type="text" name="username" value="<?php echo $_GET['usr'];?>">
         <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="0.8s">
           <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
           <input type="password" name="password" required="" autofocus class="form-control" aria-describeby="sizing-addon1" placeholder="Enter New Password" ></input>
         </div><br><br>
         
           <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="1.2s">
           <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
           <input type="password" name="confirm" required="" class="form-control" aria-describeby="sizing-addon1" placeholder="Confirm Password" ></input>
         </div> 
              <br>
              
              <button type="submit" name="submit"  class="btn btn-default" >Continue</button><br><br>
              <center><p>News Agency</p></center>
            </form>
          </div>
        </div>
      </div>


  </body>
</html>