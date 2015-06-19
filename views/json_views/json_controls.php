<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//require_once '../../json/controltools.json';
error_reporting(E_ERROR);


$myfile = fopen("../../json/controltools.json", "r") or die("Unable to open file!");
$json = fread($myfile,filesize("../../json/controltools.json"));
//echo $json;
fclose($myfile);

$jsonObject = json_decode($json, true);
$controlObject = $jsonObject["controls"];
//echo $controls[0];
foreach($controlObject as $controls) {
    echo '<li>';
    echo '<a><span><i class="icon-time"></i>';
    foreach ($controls as $control) {
        echo $control['html'];
    }
    echo '</a>';
    echo '</li>';
}

/*
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);
//$controls = $jsonIterator->key();
//echo $jsonIterator[$controls];
foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
        echo "$key:\n";
    } else {
        echo "$key => $val\n";
    }
}
*/