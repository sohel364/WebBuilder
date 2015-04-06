<?php 
session_start( );

if(!isset($_SESSION['isLogged']))
{
	header('Location: ./../user_manager/login.php');
				
}
else 
{
	if(isset($_POST['html']))
	{
		include '../user_Manager/HtmlHelper.php';
		$id =  $_SESSION['id'];
		$data= $_POST['html'];
//		echo $data;
		$helper=new HTMLHelper();
		$helper->saveHtmlToDB($data,$id);
	}
	
		
}





	
?>