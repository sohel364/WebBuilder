
/* Accordion Js */

$(document).ready(function() {

	$('.collapse').on('shown.bs.collapse', function() {$(this).parent().find(".fa-chevron-left").removeClass("fa-chevron-left").addClass("fa-chevron-down");}).on('hidden.bs.collapse', function(){$(this).parent().find(".fa-chevron-down").removeClass("fa-chevron-down").addClass("fa-chevron-left");});

});