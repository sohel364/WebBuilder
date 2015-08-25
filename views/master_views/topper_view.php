<?php
session_start();
$user_id = NULL;
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
$baseUrl = "http://" . $_SERVER['SERVER_NAME'] ."/WebBuilder";
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?Php echo $baseUrl?>" style="color: ORANGE;weight:bold;font-size:36px">Web Builder</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav" style="font-family: arial,cursive">
                <li class="active"><a href="<?Php echo $baseUrl?>">Home<span class="sr-only">(current)</span></a></li>
                <?php 
                    if($user_id != NULL) {
                ?>
                <li><a href="#">Account</a></li>
                <li><a href="#">Billing</a></li>
                <?php 
                    }
                ?>
                <li><a href="#">Notes</a></li>
                <li><a href="#">Others</a></li>
                <?php 
                    if($user_id != NULL) {
                ?>
                <li><a href="<?Php echo $baseUrl."/views/content_views/saved_pages.php"?>">Saved Pages</a></li>
                <?php 
                    }
                ?>
            </ul>
            <ul class="nav navbar-nav pull-right" style="font-family: arial,cursive;font-size: 14px">
                <?php 
                    if($user_id != NULL) {
                ?>
                <li>
                    <a class="dropdown-toggle btn" onclick="logout()" style="border: 1px solid rgba(186, 220, 255, 0.83);">Log out</a>
                    <div id="regformstatus"></div>
                </li>
                <?php 
                    } else {
                ?>
                <li>
                    <a class="dropdown-toggle btn" href="#signup" data-toggle="modal" data-target=".bs-modal-sm" style="border: 1px solid rgba(186, 220, 255, 0.83);">Sign In/Registration</a>
                    <div id="regformstatus"></div>
                </li>
                <?php 
                    }
                ?>
                <li>
                    <form class="navbar-form navbar-left" role="search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div>
                    </form>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

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
                        <label id="lbl_status" style="visibility: hidden"></label>
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
                                        <input type="button" id="signin" class="btn btn-success" onclick="signIn()" value="Sign in"/>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="signup">
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
                                        <button id="confirmsignup" name="confirmsignup" class="btn btn-success" onclick="signUp()">Sign Up</button>
                                    </div>
                                </div>
                            </fieldset>
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

