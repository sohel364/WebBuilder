<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div id="container" name="container" style="height: 1200px">
<header>
  <div class="whitepart">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!--<nav class="navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
              <a class="navbar-brand navbar-left" href="#"><img class="img-responsive" src="images/furniture.png" alt="furniture"></a> </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <div id="custom-search-input">
                    <div class="input-group col-lg-4">
                      <input type="text" class="form-control" placeholder="Type keywords" />
                      <span class="input-group-btn">
                      <button class="btn btn-info" type="button"> Search </button>
                      </span> </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>-->
          <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
          	<h1><a href="#"><img class="img-responsive" src="<?php echo $turl.'/';?>images/furniture.png" alt="furniture"></a></h1>
          </aside>
          <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
          	<div id="custom-search-input">
                    <div class="input-group col-lg-4">
                      <input type="text" class="form-control" placeholder="Type keywords" />
                      <span class="input-group-btn">
                      <button class="btn btn-info" type="button"> Search </button>
                      </span> </div>
                  </div>
          </aside>
          <div class="main-nav">
          	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
      <ul class="nav navbar-nav">
        <li><a href="#">home<i class="fa fa-home"></i></a></li>
        <li><a href="#">furniture<i class="fa fa-bed"></i></a></li>
        <li><a href="#">features<i class="fa fa-star"></i></a></li>
        <li><a href="#">blog<i class="fa fa-rss"></i></a></li>
        <li><a href="#">about<i class="fa fa-question-circle"></i></a></li>
        <li><a href="#">contact<i class="fa fa-mobile"></i></a></li>
        <li class="active"><a href="#">view my wishlist<i class="fa fa-gift"></i></a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!--slider strats here-->
<section class="banner">
  <div id="myCarousel" class="carousel slide" data-ride="carousel"> 
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img class="first-slide" src="<?php echo $turl.'/';?>images/banner.jpg" alt="First slide">
        <div class="container">
          <div class="carousel-caption">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean ma ssa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
          </div>
        </div>
      </div>
      <div class="item"> <img class="second-slide" src="<?php echo $turl.'/';?>images/banner1.jpg" alt="Second slide">
        <div class="container">
          <div class="carousel-caption">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean ma ssa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
          </div>
        </div>
      </div>
      <div class="item"> <img class="third-slide" src="<?php echo $turl.'/';?>images/banner2.jpg" alt="Third slide">
        <div class="container">
          <div class="carousel-caption">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean ma ssa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
          </div>
        </div>
      </div>
      <div class="item"> <img class="fourth-slide" src="<?php echo $turl.'/';?>images/banner3.jpg" alt="fourth slide">
        <div class="container">
          <div class="carousel-caption">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean ma ssa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
          </div>
        </div>
      </div>
    </div>
   </div>
  <!-- /.carousel --> 
</section>
<!--banner part ends-->
<div class="clearfix"></div>
<!--welcome part starts-->
<section class="welcome">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
				<div class="page-header" name="textarea">
                    <h1>Welcome to our store</h1>
                </div>
                <p name="textarea">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. </p>
    		</div>
    	</div>
    </div>
</section>
<!--welcome part ends-->
<div class="clearfix"></div>
<!--newsletter part starts-->
<section class="five_boxes">
	<div class="container">
    	<div class="row">
        	<div class="copl-lg-12">
            	<aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="mg-img" name = "image">
                	<figure>
                    	<img src="<?php echo $turl.'/';?>images/img1.jpg" alt="img1">
                    </figure>
                    <div class="caption">
                    	<h4>Dine with your family</h4>
                        <ul>
                        	<li><img src="<?php echo $turl.'/';?>images/rating.png" alt="rating"></li>
                            <li class="price">$1500</li>
                            <li class="shop">Shop Now</li>
                        </ul>
                    </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="mg-img" name = "image">
                    <figure>
                    	<img src="<?php echo $turl.'/';?>images/img1.jpg" alt="img1">
                    </figure>
                    <div class="caption">
                    	<h4>Your Bedroom lives here</h4>
                        <ul>
                        	<li><img src="<?php echo $turl.'/';?>images/rating.png" alt="rating"></li>
                            <li class="price">$1500</li>
                            <li class="shop">Shop Now</li>
                        </ul>
                    </div>
                    </div>
                </aside>
                <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                	<div class="mg-img big-img" name="image">
                    	<figure>
                       		<img src="<?php echo $turl.'/';?>images/img3.jpg" alt="img3"> 
                        </figure>
                        <div class="caption">
                    	<h4>Your Bedroom lives here</h4>
                        <ul>
                        	<li><img src="<?php echo $turl.'/';?>images/rating.png" alt="rating"></li>
                            <li class="price">$1500</li>
                            <li class="shop">Shop Now</li>
                        </ul>
                    </div>
                    </div>
                </aside>
                <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                	<div class="newsletter" name= "textarea">
                    	<div class="newsletter_inner">
                        	<h2>newsletter sign up</h2>
                            <p>Get exclusive deals straight to your inbox</p>
                            <div class="form-group">
                            <input type="email" placeholder="Enter your email id" class="form-control" >
                            </div>
                            <input type="submit" value="Submit" name="submit">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="tips" name="textarea">
                    	<div class="tips_inner">
                        	<h2>need decorating tips?</h2>
                            <a href="#">Contact Us</a>
                            <ul>
                            	<li>Aenean commodo ligula eget dolor</li>
                                <li>Cum sociis natoque penatibus et magnis</li>
                                <li>Nulla consequat massa quis enim</li>
                            </ul>
                        </div>
                    </div>
                </aside>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<!--newsletter part ends-->
<div class="clearfix"></div>
<!--tabpart starts here-->
<section class="tabsection">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12" name="textarea">
            	<ul class="col-md-offset-3 col-lg-offset-3 nav nav-pills text-uppercase">
                    <li class="active"><a data-toggle="pill" href="#popular">popular</a></li>
                    <li><a data-toggle="pill" href="#newarrivals">new arrivals</a></li>
                    <li><a data-toggle="pill" href="#bestellers">best sellers</a></li>
                    <li><a data-toggle="pill" href="#special">special</a></li>
                </ul>
                <div class="tab-content">
                  <div id="popular" class="tab-pane fade in active">
                    <ul id="flexiselDemo3">
                      <li>
                      	<img src="<?php echo $turl.'/';?>images/gal1.jpg" alt=""/>
                      	<h3>Lorem ipsum</h3>
                        <p>$&nbsp;1500</p>
                        <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        	<figure>
                            	<img src="<?php echo $turl.'/';?>images/rating2.png" alt="rating">
                            </figure>
                        </aside>
                         <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<a href="#"><img src="<?php echo $turl.'/';?>images/buy.png" alt="buy"></a>
                            <a class="addtocart" href="#"><img src="<?php echo $turl.'/';?>images/cart2.png" alt="cart"></a>    
                        </aside>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                      	<img src="<?php echo $turl.'/';?>images/gal2.jpg" alt=""/>
                        <h3>Lorem ipsum</h3>
                        <p>$&nbsp;1500</p>
                        <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        	<figure>
                            	<img src="<?php echo $turl.'/';?>images/rating2.png" alt="rating">
                            </figure>
                        </aside>
                         <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<a href="#"><img src="<?php echo $turl.'/';?>images/buy.png" alt="buy"></a>
                            <a class="addtocart" href="#"><img src="<?php echo $turl.'/';?>images/cart2.png" alt="cart"></a>    
                        </aside>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                      	<img src="<?php echo $turl.'/';?>images/gal3.jpg" alt=""/>
                        <h3>Lorem ipsum</h3>
                        <p>$&nbsp;1500</p>
                        <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        	<figure>
                            	<img src="<?php echo $turl.'/';?>images/rating2.png" alt="rating">
                            </figure>
                        </aside>
                         <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<a href="#"><img src="<?php echo $turl.'/';?>images/buy.png" alt="buy"></a>
                            <a class="addtocart" href="#"><img src="<?php echo $turl.'/';?>images/cart2.png" alt="cart"></a>    
                        </aside>
                        <div class="clearfix"></div>
                      </li>
                      <li>
                      	<img src="<?php echo $turl.'/';?>images/gal4.jpg" alt=""/>
                        <h3>Lorem ipsum</h3>
                        <p>$&nbsp;1500</p>
                        <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        	<figure>
                            	<img src="<?php echo $turl.'/';?>images/rating2.png" alt="rating">
                            </figure>
                        </aside>
                         <aside class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
							<a href="#"><img src="<?php echo $turl.'/';?>images/buy.png" alt="buy"></a>
                            <a class="addtocart" href="#"><img src="<?php echo $turl.'/';?>images/cart2.png" alt="cart"></a>    
                        </aside>
                        <div class="clearfix"></div>
                      </li>
                    </ul>
                  </div>
                  <div id="newarrivals" class="tab-pane fade">
                    <h3>Menu 1</h3>
                    <p>Some content in menu 1.</p>
                  </div>
                  <div id="bestellers" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div>
                  <div id="special" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--tabpart ends here-->
<div class="clearfix"></div>
<!--manufactures part starts here-->
<section class="manufacturers">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
            	<h2>Manufacturers</h2>
                <ul id="flexiselDemo2"> 
                    <li><img src="<?php echo $turl.'/';?>images/logo1.jpg" alt="logo1"/></li>   
                    <li><img src="<?php echo $turl.'/';?>images/logo2.jpg" alt="logo2"/></li> 
                    <li><img src="<?php echo $turl.'/';?>images/logo3.jpg" alt="logo3"/></li> 
                    <li><img src="<?php echo $turl.'/';?>images/logo4.jpg" alt="logo4"/></li> 
                    <li><img src="<?php echo $turl.'/';?>images/logo5.jpg" alt="logo5"/></li>                    
                    <li><img src="<?php echo $turl.'/';?>images/logo6.jpg" alt="logo6"/></li>                                                      
                </ul>
            </div>
        </div>
    </div>
</section>
<!--manufactures part ends here-->
<div class="clearfix"></div>
<!--greypart starts here-->
<section class="greypart">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-12">
            	<aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 three_boxes">
                	<img src="<?php echo $turl.'/';?>images/safe.png" alt="safe&secure">
                    <h2>Safe & Secure</h2>
                    <p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit. Aenean co mmodo ligula eget dolor</p>
                </aside>
                <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 three_boxes">
                	<img src="<?php echo $turl.'/';?>images/moneyback.png" alt="moneyback">
                    <h2>Money back Guarantee</h2>
                    <p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit. Aenean co mmodo ligula eget dolor</p>
                </aside>
                <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 three_boxes">
                	<img src="<?php echo $turl.'/';?>images/shipping.png" alt="freeshipping">
                    <h2>Free Shipping</h2>
                    <p>Lorem ipsum dolor sit amet, cons ectetuer adipiscing elit. Aenean co mmodo ligula eget dolor</p>
                </aside>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</section>
<!--greypart ends here-->
<div class="clearfix"></div>
</div>
