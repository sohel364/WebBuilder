<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserService
 *
 * @author simon
 */
include_once '../objects/ObjUser.php';
include_once '../dataAccess/databaseHelper.php';
include_once '../manager/user_manager/user_manager.php';

$name=$_REQUEST['username'];
$pass=$_REQUEST['password'];
$User = new User();
$User = $User->_MakeTempUserData($name,$pass);
if(UserManager::isUser($User)){
    echo '1';
}
else{
    echo '0';
}
    