<?php 
	if(mysql_connect("192.186.247.3","Sohel","Web@sohel0406")){
		echo "Connected to Server";
		
		if(mysql_select_db("WebBuilder")){
			echo "Database Found";
		}
	}
?>