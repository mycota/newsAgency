<?php 
if (isset(create_account)) {
	
	$companyname = mysqli($_POST['companyname']);
	$fulname = mysqli($_POST['fulname']);
	$username = mysqli($_POST['username']);
	$emailid = mysqli($_POST['emailid']);
	$phone = mysqli($_POST['phone']);
	$gender = mysqli($_POST['gender']);
	$package = mysqli($_POST['package']);
	
	$passcode = mysqli($_POST['passcode']);
	$confpass = mysqli($_POST['confirmpass'])

	$query = "insert into tbl_clients (busregname,firstname,midlename,lastname,gender,pofcphone,package_id)";
    $query .= "value ('$companyname','$fulname','$fulname','$fulname','$fulname','$gender','$phone','$package')";
    $query_client = mysqli_query($connection, $query);

    confirmQuery($query_client);

    $last_id = mysqli_insert_id($connection);

    $query = "INSERT into tbl_user_login (clientID,clientusername,passcode)"
    $query.= "value ('$last_id', '$username', '$confpass')";
    $query_user = mysqli_query($connection, $query);

    confirmQuery($query_user);
    $last_id = mysqli_insert_id($connection);

    //insert into advert
    $query = "INSERT into tbl_adverts (userID,advertpackageID)"
    $query.= "value ('$last_id', '$package')";
    $query_user = mysqli_query($connection, $query);

    confirmQuery($query_user);






    $done.= "Client successfully added: ". " ". "<a href='./employees.php'>View all Employees</a> ";

}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<select class="form-control" name="package" id="post_category">
    	   <?php
    	   $pack ='';
          $query = "SELECT * from tbl_advert_packages";
          $select_package = mysqli_query($connection, $query);
          
          confirmQuery($select_package);

          while ($row = mysqli_fetch_assoc($select_package)) {
          $pack_id = mysqli($row['pack_id']);
          $pack_name = mysqli($row['pack_name']);
          $pack_amount = mysqli($row['pack_amount']);
          $pack_detail = mysqli($row['detail']);
          $pack_benefits = mysqli($row['pack_benefits']);

          $pack = ("$pack_name $pack_detail $pack_amount");
          echo "<option value='$pack_id'>$pack</option>";
			}

    	  ?>
       </select>
</body>
</html>