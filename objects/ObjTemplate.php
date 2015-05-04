<?php


class Template {

    private $_id;
    private $_template_id;
    private $_user_id;
    private $_template_url; 
    private $_template_res_url;

    
    public function setID($value) {
        $this->_id = $value;
    }

    public function getID() {
        return $this->_id;
    }
    
    public function setTemplateID($value) {
        $this->_template_id = $value;
    }

    public function getTemplateID() {
        return $this->_template_id;
    }

    public function setUserID($value) {
        $this->_user_id = $value;
    }

    public function getUserID() {
        return $this->_user_id;
    }

    public function setTemplateUrl($value) {
        $this->_template_url = $value;
    }

    public function getTemplateUrl() {
        return $this->_template_url;
    }

    public function setTemplateResUrl($value) {
        $this->_template_res_url = $value;
    }

    public function getTemplateResUrl() {
        $this->_template_res_url;
    }

    public function __construct() {
        
    }

}
