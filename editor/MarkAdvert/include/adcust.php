<?php 
	$error = '';
	$done ='';

if (isset($_POST['add_client'])) {
	$busregname = mysqli($_POST['busregname']);
	$busregno = mysqli($_POST['busregno']);
	$busnature = mysqli($_POST['busnature']);
	$bustype = mysqli($_POST['bustype']);
	$busactivity = mysqli($_POST['busactivity']);
	$hq = mysqli($_POST['hq']);
	$busemail = mysqli($_POST['busemail']);
	$busweb = mysqli($_POST['busweb']);
	$bustreet = mysqli($_POST['bustreet']);
	$buscity = mysqli($_POST['buscity']);
	$busbranch = mysqli($_POST['busbranch']);
	$buscountry = mysqli($_POST['buscountry']);
	$buscontinet = mysqli($_POST['buscontinet']);
	$bustrdate = mysqli($_POST['bustrdate']);
	$fname = mysqli($_POST['fname']);
	$lname = mysqli($_POST['lname']);
	$mname= mysqli($_POST['mname']);
	$package = mysqli($_POST['package']);
	$peemail = mysqli($_POST['peemail']);
	$pposition = mysqli($_POST['pposition']);
	$title = mysqli($_POST['title']);
	$gender = mysqli($_POST['gender']);
	$pphone = mysqli($_POST['pphone']);
	$bustate = mysqli($_POST['bustate']);
	$busphone = mysqli($_POST['busphone']);
	$buszipcode = mysqli($_POST['buszipcode']);
	$buslogo = mysqli($_POST['buslogo']);

	$buslogo = mysqli($_FILES['image']['name']);
    $buslogo_temp = mysqli($_FILES['image']['tmp_name']);
    
    move_uploaded_file($buslogo_temp, "../resource/images/businesslogos/$buslogo");

    // insert the addree into address table 

    $queryad = "INSERT into tbl_addresscust (buswebsite,busemail,busphone,street,city,state,zipcodecust,country,continent)";
    $queryad .= "value ('$busweb','$busemail','$busphone','$bustreet','$buscity','$bustate','$buszipcode','$buscountry','$buscontinet')";
    $query_addres = mysqli_query($connection, $queryad);

    confirmQuery($query_addres);

    
    $last_id = mysqli_insert_id($connection);

	

    // insert the company into client table 
    $query = "insert into tbl_clients (busregname,busregnumber,natofbus,bustartdate,bustype,headoffice,busactivity,nofbranch,logopath,title,firstname,midlename,lastname,gender,pofcphone,positionheld,client_adre,package_id)";
    $query .= "value ('$busregname','$busregno','$busnature','$bustrdate','$bustype','$hq','$busactivity','$busbranch','$buslogo','$title','$fname','$mname','$lname','$gender','$pphone','$pposition','$last_id','$package')";
    $query_client = mysqli_query($connection, $query);

    confirmQuery($query_client);

    $done.= "Client successfully added: ". " ". "<a href='./employees.php'>View all Employees</a> ";
	
}

?>

<form action="" method="POST" enctype="multipart/form-data">
	
	<div id="page-wrapper">
    <center><h2 class="page-header" style="background-color: #4B0082; color: white;">
       Add New Client
    </h2></center>
    <font><?php echo $done; ?></font>
    <div class="container-fluid">
    <center><h3 class="page-header" style="">
       Business Info
    </h3></center>
	<div class="row" style="background-color: #F8F8FF;" >
                   
    <div class="col-lg-6 col-md-6">
    <div class="form-group">
    <label for="title">Business Reg. Name</label>
	<input type="text" name="busregname" required placeholder="Business Reg. Name" class="form-control" >
	</div>
	<div class="form-group">
		<label for="title">Nature of Business</label>
    	<select class="form-control" name="busnature" id="busnature">
    	  <option value='Education'>Education</option>";
    	  <option value='Consultancy'>Consultancy</option>";
    	  <option value='Service Provider'>Service Provider</option>";
    	  <option value='Manufacturing'>Manufacturing</option>";
    	  <option value='Retailing'>Retailing</option>";
       </select>
    </div>
    <div class="form-group">
		<label for="title">Company Type</label>
    	<select class="form-control" name="bustype" id="busnature">
    	  <option value='Sole proprietor'>Sole proprietor</option>";
    	  <option value='Partnership'>Partnership</option>";
    	  <option value='Franchise'>Franchise</option>";
    	  <option value='Limited liability'>Limited liability</option>";
       </select>
    </div>
    <div class="form-group">
		<label for="title">Business Activities</label>
		<input required type="text" name="busactivity" placeholder="Business activities Name" class="form-control" >
	</div>
<div class="form-group">
		<label for="title">Tel</label>
		<input required type="text" name="busphone" placeholder="Telephone number" class="form-control" >
	</div>
</div>
<div class="col-xs-6">
	<div class="form-group">
    <label for="title">Business Reg Number</label>
	<input type="text" name="busregno" placeholder="Business Reg Number" class="form-control" >
	</div>
<div class="form-group">
    <label for="title">Start Date</label>
	<input type="date" name="bustrdate" placeholder="Business commencement date" class="form-control" >
	</div>
<div class="form-group">
    <label for="title">Headquarters</label>
	<input type="text" name="hq" placeholder="Business headquarters city" class="form-control" >
	</div>

    <div class="form-group">
    <label for="title">Number of branches</label>
	<input type="number" name="busbranch" placeholder="Business commencement date" class="form-control" >
	</div>
	<div class="form-group">
		<label for="title">Business Logo</label>
		<input required type="file" name="buslogo" class="form-control" >
	</div>
</div>
<div class="container-fluid">
    <center><h3 class="page-header" style="">
       Business Address</h3></center>
	<div class="row" style="background-color: #F8F8FF;" >        
    <div class="col-lg-6 col-md-6">
    <div class="form-group">
    <label for="title">Business Website</label>
	<input type="url" name="busweb" required placeholder="Business website" class="form-control" >
	</div>
	<div class="form-group">
    <label for="title">Email</label>
	<input type="email" name="busemail" required placeholder="Business email" class="form-control" >
	</div>
	<div class="form-group">
    <label for="title">Conutry</label>
	<input type="text" name="buscountry" placeholder="Conutry" class="form-control" >
	</div>
	<div class="form-group">
		<label for="title">Zip Code</label>
		<input required type="text" name="buszipcode" placeholder="Zipcode" class="form-control" >
	</div>
</div>
<div class="col-xs-6">
	<div class="form-group">
    <label for="title">Street</label>
	<input type="text" name="bustreet" placeholder="Street" class="form-control" >
	</div>
<div class="form-group">
    <label for="title">City</label>
	<input type="text" name="buscity" placeholder="City" class="form-control" >
	</div>
<div class="form-group">
    <label for="title">State</label>
	<input type="text" name="bustate" placeholder="State" class="form-control" >
	</div>
    <div class="form-group">
    <label for="title">Continent</label>
	<input type="text" name="buscontinet" placeholder="Continent" class="form-control" >
	</div>
   
</div>
<div class="container-fluid">
    <center><h2 class="page-header" style="">
       Person To Contact
    </h2></center>
    <font><?php echo $done; ?></font>
	<div class="row" style="background-color: #F8F8FF;" >
                   
    <div class="col-lg-6 col-md-6">
    <div class="form-group">
    <label for="title">Title (Select title)</label>
    <select class="form-control" name="title" id="ptitle">
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
    <label for="title">Middle Name</label>
	<input type="text" name="mname" placeholder="Middle Name" class="form-control" >
	</div>
    <div class="form-group">
		<label for="title">Last Name</label>
		<input required type="text" name="lname" placeholder="Last Name" class="form-control" >
	</div>
</div>

<div class="col-xs-6">

    <div class="form-group">
		<label for="title">Gender</label>
       <select class="form-control" name="gender" id="pgender">
    	  <option value='Male'>Male</option>";
    	  <option value='Female'>Female</option>";
       </select>	
   </div>
   <div class="form-group">
    <label for="title">Phone Number</label>
	<input type="text" name="pphone" placeholder="Phone number" class="form-control" >
	</div>
	<div class="form-group">
    <label for="title">Email</label>
	<input type="email" name="peemail" placeholder="Email" class="form-control" >
	</div>
	<div class="form-group">
    <label for="title">Position</label>
	<input type="text" name="pposition" placeholder="Position held" class="form-control" >
	</div>
   
</div>
<div class="container-fluid">
    <center><h2 class="page-header" style="">
       Package Selection
    </h2></center>
	<div class="row" style="background-color: #F8F8FF;" >
                   
    <div class="col-lg-12 col-md-12">
   
    <div class="form-group">
    <label for="title">Package (Select Advert Package)</label>
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
    </div>
	<div class="form-group">
    <label for="title">Package Details</label>
		<textarea class="form-control" name="packdetails" value="" id="" cols="30" rows="5"><?php //echo $descript;?></textarea>
	</div>
</div>


<center><div class="form-group">
		<input type="submit" class="btn btn-success btn-lg btn-block" name="add_client" value="Contiune">
	</div></center>
</div>
</form>