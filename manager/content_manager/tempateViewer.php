<?php
	if(isset($_GET['template']))
	{
		$turl =$_SERVER['DOCUMENT_ROOT'].'/WebBuilder/templates/'.$_GET['template'];
		$css='/WebBuilder/templates/'.$_GET['template'].'/css/style.css';	
//		echo $css;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Template Viewer </title>
    <script  src="/WebBuilder/js/tinymce/tinymce.min.js" ></script>
	<script  src="/WebBuilder/js/jquery-2.1.1.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo  $css?>"/>
	
<style>

#frame
{
	background:rgba(0,0,0,.1);
	float:left; 
	height: 100%;
	width: 80%;
	margin-left: 20px;
	padding: 5px;
}


</style>

	
</head>


<body style="background:  rgba(221, 220, 157, 0.20)">
<div style="border-bottom: 1px solid #9acd32; height:30px; width: 100%;">
		<div style="margin-right:118px; float: right;">
			<div style="float: left;"><a href="#">Account- </a></div>
			<div style="float: left;"><a href="#">Home-</a></div>
			<div style="float: left;"><a href="#">Site Map</a></div>
		</div>
</div>
</br>


<div style="height: 25px;">
		<form action="template_editor.php" method="post" id="save">
			<input type="hidden"  name="template"  value="<?php echo  $_GET['template'] ;?>"/>
			<input style="margin-right:118px;float: right;" type="submit" value="Edit" />
		</form>
</div>

<div>
	<div style="font-size:16px; float: left;margin-top: 81px;text-align: right;">
		<p><a href="#">Pages</a></p>
		<p><a href="#">Web Components</a></p>
		<p><a href="#">Navigator</a></p>
		<p><a href="#">Others</a></p>
	</div>
	
	
	
	<!-- Template Elements  Here -->
	<div id="frame" >
		<div style="background: gray; margin-bottom: 10px;text-align: center; " > <?php include ($turl.'/title.html');?>	</div>
		<div style="background-color: white;box-shadow: 10px 10px 5px #888888;">
			<ul id="menu">
				<?php include ($turl.'/menu.html');?>
			</ul>
			<div id="content"><?php include ($turl.'/body.html');?></div>
			<div id="footer">
				<?php include ($turl.'/footer.html');?>
			</div>
		</div>
		
		
	</div>
	
	
	
</div>

</body>




<script type="text/javascript">
$(function(){

//	$('#save').on('submit',function(e){
////			e.preventDefault();
//			$('#html').val($('#frame').html());
//			
//			console.log( $('#html').val() );
//		});

	 

});


</script>

</html>