<?php
	if(isset($_GET['template']))
	{
		//$turl ='/WebBuilder/templates/'.$_GET['template'];
		$turl =$_SERVER['DOCUMENT_ROOT'].'/WebBuilder/templates/'.$_GET['template'];
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
	   <script src="../../js/bootstrap.min.js"></script>
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

<div style="border-right:1px solid;height: 100% "></div>

<div>
<div>
   	<div style="float: left;" class="tree">
    <ul>
        <li>
            <span><i class="icon-calendar"></i> Web Components</span>
            <ul>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Panel</span>
                    <ul>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Panel-Control1</a>
                        </li>
                    </ul>
                </li>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Containers</span>
                    <ul>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Panel-Control1</a>
                        </li>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Panel-Control1</a>
                        </li>
                    </ul>
                </li>
                <li>
                	<span class="badge badge-warning"><i class="icon-minus-sign"></i> Media Contents</span>
                    <ul>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Image</a>
                        </li>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Flash</a>
                        </li>
                    </ul>
                </li>
                <li>
                	<span class="badge badge-important"><i class="icon-minus-sign"></i> Slider</span>
                    <ul>
                        <li>
	                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Style-1</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>
            <span><i class="icon-calendar"></i> Settings</span>
            <ul>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Site Content Status</span>
                    <ul>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Menu Settings</a>
                        </li>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Content Settings</a>
                        </li>
                        <li>
                        	<span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Footer Settings</a>
                        </li>
                    </ul>
                </li>
		    </ul>
        </li>
        
        <li>
            <span><i class="icon-calendar"></i> Pages</span>
            <ul>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Already Added</span>
                    <ul>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Menu Item-1</a>
                        </li>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Menu Item-2</a>
                        </li>
                        <li>
                        	<span><i class="icon-time"></i> [+]</span> &ndash; <a href="">Menu Item-3</a>
                        </li>
                    </ul>
                </li>
		    </ul>
        </li>
        
    </ul>
</div>

 <div style="float: left; width: 70%;">
	<div id="frame" style=" float:left; background-color: white;box-shadow: 10px 10px 5px #888888;height: 100%;width: 100%;margin-left: 10px;">
	<?php include('../../templates/'.$_GET['template'].'/index.html'); ?>
	</div>
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
	 

});


</script>

</html>