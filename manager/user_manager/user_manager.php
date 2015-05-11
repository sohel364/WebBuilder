<?php
/*
 * File Name : user_manual.php
 * Description : This Files contains most of the user related tasks
 * Usage : 
 * 1. User Registration
 * 2. User Verificaiton
 * 3. User Administration
 * 4. User Related Offer Management
 * 
 * Created on : 28.04.2015
 * Last Modified :
 * Change/Update Note :
 * 
 *  
 */ 
include_once '../../objects/ObjUser.php';
include_once '../../dataAccess/databaseHelper.php';

class UserManager{
	public $User=NULL;
	public $DataBaseHelper=NULL;
	
	public static function InsertUser($user) {
		$this->User=new User($user);
		$this->DataBaseHelper=new databaseHelper();
		$sql="INSERT INTO `user` (`id`, `name`, `password`, `email`) VALUES (NULL, '".$this->User->getUserName()."', '$this->User->getPassWord()', '".$this->User->getEmailAddress()."')";
		return $this->DataBaseHelper->ExecuteInsertReturnID($sql);
	}
	
}


?>