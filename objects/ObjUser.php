<?php
class User{
	private $_userName;
	private $_emailAddress;
	private $_passWord;
	
	public function setUserName($name) {
		$this->_userName=$name;
	}
	public function getUserName() {
		return $this->_userName;
	}
	
	public function setEmailAddress($email) {
		$this->_emailAddress=$email;
	}
	public function getEmailAddress() {
		return $this->_emailAddress;
	}
	
	public function setPassWord($pass) {
		$this->_passWord=$pass;
	}
	public function getPassWord(){
		return $this->_passWord;
	}
	
        function __construct() {
            ;
        }

        public function _User($name,$email,$pass){
            $this->setUserName($name);
            $this->setEmailAddress($email);
            $this->setPassWord($pass);
            return $this;
        }
        
        public function _MakeTempUserData($name,$pass){
            $this->setUserName($name);
            $this->setPassWord($pass);
            return $this;
        }
        public function MakeCustomUser($name,$email){
            $this->setUserName($name);
            $this->setEmailAddress($email);
            return $this;
        }

}
 
?>