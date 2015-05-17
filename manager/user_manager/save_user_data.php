<?php
include_once './user_manager.php';
include_once '../../objects/ObjUser.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user_email=$_REQUEST ['email'];
$user_name=$_REQUEST ['name'];
$user_pass=$_REQUEST ['password'];

$User = new User($user_name, $user_email, $user_pass);
echo UserManager::InsertUser($User);
//if(UserManager::InsertUser($User)>0){
//    echo '1';
//}
//else{
//    echo '0';
//}