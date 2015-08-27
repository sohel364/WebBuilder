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

session_start();


$aResult = array();
try {
    if (isset($_POST["register"])) {
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

                $retArrayEmail = $userManager->getUserByEmail($user);
                $retArrayName = $userManager->getUserbyUserName($user);
                if (count($retArrayEmail) > 0) {
                    $aResult['error'] = "This email is already registered";
                } else if(count($retArrayName) > 0) {
                    $aResult['error'] = "This user name is already registered";
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
    } else if (isset($_POST["signin"])) {
        if (!isset($_POST['emailorusername'])) {
            $aResult['error'] = 'Email or user name not found';
        } else if (!isset($_POST['pass'])) {
            $aResult['error'] = 'Password not found';
        } else {
            $emailOrUserName = $_POST['emailorusername'];
            $pass = $_POST['pass'];
            
            try {
                $userManager = new UserManager();

                if ($user_id == NULL || count($user_id) <= 0) {
                    $user_id = 'userId';
                }
                // Saving template information
                $user = new User();
                $user->setEmailAddress($emailOrUserName);
                $user->setUserName($emailOrUserName);
                $user->setPassWord($pass);

                $retArray = $userManager->getUserByEmailAndPassword($user);
                
                if (count($retArray) > 0) {
                    $row = $retArray[0];
                    $user->setId($row['id']);
                    $user->setUserName($row['name']);
                    
                    $_SESSION['user_email'] = $user->getEmailAddress();
                    $_SESSION['user_name'] = $user->getUserName();
                    $_SESSION['user_id'] = $user->getId();
                    $aResult['success'] = "1";
                } else {
                    $aResult['error'] = "Email id or password is incorrect!!!";
                }
            } catch (Exception $ex) {
                $aResult['error'] = $ex;
            }
        }
    } else if (isset($_POST["logout"])) {
        //session_abort();
        session_unset();
        $aResult['success'] = "1";
    } else {
        $aResult['error'] = 'Bad request';
    }
} catch (Exception $ex) {
    $aResult['error'] = '$ex ';
}
echo json_encode($aResult);
