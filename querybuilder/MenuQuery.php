<?php
include_once '../objects/ObjMenu.php';
include_once '../dataAccess/databaseHelper.php';

class QueryMenu{
	public $dataBaseHelper=NULL;
	
	public function InsertMenu(Menu $Object){
		if($Object!=NULL){
			$sql='INSERT INTO `menu` (`menu_id`, `template_id`, `menu_title`, `hassubmenu`) VALUES (NULL, "'.$Object->getTemplateID().'", "'.$Object->getMenuTitle().'", "'.$Object->getHasSubMenu().'")';
			$this->dataBaseHelper->ExecuteInsertReturnID($sql);
		}
	}
	
	public function getUserTemplateMenuItems(){
		
	}
	
	function __construct(){
		if($this->dataBaseHelper==NULL){
			$this->dataBaseHelper=new databaseHelper();
		}	
	}
}

?>