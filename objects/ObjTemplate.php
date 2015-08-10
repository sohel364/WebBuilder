<?php


class Template {

    private $_id;
    private $_template_id;
    private $_user_id;
    private $_template_url; 
    private $_template_res_url;
    private $_template_saved_name;
    private $_template_name;
    private $_category_name;



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
        return $this->_template_res_url;
    }
    
    public function setTemplateSavedName($value) {
        $this->_template_saved_name = $value;
    }

    public function getTemplateSavedName() {
        return $this->_template_saved_name;
    }
    
    public function setTemplateName($value) {
        $this->_template_name = $value;
    }

    public function getTemplateName() {
        return $this->_template_name;
    }
    
    public function setCategoryName($value) {
        $this->_category_name = $value;
    }

    public function getCategoryName() {
        return $this->_category_name;
    }

    public function __construct() {
        
    }

}
