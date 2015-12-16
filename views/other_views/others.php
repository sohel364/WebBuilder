<?php 
    //session_start();
    $baseUrl = "http://" . $_SERVER['SERVER_NAME'] ."/WebBuilder";
?>

<?php include_once '../../common_html_headercontent.php'; ?>

        <div class="container">
            <?php include_once '../master_views/topper_view.php'; ?>          
            <div class="row" style="padding-top:60px;">
 
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