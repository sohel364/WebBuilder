<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="../../js/jquery.path.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>


<body>

	<div class="cp_box" style="<?php echo $user_id == NULL? "display: none;" : "display: block;"?>">
		<button id="cp_background"
				class="cp cp_background cp_btn btn" data-top="true"><span class="glyphicon glyphicon-modal-window cp_icon" aria-hidden="true"></span><font style="font-size: 18px"> Background</font> </button>
				
		<button id="cp_add_control"
				class="cp cp_add_control cp_btn btn"><span class="glyphicon glyphicon-plus cp_icon" aria-hidden="true"></span><font style="font-size: 18px"> Add Item</font> </button>
				
		<button id="cp_menu"
				class="cp cp_menu cp_btn btn"><span class="glyphicon glyphicon-edit cp_icon" aria-hidden="true"></span><font style="font-size: 18px"> Edit Menu</font></button>
				
		<button id="cp_media"
				class="cp cp_media cp_btn btn"><span class="glyphicon glyphicon-film cp_icon" aria-hidden="true"></span><font style="font-size: 18px"> Add Media</font></button>
	</div>
	
	<div id="cp_holder_pointer" class="cp_pointer pointer"></div>
	<div id="cp_pointer_outcurve_bottom" class="cp_pointer_outcurve_bottom pointer"></div>
	<div id="cp_pointer_outcurve_top" class="cp_pointer_outcurve_top pointer"></div>
			
	<div id="cp_holder_add_control" class="cp_holder">
		<div class="cp_holder_title_bg_color" style="width: 100%; height: 45px; border-radius: 0 10px 0 0; ">
			<button id="btn_cp_holder_close" class="cp_holder_close_btn cp_holder_btn">X</button>
			<button id="btn_cp_holder_info" class="cp_holder_btn">?</button>
		</div>
		
		<div id="tabs">
		    <ul>
		        <li>
		            <a href="#btn_template_palette">Button</a>
		        </li>
		        <li>
		            <a href="#images">Image</a>
		        </li>
		        <li>
		            <a href="#slider">Slider</a>
		        </li>
		        <li>
		            <a href="#text">Text</a>
		        </li>
		    </ul>
		    <div id="btn_template_palette">
		        <!-- <button name='button' class='selectorField draggableField btn-primary btn-lg'>Click Me</button> -->
		    </div>
		    <div id="images">
		        <img name="image" class="selectorField draggableField" src="../../images/image_template.png" alt="Image Template" style="margin-left: 20px; width: 200px; height: 200px" />
		    </div>
		    <div id="slider">
		        <img name="imageslider" class="selectorField draggableField" src="../../images/slider-skin.jpg" alt="ImageSlider Template" style="margin-left: 20px; width: 200px; height: 100px" />
		    </div>
		    <div id="text">
		        <div name='textarea' class='selectorField draggableField'>
		        	<h1>Title, Edit me</h1>
		        	<p>I am a Paragraph, Edit me.</p>
		        	<p>I am a Paragraph, Edit me.</p>
		        </div>
		        <br />
		        <br />
		        <h1 name='header' class='selectorField draggableField'>Title, Edit me</h1>
		        <br />
		        <br />
		        <h2 name='header' class='selectorField draggableField'>Title, Edit me</h2>
		        <br />
		        <br />
		        <h3 name='header' class='selectorField draggableField'>Title, Edit me</h3>
		        
		    </div>
		</div>
	</div>
	
	<div id="cp_holder_backgroud" class="cp_holder">
		<div class="cp_holder_title_bg_color" style="width: 100%; height: 45px; border-radius: 0 10px 0 0; ">
			<button id="btn_cp_holder_close" class="cp_holder_close_btn cp_holder_btn">X</button>
			<button id="btn_cp_holder_info" class="cp_holder_btn ">?</button>
		</div>
		<div class="backgroud_edit">
			<div>
				<label>Background Color : </label>
				<input type='text' id="color_picker_background" class="background_color_picker" />
			</div>
			<button id="btn_set_bg_gradient" class="btn btn-default btn-block">Set background Gradient</button>
			<button id="btn_set_bg_image" class="btn btn-default btn-block">Set background Image</button>
			<button id="btn_fix_bg_image" class="btn btn-default btn-block">Set Fixed background Image</button>
			<input id="file_picker_bg" type="file" name="files[]" single
						style="display: none">
				
			
		</div>
		<div class="background_theme">
			<br />
			<label>Still under construction</label>
		
		</div>
	</div>
	<div id="cp_holder_menu" class="cp_holder">
		<div class="cp_holder_title_bg_color" style="width: 100%; height: 45px; border-radius: 0 10px 0 0; ">
			<button id="btn_cp_holder_close" class="cp_holder_close_btn cp_holder_btn">X</button>
			<button id="btn_cp_holder_info" class="cp_holder_btn">?</button>
		</div>
		<p>Menu Editor</p>
	</div>
	<div id="cp_holder_media" class="cp_holder">
		<div class="cp_holder_title_bg_color" style="width: 100%; height: 45px; border-radius: 0 10px 0 0; ">
			<button id="btn_cp_holder_close" class="cp_holder_close_btn cp_holder_btn">X</button>
			<button id="btn_cp_holder_info" class="cp_holder_btn">?</button>
		</div>
		<p>Add Media</p>
	</div>
	
	<button id="btn_collasp_cp" class="collasp_cp btn btn-info" style="<?php echo $user_id == NULL? "display: none;" : "display: block;"?>">Collasp</button>
		
</body>