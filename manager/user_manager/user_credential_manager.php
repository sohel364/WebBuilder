<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../../objects/ObjUser.php';
include_once './user_manager.php';
include_once '../../dataAccess/databaseHelper.php';

$user_email=$_REQUEST['login_email'];
$user_pass = $_REQUEST['login_pass'];

echo $user_email;
echo $user_pass;

IsLoginSuccess($user_email,$user_pass);


function IsLoginSuccess($usermail,$userpass){
    $User = new User();
    $User=$User->MakeCustomUser($usermail,$userpass);
//    /$DataAccess=
    echo '<pre>';
    print_r($User);
    echo '</pre>';
    
    
    
    //UserManager::getUser($User)
}
?>
