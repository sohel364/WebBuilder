<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Template</title>
    <script  src="/WebBuilder/js/tinymce/tinymce.min.js" ></script>
	<script  src="/WebBuilder/js/jquery-2.1.1.min.js" ></script>
	
</head>

<?php
	if(isset($_GET['template']))
	{
		$turl ='/WebBuilder/templates/'.$_GET['template'];
		
	}
?>


<div id="frame">
<?php include('../../templates/'.$_GET['template'].'/index.html'); ?>
</div>


</body>

<script type="text/javascript">
$(function(){

	$('.text').css('color','red');
	
	// $("#frame").load("<?php echo $turl ?>"); 
	 


	
	tinymce.init({
    selector: ".text",
    inline: true,
    toolbar: "undo redo",
    menubar: false
});


	tinymce.init({
    selector: "h1",
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

/*        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
    });
*/
});


</script>

</html>