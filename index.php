<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div id="container">
 <div id="top_pl">
		<table style="margin-left: 64px;">
			<tr>
				<td><a href="#">Home</a></td>
				<td><a href="#">Account</a></td>
				<td><a href="#">Billing</a></td>
				<td><a href="#">Notes</a></td>
				<td><a href="#">Others</a></td>
			</tr>
		</table>
 </div>
 <div>
 	<div id="left_pl">
 		 <a href="#">asdasdas</a>
 		 <a href="#">asdasdas</a>
 		 <a href="#">asdasdas</a> 	
 	</div>	
	<div id="right_pl">
		<?php
			$dirs=scandir("./templates");
			//echo "Available Tempalates<br/>";
			//print_r($dirs);
			for($i=2;$i<sizeof($dirs);$i++)
			{		
		?>
		<div id="tp_pv">
		<?php
			echo '<a href="./manager/content_manager/content_manager.php?template='.$dirs[$i].'">'.$dirs[$i].'</a> </div>';
				
			} 
		?>
		</div>		
	</div>

  </div>
</body>