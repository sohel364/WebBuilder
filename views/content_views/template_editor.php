<?php
error_reporting(E_ERROR);
	if(isset($_POST['template']) && isset($_POST['category']) )
	{
		$turl ='../../templates/'.$_POST['category'].'/'.$_POST['template'];
		$css='../../templates/'.$_POST['category'].'/'.$_POST['template'].'/css/style.css';		
		
	}else if(isset($_GET['template']) &&  isset($_GET['category']))
	{
		$turl ='../../templates/'.$_GET['category'].'/'.$_GET['template'];
		$css='../../templates/'.$_GET['category'].'/'.$_GET['template'].'/css/style.css';	
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Template</title>
    <script  src="../../js/tinymce/tinymce.min.js" ></script>
	<script  src="../../js/jquery-2.1.1.min.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script  src="../../js/bootstrap-dialog.js" ></script>
	<script  src="../../js/jquery-ui.min.js" ></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script>

	
	</script>
  	<link href="../../css/bootstrap.min.css" rel="stylesheet">
	<link href="../../css/bootstrap-dialog.css" rel="stylesheet"/>
	<link href="../../css/jquery-ui.min.css" rel="stylesheet"/>

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


#page_option
{
	position: absolute;
	top: 65px;
	left:243px;
	background: url("../../images/img-noise-361x370.png");
	border-radius: 7px;
	border: 1px solid silver;
	padding: 5px;
}
#page_option  table  tr,th,td
{
	padding: 2px;
	border: 1px solid white;
}
#page_option td:nth-child(even)
{
	float:right;
	text-align: right;
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
                    <ul id="ul_tree_menu_list" class="pages">
                       
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
	                        <a id="bg_set" href="#"><span><i class="icon-time"></i> [+]</span> &ndash; Set-1</a>                   
                        </li>
                        <li>
	                        <a id="bg_set" href="#"><span><i class="icon-time"></i> [+]</span> &ndash; Set-1</a>                   
                        </li>
                    </ul>
                </li>
                <li>
                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Color</span>
                    <ul>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; 
	                        <a id="bg_color" href="">Red</a>
                        </li>
                        <li>
	                        <span><i class="icon-time"></i> [+]</span> &ndash; 
	                        <a id="bg_color" href="">Blue</a>
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
			<!-- <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top"> -->
			<div class="container">
					<div class="navbar-header">
		                <button data-target="#mainNav" data-toggle="collapse" class="navbar-toggle" type="button">
		                    <span class="sr-only">Toggle navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <a href="#" class="navbar-brand">
		                    <?php echo $_GET['template']; ?>
		                </a>
		            </div>
	            
	            <!--</nav>-->
				<div id="mainNav" class="collapse navbar-collapse">
					<ul id="menu" class="nav navbar-nav navbar">
						<?php include ($turl.'/menu.html');?>
						<li class="add-menu"><a >+</a></li>
					</ul>
				</div>
			</div>
			<div id="body"><?php include ($turl.'/body.html');?></div>
			<div id="footer">
				<?php include ($turl.'/footer.html');?>
			</div>
			
		</div>
		
		
	</div>


<!--<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>
-->



<!-- The option Menu -->

<div id="page_option" style="display: none;">
<table style="">
<caption style="font-weight: bold; text-align: center;">Page Controll Options</caption>
<tr>
	<td style=""></td><td><button class="btn btn-xs btn-danger"  id="page_delete_btn" >
	<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete </button></td>
</tr>

<tr>
	<td>Page Name</td><td><input type="text"></td>
</tr>


<tr>
	<td>other Options</td><td>.........</td>
</tr>
<tr>
	<td>other Options</td><td>.........</td>
</tr>

<tr>
	<td><button class="btn btn-sm btn-success" id="page_save_btn">
	<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Save</button>
	</td><td><button class="btn btn-xs btn-warning" id="page_close_btn">Close</button></td>
</tr>

</table>
</div>


<!-- Option Menu End -->

</body>

<script type="text/javascript">

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


$(function(){
	/**
	 *
	 *Load menu item in tree view. By saif , Date  08-04-2015
	 */
		var treeMenu=$('#ul_tree_menu_list');

		var tempLi;
		$('#menu li').each(function(i, obj) {
			console.log(this);
			tempLi=$('<li></li>');
			tempLi.append('<span><i class="icon-time"></i> [+]</span>');
			tempLi.append(' &ndash; ');
			tempLi.append($(obj).html());
			treeMenu.append(tempLi);

		});
			
		treeMenu.find('li').last().addClass('add-menu');
		
		/**Making it Sortable using jquery UI*/
		 
	 	$( "#ul_tree_menu_list" ).sortable({
		
	 		start: function(event, ui){
            iBefore = ui.item.index();
		    },
		    update: function(event, ui) {
		            iAfter = ui.item.index();
		            evictee = $('#menu li:eq('+iAfter+')');
		            evictor = $('#menu li:eq('+iBefore+')');
		
		            evictee.replaceWith(evictor);
		            if(iBefore > iAfter)
		                evictor.after(evictee);
		            else
		                evictor.before(evictee);
		    }
			
		 });
			
		$(".add-menu").on('click',function(){
	        BootstrapDialog.show({
	            message: 'Give Menu Name: <input type="text" class="form-control">',
	            buttons: [{
	                label: 'Ok',
	                cssClass: 'btn-success',
	                action: function(dialogRef) {
			            	var newMenu = dialogRef.getModalBody().find('input').val();
			            	addNewMenu(newMenu);
			                dialogRef.close();
		                }
		            } ,
		            {
		                label: 'Cancel',
		                action: function(dialogRef) {
		                    dialogRef.close();
			            }
		            }
	            ]
	        });
	        
		});



		
		$("div").on('click',function (e){

			 //alert(e.target.id);
			if(e.target.id=="container_header")
				 {
					 BootstrapDialog.alert("Clicked on "+e.target.id);
					 console.log(e.target.id);
					 console.log(e.target);
					 e.stopPropagation();
			 	 }
			});
		

		var selectedPageIndex;
		$("#ul_tree_menu_list").on('dblclick','li',function(e){
	
				console.log($("#ul_tree_menu_list li:last-child"));
				selectedPageIndex=$(this).index();
				
				if(selectedPageIndex == $("#ul_tree_menu_list li").size()-1)
				{
					return;
				}
				$("#page_option").toggle();
				
		});

		$("#page_delete_btn").on('click',function(){
				$("#ul_tree_menu_list li:eq("+selectedPageIndex+")").remove();
				$("#menu li:eq("+selectedPageIndex+")").remove();
				$("#page_option").hide();
				
			});
		$("#page_close_btn").on('click',function(){
			$("#page_option").hide();
			});

		
		
		$('#save').on('submit',function(e){
				//e.preventDefault();
				$('#f_title').val($('#title').html());
				$('#f_header').val($('#header').html());
				$('#f_menu').val($('#menu').html());
				$('#f_body').val($('#body').html());
				$('#f_footer').val($('#footer').html());
				
				console.log( $('#html').val() );
			});
		 
			// $("#frame").load("<?php echo $turl ?>"); 
		 

	});



	function addNewMenu(menuName)
	{
		tempLi=$('<li></li>');
		tempLi.append('<span><i class="icon-time"></i> [+]</span>');
		tempLi.append(' &ndash; ');
		tempLi.append('<a>'+menuName+'</a>');
		
		$("#ul_tree_menu_list").find('li').last().before(tempLi);

		tempLi=$('<li></li>');
		tempLi.append('<a>'+menuName+'</a>');
		
		$("#menu").find('li').last().before(tempLi);
		
		   console.log(menuName);	
	}

		

</script>

</html>