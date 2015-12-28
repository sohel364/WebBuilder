<?php

require_once '../../dataAccess/databaseHelper.php';

require_once '../../objects/ObjMedia.php';

class MediaManager {

    public function SavePageContent($ObjMedia) {
        $sqlContent = 'INSERT INTO `webbuilder`.`media_arch` (`id`, `res_name`, `type`, `status`, `user_id`,`template_id`) VALUES (\'' . $ObjMedia->getMediaID() . '\',\'' . $ObjMedia->getResName() . '\',\'' . $ObjMedia->getType() . '\',\'' . $ObjMedia->getStatus() .  '\',\'' . $ObjMedia->getUserID() .  '\',\'' . $ObjMedia->getTemplateID().'\')';
        $dbHelper = new databaseHelper();
        $dbHelper->ExecuteInsertReturnID($sqlContent);
    }
    
    /*
     * Gets all media contents by template ID
     */
    public function GetMediaByID($key){
        $sqlContent = 'SELECT `id`,`res_name`,`type`,`status`,`user_id`,`template_id` FROM `media_arch` WHERE template_id = \''.$key.'\'';
        $dbHelper = new databaseHelper();
        return $dbHelper->ExecuteDataSet($sqlContent);
    }
    
    /*
     * Update Media Content Status by key
     * Pass Status if needed, by default it's 0
     * 0 means not published
     * 1 means published
     */
    public function UpdateMediaByID($key,$status="0"){        
        $sqlContent = 'UPDATE `webbuilder`.`media_arch` SET `status` = \''.$status.'\' WHERE `media_arch`.`id` = \''.$key.'\'';        
        $dbHelper = new databaseHelper();
        $dbHelper->ExecuteInsertReturnID($sqlContent);
    }
}
    
?>