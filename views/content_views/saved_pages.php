<!DOCTYPE html>
<?php 
session_start();
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web Builder</title>


        <!-- Bootstrap -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../css/bootstrap-combined.min.css" rel="stylesheet" />
        <link href="../../css/overlay-bootstrap.css" rel="stylesheet" />
        <link href="../../css/overlay-bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <?php include_once '../master_views/topper_view.php'; ?>
            
            <div class="row" style="padding-top:60px;">
                <div class="col-sm-3" style="  padding-right: 0px;">
                    <div class="panel-group" style="padding-top:0px;" id="accordion">
                        <?php
                        $dirs = scandir("../../templates");
                        //echo "Available Tempalates<br/>";
                        //print_r($dirs);
                        for ($i = 2; $i < sizeof($dirs); $i++) {
                            ?>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php if ($i == 2) {
                            echo "One";
                        } else {
                            echo "Two";
                        } ?>" style="text-decoration: none;">
                                            <?php if ($i == 2) { ?>
                                                <span class="glyphicon glyphicon-minus"></span>
    <?php } else { ?>
                                                <span class="glyphicon glyphicon-plus"></span>
    <?php }echo $dirs[$i] ?>
                                        </a>
                                    </h4>
                                </div>

                                <div id="collapse<?php if ($i == 2) {
        echo "One";
    } else {
        echo "Two";
    } ?>" class="panel-collapse <?php if ($i == 2) echo "collapse in";
    else echo "collapse" ?>" >
    <?php
    $templates = scandir("../../templates/$dirs[$i]");
    for ($j = 2; $j < sizeof($templates); $j++) {
        ?>


                                        <div class="panel-body">
                                            <span>
                                                <a href="./views/content_views/template_editor.php?
                                                   category=<?php echo $dirs[$i] ?>&template=<?php echo $templates[$j] ?>" >
                                        <?php echo $templates [$j] ?>
                                                </a>
                                            </span> 
                                        </div>

                                <?php
                            }
                            ?>
                                </div>
                            </div>		
    <?php
}
?>


                    </div>

                </div>

                <div id="user_template_list" style="padding-left: 350px;padding-top: 20px">
                    <h3>Saved Templates</h3>
                    <?php 
                    require_once '../../manager/content_manager/template_manager.php';
                    require_once '../../objects/ObjTemplate.php';
                        $user_id = NULL;
                        if (isset($_SESSION['user_id'])) {
                            $user_id = $_SESSION['user_id'];
                        }
                        $templateManager = new TemplateManager();
                        $templateList = $templateManager->loadUserTemplates($user_id);
                        if($templateList == NULL || count($templateList) <= 0) {
                            echo 'There is no tamplates found';
                        } else {
                            //echo count($templateList);
                            foreach ($templateList as $template) {
                                if($template != null) {
                    ?>
                                    <div style="float:left;background-color:#f5f5f5;border-radius: 5px;border-radius: 5px;margin-right:10px; color:#5fcf80; width: 23%; margin-top: 10px" class="col-sm-2">
                                            <div class="thumbnail">
                                                        <img src="../../images/screen_shot_template_black.png">
                                                        <div class="caption" id="caption-half-down">
                                                            <?php
                                                                $name = $template->getTemplateSavedName();
                                                                if($name == NULL) {
                                                                    $name = 'Name NULL';
                                                                }
                                                                if($name == NULL || count($name) <= 0) {
                                                                    $name = $template->getTemplateID();
                                                                } 
                                                                echo $name;
                                                            ?>
                                                                <!--Name of the template-->				
                                                        </div>
                                                        <div class="caption" id="caption-half-up">
                                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                                <button type="submit" class="btn btn-primary" onclick="location.href='../user_views/user_template_viewer.php?category=<?php echo $template->getCategoryName();?>&template=<?php echo $template->getTemplateName();?>&templateid=<?php echo $template->getTemplateID();?>'">View</button>
                                                        </div>

                                            </div>  
                                        </div>     
                    <?php
                                }
                            }
                        }
                    ?>
                           
                </div>
                
                <?php// include_once '../../manager/content_manager/user_template_list.php'; ?>
                
            </div>

            <br/>		

            <nav class="navbar navbar-default navbar-bottom text-center"> <!--footer-->
                <p class="text-muted credit" style="padding-top:10px">CopyRight@SSS.ORG</p>
            </nav>

            <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
            <!-- Include all compiled plugins (below), or include individual files as needed -->
            <script src="../../js/bootstrap.min.js"></script>
            <script src="../../js/MenuDropDown.js"></script>
            <script src="../../js/CatPanel.js"></script>
    </body>
</html>