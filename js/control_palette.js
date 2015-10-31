// Global variables

var is_control_palette_open = false;


$(function(){	
	initializeControlPalette();
	controlPaletteHoverAction();
	
});


function initializeControlPalette(){
	
	$(".cp_btn").click(function(){
		showControlPalette($(this));
	});
	
	$(".cp_holder_close_btn").click(function(){
		closeAllControlPalette();
	});
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