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