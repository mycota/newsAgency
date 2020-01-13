<?php

if(isset($_SESSION["add"])){ 
				$var1 = (int) $_SESSION["add"];
				if($var1<$_SESSION["timgs"])
					$var1 = $var1 + 1;
				else
					$var1 = 0;
				$_SESSION["add"] = $var1;
				$jk = (int) $_SESSION["add"];
				
		} else{ 	$jk = 0;
		}
		
		if(isset($_COOKIE["User"])){
			$sign=1;
			
		}
		
		?>