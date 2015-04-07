<?php 
class HTMLHelper
{
	public function saveHtmlToDB($html,$id)
	{	
		include_once '../../dataAccess/databaseHelper.php';
//		error_reporting(E_ERROR);
		
		$dbHelper=new databaseHelper();
		$doc=htmlspecialchars($html);
		
		echo $html;
		
		echo "<br/>";
		echo "------------------------------------";
		echo "<br/>";
		echo $doc;
		echo "<br/>";
		echo "------------------------------------";
		echo "<br/>";
		
		$htmlId=$dbHelper->ExecuteInsertReturnID("Insert into html (html) values ('$doc')");
		$dbHelper->ExecuteNonQuery("Insert into user_html values ('$id','$htmlId')");
		echo $htmlId;
//		$dbHelper->ExecuteNonQuery("UPDATE  user_html SET html='$doc' where user_id='$id'");
		
		
	}
	
	
	public function saveContentlToDB($id,$title,$header,$menu,$body,$fotter)
	{	
		include_once '../../dataAccess/databaseHelper.php';
//		error_reporting(E_ERROR);
		
		$dbHelper=new databaseHelper();
		
		$title=htmlspecialchars($title);
		$header=htmlspecialchars($header);
		$menu=htmlspecialchars($menu);
		$body=htmlspecialchars($body);
		$fotter=htmlspecialchars($fotter);
		
		
		//$doc=htmlspecialchars($html);
		
//		echo $html;
		
		echo "<br/>";
		echo "------------------------------------";
		echo "<br/>";
		echo $doc;
		echo "<br/>";
		echo "------------------------------------";
		echo "<br/>";
		
		$htmlId=$dbHelper->ExecuteInsertReturnID("Insert into html (html) values ('$doc')");
		$dbHelper->ExecuteNonQuery("Insert into user_html values ('$id','$htmlId')");
		echo $htmlId;
//		$dbHelper->ExecuteNonQuery("UPDATE  user_html SET html='$doc' where user_id='$id'");
		
		
	}
	private function saveMenu()
	{
		
	}
	
	
	
	public function readHtmlFromDB($id)
	{
		include '/dataAccess/databaseHelper.php';
		error_reporting(E_ERROR);
		$dbHelper=new databaseHelper();
		$sql="SELECT html_id From user_html where user_id='$id'";
		
//		echo "stage 1";
//		echo '<br/>';
//		echo $sql."<br/>";

		$html=$dbHelper->ExecuteDataSet($sql);
		
//		echo sizeof($html)."<br/>";
		
//		print_r($html);
		
//		echo '<br/>';

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
		
//		echo "stage 2";
//		echo '<br/>';
//		echo $sql;
//		echo '<br/>';
		 $html=$dbHelper->ExecuteDataSet($sql);
		 $htmlFiltered= array();
		 for($i=1;$i<sizeof($html);$i++)
		 {
//		 	$html[$i][0]=htmlspecialchars_decode($html[$i][0]);
		 	$htmlFiltered[$i-1]=htmlspecialchars_decode($html[$i][0]);
		 }
		 return $htmlFiltered;
	}
}
?>