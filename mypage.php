<?php 
session_start( );

if(!isset($_SESSION['isLogged']))
{
	header('Location: ./../user_manager/login.php');
				
}
else 
{
	include './manager/user_Manager/HtmlHelper.php';
	
	$helper=new HTMLHelper();
	$html=$helper->readHtmlFromDB($_SESSION['id']);
	echo $html;
}



?>