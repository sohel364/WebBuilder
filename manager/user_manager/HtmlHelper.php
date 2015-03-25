<?php 
class HTMLHelper
{
	public function saveHtmlToDB($html,$id)
	{	
		include_once '../../dataAccess/databaseHelper.php';
//		error_reporting(E_ERROR);
		
		$dbHelper=new databaseHelper();
		$doc=htmlspecialchars($html);
	
		$htmlId=$dbHelper->ExecuteInsertReturnID("Insert into html (html) values ('$doc')");
		$dbHelper->ExecuteNonQuery("Insert into user_html values ('$id','$htmlId')");
		echo $htmlId;
//		$dbHelper->ExecuteNonQuery("UPDATE  user_html SET html='$doc' where user_id='$id'");
		
		
	}
	
	
	
	
	public function readHtmlFromDB($id)
	{
		include '/dataAccess/databaseHelper.php';
		error_reporting(E_ERROR);
		$dbHelper=new databaseHelper();
		$sql="SELECT html_id From user_html where user_id='$id'";
		echo $sql."<br/>";
		$html=$dbHelper->ExecuteDataSet($sql);
//		$html=htmlspecialchars_decode($html[0]);
		echo sizeof($html)."<br/>";
		print_r($html);
		
		$sql="Select html from html where id in (";
		if(sizeof($html)>1)
		{
			$temp=$html[1][0];
			$sql=$sql."'$temp'";
			for($i=2;$i<sizeof($html);$i++)
			{
				$temp= $html[$i][0];
				
				$sql=$sql.", '$temp'";
			}
		}
		
		$sql=$sql.")";
		
		echo $sql;
		 $html=$dbHelper->ExecuteDataSet($sql);
		 
		 for($i=1;$i<sizeof($html);$i++)
		 {
		 	$html[$i][0]=htmlspecialchars_decode($html[$i][0]);
		 }
		 return $html;
	}
}
?>