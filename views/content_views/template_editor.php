<?php
error_reporting(E_ERROR);
        $category;
        $template;
	if(isset($_POST['template']) && isset($_POST['category']) )
	{
		$turl ='../../templates/'.$_POST['category'].'/'.$_POST['template'];
		$css='../../templates/'.$_POST['category'].'/'.$_POST['template'].'/css/style.css';
		$category = $_POST['category'];
                $template = $_POST['template'];
	}else if(isset($_GET['template']) &&  isset($_GET['category']))
	{
		$turl ='../../templates/'.$_GET['category'].'/'.$_GET['template'];
		$css='../../templates/'.$_GET['category'].'/'.$_GET['template'].'/css/style.css';
                $category = $_GET['category'];
                $template = $_GET['template'];

	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Edit Template</title>
    <script  src="../../js/tinymce/tinymce.min.js" ></script>
	<script  src="../../js/jquery-2.1.1.min.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script  src="../../js/bootstrap-dialog.js" ></script>
	<script  src="../../js/jquery-ui.min.js" ></script>

	<script type="text/javascript">
            var template_id = '<?php echo $category.'_'.$template;?>';
	</script>
        <script  src="../../js/savePage.js" ></script>
        <script  src="../../js/menu.js" ></script>

  	<link href="../../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../../css/bootstrap-dialog.css" rel="stylesheet"/>
	<link href="../../css/jquery-ui.min.css" rel="stylesheet"/>

	<link rel="stylesheet" type="text/css" href="<?php echo  $css?>"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>

<style>

#frame
{
	background:rgba(0,0,0,.1);
	float:left;
	height: 100%;
	width: 72%;
	margin-left: 5px;
	padding: 5px;
}


.edit_option
{
	position: absolute;
	top: 65px;
	left:243px;
	background: url("../../images/img-noise-361x370.png");
	border-radius: 7px;
	border: 1px solid silver;
	padding: 5px;
    display: none;
}
.edit_option  table  tr,th,td
{
	padding: 2px;
	border: 1px solid white;
}
.edit_option td:nth-child(even)
{
	float:right;
	text-align: right;
}
.color
{
    height: 30px;
    width: 30px;
}

</style>

</head>


<body>
    <style>
        #showsaveicon{
            width:100%;
            height:100%;
            position:fixed;
            z-index:9999;
            background:url("http://localhost/WebBuilder/images/loading.gif") no-repeat center center rgba(0,0,0,0.25)
        }
    </style>
    <div id="showsaveicon"> </div>
    
<div>
	
	<?php if($template=="Medical Practioner"){ include_once '../master_views/topper_view.php'; }?>
</div>

<div style="height: 25px;">
    <a style="margin-right:118px;float: right;" class="btn btn-inverse" onclick="savePage();"><i class="icon-star"></i> Save</a>
</div>

	<div>
	   	<div style="float: left;" class="tree">
	    <ul>
	
	        <li>
	            <span><i class="icon-calendar"></i> Pages</span>
	            <ul>
	                <li>
	                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Already Added</span>
	                    <ul id="ul_tree_menu_list" class="pages">
	
	                    </ul>
	                </li>
			    </ul>
	        </li>
	
	        <li>
	            <span><i class="icon-calendar"></i>Design Components</span>
	            <ul>
	                <li>
	                	<span class="badge badge-success"><i class="icon-minus-sign"></i> Background</span>
	                    <ul id="ul_background_menu">
	                        <li id="li_background_image">
		                        <span><i class="icon-time"></i> [+]</span> <a id="bg_set" href="#"> &ndash; Images</a>
	                        </li>
	                        <li id="li_background_color">
		                       <span><i class="icon-time"></i> [+]</span>  <a id="bg_set" href="#"> &ndash; Color</a>
	                        </li>
	                    </ul>
	                </li>
	                <li>
	                	<span class="badge badge-success"><i class="icon-minus-sign"></i>Text Color</span>
	                    <ul id="ul_text_color">
<!--	                        <li>-->
<!--		                        <span><i class="icon-time"></i> [+]</span> &ndash;-->
<!--		                        <a id="bg_color" href="">Red</a>-->
<!--	                        </li>-->
<!--	                        <li>-->
<!--		                        <span><i class="icon-time"></i> [+]</span> &ndash;-->
<!--		                        <a id="bg_color" href="">Blue</a>-->
<!--	                        </li>-->
	                    </ul>
	                </li>
	                <li>
	                	<span class="badge badge-warning"><i class="icon-minus-sign"></i> Font</span>
	                    <ul id="ul_text_font">
<!--	                        <li>-->
<!--		                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Arial</a>-->
<!--	                        </li>-->
<!--	                        <li>-->
<!--		                        <a href=""><span><i class="icon-time"></i> [+]</span> &ndash; Tahoma</a>-->
<!--	                        </li>-->
	                    </ul>
	                </li>
	            </ul>
	        </li>
	        <li>
	            <span><i class="icon-calendar"></i> Add Tools</span>
	                    <ul>
			                <li>
			                	<span class="badge badge-important"><i class="icon-minus-sign"></i> Media</span>
			                    <ul>
			                        <li>
				                        <a href=""><span><i class="icon-time"></i> [+]</span> Flash</a>
			                        </li>
			                        <li>
				                        <a href=""><span><i class="icon-time"></i> [+]</span> MP3</a>
			                        </li>
			                        <li>
				                        <a href=""><span><i class="icon-time"></i> [+]</span> Video</a>
			                        </li>
			                    </ul>
			                </li>
			                <li>
			                	<span class="badge badge-important"><i class="icon-minus-sign"></i> Controls</span>
			                    <ul>
			                        <li>
				                        <a href=""><span><i class="icon-time"></i> [+]</span> Text</a>
			                        </li>
			                        <li>
				                        <a href=""><span><i class="icon-time"></i> [+]</span> Shapes</a>
			                        </li>
			                        <li>
				                        <a href=""><span><i class="icon-time"></i> [+]</span> Buttons</a>
			                        </li>
			                    </ul>
			                </li>
			    	</ul>
	        </li>
	
	    </ul>
	</div>

		<!-- Template Elements  Here -->
	<div id="frame" >
		<div style="background: gray; margin-bottom: 10px;text-align: center; " > <?php include ($turl.'/title.html');?>	</div>
		<div style="background-color: white;box-shadow: 10px 10px 5px #888888;">

			    <div class="container">

							<div class="navbar-header">
				                <button data-target="#mainNav" data-toggle="collapse" class="navbar-toggle" type="button">
				                    <span class="sr-only">Toggle navigation</span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                    <span class="icon-bar"></span>
				                </button>
				                <a href="#" class="navbar-brand">
				                    <?php echo $_GET['template']; ?>
				                </a>
				            </div>

				            <!--</nav>-->
							<div id="mainNav" class="collapse navbar-collapse">
								<ul id="menu" class="nav navbar-nav navbar">
									<?php include ($turl.'/menu.html');?>
									<li class="add-menu"><a >+</a></li>
								</ul>
							</div>

				</div>
			</div>

			<div id="body"><?php include ($turl.'/body.html');?></div>
			<div id="footer">
				<?php include ($turl.'/footer.html');?>
			</div>
		</div>


	</div>


<!-- The option Menu -->

<div id="page_option" style="display: none;" class="edit_option">
    <table style="">
        <caption style="font-weight: bold; text-align: center;">Page Control Options</caption>
        <tr>
            <td style=""></td><td><button class="btn btn-xs btn-danger"  id="page_delete_btn" >
                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete </button></td>
        </tr>

        <tr>
            <td>Page Name</td><td><input id="input_page_name" type="text"></td>
        </tr>


        <tr>
            <td>other Options</td><td>.........</td>
        </tr>
        <tr>
            <td>other Options</td><td>.........</td>
        </tr>

        <tr>
            <td><button class="btn btn-sm btn-success" id="page_save_btn">
                    <span class="glyphicon glyphicon-saved" aria-hidden="true"></span>Save</button>
            </td><td><button class="btn btn-xs btn-warning page_close_btn">Close</button></td>
        </tr>

    </table>
</div>

<style>
    #table_color_set tr:hover, td:hover
    {
        border: 3px solid #ffffff;
        font-weight: bold;
    }
    .color-set-color > span
    {
        display: inline-block;
        height: 30px;
        width: 20px;
    }
</style>
<!-- Color Option-->
<div id="background_option_image" class="edit_option" style="top: 325px;">
    <table style="">
        <caption style="font-weight: bold; text-align: center;">Chose Background</caption>

        <?php
        for($i=0;$i<4;$i++)
        {
            ?>
            <tr>
                <td class="color"></td><td class="color"></td><td class="color"></td>
            </tr>
        <?php
        }
        ?>




        </tr>

    </table>

    <button class="btn btn-xs btn-warning page_close_btn">Close</button>
</div>


<!-- Image Option-->
<div id="background_option_color" class="edit_option" style="top: 325px;">
    <table style="" id="table_color_set">
        <caption style="font-weight: bold; text-align: center;">Chose Color Set</caption>

<!--        <tr class="color-set">-->
<!--            <td  >cset1</td><td class="color-set-color">-->
<!--                <span  style="background: red;"></span><span style="background: green" ></span> <span style="background: gray" ></span>-->
<!--            </td>-->
<!--        </tr>-->
<!---->
<!--        <tr class="color-set">-->
<!--            <td  >cset2</td><td class="color-set-color">-->
<!--                <span  style="background: yellow;"></span> <span style="background: blue" ></span> <span style="background: silver" ></span>-->
<!--            </td>-->
<!--        </tr>-->


    </table>

    <button class="btn btn-xs btn-warning page_close_btn">Close</button>
</div>
<!-- Option Menu End -->

</body>






<script type="text/javascript">

$(function () {
    $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
    $('.tree li.parent_li > span').on('click', function (e) {
        var children = $(this).parent('li.parent_li').find(' > ul > li');
        if (children.is(":visible")) {
            children.hide('fast');
            $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
        } else {
            children.show('fast');
            $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
        }
        e.stopPropagation();
    });
});

$(function(){

    // Enabling Popover Example 1 - HTML (content and title from html tags of element)
    $("[data-toggle=popover]").popover();

    // Enabling Popover Example 2 - JS (hidden content and title capturing)
    $("#popoverExampleTwo").popover({
        html : true,
        content: function() {
          return $('#popoverExampleTwoHiddenContent').html();
        },
        title: function() {
          return $('#popoverExampleTwoHiddenTitle').html();
        }
    });

});


$(function(){
	/**
	 *
	 *Load menu item in tree view. By saif , Date  08-04-2015
	 */
		var treeMenu=$('#ul_tree_menu_list');

		var tempLi;
		$('#menu li').each(function(i, obj) {
			console.log(this);
			tempLi=$('<li></li>');
			tempLi.append('<span><i class="icon-time"></i> [+]</span>');
			tempLi.append(' &ndash; ');
			tempLi.append($(obj).html());
			treeMenu.append(tempLi);

		});

		treeMenu.find('li').last().addClass('add-menu');

		/**Making it Sortable using jquery UI*/

	 	$( "#ul_tree_menu_list" ).sortable({

	 		start: function(event, ui){
            iBefore = ui.item.index();
		    },
		    update: function(event, ui) {
		            iAfter = ui.item.index();
		            evictee = $('#menu li:eq('+iAfter+')');
		            evictor = $('#menu li:eq('+iBefore+')');

		            evictee.replaceWith(evictor);
		            if(iBefore > iAfter)
		                evictor.after(evictee);
		            else
		                evictor.before(evictee);
		    }

		 });

    /*
    *Add New Menu
    * */
		$(".add-menu").on('click',function(){
	        BootstrapDialog.show({
	            message: 'Give Menu Name: <input type="text" class="form-control">',
	            buttons: [{
	                label: 'Ok',
	                cssClass: 'btn-success',
	                action: function(dialogRef) {
			            	var newMenu = dialogRef.getModalBody().find('input').val();
			            	addNewMenu(newMenu);
			                dialogRef.close();
		                }
		            } ,
		            {
		                label: 'Cancel',
		                action: function(dialogRef) {
		                    dialogRef.close();
			            }
		            }
	            ]
	        });

		});




		$("div").on('click',function (e){

			 //alert(e.target.id);
			if(e.target.id=="container_header")
				 {
					 BootstrapDialog.alert("Clicked on "+e.target.id);
					 console.log(e.target.id);
					 console.log(e.target);
					 e.stopPropagation();
			 	 }
			});



    /*
    For All close Button
     */
    $(".page_close_btn").on('click',function(){
        $(this).closest('.edit_option').hide();
    });
    /*
     Page Options
     */
    var selectedPageIndex;
    $("#ul_tree_menu_list").on('dblclick','li',function(e){
        selectedPageIndex=$(this).index();
        if(selectedPageIndex == $("#ul_tree_menu_list li").size()-1)
        {
            return;
        }
//            console.log($(this).find("a").html());
        $("#input_page_name").val($(this).find("a").html());
        $("#page_option").toggle();

    });

    $("#page_delete_btn").on('click',function(){
        $("#ul_tree_menu_list li:eq("+selectedPageIndex+")").remove();
        $("#menu li:eq("+selectedPageIndex+")").remove();
        $("#page_option").hide();

    });
    $("#page_save_btn").on('click',function(){
        var pageName=$("#input_page_name").val();
        $("#ul_tree_menu_list li:eq("+selectedPageIndex+") a").html(pageName);
        $("#menu li:eq("+selectedPageIndex+") a").html(pageName);
        $("#page_option").hide();
    });

    /*
     Background Options
     */
    $(".color").each(function(i,obj){
        $(obj).css('background',getColor());
    });
    $("#li_background_color").on('dblclick',function(e){
        $("#background_option_color").toggle();
    });
    $("#li_background_image").on('dblclick',function(e){
        $("#background_option_image").toggle();
    });

    var colorSet=[
        ["Red Red ","FF0000","E80C7A","FF530D"],
        ["Blue as Sky","2421FF","9715FF","158DFF"],
        ["Set - 3","99FF5A","FFFC67","BFE852"],
    ];
    var textColor=[
        ["Red","FF0E08"],
        ["Blue","1310FF"],
        ["White","FFFFFF"],
        ["Black","000000"]
    ];
    var textfont=[
        "arial",
        "tahoma",
        "times new roman",
        "monospace",
        "Verdana"
    ];

    for(i=0; i< colorSet.length; i++) {
        var colorTd = $('<td class="color-set-color"> </td>');
        var cSpan = $('<span></span>');
        cSpan.css('background', '#' + colorSet[i][1]);
        $(colorTd).append(cSpan);

        cSpan = $('<span></span>');
        cSpan.css('background', '#' + colorSet[i][2]);
        $(colorTd).append(cSpan);

        cSpan = $('<span></span>');
        cSpan.css('background', '#' + colorSet[i][3]);
        $(colorTd).append(cSpan);
        colorTr=$('<tr>');
        colorTr.addClass('color-set');
        colorTr.append($('<td>' + colorSet[i][0] + '</td>'));
        colorTr.append(colorTd);
        $("#table_color_set").append(colorTr);
    }
    $(".color-set").on('click',function(){
        selected =$(this).index();
        $('#menu').css('background','#'+colorSet[selected][1]);
        $('#body').css('background','#'+colorSet[selected][2]);
        $('#footer').css('background','#'+colorSet[selected][3]);
    });


    /*
     Listenint To every Click and Setting the targetElement
     */
    var fontNColorTarget;
    $("#frame").on('click',function(e){
        console.log(e.target);
        fontNColorTarget= e.target;
    });

    for(i=0;i<textColor.length;i++)
    {
        tColor=$('<li> <span><i class="icon-time"></i> [+]</span> &ndash; </li> ');
        tColor.append($('<a  href="">'+textColor[i][0]+'</a>'));

        $("#ul_text_color").append(tColor);
    }
    $('#ul_text_color').on('click','li',function(e){
        e.preventDefault();
//        console.log($(this).index());
        e.stopPropagation();
        $(fontNColorTarget).css('color','#'+textColor[$(this).index()][1]);
    });

    for(i=0;i<textfont.length;i++)
    {
        tFont=$('<li> <span><i class="icon-time"></i> [+]</span> &ndash; </li> ');
        tFont.append($('<a  href="">'+textfont[i]+'</a>'));

        $("#ul_text_font").append(tFont);
    }

    $('#ul_text_font').on('click','li',function(e){
        e.preventDefault();
//        console.log($(this).index());
        e.stopPropagation();
        $(fontNColorTarget).css('font-family',textfont[$(this).index()]);
    });

    $('#save').on('submit',function(e){
        //e.preventDefault();
        $('#f_title').val($('#title').html());
        $('#f_header').val($('#header').html());
        $('#f_menu').val($('#menu').html());
        $('#f_body').val($('#body').html());
        $('#f_footer').val($('#footer').html());

        console.log( $('#html').val() );
    });

    // $("#frame").load("<?php echo $turl ?>");


});

function getColor()
{
    return '#'+(Math.random()*0xFFFFFF<<0).toString(16);
}


function addNewMenu(menuName)
{
    tempLi=$('<li></li>');
    tempLi.append('<span><i class="icon-time"></i> [+]</span>');
    tempLi.append(' &ndash; ');
    tempLi.append('<a>'+menuName+'</a>');

    $("#ul_tree_menu_list").find('li').last().before(tempLi);

    tempLi=$('<li></li>');
    tempLi.append('<a onclick=\"onMenuClick(this);\">'+menuName+'</a>');

    $("#menu").find('li').last().before(tempLi);

    console.log(menuName);
}



</script>

</html>