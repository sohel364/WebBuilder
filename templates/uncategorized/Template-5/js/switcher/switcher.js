/* ================================================================= */
/* CSS Style Switcher By FIFO THEMES
====================================================================== */

window.console = window.console || (function(){
	var c = {}; c.log = c.warn = c.debug = c.info = c.error = c.time = c.dir = c.profile = c.clear = c.exception = c.trace = c.assert = function(){};
	return c;
})();




// Copyright 2013 Faraz & Shahid
// Released under the Webriti.com

    //change css onclick
	function changeCSS(cssFile, cssLinkIndex) {
	var oldlink = document.getElementsByTagName("link").item(cssLinkIndex);

	var newlink = document.createElement("link");
	newlink.setAttribute("rel", "stylesheet");
	newlink.setAttribute("type", "text/css");
	newlink.setAttribute("href", "css/"+cssFile);

	document.getElementsByTagName("head").item(0).replaceChild(newlink, oldlink);
	}


jQuery(document).ready(function($) {
		layout = $.jStorage.get('layout', "wide");
		if( layout == 'wide'){
				$("body").removeClass("boxed"), 
				$(window).resize();
			} else{
				$("body").addClass("boxed"),
				$(window).resize();
			}
			
		$("#style-switcher h2 a").click(function(e){
			e.preventDefault();
			var div = $("#style-switcher");
			if (div.css("left") === "-206px") {
				$("#style-switcher").animate({
					left: "0px"
				}); 
			} else {
				$("#style-switcher").animate({
					left: "-206px"
				});
			}
		});

		//Layout Switcher Colors & Background
	    // $("#layout-style").change(function(e){
			// if( $(this).val() == 1){
				// $("body").removeClass("boxed"), 
				// $(window).resize();
			// } else{
				// $("body").addClass("boxed"),
				// $(window).resize();
			// }
		// });
		
		//Layout Switcher Colors & Background
	    $(".btn_layout").click(function(e){
			$(".btn_layout").removeClass('active');
			$(this).addClass('active');
			$.jStorage.set("layout", "wide");
			if( $(this).attr('id') == 'wide'){
				$("body").removeClass("boxed"), 
				$(window).resize();
			} else{
				$.jStorage.set("layout", "boxed");
				$("body").addClass("boxed"),
				$(window).resize();
			}
		});

		$("#layout-switcher").on('change', function() {
			$('#layout').attr('href', $(this).val() + '.css');
		});

		$(".colors li a").click(function(e){
			e.preventDefault();
			$(this).parent().parent().find("a").removeClass("active");
			$(this).addClass("active");
		});
		
		$('.bg li a').click(function() {
		layout = $.jStorage.get('layout', "wide");
			if(layout == 'boxed') {
				var bg = $(this).css("backgroundImage");
				$("body").css("backgroundImage",bg);
			} else {
				alert('Please select boxed layout');
			}
		});		

	});