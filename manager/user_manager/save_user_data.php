<?php
include_once './user_manager.php';
include_once '../../objects/ObjUser.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$user_name=$_POST["email"];
$user_email=$_POST["name"];
$user_pass=$_POST["password"];

$User = new User($user_name, $user_email, $user_pass);
if(UserManager::InsertUser($User)>=1){
    echo '1';
}
else{
    echo '0';
}