<?php
session_start ();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Web Builder</title>
</head>
<body>
	<div id="container">

		<div id="top_pl">

			<div>
				<table style="margin-left: 64px; display: inline-table">
					<tr>
						<td><a href="#">Home</a></td>
						<td><a href="#">Account</a></td>
						<td><a href="#">Billing</a></td>
						<td><a href="#">Notes</a></td>
						<td><a href="#">Others</a></td>
					</tr>
				</table>
				<div style="float: right;">
		<?php
		// echo $_SESSION['name']." ".$_SESSION['isLogged'];
		
		if (isset ( $_SESSION ['isLogged'] )) {
			?>
				<a href="./mypage.php" style="display: inline-block;">My Page</a> <span><?php echo $_SESSION['name'] ?></span> 
		<?php
		} else
			echo '<a href="./manager/user_manager/login.php" >Login</a> ';
		?>
		
		</div>
			</div>
		</div>
		<div>
			<div id="template_brief">

				<h2>Pick your template, Build your own site</h2>
				<p>Web Based Template builder with Simple steps</p>
				<p>
				
				
				<ul>Steps
				</ul>
				</p>
				<ul>
					<li>1. Register</li>
					<li>2. Choose Categorized template</li>
					<li>3. Build your home with us !</li>
				</ul>
			</div>
			<div id="template_slide_item">
				<p style="font-size: 40px; text-align: center;">Template-1</p>
			</div>

			<br /> <br />
		</div>

	</div>
	<br />
	<br />
	<div id="templat_block">
		<p>
		
		
		<ul>Uncategorized
		</ul>
		</p>
	
	<?php
	$dirs = scandir ( "./templates" );
	// echo "Available Tempalates<br/>";
	// print_r($dirs);
	for($i = 2; $i < sizeof ( $dirs ); $i ++) {
		?>
	
	<?php
		echo '<div class="tp_pv"> <a href="./manager/content_manager/template_editor.php?template=' . $dirs [$i] . '">' . $dirs [$i] . '</a> </div>';
	}
	?>
		
</div>

	<div id="templat_block">
		<p>
		
		
		<ul>Medicine
		</ul>
		</p>
	
	<?php
	$dirs = scandir ( "./templates" );
	// echo "Available Tempalates<br/>";
	// print_r($dirs);
	for($i = 2; $i < sizeof ( $dirs ); $i ++) {
		?>
	
	<?php
		echo '<div class="tp_pv"> <a href="./manager/content_manager/template_editor.php?template=' . $dirs [$i] . '">' . $dirs [$i] . '</a> </div>';
	}
	?>
		
</div>




	<div id="templat_block">
		<p>
		
		
		<ul>Use Template Viewer
		</ul>
		</p>
	
	<?php
	$dirs = scandir ( "./templates" );
	// echo "Available Tempalates<br/>";
	// print_r($dirs);
	for($i = 2; $i < sizeof ( $dirs ); $i ++) {
		?>
	
	<?php
		echo '<div class="tp_pv"> <a href="./manager/content_manager/template_editor.php?template='.$dirs[$i].'">'.$dirs[$i].'</a> </div>';
			
		} 
	?>
		
</div>

</body>