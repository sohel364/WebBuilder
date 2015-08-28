<?php
error_reporting(E_ERROR);
        $category;
        $template;
        $template_id;
        
        
        
        
        
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
        if(isset($_POST['templateid'])) {
            $template_id = $_POST['templateid'];
        } else if(isset($_GET['templateid'])){
            $template_id = $_GET['templateid'];
        }
        
        $isInEditor = false;
        
//        echo  $category."</br>";
//        echo  $template_id;
//        
//        return;
        
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Update Template</title>
    <script  src="../../js/tinymce/tinymce.min.js" ></script>
	<script  src="../../js/jquery-2.1.1.min.js" ></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script  src="../../js/bootstrap-dialog.js" ></script>
	<script  src="../../js/jquery-ui.min.js" ></script>

	<script type="text/javascript">
            var template_id = '<?php echo $template_id;?>';
            var isView = true;
	</script>
        <script  src="../../js/savePage.js" ></script>
        <script  src="../../js/menu.js" ></script>
    

  	<link href="../../css/bootstrap.min.css" rel="stylesheet"/>
	<link href="../../css/bootstrap-dialog.css" rel="stylesheet"/>
	<link href="../../css/jquery-ui.min.css" rel="stylesheet"/>
	
	<script src="../../js/drag_drop.js"></script>
	<script src="../../js/outside-click.js"></script>
	
	<link href="../../css/drag_drop_style.css" rel="stylesheet" />
	<link href="../../css/spectrum.css" rel="stylesheet" />

	<link rel="stylesheet" type="text/css" href="<?php echo  $css?>"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>

<style>

#frame
{
	background:rgba(0,0,0,.1);
	float:left;
	height: 100%;
	width: 72%;
	padding: 5px;
        margin-left: 14%;
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
									<?php include ('user_menu.php');?>
								</ul>
							</div>

				</div>
			</div>

			<div id="body" contentEditable="false"><?php include ($turl.'/body.html');?></div>
                        <!--<div id="test_removable"><!--?php include 'user_menu.php'?></div> -->
			<div id="footer">
				<?php include ($turl.'/footer.html');?>
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



</html>