/*
 * Created By Jisan Mahmud
 */

/*
 * Global Variables
 */

var _ctrl_index = 1001;
var clicked_item = null;
var child_item = null;
counter = 0;
var pos;

var currentMousePos = {
	x : -1,
	y : -1
};

$(function() {

	makeDraggable();
	
	
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


	$(".droppedFields").mousemove(function(event) {
		currentMousePos.x = event.pageX;
		currentMousePos.y = event.pageY;
	});

	$(".droppedFields").droppable({
		activeClass : "activeDroppable",
		hoverClass : "hoverDroppable",
		accept : ":not(.ui-sortable-helper)",
		drop : function(event, ui) {
			var droppable_id = ui.helper.attr('id');
			if (droppable_id == null || droppable_id.search('dropped_') < 0) {
				counter++;
				var draggable = ui.helper;
				draggable = draggable.clone();

				draggable.css('left', currentMousePos.x + 'px');
				draggable.css('top', currentMousePos.y + 'px');

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

				/*
				 * var pos = draggable.position(); alert("position : " +
				 * pos.left + " : " + pos.top); draggable.click(function(){ var
				 * pos = draggable.position(); alert("position : " + pos.left + " : " +
				 * pos.top);
				 * 
				 * });
				 */
			}

		}
	});

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
		/*
		 * resize: function(){ $("#" +
		 * clicked_item).css("height",child_item.height+"px"); $("#" +
		 * clicked_item).css("width",child_item.width+"px"); }
		 */
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

	/*
	 * $("#frame").find("*").draggable({ containment : "#frame", // cancel :
	 * null });
	 */

	/*
	 * $("a.tab").click(function() { // switch all tabs off
	 * $(".active").removeClass("active"); // switch this tab on
	 * $(this).addClass("active"); // slide all elements with the class
	 * 'content' up $(".content").slideUp(); // Now figure out what the 'title'
	 * attribute value is and find the element with that id. Then slide that
	 * down. var content_show = $(this).attr("title"); $("#" +
	 * content_show).slideDown();
	 * 
	 * });
	 */
});
