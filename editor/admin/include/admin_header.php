<?php ob_start(); ?>
<?php include "../resource/db/db.php"; 
      include "../resource/db/function.php";  
      session_start();
      if (!isset($_SESSION['username'])) {
        if(!isset($_SESSION['role'])){
          if ($_SESSION['role'] != 'Admin') {
            
         header("Location: ../../editor/logout.php");         
         //../index.php

        }
     }
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>
    <link rel="icon" type="image/jpg" href="../resource/images/Newsicon.jpg"/>

    <!-- Bootstrap Core CSS -->
    <link href="../resource/css/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../resource/css/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../resource/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../resource/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <script type = "text/javascript" src="../resource/css/js/bootstrap.min.js"></script>
    <script type = "text/javascript" src="../resource/css/js/bootstrap.js"></script>
    <script type = "text/javascript" src="../resource/css/js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Google chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- Pagenation -->
    <!-- <link rel="stylesheet" type="text/css" href="../resource/css/pagination.css"> -->

</head>

<body>