<?php
error_reporting ( E_ERROR );
$category;
$template;
if (isset ( $_POST ['template'] ) && isset ( $_POST ['category'] )) {
	$turl = '../../templates/' . $_POST ['category'] . '/' . $_POST ['template'];
	$css = '../../templates/' . $_POST ['category'] . '/' . $_POST ['template'] . '/css/style.css';
	$category = $_POST ['category'];
	$template = $_POST ['template'];
} else if (isset ( $_GET ['template'] ) && isset ( $_GET ['category'] )) {
	$turl = '../../templates/' . $_GET ['category'] . '/' . $_GET ['template'];
	$css = '../../templates/' . $_GET ['category'] . '/' . $_GET ['template'] . '/css/style.css';
	$category = $_GET ['category'];
	$template = $_GET ['template'];
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Template</title>
<script src="../../js/tinymce/tinymce.min.js"></script>
<script src="../../js/jquery-2.1.1.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/bootstrap-dialog.js"></script>
<script src="../../js/jquery-ui.min.js"></script>

<script type="text/javascript">
            var template_id = '<?php echo $category.'_'.$template;?>';
	</script>
<script src="../../js/savePage.js"></script>
<script src="../../js/menu.js"></script>
<script type="text/javascript" src="../../js/template_editor.js"></script>

<link href="../../css/bootstrap.min.css" rel="stylesheet" />
<link href="../../css/bootstrap-dialog.css" rel="stylesheet" />
<link href="../../css/jquery-ui.min.css" rel="stylesheet" />
<link href="../../css/drag_drop_style.css" rel="stylesheet" />

<link rel="stylesheet" type="text/css" href="<?php echo  $css?>" />
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="http://code.jquery.com/jquery-1.10.2.js"></script>
	<script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css"> -->

<style>
#frame {
	background: rgba(0, 0, 0, .1);
	float: left;
	height: 100%;
	width: 72%;
	margin-left: 5px;
	padding: 5px;
	z-index: 1000000 !important;
}

.edit_option {
	position: absolute;
	top: 65px;
	left: 243px;
	background: url("../../images/img-noise-361x370.png");
	border-radius: 7px;
	border: 1px solid silver;
	padding: 5px;
	display: none;
}

.edit_option  table  tr, th, td {
	padding: 2px;
	border: 1px solid white;
}

.edit_option td:nth-child(even) {
	float: right;
	text-align: right;
}

.color {
	height: 30px;
	width: 30px;
}
</style>


<script>
	$(function() {

		counter = 0;
		var pos;
		function makeDraggable() {
			$(".selectorField").draggable({
				cancel : null,
				helper : "clone",
				cursor : "move",
				stack : "div",
				stop : function(event, ui) {
					pos = $(ui.helper).offset();

				}
			});
		}

		makeDraggable();

		var _ctrl_index = 1001;

		var currentMousePos = { x: -1, y: -1 };
		$(".droppedFields").mousemove(function(event) {
	        currentMousePos.x = event.pageX;
	        currentMousePos.y = event.pageY;
	    });

		$(".droppedFields").droppable(
				{
					activeClass : "activeDroppable",
					hoverClass : "hoverDroppable",
					accept : ":not(.ui-sortable-helper)",
					drop : function(event, ui) {
						var droppable_id = ui.helper.attr('id');
						if (droppable_id == null
								|| droppable_id.search('dropped_') < 0) {
							counter++;
							var draggable = ui.helper;
							draggable = draggable.clone();

														
							draggable.css('left',currentMousePos.x + 'px' );
							draggable.css('top',currentMousePos.y + 'px' );

							draggable.show(500);


							
							draggable.removeClass("selectorField");
							draggable.addClass("droppedFields");
							draggable.addClass("editable");

							draggable[0].id = "dropped_" + (_ctrl_index++);
							draggable.appendTo(this);

							draggable.draggable({
								containment : "parent",
								cancel : null
							});

							/* draggable.resizable(); */
							makeDraggable();
							draggable.click(droppedItemClickAction);
							
							/* var pos = draggable.position();
							alert("position : " + pos.left + " : " + pos.top);
							draggable.click(function(){
								var pos = draggable.position();
								alert("position : " + pos.left + " : " + pos.top);
								
								}); */
						}

					}
				});

		var clicked_item = null;
		var child_item = null;

		$("#dialog_btn_delete").click(function() {
			$("#control_edit_dialog").dialog("close");
			$("#" + clicked_item).remove();

		});

		$("#dialog_btn_edit").click(function() {
			var text = $("#dialog_input").val();
			child_item.html(text);
			$("#control_edit_dialog").dialog("close");

		});

		function droppedItemClickAction() {
			clicked_item = $(this).attr("id");
			child_item = $("#" + clicked_item + " :first");
			child_item.resizable({
				ghost : false,
				animate : false,
				autoHide : true,
				distance : 0,
				/* handles : "n, e, s, w, ne, se, sw, nw", */
				alsoResize : "#" + clicked_item
				/* resize: function(){
		            $("#" + clicked_item).css("height",child_item.height+"px");
		            $("#" + clicked_item).css("width",child_item.width+"px");
		        } */
			});

			$("#control_edit_dialog").dialog({
				dialogClass : "ui-dialog-titlebar-close",
				resizable : false,
				closeOnEscape : true,
				title : "Edit Component",
				show : {
					effect : "slide",
					duration : 200,
					direction : "up"
				},
				hide : {
					effect : "explode",
					duration : 200
				},
				position : {
					my : "left top",
					at : "right bottom",
					of : child_item
				},

			});

			if ($(this).is("BUTTON")) {

			} else if ($(this).is("input")) {

			} else {
			}
		}

		/* $("#frame").find("*").draggable({
			containment : "#frame",
// 			cancel : null
		}); */

		/* $("a.tab").click(function() {

			// switch all tabs off
			$(".active").removeClass("active");

			// switch this tab on
			$(this).addClass("active");

			// slide all elements with the class 'content' up
			$(".content").slideUp();

			// Now figure out what the 'title' attribute value is and find the element with that id.  Then slide that down.
			var content_show = $(this).attr("title");
			$("#" + content_show).slideDown();

		}); */

	});
</script>



</head>


<body>
	<div id="log"></div>

	<style>
#showsaveicon {
	width: 100%;
	height: 100%;
	position: fixed;
	z-index: 9999;
	background: url("http://localhost/WebBuilder/images/loading.gif")
		no-repeat center center rgba(0, 0, 0, 0.25)
}
</style>
	<div id="showsaveicon"></div>

	<div>
	
	<?php if($template=="Medical Practioner"){ include_once '../master_views/topper_view.php'; }?>
</div>

	<div style="height: 25px;">
		<a style="margin-right: 118px; float: right;" class="btn btn-inverse"
			onclick="savePage();"><i class="icon-star"></i> Save</a>
	</div>

	<div>
		<div style="float: left;" class="tree">
			<ul>

				<li><span><i class="icon-calendar"></i> Pages</span>
					<ul>
						<li><span class="badge badge-success"><i class="icon-minus-sign"></i>
								Already Added</span>
							<ul id="ul_tree_menu_list" class="pages">

							</ul></li>
					</ul></li>

				<li><span><i class="icon-calendar"></i>Design Components</span>
					<ul>
						<li><span class="badge badge-success"><i class="icon-minus-sign"></i>
								Background</span>
							<ul id="ul_background_menu">
								<li id="li_background_image"><span><i class="icon-time"></i> [+]</span>
									<a id="bg_set" href="#"> &ndash; Images</a></li>
								<li id="li_background_color"><span><i class="icon-time"></i> [+]</span>
									<a id="bg_set" href="#"> &ndash; Color</a></li>
							</ul></li>
						<li><span class="badge badge-success"><i class="icon-minus-sign"></i>Text
								Color</span>
							<ul id="ul_text_color">
								<!--	                        <li>-->
								<!--		                        <span><i class="icon-time"></i> [+]</span> &ndash;-->
								<!--		                        <a id="bg_color" href="">Red</a>-->
								<!--	                        </li>-->
								<!--	                        <li>-->
								<!--		                        <span><i class="icon-time"></i> [+]</span> &ndash;-->
								<!--		                        <a id="bg_color" href="">Blue</a>-->
								<!--	                        </li>-->
							</ul></li>
						<li><span class="badge badge-warning"><i class="icon-minus-sign"></i>
								Font</span>
							<ul id="ul_text_font">
								<!--	                        <li>-->
								<!--		                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Arial</a>-->
								<!--	                        </li>-->
								<!--	                        <li>-->
								<!--		                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Tahoma</a>-->
								<!--	                        </li>-->
							</ul></li>
					</ul></li>
				<li><span><i class="icon-calendar"></i> Add Tools</span>
					<ul>
						<li><span class="badge badge-important"><i class="icon-minus-sign"></i>
								Media</span>
							<ul>
								<li><a href=""><span><i class="icon-time"></i> [+]</span> Flash</a>
								</li>
								<li><a href=""><span><i class="icon-time"></i> [+]</span> MP3</a>
								</li>
								<li><a href=""><span><i class="icon-time"></i> [+]</span> Video</a>
								</li>
							</ul></li>
						<li><span class="badge badge-important"><i class="icon-minus-sign"></i>
								Controls</span>
							<ul>
                                                <?php include_once '../json_views/json_controls.php'; ?>
                                                <!--
			                        <li>
				                        <a href=""><span><i class="icon-time"></i>
                                                <label class="control-component">Label</label>
                                        </a>
			                        </li>
			                        <li>
				                        <a><span><i class="icon-time"></i>
                                                <input class="control-component" type="button" value="Add Button"/>
                                        </span> </a>
			                        </li>
			                        <li>
				                        <a><span><i class="icon-time"></i>
                                            <img class="control-component" src="../../images/loading.gif" width="100" height="100"   />
                                        </span>
                                        </a>
			                        </li> -->
							</ul></li>
					</ul></li>

			</ul>
		</div>

		<!-- Template Elements  Here -->
		<div id="frame" class="droppedFields">
			<div
				style="background: gray; margin-bottom: 10px; text-align: center;"> <?php include ($turl.'/title.html');?>	</div>
			<div
				style="background-color: white; box-shadow: 10px 10px 5px #888888;">

				<div class="container">

					<div class="navbar-header">
						<button data-target="#mainNav" data-toggle="collapse"
							class="navbar-toggle" type="button">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<a href="#" class="navbar-brand">
				                    <?php echo $_GET['template']; ?>
				                </a>
					</div>

					<!--</nav>-->
					<div id="mainNav" class="collapse navbar-collapse">
						<ul id="menu" class="nav navbar-nav navbar">
									<?php include ($turl.'/menu.html');?>
									<li class="add-menu"><a>+</a></li>
						</ul>
					</div>

				</div>
			</div>

			<div id="body" contentEditable="true"><?php include ($turl.'/body.html');?></div>


			<!-- 
			<div class="droppedFields" id="div_droppable">
				<h2 style="text-align: center; line-height: 450px; color: #dddddd">Drop
					Here</h2>
			</div>

 -->
			<div id="footer">
				<?php include ($turl.'/footer.html');?>
			</div>
		</div>


	</div>


	<!-- The option Menu -->

	<div id="page_option" style="display: none;" class="edit_option">
		<table style="">
			<caption style="font-weight: bold; text-align: center;">Page Control
				Options</caption>
			<tr>
				<td style=""></td>
				<td><button class="btn btn-xs btn-danger" id="page_delete_btn">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						Delete
					</button></td>
			</tr>

			<tr>
				<td>Page Name</td>
				<td><input id="input_page_name" type="text"></td>
			</tr>


			<tr>
				<td>other Options</td>
				<td>.........</td>
			</tr>
			<tr>
				<td>other Options</td>
				<td>.........</td>
			</tr>

			<tr>
				<td><button class="btn btn-sm btn-success" id="page_save_btn">
						<span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Save
					</button></td>
				<td><button class="btn btn-xs btn-warning page_close_btn">Close</button></td>
			</tr>

		</table>
	</div>

	<style>
#table_color_set tr:hover, td:hover {
	border: 3px solid #ffffff;
	font-weight: bold;
}

.color-set-color>span {
	display: inline-block;
	height: 30px;
	width: 20px;
}
</style>
	<!-- Color Option-->
	<div id="background_option_image" class="edit_option"
		style="top: 325px;">
		<table style="">
			<caption style="font-weight: bold; text-align: center;">Chose
				Background</caption>

        <?php
								for($i = 0; $i < 4; $i ++) {
									?>
            <tr>
				<td class="color"></td>
				<td class="color"></td>
				<td class="color"></td>
			</tr>
        <?php
								}
								?>




        </tr>

		</table>

		<button class="btn btn-xs btn-warning page_close_btn">Close</button>
	</div>


	<!-- Image Option-->
	<div id="background_option_color" class="edit_option"
		style="top: 325px;">
		<table style="" id="table_color_set">
			<caption style="font-weight: bold; text-align: center;">Chose Color
				Set</caption>

			<!--        <tr class="color-set">-->
			<!--            <td  >cset1</td><td class="color-set-color">-->
			<!--                <span  style="background: red;"></span><span style="background: green" ></span> <span style="background: gray" ></span>-->
			<!--            </td>-->
			<!--        </tr>-->
			<!---->
			<!--        <tr class="color-set">-->
			<!--            <td  >cset2</td><td class="color-set-color">-->
			<!--                <span  style="background: yellow;"></span> <span style="background: blue" ></span> <span style="background: silver" ></span>-->
			<!--            </td>-->
			<!--        </tr>-->


		</table>

		<button class="btn btn-xs btn-warning page_close_btn">Close</button>
	</div>
	<!-- Option Menu End -->


	<div id="control_edit_dialog" class="dialog">
		<input id="dialog_input" type="text" placeholder="Edit here..."
			style="width: 100%"></input>
		<button id="dialog_btn_edit" style="width: 100%">Edit</button>
		<button id="dialog_btn_delete" style="width: 100%">Delete</button>
		<ol id="selectable">
			<li class="ui-widget-content">Item 1</li>
			<li class="ui-widget-content">Item 2</li>
			<li class="ui-widget-content">Item 3</li>
			<li class="ui-widget-content">Item 4</li>
		</ol>

	</div>




</body>



</html>