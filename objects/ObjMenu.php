<?php 
//test commit from tamal
class Menu {
	private $_menu_id;
	private $_template_id;
	private $_menu_title;
	private $_has_submenue;
	
	public function setMenuID($value){
		$this->_menu_id=$value;
	}
	public function getMenuID(){
		return $this->_menu_id;
	}
	
	public function setTemplateID($value) {
		$this->_template_id=$value;
	}
	public function getTemplateID(){
		return $this->getTemplateID();
	}
	
	public function setMenuTitle($value){
		$this->_menu_title=$value;	
	}
	public function getMenuTitle(){
		return $this->_menu_title;
	}
	
	public function setHasSubmenu($isTrue){
		$this->_has_submenue=$isTrue;
	}
	public function getHasSubMenu(){
		return $this->_has_submenue;
	}
	
	public function __construct(){
		
	}
}
?>