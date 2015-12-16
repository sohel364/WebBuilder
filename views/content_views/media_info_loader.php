<?php
/**
 * Created by PhpStorm.
 * User: cleancoder
 * Date: 12/10/15
 * Time: 12:15 AM
 */
session_start();
error_reporting(E_ALL); ini_set('display_errors', '1');

require_once '../../manager/content_manager/media_manager.php';

if(!isset($_REQUEST['template_id']))
{
    echo 'invalid upload';
}
else
{
    $template_id = "";

    $media_man = new MediaManager();
    $media_man->GetMediaByID($template_id);

    echo json_encode($retArray);
}