<?php 

/* $db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms"; */

//foreach ($db as $key => $value) {
	//define(strtoupper($key), $value);
//}
$sign=0;
$post_id='';
$post_title='';
$post_author='';
$post_date='';
$img[0]='';
$like="Like";



$s='';
$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if(isset($_COOKIE["User"])){
			
		$q1 = "Select count(*) from tbl_Liked_news where userid=".$_COOKIE["User"].";";
			//echo $q1;
		$r1 = mysqli_query($connection,$q1);
			//echo mysqli_error($connection);
		$row1 = mysqli_fetch_array($r1);
		$total = $row1[0];
			//echo $total;
			
		
		}
		
		include('advert.php');
		
		
				
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
<?php
	 $page="";
  if(isset($_GET['page'])){ 

  $page = $_GET['page'];
    }
    else{
      $page = "";
    }

    if ($page == "" || $page == 1) {
      $page1 = 0;
    }
    else{
      //global $page1;
      $page1 = ($page * 3) - 3; 
    }

	$query = "select * from tbl_news where curdate()<=end_date and newss_id in (SELECT newid FROM `tbl_liked_news` where userid=".$_COOKIE["User"].");";
	//echo $query;
	
	//echo $query;
	$rows = 0;
    $select_post = mysqli_query($connection, $query);
	
	//echo mysqli_error($connection);
    $count = mysqli_num_rows($select_post);

    $count = ceil($count /3);	
?>
<div id="all" style="float: left; display:table; width: 60%; position: relative; top: 100px;">
	<div align="center" style="box-shadow: 3px 3px 3px gray; border-radius: 20px; border: 1px solid black; /*border-bottom: 3px solid pink;*/ margin-bottom: 30px; width: 300px; margin:auto;"> <h1 style="color:red; text-shadow: 1px 1px 1px gray;"> Liked News </h1> </div>
	<div align="center" style="margin-top: 10px;font-size: 20px;">Total Liked News's :	<?php echo $total; ?></div>
	<br>
<?php		
		
	$query = "select * from tbl_news where newss_id in (SELECT newid FROM `tbl_liked_news` where userid=".$_COOKIE["User"].") order by date_published desc Limit ".$page1.",3;";
	 
	$select_post = mysqli_query($connection, $query);
	
	$query1 = "Select name from tbl_tag	where id in (Select tagID from tbl_news_tag where newsID=".$post_id.") group by name;";
               
			      
			
		
				
	
			   
			   
                while ($row = mysqli_fetch_assoc($select_post)) {
					
					
                    $post_id = $row['newss_id'];
                    $post_title = $row['tittle'];
                    $post_author = $row['authorid'];
                    $post_date = $row['systdate'];
					$q = "Select newscat_name from tbl_news_category where newscat_id in (select categoryid from tbl_news where newss_id=".$post_id.");";
					//echo $q;
					$r = mysqli_query($connection,$q);
					//echo mysqli_error($connection);
					if(mysqli_num_rows($r)>0){
							$row1=mysqli_fetch_assoc($r);
							$category = $row1["newscat_name"];
					}
					else{
						$category = "...";
					}
					
                    $post_image = $row['img_id'];
					$query3 = "Select name from tbl_image where image_id=".$post_image."  group by name;";
					$res = mysqli_query($connection,$query3);
					$post_image = mysqli_fetch_assoc($res);
					$post_image= $post_image["name"];
					
					
                    $post_content = substr($row['description'], 0,100);
                    $post_status = $row['news_status'];
					$query1 = "Select name from tbl_tag	where id in (Select tagID from tbl_news_tag where newsID=".$post_id.") group by name;";
					//echo $query1;
					$res = mysqli_query($connection,$query1);
				
						$str1=' ';
						if(mysqli_num_rows($res)>0){
					while($row1 = mysqli_fetch_assoc($res)){
							$str1=$str1.$row1["name"].	" ";
					}
						}
						else{
							$str1="...";
						}
					
					$_SESSION['txt'.$rows]=$post_title;
					//echo $img[$rows];
					//echo '<br />'.'img'.$rows;
					$rows+=1;
					
					if($sign){
						$q = "Select * from tbl_Liked_news where userid=".$_COOKIE["User"]. " and newid=".$post_id.";";
				//echo $q;
			$r = mysqli_query($connection,$q);
			//echo mysqli_error($connection);
			$number = mysqli_num_rows($r);
			if($number){
				$like="Unlike";
			}else{
				
				$like="Like";
			}
						
					}
					
			$q1 = "Select count(*) from tbl_Liked_news where newid=".$post_id.";";
			//echo $q1;
			$r1 = mysqli_query($connection,$q1);
			//echo mysqli_error($connection);
			$row1 = mysqli_fetch_array($r1);
			$total = $row1[0];
			//echo $total;
			
			$q1 = "Select count(*) from tbl_comments where comment_news_id=".$post_id.";";
			//echo $q1;
			$r1 = mysqli_query($connection,$q1);
			//echo mysqli_error($connection);
			$row1 = mysqli_fetch_array($r1);
			$t_cmnt = $row1[0];
			//echo $total;
 ?>
				
<div class="news_con" id='db<?php echo $post_id; ?>' >
	<div class="from" style='float:left;'> <b style="color:red;"><?php echo $category; ?></b> | Tags: <?php echo $str1; ?> </div>
	<div class="from" style='float:right;'><i> Rajkot, Gujarat </i></div>
<div class="news" id='cb<?php echo $post_id; ?>'>
	<div class="container">
	
		<a href="Comment.php?news=<?php echo $post_id; ?>"><img name="image" id="image" style="box-shadow: 3px 3px 3px gray;" src="../images/news/<?php echo $post_image; ?>" alt=""></a>

		<div class='title'> <a href="Comment.php?news=<?php echo $post_id; ?>"><?php echo $post_title; ?></a> </div>
		<div class='desc' id='ab<?php echo $post_id; ?>'><?php echo $post_content; ?></div>
		<div class='fulldesc' id='eb<?php echo $post_id; ?>' style='clear: left; display:none;'>
		<?php echo $post_content; ?></div>
		
	</div>
		
	<div class="buttons" style='clear: left; width: 95%;'>
		
		<div style="float:left; "><span class="viewmore" id='b<?php echo $post_id; ?>'  style='' onclick="description(this.id); "> &#8659;  Read more </span></div>
		<a style="text-decoration: none; color: black;" href="./Comment.php?news=<?php echo $post_id; ?>" > <div style="float:right;  "><span id="cmnd<?php echo $post_id; ?>" style='clear:left; float: right;'> <?php if($t_cmnt>0) echo $t_cmnt; ?>	Comments</span> </div> </a>
		<div style="float:right;  ">
			<form style="display:initial;" name="myform" onsubmit="return check();" action="<?php if($sign){ echo htmlspecialchars($_SERVER['PHP_SELF']); }?> " >
			<input type="text" name='n' value="<?php echo $post_id; ?>" hidden />
			<span id="lk<?php echo $post_id; ?>"  style=' clear:left; float: right; padding-right: 30px;'> <input type="submit" name="like" value="&hearts; <?php echo $like; ?>" > <span><?php echo $total." Liked"; ?>  </span>  </input></span>
				</form>
		</div>
	</div>

</div>
</div>
<?php 

} //while loop gets over here

if($rows!=0){
?>
<div class="news_con1">
<div class="pager" style="text-align:center; align: center; padding: 10px; heigh: 100px;"> 
					<?php
					
                  for ($i=1; $i <= $count; $i++) {
                    $self1="";
					
						$self1=$_SERVER["PHP_SELF"]."?";
					
					
					if($i==$page){
						//echo $self1;
                    echo "<a href={$self1}page={$i}> <div class=\"actpages\" style=\"border-radius: 10px; float: left; margin-left: 5px; margin-bottom: 10px; width: 30px; margin-right: 5px; paddin: 3px; border: 1px solid black;"."\" > {$i}</div></a>";
					} else{
						//echo $self1;
						echo "<a href=".$self1."page={$i}><div class=\"norpages\" style=\"border-radius: 10px; float: left; margin-left: 5px; width: 30px; margin-right: 5px; paddin: 3px; border: 1px solid black;"."\" >  {$i} </div> </a>";
					}

                  }
					
                  
?>

</div>	
</div>	  

<?php

}

if($rows==0){
	
	echo "<div style='height: 300px width: 90%;'> </div>";
	echo "<div style='position: relative; left: 30px; width: 60%; font-size: 30px; font-family: \"Courier New\";'> Liked News for <i>\"{$user}\"</i> Not found...</div>";
}


?>
</div>


<!---  --->



<div class="add">
	<img id="add_img" src='<?php echo "../editor/resource/images/Business/".$addimg[$jk]; ?>' />
</div>

