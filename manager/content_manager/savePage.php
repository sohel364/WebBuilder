<?php 
session_start( );

if(!isset($_SESSION['isLogged']))
{
	header('Location: ./../user_manager/login.php');
				
}
else 
{
	$title="";
	$header="";
	$menu="";
	$body="";
	$footer="";
	
	if(isset($_POST['title']))
	{
		$title=$_POST['title'];
	}
	if(isset($_POST['header']))
	{
		$header=$_POST['header'];
	}
	if(isset($_POST['menu']))
	{
		$menu=$_POST['menu'];
	}
	if(isset($_POST['body']))
	{
		$body=$_POST['body'];
	}
	if(isset($_POST['footer']))
	{
		$footer=$_POST['footer'];
	}
	
		
		include '../user_Manager/HtmlHelper.php';
		$id =  $_SESSION['id'];
		$data= $_POST['html'];
//		echo $data;
		$helper=new HTMLHelper();
		$helper->saveHtmlToDB($id,$title,$header,$menu,$body,$footer);
	
		
}





	
?>