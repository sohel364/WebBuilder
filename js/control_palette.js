// Global variables

var is_control_palette_open = false;
var is_cp_collasped = false;
var pos_collasp_btn;
var cp_list;
var cp_position_list;
var is_bg_fixed = false;


$(function(){	
	initializeControlPalette();
	controlPaletteHoverAction();
	
});


function initializeControlPalette(){
	
	pos_collasp_btn = $('#btn_collasp_cp').position();
	cp_list = [$('#cp_background'), $('#cp_add_control'), $('#cp_menu'), $('#cp_media')];
	cp_position_list = [$('#cp_background').position(), $('#cp_add_control').position(), $('#cp_menu').position(), $('#cp_media').position()];
	
	
	$(".cp_btn").click(function(){
		showControlPalette($(this));
	});
	
	$(".cp_holder_close_btn").click(function(){
		closeAllControlPalette();
	});
	
	$("#btn_collasp_cp").click(function(){
		closeAllControlPalette();
		collaspControlPalette()
	});
	
	initializeBackgroundEditor();
	initiateControls("btn_template");
//	var control = $("#btn_template_1").clone();
////	control.css('left', '100px');
////	control.css('top', '200px');
//	control.css('display', 'block');
//	control.appendTo($("#btn_template_palette"));
////	$("#btn_template_palette").append(control);
	
	
}

function initializeBackgroundEditor(){
	$("#color_picker_background").spectrum(
			{
				color : "#6cc8f9",
				flat : false,
				showInput : false,
				containerClassName : 'color_picker_container',
				replacerClassName : 'color_picker_icon',
				showInitial : true,
				showPalette : true,
				showSelectionPalette : true,
				maxPaletteSize : 5,
				preferredFormat : "hex",
				localStorageKey : "spectrum.demo",
				move : function(color) {

				},
				show : function() {

				},
				beforeShow : function() {
				},
				hide : function() {
				},
				change : function(color) {
					$("#body").css("background", color);
				},
				palette : [
						[ "rgb(0, 0, 0)", "rgb(67, 67, 67)",
								"rgb(102, 102, 102)", "rgb(204, 204, 204)",
								"rgb(217, 217, 217)", "rgb(255, 255, 255)" ],
						[ "rgb(152, 0, 0)", "rgb(255, 0, 0)",
								"rgb(255, 153, 0)", "rgb(255, 255, 0)",
								"rgb(0, 255, 0)", "rgb(0, 255, 255)",
								"rgb(74, 134, 232)", "rgb(0, 0, 255)",
								"rgb(153, 0, 255)", "rgb(255, 0, 255)" ],
						[ "rgb(230, 184, 175)", "rgb(244, 204, 204)",
								"rgb(252, 229, 205)", "rgb(255, 242, 204)",
								"rgb(217, 234, 211)", "rgb(208, 224, 227)",
								"rgb(201, 218, 248)", "rgb(207, 226, 243)",
								"rgb(217, 210, 233)", "rgb(234, 209, 220)",
								"rgb(221, 126, 107)", "rgb(234, 153, 153)",
								"rgb(249, 203, 156)", "rgb(255, 229, 153)",
								"rgb(182, 215, 168)", "rgb(162, 196, 201)",
								"rgb(164, 194, 244)", "rgb(159, 197, 232)",
								"rgb(180, 167, 214)", "rgb(213, 166, 189)",
								"rgb(204, 65, 37)", "rgb(224, 102, 102)",
								"rgb(246, 178, 107)", "rgb(255, 217, 102)",
								"rgb(147, 196, 125)", "rgb(118, 165, 175)",
								"rgb(109, 158, 235)", "rgb(111, 168, 220)",
								"rgb(142, 124, 195)", "rgb(194, 123, 160)",
								"rgb(166, 28, 0)", "rgb(204, 0, 0)",
								"rgb(230, 145, 56)", "rgb(241, 194, 50)",
								"rgb(106, 168, 79)", "rgb(69, 129, 142)",
								"rgb(60, 120, 216)", "rgb(61, 133, 198)",
								"rgb(103, 78, 167)", "rgb(166, 77, 121)",
								"rgb(91, 15, 0)", "rgb(102, 0, 0)",
								"rgb(120, 63, 4)", "rgb(127, 96, 0)",
								"rgb(39, 78, 19)", "rgb(12, 52, 61)",
								"rgb(28, 69, 135)", "rgb(7, 55, 99)",
								"rgb(32, 18, 77)", "rgb(76, 17, 48)" ] ]
			});
	
	$(".sp-replacer").css("width", "250px");
	
	$('#file_picker_bg').change(function(event) {
		var tmp_file_path = URL.createObjectURL(event.target.files[0]);
		//var file_name = document.getElementById('file_picker_bg').value;
		$("#body").css("background-image", "url(" + tmp_file_path + ")");
		

	});

	$("#btn_set_bg_image").click(function(){
		$("#file_picker_bg").trigger("click");
	});
	
	$("#btn_set_bg_gradient").click(function(){
		$("#body").css("background", "radial-gradient(white, black)");
	});
	
	$("#btn_fix_bg_image").click(function(){
		if( is_bg_fixed)
		{
			is_bg_fixed = false;
			$("#body").css("background-attachment", "scroll");
			$("#btn_fix_bg_image").text("Set Fixed Background Image");
			
		}else{
			is_bg_fixed = true;
			$("#body").css("background-attachment", "fixed");
			$("#btn_fix_bg_image").text("Set Scrollable Background Image");
		}
		
	});
	
	
	
}

function collaspControlPalette(){
	var start_x;
	var start_y;
	var end_x;
	var end_y;
	var bezier_params;
	var path_angle = 100;
	

	
	$.each(cp_list, function(index, cp_btn) {
		
		if (is_cp_collasped){
			start_x = pos_collasp_btn.left;
			start_y = pos_collasp_btn.top;
			end_x = cp_position_list[index].left;
			end_y = cp_position_list[index].top;
			path_angle = path_angle * (-1);
			$(".cp").show();
		}else{
			start_x = cp_position_list[index].left;
			start_y = cp_position_list[index].top;
			end_x = pos_collasp_btn.left;
			end_y = pos_collasp_btn.top;
		}
		
		bezier_params = {
			    start: { 
			      x: start_x, 
			      y: start_y, 
			      angle: path_angle
			    },  
			    end: { 
			      x:end_x,
			      y:end_y, 
			      angle: 0,
			    }
			  }

		cp_btn.animate({path : new $.path.bezier(bezier_params)}, 1000);
		
		
	});
	
	if (is_cp_collasped){
		is_cp_collasped = false;
		$("#btn_collasp_cp").text("Collasp");
	}else{
		is_cp_collasped = true;
		$("#btn_collasp_cp").text("Expand");
		$(".cp").hide(10);
	}

	
}

function initiateControls(control_name){
	var count = 1;
	var control_template = $("#" + control_name + "_" + count);
	while (control_template.data("type") != undefined) {
		var control = control_template.clone();
		control.css('display', 'block');
		control.css('left', '50px');
		control.addClass("selectorField");
		control.addClass("draggableField");
		control.appendTo($("#" + control_name + "_palette"));
		count++;
		control_template = $("#" + control_name + "_" + count);		
	}
	
	makeControlsOfPaletteDraggable();
}


function controlPaletteHoverAction(){
	
	$(".cp_btn").mouseenter(function(e){
		$(".cp_btn").animate({'opacity': 1}, 100);
		if (is_control_palette_open == false){		
			$(this).animate({'width': 150}, 300);
		}
		
		
	}).mouseleave(function(e){
		if (is_control_palette_open == false){
			$(".cp_btn").animate({'opacity': .5}, 100);
			$(this).animate({'width': 50}, 100);
		}
	});
	
}

function closeAllControlPalette(){
	is_control_palette_open = false;
	$(".pointer").hide();
	$(".cp_holder").hide();
	
}

function showControlPalette(cp){
	$(".cp_btn").animate({'width': 50}, 100);
	closeAllControlPalette();	
	is_control_palette_open = true;
	
	var top = cp.css("top");
	$("#cp_holder_pointer").css("top", top);
	$("#cp_pointer_outcurve_bottom").css("top", parseInt(top) + 35);
	
	$("#cp_pointer_outcurve_top").css("top", parseInt(top) - 35);
	
	//$(".cp_holder").show();
	
	if (cp.attr("id") == "cp_background"){
		$("#cp_holder_backgroud").show();
		
	}else if(cp.attr("id") == "cp_add_control"){
		$("#cp_holder_add_control").show();
		
	}else if(cp.attr("id") == "cp_menu"){
		$("#cp_holder_menu").show();
		
	}else if(cp.attr("id") == "cp_media"){
		$("#cp_holder_media").show();
		
	}
	
	$(".pointer").show();
	
	if(cp.data("top") != undefined){	
		$("#cp_pointer_outcurve_top").hide();
	}
	
	$('#tabs')
    .tabs()
    .addClass('ui-tabs-vertical ui-helper-clearfix');
}