<?php
include_once '../dataAccess/databaseHelper.php';

class ContentPageManager{
	
	function SavePageContent($ObjContentArry) {
		//$sqlInnerData='INSERT INTO  `jd_entertainment_op_date_time` (`days`, `duration`, `id`) VALUES ("'.safe($exploded[0]).'","'.safe($exploded[1]).'","'.safe($tmpID).'")';
		$sqlContent='INSERT INTO `webbuilder`.`content` (`content_id`, `content_html`, `isMenu`, `content_menu_id`) VALUES (NULL, '<div>Menu Item COntent</div>', '1', '2')';
		$dbHelper=new databaseHelper();
		$dbHelper->ExecuteInsertReturnID($sqlContent);
	}
	
	function SavePageContent($ObjContentArry) {
		;
	}
	
}
?>