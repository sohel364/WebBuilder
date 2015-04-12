<?php
error_reporting(E_ERROR);
	if(isset($_POST['template']) && isset($_POST['category']) )
	{
		$turl =$_SERVER['DOCUMENT_ROOT'].'WebBuilder/templates/'.$_POST['category'].'/'.$_POST['template'];
		$css='../../templates/'.$_POST['category'].'/'.$_POST['template'].'/css/style.css';	
		
	}else if(isset($_GET['template']) &&  isset($_GET['category']))
	{
		$turl =$_SERVER['DOCUMENT_ROOT'].'WebBuilder/templates/'.$_GET['category'].'/'.$_GET['template'];
		$css='../../templates/'.$_GET['category'].'/'.$_GET['template'].'/css/style.css';	
		
	}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Template</title>
    <script  src="/WebBuilder/js/tinymce/tinymce.min.js" ></script>
	<script  src="/WebBuilder/js/jquery-2.1.1.min.js" ></script>
	<script src="/WebBuilder/js/bootstrap.min.js"></script>
	<script  src="/WebBuilder/js/bootstrap-dialog.js" ></script>
	
	
	<script>

	$(function () {
	    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
	    $('.tree li.parent_li > span').on('click', function (e) {
	        var children = $(this).parent('li.parent_li').find(' > ul > li');
	        if (children.is(":visible")) {
	            children.hide('fast');
	            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
	        } else {
	            children.show('fast');
	            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
	        }
	        e.stopPropagation();
	    });
	});
	
	$(function(){

	    // Enabling Popover Example 1 - HTML (content and title from html tags of element)
	    $("[data-toggle=popover]").popover();

	    // Enabling Popover Example 2 - JS (hidden content and title capturing)
	    $("#popoverExampleTwo").popover({
	        html : true, 
	        content: function() {
	          return $('#popoverExampleTwoHiddenContent').html();
	        },
	        title: function() {
	          return $('#popoverExampleTwoHiddenTitle').html();
	        }
	    });

	});
	</script>
  	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-dialog.css" rel="stylesheet"/>
	
	
	
	
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo  $css?>"/>
	
<style>

#frame
{
	background:rgba(0,0,0,.1);
	float:left; 
	height: 100%;
	width: 72%;
	margin-left: 5px;
	padding: 5px;
}


</style>

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
			<input type="hidden" id="f_title" name="title"/>
			<input type="hidden" id="f_header" name="header"/>
			<input type="hidden" id="f_menu" name="menu" />	
			<input type="hidden" id="f_body" name="body"/>
			<input type="hidden" id="f_footer" name="footer"/>
			<input type="hidden" id="target" name="target" value="test"/>		
			<input style="margin-right:118px;float: right;" type="submit" value="Save Page" />
		</form>
</div>

<div>

   	<div style="float: left;" class="tree">
    <ul>
    	        
        <li>
            <span><i class="icon-calendar"></i> Pages</span>
            <ul>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Already Added</span>
                    <ul id="ul_tree_menu_list">
                       
                    </ul>
                </li>
		    </ul>
        </li>
        
        <li>
            <span><i class="icon-calendar"></i>Design Components</span>
            <ul>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Background</span>
                    <ul>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Set-1</a>                   
                        </li>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Set-1</a>                   
                        </li>
                    </ul>
                </li>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Color</span>
                    <ul>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Red</a>
                        </li>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Blue</a>
                        </li>
                    </ul>
                </li>
                <li>
                	<span class="badge badge-warning"><i class="icon-minus-sign"></i> Font</span>
                    <ul>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Arial</a>
                        </li>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Tahoma</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <span><i class="icon-calendar"></i> Add Tools</span>
                    <ul>
		                <li>
		                	<span class="badge badge-important"><i class="icon-minus-sign"></i> Media</span>
		                    <ul>
		                        <li>
			                        <a href=""><span><i class="icon-time"></i> [+]</span> Flash</a>
		                        </li>
		                        <li>
			                        <a href=""><span><i class="icon-time"></i> [+]</span> MP3</a>
		                        </li>
		                        <li>
			                        <a href=""><span><i class="icon-time"></i> [+]</span> Video</a>
		                        </li>
		                    </ul>
		                </li>
		                <li>
		                	<span class="badge badge-important"><i class="icon-minus-sign"></i> Controls</span>
		                    <ul>
		                        <li>
			                        <a href=""><span><i class="icon-time"></i> [+]</span> Text</a>
		                        </li>
		                        <li>
			                        <a href=""><span><i class="icon-time"></i> [+]</span> Shapes</a>
		                        </li>
		                        <li>
			                        <a href=""><span><i class="icon-time"></i> [+]</span> Buttons</a>
		                        </li>
		                    </ul>
		                </li>
		    	</ul>
        </li>
        
    </ul>
</div>











	
		<!-- Template Elements  Here -->
	<div id="frame" >
		<div style="background: gray; margin-bottom: 10px;text-align: center; " > <?php include ($turl.'/title.html');?>	</div>
		<div style="background-color: white;box-shadow: 10px 10px 5px #888888;">
			<ul id="menu">
				<?php include ($turl.'/menu.html');?>
			</ul>
			<div id="body"><?php include ($turl.'/body.html');?></div>
			<div id="footer">
				<?php include ($turl.'/footer.html');?>
			</div>
		</div>
		
		
	</div>





</div>

<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

</body>

<script type="text/javascript">
$(function(){

/**
	 *
	 *Load menu item in tree view. By saif , Date  08-04-2015
 */
	var treeMenu=$('#ul_tree_menu_list');

	var tempLi;
	$('#menu li').each(function(i, obj) {
//		treeMenu.append(obj);
//		console.log(obj);
		tempLi=$('<li></li>');
		tempLi.append('<span><i class="icon-time"></i> [+]</span>');
		tempLi.append(' &ndash; ');
		tempLi.append($(obj).html());
		treeMenu.append(tempLi);
		
		console.log(tempLi);
	});
		





	$("div").on('click',function (e){
		
		 BootstrapDialog.alert("Clicked on "+e.target.id);
		 console.log(e.target.id);
		 console.log(e.target);
		 e.stopPropagation();
		});




	








	
	$('#save').on('submit',function(e){
//			e.preventDefault();
			$('#f_title').val($('#title').html());
			$('#f_header').val($('#header').html());
			$('#f_menu').val($('#menu').html());
			$('#f_body').val($('#body').html());
			$('#f_footer').val($('#footer').html());
			
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


//	tinymce.init({
//    selector: "#frame",
//    inline: true,
//      plugins: [
//            "advlist autolink lists link image charmap print preview anchor",
//            "searchreplace visualblocks code fullscreen",
//            "insertdatetime media table contextmenu paste"
//        ],
//});

	

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