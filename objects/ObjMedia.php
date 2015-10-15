<?php
class Media {

    private $id;
    private $res_name;
    private $type;
    private $status;
    private $user_id;
	private $template_id;

    public function setMediaID($value) {
        $this->id = $value;
    }

    public function getMediaID() {
        return $this->id;
    }

    public function setResName($value) {
        $this->res_name = $value;
    }

    public function getResName() {
        return $this->res_name;
    }

    public function seType($value) {
        $this->type = $value;
    }

    public function getType() {
        return $this->type;
    }

    public function setStatus($isTrue) {
        $this->status = $isTrue;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setUserID($value) {
        $this->user_id = $value;
    }

    public function getUserID() {
        return $this->user_id;
    }
	
	public function setTemplateID($value) {
        $this->template_id = $value;
    }

    public function getTemplateID() {
        return $this->template_id;
    }
	


    public function __construct() {
        
    }

}

?>