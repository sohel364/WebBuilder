<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'databaseHelper.php';
///localhost/WebBuilder/lon_lat_service.php?long_min=28.40&long_max=28.60&lat_min=77.10&lat_max=77.30
//SELECT `name`,`address`,`longitude`,`latitude` FROM `jd_repair` WHERE `longitude`>=28.58 && `longitude`<=28.67 && `latitude`>=77.06 && `latitude`<=77.19
$longmax=$_REQUEST['long_max'];
$longmin=$_REQUEST['long_min'];
$latmax=$_REQUEST['lat_max'];
$latmin=$_REQUEST['lat_min'];

$sql="SELECT `id`, `name`,`latitude`,`longitude`  FROM `jd_repair` WHERE `longitude`>=$longmin && `longitude`<=$longmax && `latitude`>=$latmin && `latitude`<=$latmax";
$DataAccess = new databaseHelper();

//echo $sql;

$RetArray=$DataAccess->ExecuteDataSet($sql);
foreach ($RetArray as $SubArray){
       if($SubArray!=NULL){
           // echo '<pre>';
           //     print_r($SubArray);
           // echo '<pre>';
            
           // echo "<br/>";
           // echo "<hr/>";
            
            echo json_encode($SubArray);           
			//echo "<br/>";
       }

}
?>