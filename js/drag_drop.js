/*
 * Created By Jisan Mahmud
 */

/*
 * Global Variables
 */

var counter = 1001;
var clicked_dropped_item_id = null;
var child_item = null;
var editable_control = null;
var pos;
var allawable_control_array = [ "button", "textarea", "radiobutton",
		"dropdown", "image", "header" ]

var currentMousePos = {
	x : -1,
	y : -1
};

$(function() {

	makeDraggable();

	$("#body").find("*").each(function() {
		var control_id = $(this).attr("id");
		var control_name = $(this).attr("name");

		if (allawable_control_array.indexOf(control_name) > -1) {
			console.log("Control Type : " + control_name);
			$(this).attr("id", $(this).attr("name") + "_dropped" + counter++);

			$(this).draggable({
				containment : $(".droppedFields"),
				cancel : false,
			});

			$(this).click(droppedItemClickAction);
		}
	});

	var indexOf = function(needle) {
		if (typeof Array.prototype.indexOf === 'function') {
			indexOf = Array.prototype.indexOf;
		} else {
			indexOf = function(needle) {
				var i = -1, index = -1;

				for (i = 0; i < this.length; i++) {
					if (this[i] === needle) {
						index = i;
						break;
					}
				}
				return index;
			};
		}
		return indexOf.call(this, needle);
	};

	function makeDraggable() {
		$(".selectorField").draggable({
			cancel : null,
			helper : "clone",
			cursor : "move",
			stack : "div",
			revert : "invalid",
			appendTo : $(".droppedFields"),
			stop : function(event, ui) {
				pos = $(ui.helper).offset();

			}
		});
	}

	$(".droppedFields").mousemove(function(event) {
		currentMousePos.x = event.pageX;
		currentMousePos.y = event.pageY;
	});

	$(".droppedFields").droppable(
			{
				activeClass : "activeDroppable",
				hoverClass : "hoverDroppable",
				/* accept : ":not(.ui-sortable-helper #control_option_dialog)", */
				accept : ".draggableField",
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
					} else if (droppable_name == "image") {
						draggable = $("#image_template");
					}

					if (droppable_id == null
							|| droppable_id.search('dropped_') < 0) {

						draggable = draggable.clone();
						draggable.css('left', currentMousePos.x + 'px');
						draggable.css('top', currentMousePos.y + 'px');

						draggable.removeClass("selectorField");
						draggable.addClass("droppedFields");

						draggable[0].id = droppable_name + "_dropped_"
								+ (counter++);

						if (droppable_name == "radiobutton") {
							var radio_btn_template_array = [ {
								"Id" : (draggable.attr("id") + 0),
								"Name" : draggable.attr("id"),
								"Text" : "Option 1"
							}, {
								"Id" : (draggable.attr("id") + 1),
								"Name" : draggable.attr("id"),
								"Text" : "Option 2"
							} ];
							createRadioButtonTemplate(draggable,
									radio_btn_template_array);
						}

						draggable.draggable({
							containment : "parent",
							cancel : false,
						});

						makeDraggable();
						draggable.click(droppedItemClickAction);

						draggable.show(500);
						draggable.appendTo(this);

						var pos = draggable.position();
						/* alert("position : " + pos.left + " : " + pos.top); */
						/*
						 * draggable.click(function() { var pos =
						 * draggable.position(); alert("position : " + pos.left + " : " +
						 * pos.top);
						 * 
						 * });
						 */
					}

				}
			});

	function createRadioButtonTemplate(control, radio_btn_list) {
		$.each(radio_btn_list, function() {

			control.append($('<input />', {
				type : 'radio',
				name : this.Name,
				id : this.Id,
				value : this.Id
			}));
			control.append($('<label />', {
				'style' : "text-indent: 2em;",
				'text' : this.Text,
				'for' : this.Id,
			}));
			control.append('<br />');
		});
	}

	function showRadioButtonEditPanel() {

		var count = 0;
		var radio_btn_array = [];
		var option_txt = "";

		$("#" + editable_control.attr("id") + " :input").each(
				function() {

					var radio_id = $(this).attr("id");
					var radio_name = $(this).attr("name");
					var radio_txt = $('label[for=' + $(this).attr("id") + ']')
							.text();

					var radio_btn_info_array = [];
					radio_btn_info_array["Id"] = radio_id;
					radio_btn_info_array["Name"] = radio_name;
					radio_btn_info_array["Text"] = radio_txt;

					radio_btn_array[count++] = radio_btn_info_array;

					console.log("Info For Radio Button : " + radio_id + " : "
							+ radio_name + " : " + radio_txt);
				});

		$.each(radio_btn_array, function(index, value) {
			option_txt += value.Text;
			if (index != (radio_btn_array.length - 1)) {
				option_txt += "\n";
			}
		});

		$("#radio_btn_option_txt").val(option_txt);

		$("#radio_btn_dialog_cancel").click(function() {
			$("#radio_btn_edit_dialog").dialog("close");
		});

		$("#radio_btn_dialog_save").click(function() {

			editable_control.empty();

			var radio_options = $("#radio_btn_option_txt").val();
			var new_radio_options = radio_options.split('\n');

			if (new_radio_options[new_radio_options - 1] == null) {
				// To Do
				// if extra new lines are detected
			}
			var final_radio_options = [];

			$.each(new_radio_options, function(index, value) {
				var final_radio = [];
				final_radio["Id"] = editable_control.attr("id") + index;
				final_radio["Name"] = editable_control.attr("id");
				final_radio["Text"] = value;
				final_radio_options[index] = final_radio;
			});

			createRadioButtonTemplate(editable_control, final_radio_options);

			$("#radio_btn_edit_dialog").dialog("close");
		});

		$("#radio_btn_edit_dialog").dialog({
			dialogClass : "no-close",
			resizable : false,
			draggable : true,
			closeOnEscape : true,
			title : "Button Edit Panel",
			width : 250,
			show : {
				effect : "slide",
				duration : 200,
				direction : "up"
			},
			beforeClose: function( event, ui ) {
				makeControlNonEditable(editable_control);
			},

		});
	}

	function showButtonEditPanel() {
		$("#btn_text").val('');
		$("#btn_link").val('');
		var old_btn_text = child_item.text();
		var old_color = child_item.css('backgroundColor');

		$("#btn_dialog_cancel").click(function() {
			child_item.html(old_btn_text);
			child_item.css("background", old_color);
			
			$("#btn_edit_dialog").dialog("close");
		});

		$("#btn_text").keyup(function(event) {
			child_item.html($("#btn_text").val());
		});

		$("#btn_dialog_save").click(function() {
			$("#btn_edit_dialog").dialog("close");
		});

		$("#btn_edit_dialog").dialog({
			dialogClass : "no-close",
			resizable : false,
			draggable : true,
			closeOnEscape : true,
			title : "Button Edit Panel",
			width : 250,
			show : {
				effect : "slide",
				duration : 200,
				direction : "up"
			},
			beforeClose: function( event, ui ) {
				makeControlNonEditable(editable_control);
			},
		/*
		 * hide : { effect : "slide", duration : 200 }, position : { my : "right
		 * top", at : "right top", of : $(".droppedFields") },
		 */

		});

		$("#color_picker")
				.spectrum(
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
								child_item.css("background", color);
							},
							palette : [
									[ "rgb(0, 0, 0)", "rgb(67, 67, 67)",
											"rgb(102, 102, 102)",
											"rgb(204, 204, 204)",
											"rgb(217, 217, 217)",
											"rgb(255, 255, 255)" ],
									[ "rgb(152, 0, 0)", "rgb(255, 0, 0)",
											"rgb(255, 153, 0)",
											"rgb(255, 255, 0)",
											"rgb(0, 255, 0)",
											"rgb(0, 255, 255)",
											"rgb(74, 134, 232)",
											"rgb(0, 0, 255)",
											"rgb(153, 0, 255)",
											"rgb(255, 0, 255)" ],
									[ "rgb(230, 184, 175)",
											"rgb(244, 204, 204)",
											"rgb(252, 229, 205)",
											"rgb(255, 242, 204)",
											"rgb(217, 234, 211)",
											"rgb(208, 224, 227)",
											"rgb(201, 218, 248)",
											"rgb(207, 226, 243)",
											"rgb(217, 210, 233)",
											"rgb(234, 209, 220)",
											"rgb(221, 126, 107)",
											"rgb(234, 153, 153)",
											"rgb(249, 203, 156)",
											"rgb(255, 229, 153)",
											"rgb(182, 215, 168)",
											"rgb(162, 196, 201)",
											"rgb(164, 194, 244)",
											"rgb(159, 197, 232)",
											"rgb(180, 167, 214)",
											"rgb(213, 166, 189)",
											"rgb(204, 65, 37)",
											"rgb(224, 102, 102)",
											"rgb(246, 178, 107)",
											"rgb(255, 217, 102)",
											"rgb(147, 196, 125)",
											"rgb(118, 165, 175)",
											"rgb(109, 158, 235)",
											"rgb(111, 168, 220)",
											"rgb(142, 124, 195)",
											"rgb(194, 123, 160)",
											"rgb(166, 28, 0)",
											"rgb(204, 0, 0)",
											"rgb(230, 145, 56)",
											"rgb(241, 194, 50)",
											"rgb(106, 168, 79)",
											"rgb(69, 129, 142)",
											"rgb(60, 120, 216)",
											"rgb(61, 133, 198)",
											"rgb(103, 78, 167)",
											"rgb(166, 77, 121)",
											"rgb(91, 15, 0)", "rgb(102, 0, 0)",
											"rgb(120, 63, 4)",
											"rgb(127, 96, 0)",
											"rgb(39, 78, 19)",
											"rgb(12, 52, 61)",
											"rgb(28, 69, 135)",
											"rgb(7, 55, 99)",
											"rgb(32, 18, 77)",
											"rgb(76, 17, 48)" ] ]
						});

	}
	
	function showTextEditPanel(){
		
		//$(".ui-dialog-titlebar-close").css("display", true);
		
		$("#btn_txt_editor_close").click(function(){
			$("#text_edit_dialog").dialog("close");
		});
		
		$("#text_edit_dialog").dialog({
			dialogClass : "no-close",
			resizable : false,
			draggable : true,
			closeOnEscape : true,
			title : "Text Editor",
			height : 90,
			width : 500,
			show : {
				effect : "slide",
				duration : 200,
				direction : "up"
			},
			position : {
				my : "center top",
				at : "center top-100",
				of : editable_control
			},
			beforeClose: function( event, ui ) {
				makeControlNonEditable(editable_control);
			},

		});
		
		
		
		
		
		//$("#text_edit_dialog").addClass("ui-dialog-titlebar-close");
		
		//var dialog_titlebar = this.uiDialog.find( ".ui-dialog-titlebar" );
		
	}
	
	function showImageEditPanel(){
		
		var old_image_path= editable_control.attr("src");
		var old_image_height= "";
		var old_image_width= "";
		$("#dialog_input_image_path").val("");
		
		$("#image_edit_dialog").dialog({
			dialogClass : "no-close",
			resizable : false,
			draggable : true,
			closeOnEscape : true,
			title : "Image Editor",
			width : 250,
			show : {
				effect : "slide",
				duration : 200,
				direction : "up"
			},
			
			beforeClose: function( event, ui ) {
				makeControlNonEditable(editable_control);
			},

		});
		
		$("#btn_browse_image").click(function(){
			
			$('#file_picker').change( function(event) {
				var tmp_file_path = URL.createObjectURL(event.target.files[0]);
				var file_name = document.getElementById('file_picker').value;
				$("#dialog_input_image_path").val(file_name);
				
				
				editable_control.attr("src", tmp_file_path);
				    
				});
			
			$("#file_picker").trigger("click");
		});
		
		$("#btn_image_dialog_cancel").click(function() {
			
			editable_control.attr("src", old_image_path);
			$("#image_edit_dialog").dialog("close");
		});

		$("#btn_imgage_dialog_save").click(function() {
			$("#image_edit_dialog").dialog("close");
		});
	}
	
	
function showDropDownEditPanel(){
		
		$("#dropdown_edit_dialog").dialog({
			dialogClass : "no-close",
			resizable : false,
			draggable : true,
			closeOnEscape : true,
			title : "Drop Down Editor",
			width : 250,
			show : {
				effect : "slide",
				duration : 200,
				direction : "up"
			},
			
			beforeClose: function( event, ui ) {
				makeControlNonEditable(editable_control);
			},

		});
		
		$("#btn_dropdown_dialog_cancel").click(function() {
			$("#dropdown_edit_dialog").dialog("close");
		});

		$("#btn_dropdown_dialog_save").click(function() {
			$("#dropdown_edit_dialogs").dialog("close");
		});
	}

	function showEditPanel() {
		editable_control = $("#" + clicked_dropped_item_id);
		makeControlEditable(editable_control);

		if (clicked_dropped_item_id.search('button') == 0) {
			showButtonEditPanel();

		} else if (clicked_dropped_item_id.search('textarea') == 0) {
			showTextEditPanel();
		} else if (clicked_dropped_item_id.search('dropdown') == 0) {
			showDropDownEditPanel();
		} else if (clicked_dropped_item_id.search('radiobutton') == 0) {
			showRadioButtonEditPanel();
		} else if (clicked_dropped_item_id.search('header') == 0) {
			showTextEditPanel();
		} else if (clicked_dropped_item_id.search('image') == 0) {
			showImageEditPanel();
		}

		/*
		 * editable_control.removeClass("text_template_non_editable");
		 * editable_control.addClass("text_template_editable");
		 * editable_control.draggable("disable"); editable_control.off("click");
		 * editable_control.attr("contentEditable", true);
		 */

	}
	
	function makeControlEditable(control) {
		control.addClass("editable_mode");
		control.draggable("disable");
		control.unbind("click", droppedItemClickAction);
		if (clicked_dropped_item_id.search('textarea') == 0) {
			control.prop('contenteditable', 'true');
		}
		
	}

	function makeControlNonEditable(control) {
		control.removeClass("editable_mode");
		control.draggable("enable");
		control.click(droppedItemClickAction);
		if (clicked_dropped_item_id.search('textarea') == 0) {
			control.prop('contenteditable', 'false');
		}
	}
	
	

	$("#dialog_btn_delete").click(function() {
		$("#control_option_dialog").dialog("close");
		$("#" + clicked_dropped_item_id).remove();
	});

	$("#dialog_btn_edit").click(function() {
		showEditPanel();
		$("#control_option_dialog").dialog("close");
	});

	$("#dialog_btn_resize").click(function() {
		$("#control_option_dialog").dialog("close");
//		makeControlEditable(editable_control);
//		
//		editable_control.resizable({
//		 ghost : false,
//		 animate : false,
//		 autoHide : true,
//		 distance : 0,
//		 /* handles : "n, e, s, w, ne, se, sw, nw", */
////		 alsoResize : "#" + clicked_dropped_item_id
//		 /*
//		 * resize: function(){ $("#" +
//		 * clicked_dropped_item_id).css("height",child_item.height+"px");
//		 $("#" +
//		 * clicked_dropped_item_id).css("width",child_item.width+"px"); }
//		 */
//		 });
		
	});

	$("#dialog_btn_cancel").click(function() {
		$("#control_option_dialog").dialog("close");
	});

	function makeTextAreaEditable() {
		child_item.addClass("jqte-test");
		child_item.jqte({
			"status" : true
		});
	}

	function droppedItemClickAction() {
		clicked_dropped_item_id = $(this).attr("id");
		editable_control = $(this);

		child_item = $("#" + clicked_dropped_item_id + " :first");
		var title = "";

		if (clicked_dropped_item_id.search('button') == 0) {
			title = "BUTTON ...";
		} else if (clicked_dropped_item_id.search('textarea') == 0) {
			title = "TEXT ...";
		} else if (clicked_dropped_item_id.search('dropdown') == 0) {
			title = "DROP DOWN ...";
			child_item.focus();
		} else if (clicked_dropped_item_id.search('radiobutton') == 0) {
			title = "RADIO BUTTON ...";
		} else if (clicked_dropped_item_id.search('header') == 0) {
			title = "HEADER ...";
		} else if (clicked_dropped_item_id.search('image') == 0) {
			title = "IMAGE ...";
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

		$("#control_option_dialog").dialog({
			dialogClass : "no-close",
			resizable : false,
			draggable : true,
			closeOnEscape : true,
			title : title,
			width : 180,
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

//		$("#control_option_dialog").bind("clickoutside", function(event) {
//			$("#control_option_dialog").dialog("close");
//			$("#control_option_dialog").unbind("clickoutside");
//		});

		// addClickOutsideEvent($("#control_option_dialog"));
		//		
		// window.addEventListener('mouseup', function(event){
		// var box = $("#control_option_dialog");
		// if (event.target != box && event.target.parentNode != box){
		// box.dialog("close");
		// }
		// });
		//
		// function addClickOutsideEvent(control) {
		//			
		//			
		// var mouse_click = 0;
		// control.bind("clickoutside", function(event) {
		// if (control.dialog("isOpen")) {
		// alert("open : " + mouse_click);
		// if (mouse_click > 0) {
		// control.dialog("close");
		// mouse_click = 0;
		// } else {
		// mouse_click = 1;
		// }
		// }else{
		// alert("closed : " + mouse_click);
		// }
		// });
		// }

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
