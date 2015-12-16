<?php 
    //session_start();
    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] ."/WebBuilder";
?>

<?php include_once '../../common_html_headercontent.php'; ?>

        <div class="container">
            <?php include_once '../master_views/topper_view.php'; ?>          
            <div class="row" style="padding-top:60px;">             
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
                            echo 'There are no tamplates found';
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
                                                                <button type="submit" class="btn btn-primary" onclick="location.href='../content_views/template_editor.php?category=<?php echo $template->getCategoryName();?>&template=<?php echo $template->getTemplateName();?>&templateid=<?php echo $template->getTemplateID();?>'">Edit</button>
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