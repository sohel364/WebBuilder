<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(E_ERROR);

try {
    require_once '../../manager/content_manager/content_manager.php';
    require_once '../../objects/ObjTemplate.php';

    $user_id;
    if (isset($_SESSION['username'])) {
        $user_id = $_SESSION['username'];
    }
    if ($user_id == NULL || count($user_id) <= 0) {
        $user_id = 'userId';
    }

    $contentManager = new ContentPageManager();
    $templateInfo = new Template();
    $templateInfo->setUserID($user_id);
    $retArray = $contentManager->loadUserTemplateListByUserId($templateInfo);
    
    //echo json_encode($retArray);
    $index = 1;
    foreach ($retArray as $row) {
        if($row != null) {
            echo '<a href="http://localhost/WebBuilder/views/user_views/user_template_viewer.php?category=uncategorized&template=Black&templateid='.$row['template_id'].'">'.$index.'.&nbsp;&nbsp;'.$row['template_id'].'</a><br/>';
        }
        $index++;
    }
} catch (Exception $ex) {
    echo 'Exception occured: ' . $ex->getMessage();
}
