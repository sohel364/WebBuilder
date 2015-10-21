<?php

require_once '../../dataAccess/databaseHelper.php';

require_once '../../objects/ObjMedia.php';

class MediaManager {

    public function SavePageContent($ObjMedia) {
        $sqlContent = 'INSERT INTO `webbuilder`.`media_arch` (`id`, `res_name`, `type`, `status`, `user_id`,`template_id`) VALUES (\'' . $ObjMedia->getMediaID() . '\',\'' . $ObjMedia->getResName() . '\',\'' . $ObjMedia->getType() . '\',\'' . $ObjMedia->getStatus() .  '\',\'' . $ObjMedia->getUserID() .  '\',\'' . $ObjMedia->getTemplateID().'\')';
        $dbHelper = new databaseHelper();
        $dbHelper->ExecuteInsertReturnID($sqlContent);
    }
}
    
?>