<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web Builder</title>

        <script type="text/javascript" src="./js/main.js"></script>


        <!-- Bootstrap -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" />
        <link href="../../css/bootstrap-combined.min.css" rel="stylesheet" />
        <link href="../../css/overlay-bootstrap.css" rel="stylesheet" />
        <link href="../../css/overlay-bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>
        <div class="container">
            <?php include_once '../master_views/topper_view.php'; ?>

            <!--sign up/registration code start-->
            <div class="modal fade bs-modal-sm" style="padding-top: 150px;" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <br>
                        <div class="bs-example bs-example-tabs">
                            <ul id="myTab" class="nav nav-tabs">
                                <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
                                <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
                            </ul>
                        </div>
                        <div class="modal-body">
                            <div id="myTabContent" class="tab-content">

                                <div class="tab-pane fade active in" id="signin">
                                    <form class="form-horizontal" action=""> <!--onsubmit="#"-->
                                        <fieldset>
                                            <!-- Sign In Form -->
                                            <!-- Text input-->
                                            <div class="control-group">

                                                <div class="controls control-label">
                                                    <input required="" id="userid" name="userid" type="text" class="form-control" placeholder="User Name Or Email" class="input-medium" required="">
                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            <div class="control-group">

                                                <div class="controls control-label">
                                                    <input required="" id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="*********************" class="input-medium">
                                                </div>
                                            </div>

                                            <!-- Multiple Checkboxes (inline) -->
                                            <div class="control-group">
                                                <div class="controls">
                                                    <label class="checkbox inline" style="padding-left:20px;" for="rememberme-0">
                                                        <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">
                                                        Remember me
                                                    </label>
                                                </div>
                                            </div>

                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="confirmsignup"></label>
                                                <div class="controls">
                                                    <button id="signin" name="signin" class="btn btn-success" onclick="SignIn()" >Sign In</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="signup">
                                    <form class="form-horizontal" action="" onsubmit="SignUp()">
                                        <fieldset>
                                            <!-- Sign Up Form -->
                                            <!-- Text input-->
                                            <div class="control-group">
                                                <div class="controls control-label">
                                                    <input id="Email" name="Email" class="form-control" type="text" placeholder="Name@domain.com" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <div class="controls control-label">
                                                    <input id="userid_reg" name="userid_reg" class="form-control" type="text" placeholder="User Name" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- Password input-->
                                            <div class="control-group">
                                                <div class="controls control-label">
                                                    <input id="password_reg" name="password_reg" class="form-control" type="password" placeholder="Enter Password" class="input-large" required="">
                                                </div>
                                            </div>

                                            <!-- Text input-->
                                            <div class="control-group">
                                                <div class="controls control-label">
                                                    <input id="reenterpassword" class="form-control" name="reenterpassword" type="password" placeholder="Re-enter Password" class="input-large" required="">
                                                </div>
                                            </div>


                                            <!-- Button -->
                                            <div class="control-group">
                                                <label class="control-label" for="confirmsignup"></label>
                                                <div class="controls">
                                                    <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <center>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </center>
                        </div>
                    </div>
                </div>
            </div> <!--modal-->
            <!--sign up/registration code end-->



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
                    <?php include_once '../../manager/content_manager/user_template_list.php'; ?>
                </div>
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