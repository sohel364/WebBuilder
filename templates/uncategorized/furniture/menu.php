<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
<div class="header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-default mynavbar">
            <div class="container-fluid"> 
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              </div>
             
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul id="menu" class="nav navbar-nav">
                      <li class="active"><a href="#" onclick="onMenuClick(this);">Home</a></li>
                  <li><a href="#" onclick="onMenuClick(this);">Catalogue</a></li>
                  <li><a href="#" onclick="onMenuClick(this);">Blog</a></li>
                  <li><a href="#" onclick="onMenuClick(this);">About Us</a></li>
                  <li class="add-menu"><a>+</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><img src="<?php echo $turl.'/';?>images/cart.png" alt="cart"></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#">Login</a></li>
                  <li><a href="#">Register</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right myrightnav">
                  <li><a href="#"><img src="<?php echo $turl.'/';?>images/Facebook.png" alt="facebook"></a></li>
                  <li><a href="#"><img src="<?php echo $turl.'/';?>images/twitter.png" alt="twitter"></a></li>
                  <li><a href="#"><img src="<?php echo $turl.'/';?>images/google-plus.png" alt="google_plus"></a></li>
                  <li><a href="#"><img src="<?php echo $turl.'/';?>images/Pinterest.png" alt="pinterest"></a></li>
                </ul>
              </div> 
            </div> 
          </nav>
          <!--<nav>
              <aside class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mynavbar">
              	<ul>
                	<li class="active"><a href="#">Home</a></li>
                  <li><a href="#">Catalogue</a></li>
                  <li><a href="#">Blog</a></li>
                  <li><a href="#">About Us</a></li>
                </ul>	
              </aside>
              <aside class="col-xs-12 col-sm-3 col-md-3 col-lg-3 myrightnav">
              	<ul>
                  <li><a href="#"><img src="images/Facebook.png" alt="facebook"></a></li>
                  <li><a href="#"><img src="images/twitter.png" alt="twitter"></a></li>
                  <li><a href="#"><img src="images/google-plus.png" alt="google_plus"></a></li>
                  <li><a href="#"><img src="images/Pinterest.png" alt="pinterest"></a></li>
                </ul>
                <ul class="col-xs-12 col-sm-2 col-md-2 col-lg-2 myrightnav">
                  <li><a href="#">Login</a></li>
                  <li><a href="#">Register</a></li>
                </ul>
                 <ul>
                  <li><img src="images/cart.png" alt="cart"></li>
                </ul>
              </aside>
		 </nav>-->
        </div>
      </div>
    </div>
  </div>

