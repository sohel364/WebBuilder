<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
error_reporting(E_ERROR);

header('Content-Type: application/json');
$aResult = array();
try {


    require_once '../../manager/content_manager/content_manager.php';
    require_once '../../objects/ObjTemplate.php';
    require_once '../../objects/ObjContent.php';
    require_once '../../objects/ObjMenu.php';
    require_once '../../objects/ObjSubMenu.php';



    

    if (!isset($_POST['menulists']) || !isset($_POST['menucontentlist'])) {
        if(!isset($_POST['menulists']))
            $aResult['error'] = 'There is no menulist to save';
        else 
            $aResult['error'] = 'Content List Error';
    } else if(!isset($_POST['categoryname'])) {
        $aResult['error'] = 'Categoryname  not found';
    } else if(!isset($_POST['templatename'])) {
        $aResult['error'] = 'Template name not found';
    } else if (!isset($_SESSION['user_id'])) {
        $aResult['error'] = 'Your session timed out. Please Login first';
    } else if(!isset($_POST['menuidlist'])) {
        $aResult['error'] = 'Menu list error found';
    } else {
        $menuList = $_POST['menulists'];
        $aResult['menuCount'] = count($menuList);
        $aResult['string'] = '';
        
        $menuContentList = $_POST['menucontentlist'];
        $user_template_id = $_POST['templateid'];
        $userMenuIDList = $_POST['menuidlist'];
        
        $user_id;
        
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }
        $aResult['templateId'] = $user_template_id;

        /* try {
          foreach ($menuList as $menu) {
          foreach ($menu as $item) {
          $aResult['string'] .= $item . ' ';
          }
          //$aResult['menuTitle'] = $menu['menuId'];
          $aResult['string'] .= '\n';
          //$aResult['string'] .= $menu['menuId'].' '.$menu['aHref'].'<br/>';
          //$aResult['string'] .= $menu->menuId.' '.$menu->aHref.'<br/>';
          }
          } catch (Exception $ex) {
          $aResult['error'] = $ex;
          } */


        try {
            $contentManager = new ContentPageManager();

            if ($user_id == NULL || count($user_id) <= 0) {
                $user_id = 'userId';
            }
            // Saving template information
            $templateInfo = new Template();
            $templateInfo->setTemplateID($user_template_id);
            $templateInfo->setUserID($user_id);
            $templateInfo->setTemplateResUrl(NULL);
            $templateInfo->setTemplateUrl(NULL);
            //savedname: savedName, categoryname:currentCategory, templatename:currentTemplate
            $templateInfo->setTemplateSavedName($_POST['savedname']);
            $templateInfo->setTemplateName($_POST['templatename']);
            $templateInfo->setCategoryName($_POST['categoryname']);
            $returnVal = $contentManager->updateUserTemplate($templateInfo);
            

            if ($returnVal == '1') {
                // Saving menu, submenu and contents 
                $menuObjectList = array(); // Menu object array
                $contentObjectList = array(); // Content object array

                //$menuIdIndex = 0;
                foreach ($menuList as $menu) {
                    if ($menu['menuTitle'] == '+') {
                        break;
                    }
                    $menuObject = new Menu();
                    $menuObject->setMenuID($userMenuIDList[$menu['menuTitle']]);
                    
                    $menuObject->setMenuTitle($menu['menuTitle']);
                    $menuObject->setMenuAhRef($menu['aHref']);
                    $menuObject->setTemplateID($user_template_id);
                    $menuObject->setHasSubMenu(0);

                    $menuObjectList[] = $menuObject;

                    $contentObject = new Content();
                    $contentObject->setContentMenuID($userMenuIDList[$menu['menuTitle']]);
                    $contentObject->setContentHtml($menuContentList[$menu['menuTitle']]);
                    $contentObject->setIsMenu(1);
                    $contentObjectList[] = $contentObject;
                }
                $aResult['saveUserTemplate'] = $contentManager->updateMenuSubmenuContent($menuObjectList, NULL, $contentObjectList);
            } else {
                $aResult['saveUserTemplate'] = '0';
            }
        } catch (Exception $ex) {
            $aResult['error'] = $ex;
        }
    }
} catch (Exception $ex) {
    $aResult['error'] = '$ex ';
}
echo json_encode($aResult);
