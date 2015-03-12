<?php
	$dirs=scandir("./templates");
	echo "Available Tempalates<br/>";

	for($i=2;$i<sizeof($dirs);$i++)
	{
		echo '<a href="./manager/content_manager/content_manager.php?template='.$dirs[$i].'">'.$dirs[$i].'</a> <br/>';
	}

?>