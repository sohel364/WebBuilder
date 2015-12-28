<?php
/**
 * Created by PhpStorm.
 * User: cleancoder
 * Date: 12/10/15
 * Time: 12:15 AM
 */
session_start();
//error_reporting(E_ALL); ini_set('display_errors', '1');

require_once '../../manager/content_manager/media_manager.php';

if(!isset($_REQUEST['template_id']))
{
    echo 'invalid upload';
}
else
{
    $template_id = $_REQUEST['template_id'];

    $media_man = new MediaManager();
    $media_info = $media_man->GetMediaByID($template_id);

//    $record = array();
//    if(sizeof($media_info) > 0)
//    {
//        for($i = 0; $i < sizeof($media_info); $i++)
//        {
//            $row = $media_info[$i];
//            echo '{ "rowcount": ' . sizeof($media_info) . ',
//            "id": "' . $row['id'] . '",
//            "type": "' . $row['type'] . '",
//            "res_name": "' . $row['res_name'] . '",
//            "status": "' . $row['status'] . '",
//            "user_id": "' . $row['user_id'] . '",
//            "template_id": "' . $row['template_id'] . '"
//            }';
//            $record[]
//        }
//    }
//    else
//    {
//        echo '{ "rowcount": ' . sizeof($media_info) . '}';
//    }

    echo json_encode($media_info);
}