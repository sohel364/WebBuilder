<?php

include_once 'ObjMenu.php';
include_once 'ObjSubMenu.php';

class Content {

    private $_content_id;
    private $_content_html;
    private $_isMenu = false; //true=menu false =submenu
    private $_conten_menuID;

    public function setContentID($value) {
        $this->_content_id = $value;
    }

    public function getContentID() {
        return $this->_content_id;
    }

    public function setContentHtml($value) {
        $this->_content_html = $value;
    }

    public function getContentHtml() {
        return $this->_content_html;
    }

    public function setIsMenu($isMenu) {
        $this->_isMenu = $isMenu;
    }

    public function getIsMenu() {
        return $this->_isMenu;
    }

    public function setContentMenuID($value) {
        $this->_conten_menuID = $value;
    }

    public function getContentMenuID() {
        $this->_conten_menuID;
    }

    public function MakeContent($content_html, $contentMenuID, $isMenu) {
        $this->setContentHtml($content_html);
        $this->setIsMenu($isMenu);
        $this->setContentMenuID($contentMenuID);

        return $this;
    }

    public function __construct() {
        
    }

}

?>