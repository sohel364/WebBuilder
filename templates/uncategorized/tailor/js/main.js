$(window).load(function(){
	$('.slider').fractionSlider({
		'fullWidth' : true,
		'controls' : true,
		'pager' : true,
		'responsive' : true,
		'dimensions' : "1000,400",
		'increase' : false,
		'pauseOnHover' : true,
		'slideEndAnimation' : true
	});
	//initSlider();
	onTemplateMenuLoad();
});


function onTemplateMenuLoad(){
	console.log("onTemplateMenuLoad Clicked");
	startImageSlider("all");
}

function startImageSlider(slider_id){

	console.log("InitSlider Called for " + slider_id);
	
	var visible_items = $("#flexiselDemo3").data("visible_items");
	var animation_speed = $("#flexiselDemo3").data("animation_speed");
	var pause_time = $("#flexiselDemo3").data("pause_time");
	
//	alert(visible_items + " : " + animation_speed + " : " + pause_time );
	
	
	
	if (slider_id == "all" || slider_id == "flexiselDemo3")
	
	{
		console.log("resetting for flexiselDemo3 ");
		
		$("#flexiselDemo3").flexisel({
	        visibleItems: visible_items,
	        animationSpeed: animation_speed,
	        autoPlay: true,
	        autoPlaySpeed: pause_time,            
	        pauseOnHover: true,
	        enableResponsiveBreakpoints: true,
	        responsiveBreakpoints: { 
	            portrait: { 
	                changePoint:480,
	                visibleItems: 1
	            }, 
	            landscape: { 
	                changePoint:640,
	                visibleItems: 2
	            },
	            tablet: { 
	                changePoint:768,
	                visibleItems: 3
	            }
	        }
	    });
	}
}