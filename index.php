
 <?php
   echo "Let's make some script";
    
    if(empty($_REQUEST['username']) || empty($_REQUEST['password'])){
        echo "Not set";
    }
    else{
        echo $_REQUEST['username'];
        echo $_REQUEST['password'];
        
    }
   
    echo '<br/>';
    echo '<br/>';
    echo '<br/>';

?>
<?php include_once 'common_html_headercontent.php'; ?>
<div class="container">
    	<?php include_once './views/master_views/topper_view.php'; ?>			
<div class="row" style="padding-top:60px;">
<div class="col-sm-3" style="  padding-right: 0px;">
	<div class="panel-group" style="padding-top:0px;" id="accordion">
<?php
		$dirs=scandir("./templates");
		//echo "Available Tempalates<br/>";
		//print_r($dirs);
		
		//return;
		for($i=2;$i<sizeof($dirs);$i++)
		{		
?>

	  <div class="panel panel-default">
		<div class="panel-heading">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php if($i==2){echo "One";} else if($i==3) {echo "Two";} else if($i==4) {echo "Three";} else if($i==5) {echo "Four";} ?>" style="text-decoration: none;">
			  <?php if($i==2){?>
			  <span class="glyphicon glyphicon-minus"></span>
			  <?php } else {?>
			  <span class="glyphicon glyphicon-plus"></span>
			  <?php }echo $dirs[$i] ?>
			</a>
		  </h4>
		</div>
			
		<div id="collapse<?php if($i==2){ echo "One";} else if($i==3) 
		{ echo "Two";} else if($i==4) { echo "Three";} else if($i==5) 
		{ echo "Four";}?>" class="panel-collapse <?php if($i==2) echo "collapse in";else echo "collapse"?>" >
		<?php 
		$templates=scandir("./templates/$dirs[$i]");	
		for($j=2; $j<sizeof($templates);$j++)
		{
		?>
		
		
		  <div class="panel-body">
			       <span>
			       <a href="./views/content_views/template_editor.php?
					category=<?php echo $dirs[$i] ?>&template=<?php echo $templates[$j] ?>" >
						<?php echo $templates	[$j] ?>
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
				
<div class="col-sm-9">
	<div id="carousel-Web-Builder" class="carousel slide" data-ride="carousel">
  
	  <ol class="carousel-indicators">
	    <li data-target="#carousel-Web-Builder" data-slide-to="0" class="active"></li>
	    <li data-target="#carousel-Web-Builder" data-slide-to="1"></li>
	    <li data-target="#carousel-Web-Builder" data-slide-to="2"></li>
		<li data-target="#carousel-Web-Builder" data-slide-to="3"></li>
	  </ol>
	 
	  
	  <div class="carousel-inner">
	    <div class="item active">
	      <img src="images/sl1.png" alt="...">
	      <div class="carousel-caption">
	          <!-- <h3>Caption Text1</h3>  -->
	      </div>
	    </div>
	    <div class="item">
	      <img src="images/sl2.jpg" alt="...">
	      <div class="carousel-caption">
	          <!-- <h3>Caption Text2</h3> -->
	      </div>
	    </div>
	    <div class="item">
	      <img src="images/sl3.jpg" alt="...">
	      <div class="carousel-caption">
	         <!--  <h3>Caption Text3</h3> -->
	      </div>
	    </div>
   	    <div class="item">
	      <img src="images/sl4.jpg" alt="...">
	      <div class="carousel-caption">
	         <!--  <h3>Caption Text3</h3> -->
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
<?php
	for($i=0;$i<3;$i++){ 
?>
<div class="row" style="padding-top:60px;text-align: right; font-size: medium">Category : XYZ</div>
<div class="row" style="padding-top:10px;">
	<div class="col-sm-2" style="float:right;background-color:#f5f5f5;border-radius: 5px;border-radius: 5px;margin-right:13px; color:#5fcf80">
		<div class="thumbnail">
			<img src="images/test.png" />
			<div class="caption" id="caption-half-down">
				Name of the template				
			</div>
			<div class="caption" id="caption-half-up">
				 <button type="submit" class="btn btn-primary">Edit</button>
				 <button type="submit" class="btn btn-primary">View</button>
			</div>
		</div>  
	
	</div>
	
	<div class="col-sm-2" style="float:right;background-color:#f5f5f5;border-radius: 5px;border-radius: 5px;margin-right:13px; color:#5fcf80">
		  
		  <div class="thumbnail">
			<img src="images/test.png" />
			<div class="caption" id="caption-half-down">
				Name of the template				
			</div>
			<div class="caption" id="caption-half-up">
				<button type="submit" class="btn btn-primary">Edit</button>
				 <button type="submit" class="btn btn-primary">View</button>
			</div>
		  </div>  
	</div>
	
	<div class="col-sm-2" style="float:right;background-color:#f5f5f5;border-radius: 5px;border-radius: 5px;margin-right:13px; color:#5fcf80">
		  <div class="thumbnail">
			<img src="images/test.png" />
			<div class="caption" id="caption-half-down">
				Name of the template				
			</div>
			<div class="caption" id="caption-half-up">
				<button type="submit" class="btn btn-primary">Edit</button>
				 <button type="submit" class="btn btn-primary">View</button>
			</div>
		</div>  
	</div>
	
	<div class="col-sm-2" style="float:right;background-color:#f5f5f5;border-radius: 5px;border-radius: 5px;margin-right:13px; color:#5fcf80">
	  <div class="thumbnail">
			<img src="images/test.png" />
			<div class="caption" id="caption-half-down">
				Name of the template				
			</div>
			<div class="caption" id="caption-half-up">
				<button type="submit" class="btn btn-primary">Edit</button>
				 <button type="submit" class="btn btn-primary">View</button>
			</div>
	 </div>  
	</div>
		
</div>
<?php
	} 
?>

<br/>		
		
	 <nav class="navbar navbar-default navbar-bottom text-center"> <!--footer-->
	     <p class="text-muted credit" style="padding-top:10px">CopyRight@SSS.ORG</p>
	 </nav>
	
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	 <!-- Include all compiled plugins (below), or include individual files as needed -->
	   <script src="js/bootstrap.min.js"></script>
	<script src="js/MenuDropDown.js"></script>
	<script src="js/CatPanel.js"></script>
	</body>
</html>