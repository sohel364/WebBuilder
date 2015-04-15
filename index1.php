<?php
session_start( );
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Web Builder</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
</head>
<body>
<div id="container">

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Web Builder</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Billing</a></li>
						<li><a href="#">Notes</a></li>
						<li><a href="#">Others</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php 
			//echo $_SESSION['name']."  ".$_SESSION['isLogged'];
		
			if(isset($_SESSION['isLogged']))
			{
				?>
				<li><a href="./mypage.php">My Page</a></li>
				<span ><?php echo $_SESSION['name'] ?></span> 
		<?php 
			}
			else  echo '<li><a href="./manager/user_manager/login.php">Login</a></li> ';
		?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
 
 <!--<div id="top_pl">

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
			//echo $_SESSION['name']."  ".$_SESSION['isLogged'];
		
			if(isset($_SESSION['isLogged']))
			{
				?>
				<li><a href="./mypage.php">My Page</a></li>
				<span ><?php echo $_SESSION['name'] ?></span> 
		<?php 
			}
			else  echo '<li><a href="./manager/user_manager/login.php">Login</a></li> ';
		?>
		
		</div>
	</div> 
 </div>-->
<div> 
	 <div id="template_brief">
			 	
			<h2>Pick your template, Build your own site</h2>
			<p>Web Based Template builder 
			with Simple steps</p>
			<p><ul>Steps</ul></p>
			<ul>
				<li>1. Register</li>
				<li>2. Choose Categorized template</li>
				<li>3. Build your home with us !</li>
			</ul>
	 </div>
	  <div id="template_slide_item">
	  	<p style=" font-size: 40px;
    	text-align: center;">Template-1</p>
      </div>
      
      <br/>
      <br/>
 </div>

</div>
<br/><br/>

	
	
<?php
	$dirs=scandir("./templates");
	//echo "Available Tempalates<br/>";
	//print_r($dirs);
	for($i=2;$i<sizeof($dirs);$i++)
	{		
?>
	<div class="templat_block">
	<p><ul><?php echo $dirs[$i] ?></ul></p>
	<?php 
		$templates=scandir("./templates/$dirs[$i]");
		for($j=2; $j<sizeof($templates);$j++)
		{
		?>
			<div class="tp_pv">
			<a href="./manager/content_manager/template_editor.php?
			category=<?php echo $dirs[$i] ?>&template=<?php echo $templates[$j] ?>" >
				<?php echo $templates	[$j] ?>
			</a> </div>
		<?php 
		}
	?>
	
	
	
	</div>
<?php	
	} 
?>
		





</body>
