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
	
	
	function __construct(){
		$this->setUserName(NULL);
		$this->setEmailAddress(NULL);
		$this->setPassWord(NULL);
	}
	
	function User($this){
		$this->setUserName($this->getUserName());
		$this->setEmailAddress($this->getEmailAddress());
		$this->setPassWord($this->getPassWord());
		
		return $this;
	}
}
 
?>