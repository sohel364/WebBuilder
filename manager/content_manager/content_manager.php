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

        $sqlContent = 'INSERT INTO `webbuilder`.`template` (`template_id`, `user_id`, `template_url`, `template_res_url`) VALUES (\'' . $objTemplate->getTemplateID() . '\',\'' . $objTemplate->getUserID() . '\',\'' . $objTemplate->getTemplateUrl() . '\',\'' . $objTemplate->getTemplateResUrl() . '\')';

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

}

?>