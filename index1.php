<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Builder</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
		<link href="css/bootstrap-combined.min.css" rel="stylesheet" />
		<link href="css/main.cs" rel="stylesheet" />
		
  </head>
  <body>
		<div class="container">
		    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Web Builder</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="#">Account</a></li>
            <li><a href="#">Billing</a></li>
						<li><a href="#">Notes</a></li>
						<li><a href="#">Others</a></li>
          </ul>
          <ul class="nav navbar-nav pull-right">
					<li class="dropdown">
						<a class="dropdown-toggle" href="#" data-toggle="dropdown">Sign In <strong class="caret"></strong></a>
						<div class="dropdown-menu" style="padding: 15px; padding-bottom: 5pxpx;">
							<form method="post" action="login" accept-charset="UTF-8">
								<input style="margin-bottom: 15px;" type="text" placeholder="Username" id="username" name="username">
								<input style="margin-bottom: 15px;" type="password" placeholder="Password" id="password" name="password">
								<input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
								<label class="string optional" for="user_remember_me"> Remember me</label>
								<input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In">
							
							</form>
						</div>
					</li>
						<li>
							<form class="navbar-form navbar-left" role="search">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Search for...">
      						<span class="input-group-btn">
        					<button class="btn btn-default" type="button">Go!</button>
      						</span>
								</div>
      </form></li>
				</ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
			
			<div class="row" style="padding-top:60px;">
							<div class="col-sm-3" style="  padding-right: 0px;">
								<div class="panel-group" style="padding-top:0px;" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="text-decoration: none;">
          <span class="glyphicon glyphicon-minus"></span>
          Collapsible Group Item #1
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="text-decoration: none;">
          <span class="glyphicon glyphicon-plus"></span>
          Collapsible Group Item #2
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="text-decoration: none;">
          <span class="glyphicon glyphicon-plus"></span>
          Collapsible Group Item #3
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

							</div>
				
				<div class="col-sm-9">
					<div id="carousel-Web-Builder" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-Web-Builder" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-Web-Builder" data-slide-to="1"></li>
    <li data-target="#carousel-Web-Builder" data-slide-to="2"></li>
  </ol>
 
  
  <div class="carousel-inner">
    <div class="item active">
      <img src="images/sl1.jpg" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text1</h3>
      </div>
    </div>
    <div class="item">
      <img src="images/sl2.jpg" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text2</h3>
      </div>
    </div>
    <div class="item">
      <img src="images/sl3.jpg" alt="...">
      <div class="carousel-caption">
          <h3>Caption Text3</h3>
      </div>
    </div>
  </div>
 
  
  <a class="left carousel-control" href="#carousel-Web-Builder" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-Web-Builder" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div> 
				</div>
							
						</div>
		
		

    </div>
		
		
    <nav class="navbar navbar-default navbar-bottom text-center"> <!--footer-->
        <p class="text-muted credit" style="padding-top:10px">Basic footer</p>
    </nav>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
		<script src="js/MenuDropDown.js"></script>
		<script src="js/CatPanel.js"></script>
  </body>
</html>