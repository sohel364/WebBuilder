<?php
	if(isset($_GET['template']))
	{
		$turl ='/WebBuilder/templates/'.$_GET['template'];
		$css='../../templates/'.$_GET['template'].'/css/style.css';	
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Template</title>
    <script  src="/WebBuilder/js/tinymce/tinymce.min.js" ></script>
	<script  src="/WebBuilder/js/jquery-2.1.1.min.js" ></script>
	<link rel="stylesheet" type="text/css" href="<?php echo  $css?>"/>
</head>


<body>
<div style="border-bottom: 1px solid #9acd32; height:30px; width: 100%;">
		<div style="margin-right:118px; float: right;">
			<div style="float: left;"><a href="#">Account- </a></div>
			<div style="float: left;"><a href="#">Home-</a></div>
			<div style="float: left;"><a href="#">Site Map</a></div>
		</div>
</div>
</br>


<div style="height: 25px;">
		<form action="savePage.php" method="post" id="save">
			<input type="hidden" id="html" name="html"/>
			<input type="hidden" id="target" name="target" value="test"/>
			<input style="margin-right:118px;float: right;" type="submit" value="Save Page" />
		</form>
</div>

<div>
	<div style="font-size:16px; float: left;margin-top: 81px;text-align: right;">
		<p><a href="#">Pages</a></p>
		<p><a href="#">Web Components</a></p>
		<p><a href="#">Navigator</a></p>
		<p><a href="#">Others</a></p>
	</div>
	<div style="border-right:1px solid;height: 100% "></div>
	<div id="frame" style=" float:left; background-color: white;box-shadow: 10px 10px 5px #888888;height: 100%;width: 80%;margin-left: 20px;">
	<?php include('../../templates/'.$_GET['template'].'/index.html'); ?>
	</div>
</div>

</body>

<script type="text/javascript">
$(function(){

	$('#save').on('submit',function(e){
//			e.preventDefault();
			$('#html').val($('#frame').html());
			
			console.log( $('#html').val() );
		});

	$('.text').css('color','red');
	 
	// $("#frame").load("<?php echo $turl ?>"); 
	 


//	
//	tinymce.init({
//    selector: ".text",
//    inline: true,
//    toolbar: "undo redo",
//    menubar: false
//});


	tinymce.init({
    selector: "#frame",
    inline: true,
      plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
});

	

//    tinymce.init({
 //       selector: "h1",
//        setup: function(ed) {
//            ed.on('init', function(e) {
//                e.target.hide();
//            });
//        },


});


</script>

</html>