<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

error_reporting(E_ERROR);
$menu_conten_list = array();
$menu_id_list = array();
try {
    require_once '../../manager/content_manager/content_manager.php';
    require_once '../../objects/ObjTemplate.php';

    /*$template_id;
    if(isset($_POST['templateid'])) {
            $template_id = $_POST['templateid'];
        } else if(isset($_GET['templateid'])){
            $template_id = $_GET['templateid'];
        }*/

    
    
    $contentManager = new ContentPageManager();
    $templateInfo = $contentManager->loadUserTemplateByTemplateID($template_id);
    $templateName = $templateInfo[0]['saved_name'];
    $retArray = $contentManager->loadUserMenuByTemplateID($template_id);
    //echo json_encode($retArray);
    //echo count($retArray);
    
//    echo "<pre>";
//    print_r($retArray);
//    echo "</pre>";
//    
//    

    echo '<ul id="menu" class="nav navbar-nav navbar">';
    foreach ($retArray as $row) {
        if($row != null) {
            //echo $row['template_id'].'<br/>';
            echo '<li><a href="#" onclick="onMenuClick(this);">'.$row['menu_title'].'</a></li>';
            $menu_id = $row['menu_id'];
            //echo $menu_id;
            $menuContents = $contentManager->loadUserMenuContentByMenuID($menu_id);
            
 
            $menuContent = $menuContents[0];
            $menu_conten_list[$row['menu_title']] = $menuContent['content_html'];
            $menu_id_list[$row['menu_title']] = $menu_id;
        }
        
       
    }
    if($isInEditor) {
        echo '<li class="add-menu"><a>+</a></li></ul>';
    } else {
        echo '</ul>';
    }
    
    //echo json_encode($menu_conten_list);
} catch (Exception $ex) {
    echo 'Exception occured: ' . $ex->getMessage();
}
?>
<script type="text/javascript">
    var user_menu_content_array = <?php echo json_encode($menu_conten_list);?>;
    var user_menu_id_array = <?php echo json_encode($menu_id_list);?>;
    var template_saved_name = '<?php echo $templateName;?>';
</script>