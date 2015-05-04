<?php

//test commit from tamal
class Menu {

    private $_menu_id;
    private $_template_id;
    private $_menu_title;
    private $_has_submenu;
    private $_a_href;

    public function setMenuID($value) {
        $this->_menu_id = $value;
    }

    public function getMenuID() {
        return $this->_menu_id;
    }

    public function setTemplateID($value) {
        $this->_template_id = $value;
    }

    public function getTemplateID() {
        return $this->_template_id;
    }

    public function setMenuTitle($value) {
        $this->_menu_title = $value;
    }

    public function getMenuTitle() {
        return $this->_menu_title;
    }

    public function setHasSubmenu($isTrue) {
        $this->_has_submenu = $isTrue;
    }

    public function getHasSubMenu() {
        return $this->_has_submenu;
    }

    public function setMenuAhRef($value) {
        $this->_a_href = $value;
    }

    public function getMenuAhRef() {
        return $this->_a_href;
    }

    public function __construct() {
        
    }

}

?>