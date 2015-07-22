/*
 * Created By Jisan Mahmud
 */

/*
 * Global Variables
 */

var counter = 1001;
var clicked_dropped_item_id = null;
var child_item = null;
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
			var droppable_name = ui.helper.attr("name");
			var draggable = null;

			if (droppable_name == "button") {
				draggable = $("#button_template");

			} else if (droppable_name == "textarea") {
				draggable = $("#text_box_template");

			} else if (droppable_name == "dropdown") {
				draggable = $("#dropdown_template");

			} else if (droppable_name == "radiobutton") {
				draggable = $("#radiobutton_template");

			} else if (droppable_name == "header") {
				draggable = $("#title_template");
			}

			if (droppable_id == null || droppable_id.search('dropped_') < 0) {

				draggable = draggable.clone();
				draggable.css('left', currentMousePos.x + 'px');
				draggable.css('top', currentMousePos.y + 'px');

				draggable.removeClass("selectorField");
				draggable.addClass("droppedFields");

				draggable[0].id = droppable_name + "_dropped_" + (counter++);
				draggable[0].name = droppable_name;

				draggable.draggable({
					containment : "parent",
					cancel : null
				});

				/* draggable.resizable(); */
				makeDraggable();
				draggable.click(droppedItemClickAction);

				draggable.show(500);
				draggable.appendTo(this);

				var pos = draggable.position();
				/* alert("position : " + pos.left + " : " + pos.top); */
				/*
				 * draggable.click(function() { var pos = draggable.position();
				 * alert("position : " + pos.left + " : " + pos.top);
				 * 
				 * });
				 */
			}

		}
	});

	function makeControlEditble() {
		editable_control = $("#" + clicked_dropped_item_id);
		editable_control.removeClass("text_template_non_editable");
		editable_control.addClass("text_template_editable");
		editable_control.draggable("disable");
		editable_control.off("click");
		editable_control.attr("contentEditable", true);

	}

	function makeControlNonEditable(control) {

	}

	$("#dialog_btn_delete").click(function() {
		$("#control_edit_dialog").dialog("close");
		$("#" + clicked_dropped_item_id).remove();

	});

	$("#dialog_btn_edit").click(function() {
		var text = $("#dialog_input").val();

		makeControlEditble();

		if (child_item.is("BUTTON")) {

		} else if (child_item.is("textarea")) {
			makeTextAreaEditable();
		} else {
		}

		$("#control_edit_dialog").dialog("close");

	});

	function makeTextAreaEditable() {
		child_item.addClass("jqte-test");
		child_item.jqte({
			"status" : true
		});
	}

	function droppedItemClickAction() {
		clicked_dropped_item_id = $(this).attr("id");
		child_item = $("#" + clicked_dropped_item_id + " :first");

		if (child_item.is("BUTTON")) {

		} else if (child_item.is("textarea")) {
		} else {
		}

		// child_item.resizable({
		// ghost : false,
		// animate : false,
		// autoHide : true,
		// distance : 0,
		// /* handles : "n, e, s, w, ne, se, sw, nw", */
		// alsoResize : "#" + clicked_dropped_item_id
		// /*
		// * resize: function(){ $("#" +
		// * clicked_dropped_item_id).css("height",child_item.height+"px");
		// $("#" +
		// * clicked_dropped_item_id).css("width",child_item.width+"px"); }
		// */
		// });

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
				of : $(this)
			},

		});
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