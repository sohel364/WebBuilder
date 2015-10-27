<?php

//http://stackoverflow.com/questions/15760559/how-to-save-an-image-created-from-imagecreatefromstring-function
//  error_reporting(E_ERROR);		
session_start();
error_reporting(E_ALL); ini_set('display_errors', '1');

if(!isset($_REQUEST['image']))
{
	echo 'invalid upload';
}
elseif(!isset($_REQUEST['type']))
{
	echo 'invalid upload type';
}
elseif(!isset($_REQUEST['image_id']))
{
	echo 'invalid image indentity';
}
elseif(!isset($_REQUEST['menu_id']))
{
	echo 'invalid Image menu parent';
}
else
{
//	echo $_SERVER['DOCUMENT_ROOT']."/webbuilder/archive/uploaded_by_user".".".$_REQUEST['type'];
	$strHeaderContentType = 'Content-Type: image/' + $_REQUEST['type'];
	header($strHeaderContentType);

	$user_id = "invalid_user";
	$template_id = "invalid_template";

	if(!isset($_REQUEST['userId']) || !isset($_REQUEST['templateId']))
	{
		echo 'invalid user for the resource!';
	}
	$user_id = $_REQUEST['userId'];
	$template_id = $_REQUEST['templateId'];
	$img_id = $_REQUEST['image_id'];
	$menu_id = $_REQUEST['menu_id'];

	$data = $_REQUEST['image'];
	$patterns = '/^data:image\/(png|jpg);base64,/';
	$replacements = '';
	$binary = preg_replace($patterns, $replacements, $data);
	$binary = str_replace(' ', '+', $binary);

	$strImagePath = $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "webbuilder" . DIRECTORY_SEPARATOR . "archive" . DIRECTORY_SEPARATOR;
	$strImageFileName = $user_id . '_' . $template_id . '_' . $menu_id . '_' . md5($img_id) . '.' . $_REQUEST['type'];
	$strFile = $strImagePath . $strImageFileName;
	$success = file_put_contents($strFile, base64_decode($binary));

	$dataImg = base64_decode($binary);
	//echo $binary;
	echo $img_id;

//	Note: alternative file saving code especially for image processing
//	$im = imagecreatefromstring($dataImg);
//	if ($im !== false) {
//		header('Content-Type: image/png');
//		imagepng($im, $strFile, 9);
//		imagedestroy($im);
//		echo $dataImg;
//	}
//	else {
//		echo 'An error occurred.';
//	}
}
