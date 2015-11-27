<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="../../js/control_editor.js"></script>
	<link href="../../css/control_editor.css" rel="stylesheet" />
</head>


<body>
	
<!-- Background Editor -->

<div id="dialog_bg_editor">
	<div class="bg_eidtor">
		<div id="bg_editor_sample_images_section" class="bg_sample_image_palette">
			<ul id = "bg_editor_sample_images_list" class="bg_sample_image_grid">
			</ul>
		</div>
		<div id="bg_editor_section" class="section_bg_editor">
			<div>
				<button id="btn_select_bg_image" class="btn btn-default btn-block">Select Background Image from PC</button>
				<input id="file_picker_bg_editor" type="file" name="files[]" single
							style="display: none">
				</input>
				<br />
				
			</div>
			
			
			<div class="bg_editor_gradient">
				<br />
				<div>
					<label>Background Color : </label>
					<input type='text' id="bg_color_picker" class="background_color_picker" />
				</div>
				<br />
				
				<div class="bg_editor_gradient_1">
					<label>Color 1 : </label>
					<input type='text' id="bg_color_picker_gradient_1"/>
				</div>
				<div class="bg_editor_gradient_2">
					<label>Color 2 : </label>
					<input type='text' id="bg_color_picker_gradient_2" />
				</div>
				<button id="btn_set_bg_editor_gradient" class="btn btn-default btn-block">Set Background Color Gradient</button>
				
				<ul class="gradient_option">
					<li id="linear_gradient_left" ></li>
					<li id="linear_gradient_right"></li>
					<li id="linear_gradient_top"></li>
					<li id="linear_gradient_bottom"></li>
					<li id="radial_gradient_in"></li>
					<li id="radial_gradient_out"></li>
				</ul>
			</div>
		</div>
	</div>
</div>
	
	
		
</body>





