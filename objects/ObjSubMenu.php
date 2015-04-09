<?php 
	class SubMenu{
		private $_submenu_id;
		private $_submenu_title;
		
		private $_menuID;
				
		public function setSubMenuID($value){
			$this->_submenu_id=$value;
		}
		public function getSubMenuID(){
			return $this->_submenu_id;
		}
		
		public function setSubMenuTitle($value){
			$this->_submenu_title=$value;
		}
		public function getSubMenuTitle(){
			return $this->_submenu_title;
		}
		
		public function setMenuID($value){
			$this->_menuID=$value;
		}
		public function getMenuID(){
			return $this->_menuID;
		}
		
		public function __construct(){
					
		}
	}
?>