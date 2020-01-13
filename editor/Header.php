<html>
	<head>
		<title>Natinal News Agency</title>
		<link rel="shortcut icon" href='../images/Logo.png' />
		<script>

			var isHidden=true;
			var isBoxVisible=true;
			function show(){
				var a = document.getElementById("MenuList").style;
				addimage = document.querySelector("div.add");
				if(isHidden){
					isHidden=false;
					a.display="block";
					a.height="100%";
					//a.opacity="1";
					a.left="10px";
					
					a.width="200px";
					addimage.style.left="90px";
					document.getElementById("all").style.marginLeft="300px";			
				} else {
					isHidden=true;
					//a.display="none";
					a.width="0";
					a.left="-210px";
					a.height="100%";
					//a.opacity="0";
					//a.background="white";
					
					//a.overflow = "hidden";
					addimage.style.left="110px";
					document.getElementById("all").style.marginLeft="0px";
				}

				return 0;
			}

			function mobile(){
				var s = document.getElementById("srchbox").style;
				var s1 = document.querySelector('#srchbox');
				var width = window.getComputedStyle(s1).width;
				if (width < "669.2px"){
					s.display='none';
					isBoxVisible=False;
				} else {
					s.display='block';
					isBoxVisible=True;
					//alert(width);
				}
			}

			function show_box(){
				var s = document.getElementById("srchbox").style;
				if (isBoxVisible){
					s.display='none';
					s.width='80%';
					isBoxVisible=False;
				} else {
					s.display='block';
					s.margin.top='500px';
					s.width='30%';
					isBosVisible=True;
				}
			}
	
	
	
		</script>

		<link rel="stylesheet" id="linkh" href="./Stylesheets/header.css" />
		<link rel="stylesheet" id="linkn" href="./Stylesheets/navigation.css" />
		<script src="../editor/resource/css/js/jquery.js"> </script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



	</head>

	<body bgcolor="" onload="show();" onpageshow="" id="#top">

		<span id="Current_Page" hidden>Home</span>	
		<section class="main_Content" style=" margin: auto;">
	
	<header >

		<div class="menu"  onClick="show();">
			&#9776;
		</div>

		<div class="txt">
				<a href="../php/HomePage.php" style="text-decoration: none; font-weight: bold; font-family: 'Footlight MT';">	
					<span id="red">
						National
					</span>
					<span  id="blue"> 
						News
					</span>	
					<span id="purple"> 
						Agency
					</span>
				</a>
			
		</div>
		<table class="src">
			<tr>
				<td style="width: 700px;">		
					<input id="srchbox" name="srchbox" type="search">
					<div id="here">
					
				</div>
				</td>
				
				<td>
					<Button id="srchbtn" type="submit" onlick="show_box();"> Search </button>
				</td>
			
			</tr>
		</table>
		<div class="profile">
	
			<div id="profile_a" >
			<a>
				<img id="pro_img" src="../images/user-icon.jpg"> 
			</a>
			<div class="pmenu" style='height:100px;'>
					<div id='abc'>
					<a href="./User_Sign.php"> Log In </a> &nbsp; | &nbsp;
					<a href="./User_Registration.php"> Register </a>	
					</div>
			</div>

			</div>
			
			
		</div>

		

	</header>

			
	<div class="MenuList" id="MenuList">
		<div id="txt_menu"> Menu </div>
		
		<a href="../php/HomePage.php" style="margin-top: 20px;">		
			<div class="pages" id="home" style="margin-top: 20px;" >
				
				<table> <tr> <td>
				<img src='../images/hom.png' width='30px' height='30px'/> </td> <td class="pages">
				 Home </td> </tr></table>
			 	
	 		</div>
		</a> 

		<a href="../php/Entertainment.php?s='entertainment'">
			<div class="pages" id="enter">
				<table> <tr> <td>
				<img src='../images/ent.png' width='30px' height='30px'/> </td> <td class="pages">
				 Entertainment </td> </tr></table>
				  
			</div>
		</a>

		<a href="../php/Science.php?s='science'">
			<div class="pages" id="sci">
				<table> <tr> <td>
				<img src='../images/sci.png' width='30px' height='30px'/> </td> <td class="pages">
				 Science </td> </tr></table>
			</div>
		</a>

		<a href="../php/World.php?s='world'">
			<div class="pages" id="world">
				 <table> <tr> <td>
				<img src='../images/wor.png' width='30px' height='30px'/> </td> <td class="pages">
				  World
			</td> </tr></table>
			</div>
		</a>

		<a href="../php/Religious.php?s='religius'">
			<div class="pages" id="relig">
				<table> <tr> <td>
				<img src='../images/Reli.png' width='30px' height='30px'/> </td> <td class="pages">
				  Religious 
			</td> </tr></table>
			</div>
		</a>

		<a href="../php/Business.php?s='business'">
			
				<div class="pages" id="busi">
				<table> <tr> <td>
				<img src='../images/busi.png' width='30px' height='30px'/> </td> <td class="pages">
				  Business 
			</td> </tr></table>
			</div>
		</a>

		<a href="../php/Travel.php?s='travel'">
			<div class="pages" id="trav">
				<table> <tr> <td>
				<img src='../images/tra.png' width='30px' height='30px'/> </td> <td class="pages">
				   Travel

				 </td> </tr></table>
			</div>
		</a>

		<a href="../php/Local.php?s='local'">
			<div class="pages" id="loc">
				<table> <tr> <td>
				<img src='../images/loc.png' width='30px' height='30px'/> </td> <td class="pages">
				 Local </td> </tr></table> 
			</div>
		</a>

		<a href="../php/Sport.php?s='sport'">
			<div class="pages" id="spo">
				<table> <tr> <td>
				&#9917; </td><td>
				 Sports 
			</td> </tr></table>
			   
			</div>
		</a>

		<a href="../php/Politics.php?s='politics'">
			<div class="pages" id="pol">
			 	<table> <tr> <td>
				<img src='../images/pol.jpg' width='30px' height='30px'/> </td> <td class="pages">
				  Politics 
			</td> </tr></table>
			</div>
		</a>

		<hr color="lightgray"/>

		<a href="../php/HomePage.php?lang='hin'">
		<div class="links">
			हिंदी
		</div>
		</a>

		<a href="About.php"> 
			<div class="links" id="abUs">
				About Us
			</div>
		</a>

		<a href="Contact.php">
			<div class="links" id="ctUs">
				Contact Us 
			</div>
		</a>
						
		<a href="../php/User_Sign.php">
			<div class="links" id="usr">
			 User Login
			</div>
		</a>
	</div>


			
</section>

		
	</body>
</html>

<script>
	$(document).ready(function(e) {
		$("#srchbox").keyup(function(){
			$("#here").show();
			var x = $(this).val();
			$.ajax(
			{
				type:'GET',
				url:'search.php',
				data:'scrh='+x,
				success:function(data)
				{
					$("#here").php(data);
				}
				,
			});
		});
	});
</script>
		