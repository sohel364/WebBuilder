<?php 
    //session_start();
    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] ."/WebBuilder";
?>

<?php include_once '../../common_html_headercontent.php'; ?>

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
                                                <a href="<?php echo $baseUrl;?>/views/content_views/template_editor.php?category=<?php echo $dirs[$i] ?>&template=<?php echo $templates[$j] ?>" >
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

                <div id="content" style="padding-left: 350px;padding-top: 20px">
                    <h1>Others</h1>
                    <h3>This page is under construction</h3>
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