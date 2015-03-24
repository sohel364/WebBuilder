<?php 
session_start( );

if( isset($_POST['uname']) && isset($_POST['pass']) )
{
	include '../../dataAccess/databaseHelper.php';
	
	$dataHelper=new databaseHelper();
	$sql="select * from user where name='".$_POST['uname'].
										 "' and password='".$_POST['pass']."'";
//	echo $sql;
	$data=$dataHelper->ExecuteQuery($sql);
//	echo sizeof($data);
	if(sizeof($data)==4)
	{
		$_SESSION['id']=$data[0];
		$_SESSION['name']=$data[1];
		
		$_SESSION['isLogged']=true;
		echo $data[1]."  ".$_SESSION['name']."  ".$_SESSION['isLogged'];
		header('Location: ./../../index.php');
	}
	else 
	{ 	
		echo "User name and password dont match";
	}
	
//	print_r($data);
}
else {
?>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<input type="text" name="uname">
		<input type="password" name="pass">
		<input type="submit" value="login">
	</form>
<?php 	
}
?>