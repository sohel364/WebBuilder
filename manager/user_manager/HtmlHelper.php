<?php 
class HTMLHelper
{
	public function saveHtmlToDB($html,$id)
	{	
		include_once '../../dataAccess/databaseHelper.php';
		error_reporting(E_ERROR);
		
		$dbHelper=new databaseHelper();
		$doc=htmlspecialchars($html);
		$cnt=$dbHelper->ExecuteScaler("SELECT count(*) from user_html where user_id='$id'");
		if($cnt==0)
		{
			$dbHelper->ExecuteInsertReturnID("Insert into user_html values ('$id','$doc')");
		}
		else 
		{
			$dbHelper->ExecuteNonQuery("UPDATE  user_html SET html='$doc' where user_id='$id'");
		}
		
		
	}
	
	
	
	
	public function readHtmlFromDB($id)
	{
		include '/dataAccess/databaseHelper.php';
		error_reporting(E_ERROR);
		$dbHelper=new databaseHelper();
		$html=$dbHelper->ExecuteQuery("SELECT html From user_html where user_id='$id'");
		$html=htmlspecialchars_decode($html[0]);
		return $html;
	}
}
?>