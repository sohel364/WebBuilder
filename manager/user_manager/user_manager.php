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
include_once '../objects/ObjUser.php';
include_once '../dataAccess/databaseHelper.php';

//TestInsert();


/*Block for Unit Test*/

/*
    function TestInsert(){
        $User=new User("Sohel", "sohel.official@gmail.com","password");
        //$User->setUserName("Sohel");
        //$User->setPassWord("Pass");
        //$User->setEmailAddress("sohel.official@gmail.com");
       // $User->User("Sohel", "sohel.official@gmail.com","password");
        echo "<pre>";
            print_r($User);
        echo "</pre>";

       if(UserManager::InsertUser($User)){
           echo 'Succeeded !';
       }

       else{
           echo 'Failed!';
       }
    }
*/  
class UserManager{
	public $User=NULL;
	public $DataBaseHelper=NULL;
	        
	public static function InsertUser($User) {
		$DataBaseHelper=new databaseHelper();
		$sql="INSERT INTO `user` (`id`, `name`, `password`, `email`) VALUES (NULL, '".$User->getUserName()."','".$User->getPassWord()."', '".$User->getEmailAddress()."')";
		return $DataBaseHelper->ExecuteInsertReturnID($sql);
	}
        
        /*
         * Compare User's Password input with Database Password
         * 
         */
        public static  function isUser($User){
                $UserData = UserManager::getUserbyUserName($User);
//                echo "<pre>";
//                print_r($UserData);
//                echo "<pre>";
                if($UserData[0]['password']==$User->getPassWord()){
                    return true;
                }
                else{
                    return false;
                }
        }

        /*
         * Gets User Data from User Table by Email Address
         * 
         */
        public static function getUser($User){
            $DataBaseHelper=new databaseHelper();
            $sql="SELECT `id`,`name`,`password` FROM `user` WHERE `email`='".$User->getEmailAddress()."'";
            return $DataBaseHelper->ExecuteDataSet($sql);
        }
        
        public static function getUserbyUserName($User){
            $DataBaseHelper=new databaseHelper();
            $sql="SELECT `id`,`name`,`password` FROM `user` WHERE `name`='".$User->getUserName()."'";
            return $DataBaseHelper->ExecuteDataSet($sql);
        }
	
}


?>