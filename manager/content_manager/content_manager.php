<?php

require_once '../../dataAccess/databaseHelper.php';

require_once '../../objects/ObjTemplate.php';
include_once '../../objects/ObjContent.php';
include_once '../../objects/ObjMenu.php';
include_once '../../objects/ObjSubMenu.php';

class ContentPageManager {

    public function SavePageContent($ObjContentArry) {
        //$sqlInnerData='INSERT INTO  `jd_entertainment_op_date_time` (`days`, `duration`, `id`) VALUES ("'.safe($exploded[0]).'","'.safe($exploded[1]).'","'.safe($tmpID).'")';
        //$sqlContent='INSERT INTO `webbuilder`.`content` (`content_id`, `content_html`, `isMenu`, `content_menu_id`) VALUES (NULL, '<div>Menu Item COntent</div>', '1', '2')';
        $sqlContent = '';
        $dbHelper = new databaseHelper();
        $dbHelper->ExecuteInsertReturnID($sqlContent);
    }

    /* public function SavePageContents($ObjContentArry) {
      ;
      } */

    public function saveUserTemplate($objTemplate) {

        $sqlContent = 'INSERT INTO `webbuilder`.`template` (`template_id`, `user_id`, `template_url`, `template_res_url`, `saved_name`,`template_name`,`category_name`) VALUES (\'' . $objTemplate->getTemplateID() . '\',\'' . $objTemplate->getUserID() . '\',\'' . $objTemplate->getTemplateUrl() . '\',\'' . $objTemplate->getTemplateResUrl() .  '\',\'' . $objTemplate->getTemplateSavedName() .  '\',\'' . $objTemplate->getTemplateName() .  '\',\'' . $objTemplate->getCategoryName() .'\')';

        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $insertID = $dbHelper->ExecuteInsertReturnID($sqlContent);
        if($insertID == NULL) {
            return '0';
        } else {
            return '1';
        }
    }

    public function saveMenuSubmenuContent($objMenuList, $objSubmenuList, $objContentList) {
        //return $objMenuList[0]->getMenuAhRef();
        $menuIdArray = array();
        foreach ($objMenuList as $objMenu) {
            $insertID = $this->saveMenu($objMenu);
            if($insertID == NULL ) {
                return '0';
            }
            $menuIdArray[] = $insertID;
        }
        $i = 0;
        foreach ($objContentList as $objContent) {
            $objContent->setContentMenuID($menuIdArray[$i]);
            $insertID = $this->saveContent($objContent);
            if($insertID == NULL ) {
                return '0';
            }
            $i++;
        }
        return '1';
    }

    private function saveMenu($objMenu) {
        $sqlContent = 'INSERT INTO `webbuilder`.`menu` (`template_id`, `menu_title`, `hassubmenu`, `a_href`) VALUES (\'' . $objMenu->getTemplateID() . '\',\'' . $objMenu->getMenuTitle() . '\',\'' . $objMenu->getHasSubMenu() . '\',\'' . $objMenu->getMenuAhRef() . '\')';

        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $insertID = $dbHelper->ExecuteInsertReturnID($sqlContent);
        return $insertID;
    }

    private function saveContent($objContent) {
        $sqlContent = 'INSERT INTO `webbuilder`.`content` (`content_html`, `isMenu`, `content_menu_id`) VALUES (\'' . $objContent->getContentHtml() . '\',\'' . $objContent->getIsMenu() . '\',\'' . $objContent->getContentMenuID() . '\')';
        $dbHelper = new databaseHelper();
        $insertID = $dbHelper->ExecuteInsertReturnID($sqlContent);
        return $insertID;
    }
    
    public function loadUserTemplateByTemplateID($templateID) {
        $sqlContent = 'SELECT * FROM template WHERE template_id = \''.$templateID.'\'';
        
        //return $sqlContent;
        //'INSERT INTO `webbuilder`.`template` (`template_id`, `user_id`, `template_url`, `template_res_url`) VALUES (\'' . $objTemplate->getTemplateID() . '\',\'' . $objTemplate->getUserID() . '\',\'' . $objTemplate->getTemplateUrl() . '\',\'' . $objTemplate->getTemplateResUrl() . '\')';
        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $retDataSet = $dbHelper->ExecuteDataSet($sqlContent);
        return $retDataSet;
    }
    public function loadUserTemplateListByUserId($objTemplate) {
        $sqlContent = 'SELECT * FROM template WHERE user_id = \''.$objTemplate->getUserID().'\'';

        //'INSERT INTO `webbuilder`.`template` (`template_id`, `user_id`, `template_url`, `template_res_url`) VALUES (\'' . $objTemplate->getTemplateID() . '\',\'' . $objTemplate->getUserID() . '\',\'' . $objTemplate->getTemplateUrl() . '\',\'' . $objTemplate->getTemplateResUrl() . '\')';
        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $retDataSet = $dbHelper->ExecuteDataSet($sqlContent);
        return $retDataSet;
    }
    
    public function loadUserMenuByTemplateID($templateID) {
        $sqlContent = 'SELECT * FROM menu WHERE template_id = \''.$templateID.'\'';

        //'INSERT INTO `webbuilder`.`template` (`template_id`, `user_id`, `template_url`, `template_res_url`) VALUES (\'' . $objTemplate->getTemplateID() . '\',\'' . $objTemplate->getUserID() . '\',\'' . $objTemplate->getTemplateUrl() . '\',\'' . $objTemplate->getTemplateResUrl() . '\')';
        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $retDataSet = $dbHelper->ExecuteDataSet($sqlContent);
        return $retDataSet;
    }
    
    public function loadUserMenuContentByMenuID($menu_id) {
        $sqlContent = 'SELECT * FROM content WHERE content_menu_id = \''.$menu_id.'\'';

        //'INSERT INTO `webbuilder`.`template` (`template_id`, `user_id`, `template_url`, `template_res_url`) VALUES (\'' . $objTemplate->getTemplateID() . '\',\'' . $objTemplate->getUserID() . '\',\'' . $objTemplate->getTemplateUrl() . '\',\'' . $objTemplate->getTemplateResUrl() . '\')';
        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $retDataSet = $dbHelper->ExecuteDataSet($sqlContent);
        return $retDataSet;
    }

    
    public function updateUserTemplate($objTemplate) {

        $sqlContent = 'UPDATE `webbuilder`.`template` SET '
                . '`user_id` = \'' . $objTemplate->getUserID() . '\', '
                . '`template_url` = \'' . $objTemplate->getTemplateUrl() . '\','
                . '`template_res_url` = \'' . $objTemplate->getTemplateResUrl() .  '\','
                . ' `saved_name` = \'' . $objTemplate->getTemplateSavedName() .  '\','
                . '`template_name` = \'' . $objTemplate->getTemplateName() .  '\','
                . '`category_name` = \'' . $objTemplate->getCategoryName() .'\' '
                . 'WHERE `template_id` = \''. $objTemplate->getTemplateID() . '\'';

        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $insertID = $dbHelper->ExecuteUpdateQuery($sqlContent);
        if($insertID == NULL || $insertID < 0) {
            return '0';
        } else {
            return '1';
        }
    }

    public function updateMenuSubmenuContent($objMenuList, $objSubmenuList, $objContentList) {
        //return $objMenuList[0]->getMenuAhRef();
        $menuIdArray = array();
        $retVal = NULL;
        foreach ($objMenuList as $objMenu) {
            $insertID = -1;
            if($objMenu->getMenuID() != NULL) {
               $retVal = $this->updateMenu($objMenu);
            } else {
                $insertID = $this->saveMenu($objMenu);
                $retVal = $insertID;
            }
            
            if($retVal == NULL || $retVal < 0) {
                return '0';
            }
            $menuIdArray[] = $insertID;
        }
        $i = 0;
        foreach ($objContentList as $objContent) {
            $insertID = NULL;
            if($objContent->getContentMenuID() == NULL) {
                $objContent->setContentMenuID($menuIdArray[$i]);
                $insertID = $this->saveContent($objContent);
                $retVal = $insertID;
            } else {
                $retVal = $this->updateContent($objContent);
            }
            if($retVal == NULL  || $retVal < 0) {
                return '0';
            }
            $i++;
        }
        return '1';
    }

    private function updateMenu($objMenu) {
        $sqlContent = 'UPDATE `webbuilder`.`menu` SET '
                . '`template_id` = \'' . $objMenu->getTemplateID() . '\', '
                . '`menu_title` = \'' . $objMenu->getMenuTitle() . '\','
                . ' `hassubmenu` = \'' . $objMenu->getHasSubMenu() . '\','
                . ' `a_href` = \'' . $objMenu->getMenuAhRef() . '\''
                . ' WHERE `menu_id` = \''. $objMenu->getMenuID() . '\'';

        //return $sqlContent;

        $dbHelper = new databaseHelper();
        $insertID = $dbHelper->ExecuteUpdateQuery($sqlContent);
        return $insertID;
    }

    private function updateContent($objContent) {
        $sqlContent = 'UPDATE `webbuilder`.`content` SET '
                . '`content_html` = \'' . $objContent->getContentHtml() . '\', '
                . '`isMenu` = \'' . $objContent->getIsMenu() . '\' '
                . ' WHERE `content_menu_id` = \''. $objContent->getContentMenuID() . '\'';
        $dbHelper = new databaseHelper();
        $insertID = $dbHelper->ExecuteUpdateQuery($sqlContent);
        return $insertID;
    }
    
}

?>