<?php
	session_start();
	if(!isset($_SESSION["add"])){
		$_SESSION["add"]=0;
		//$_SESSION["old"]=1;
	}
	
	
	
	$sign=0;
	
	/* switch($_SESSION["add"]){
		
		case 0: $_SESSION["add"]=1; break;
		
		case 1: $_SESSION["add"]=2; break;
		
		case 2: $_SESSION["add"]=3; break;
		
		case 3: $_SESSION["add"]=0; break;
		
		default: $_SESSION["add"]=0;
	}
	echo $_SESSION["add"];
} */




?>


<head>
<link rel="stylesheet" id="linkh" href="../Stylesheets/header.css" />
	<link rel="stylesheet" id="linkn" href="../Stylesheets/navigation.css" />
</head>

<style>

div.add{
	
	//float:right;
	//border: 1px solid black;
	position: relative;
	top: 100px;
	//margin-top: -350px;
	//margin-left: 250px;'
	//margin-top: 200px;
	left: 350px;
	//z-index:-5;
	padding-top: 100px;
	display:initial;
	padding-bottom: 50px;
	

}

div.add img{ 
	width: 300px;
	height:800px;
}

</style>

<?php

	include("../Pages/Header.html");
	
	$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

$post_id='';
$post_title='';
$post_author='';
$post_date='';

foreach ($db as $key => $value) {
	define(strtoupper($key), $value);
}
$s='';
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

mysqli_query($connection,'SET character_set_results=utf8');
mysqli_query($connection,'SET names=utf8');
mysqli_query($connection,'SET character_set_client=utf8');
mysqli_query($connection,'SET character_set_connection=utf8');
mysqli_query($connection,'SET character_set_results=utf8');
mysqli_query($connection,'SET collation_connection=utf8_general_ci');
mysqli_query($connection,'SET names udf8;');

	include('stic.php');
	include('advert.php');

						
	
	$usr="";
	if(isset($_COOKIE["User"])){
		$sign = 1;
		$id = $_COOKIE["User"];
		$q = "Select usr_name from tbl_user where id=".$id.";";
		//echo $q;
		$r = mysqli_query($connection,$q);
		echo mysqli_error($connection);
		$row = mysqli_fetch_assoc($r);
		$usr .= $row["usr_name"];
		$usr.=" ";
		
		$q1 = "Select count(*) from tbl_comments where comment_author=".$_COOKIE["User"].";";
			//echo $q1;
		$r1 = mysqli_query($connection,$q1);
			//echo mysqli_error($connection);
		$row1 = mysqli_fetch_array($r1);
		$t_cmnt = $row1[0];
			//echo $t_cmnt;
		
	} else {
		$sign=0;
		//echo "Some error occures...";
	}
	
	if(isset($_POST["submit"])&&$sign){
		$q = "Insert into tbl_comments (comment_news_id,comment_author,comment_content,comment_date) values (".$_POST["news"].",".$_COOKIE["User"].",\"".$_POST["comnt"]."\",sysdate());";
		//echo $q;
		$r = mysqli_query($connection,$q);
		echo mysqli_error($connection);
		$cnt = mysqli_affected_rows($connection);
		//echo $cnt;
		
	}
	
?>

<span id="sign" hidden><?php echo $sign; ?></span>

<script>
	function check(){
		s = document.getElementById("sign");
		if(s.innerHTML=='0'){
			alert("Please Sign In");
			return false;
		}
		else {
			return true;
		}
	}
</script>

<section style="position: relative; top: 110px; float: left; left: 70px;  width: 60%; margin-right: 100px; min-width: 800px; margin-bottom: 150px;">
	<div align="center" style="box-shadow: 3px 3px 3px gray; border-radius: 20px; border: 1px solid black; /*border-bottom: 3px solid pink;*/ margin-bottom: 30px; width: 300px; margin:auto;"> <h1 style="color:black; text-shadow: 1px 1px 1px gray;"> Comments on News </h1> </div>
	<div align="center" style="margin-top: 10px;font-size: 20px;">Total Comments on News's :	<?php echo $t_cmnt; ?></div>
	<br>
	<?php
		$query = "select * from tbl_news where newss_id in (Select comment_news_id from tbl_comments where comment_author=".$_COOKIE["User"].");";
		//echo $query;
		$r = mysqli_query($connection,$query);
		//echo mysqli_error($connection);
		while($row = mysqli_fetch_assoc($r)){
			
			$post_id = $row['newss_id'];
			$post_title = $row['tittle'];
			$post_author = $row['authorid'];
			$post_date = $row['systdate'];
			$post_content = substr($row['description'], 0,100);
		
			$post_image = $row['img_id'];
			$query3 = "Select name from tbl_image where image_id=".$post_image."  group by name;";
			//echo $query3;
			$res = mysqli_query($connection,$query3);
			$post_image = mysqli_fetch_assoc($res);
			$post_image= $post_image["name"];
	
	
	?>
	<div class="news" style="border-radius: 8px; border: 1px solid lightgray; padding: 10px; heigh: 480px;overflow: auto; margin-top: 10px; margin-bottom: 10px;">
		
		<div id="title" style="font-size: 30px; padding: 10px 5px;">
				<?php echo $post_title; ?>
		</div>
		
		<div style="margin: auto; width: 600px;">
				<img src="../images/news/<?php echo $post_image; ?>" width="600px" height="300px" style="" />
		</div>
		
		<div id="desc" style="font-size: 20px; padding: 10px 5px;">
			<?php echo $post_content; ?>
		</div>
	

		<div class='comment' style='padding: 10px; border: 1px solid Gray; position: relative; top: 10px; margin-bottom: 10px; border-radius: 10px; '>
	
		
		
			
				<div style="padding: 3px; color: blue; /*font-weight: bold;*/ text-align: center; font-size: 25px; text-shadow: 1px 1px 1px; /*font-family: 'courier new';*/ letter-spacing: 2px; /*background: lightgray;*/ border-radius: 10px; border-bottom: 1px solid gray; box-shadow: 0px 1px 1px gray;" >
				Comments 
				</div>
				<div style="overflow: auto; height: 200px;">
				<div style="padding-top: 10px; border-radius: 10px;" >
					 <a href="User.php" style="padding-top: 10px;"><img id="image_p" width="40px" style="box-shadow: 1px 1px 1px gray; border-radius: 50%; border: 1px solid gray;" height="40px" src="../images/user-icon.jpg" /></a>
					<span style="vertical-align: super; padding-left: 0px; position: relative; top:-9px;">
						<b><?php echo $usr; ?></b>
					</span>
					<form name="myform" onsubmit="return check();" action="<?php if($sign){ echo htmlspecialchars($_SERVER['PHP_SELF'])."?news=".$post_id; } ?>" style="display:initial;" method="post">
					<input name="news" hidden value="<?php echo $post_id; ?>" />
					<textarea name="comnt"  style="margin-left: 10px; border-radius: 3px; padding: 5px; height: 40px; width: 70%;" placeholder='enter your comments' ></textarea>
					<input type='submit' name="submit" style=" align-self: first baseline; vertical-align: super; width: 80px; height: 40px; position: relative; top: -8px; box-shadow: 2px 1px 2px gray;" onclick="return s();"  value='Comment' />
					</form>
				
				</div>
				<?php
						$q = "Select * from tbl_comments where comment_news_id=".$post_id." order by comment_date desc ;";
						$r1 = mysqli_query($connection,$q);
						//echo mysqli_error($connection);
						while($row1 = mysqli_fetch_array($r1)){
								$content=$row1["comment_content"];
								$usr1=$row1["comment_author"];
								$cmd = $row1["comment_date"];
								$q = "Select usr_name from tbl_user where id = ".$usr1.";";
								$r2 = mysqli_query($connection,$q);
								$row2 = mysqli_fetch_assoc($r2);
								$usr1 = $row2["usr_name"];
				?>			
						
				<div style="padding-top: 10px; clear:left; border-radius: 10px; border: 1px solid lightgray; position: relative; top:9px; bottom: 9px; padding-left: 10px;" >
					 <a href="User.php" style="padding-top: 10px;"><img id="image_p" width="40px" style="position: relative; top: -5; box-shadow: 1px 1px 1px gray; border-radius: 50%; border: 1px solid gray;" height="40px" src="../images/user-icon.jpg" /></a>
					<span style="vertical-align: super; padding-left: 0px; position: relative; top:-9px;">
						<b><?php echo $usr1; ?></b>
					</span>
					
					<div style=" align-self: first baseline; vertical-align: super;  height: 40px; float: left;"><?php echo $content; ?> |
					 on <?php echo $cmd; ?> | by &nbsp;</div>
				</div>

						
				<?php			
						}
						
	?>
	</div>
	</div>
	</div>
	<?php
		}

				?>
				
		

</section>

<?php
	
	
	
?>

<div class="add">
	<img id="add_img" src='../editor/resource/images/Business/<?php echo $addimg[$jk]; ?>' />
</div>
</div>


<?php
	include("../Pages/Footer.html");
	
?>


