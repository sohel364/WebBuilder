<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(E_ERROR);

header('Content-Type: application/json');

require_once 'user_manager.php';
include_once '../../objects/ObjUser.php';


$aResult = array();
try {
    if (!isset($_POST['email'])) {
        $aResult['error'] = 'Email not found';
    } else if (!isset($_POST['name'])) {
        $aResult['error'] = 'Name not found';
    } else if (!isset($_POST['pass'])) {
        $aResult['error'] = 'Password not found';
    } else {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        


        try {
            $userManager = new UserManager();

            if ($user_id == NULL || count($user_id) <= 0) {
                $user_id = 'userId';
            }
            // Saving template information
            $user = new User();
            $user->setEmailAddress($email);
            $user->setUserName($name);
            $user->setPassWord($pass);
            
            $retArray = $userManager->getUserByEmail($user);
            if(count($retArray)>0) {
                $aResult['error'] = "This email is already registered";
            } else {
                $returnVal = $userManager->InsertUser($user);
                if ($returnVal > 0) {
                    $aResult['savedUserID'] = '1';
                } else {
                    $aResult['savedUserID'] = '0';
                }
            }
            
        } catch (Exception $ex) {
            $aResult['error'] = $ex;
        }
    }
} catch (Exception $ex) {
    $aResult['error'] = '$ex ';
}
echo json_encode($aResult);