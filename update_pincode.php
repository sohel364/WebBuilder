<?php
include_once './databaseHelper.php';
$sql="SELECT `id`,`pincode` from `jd_repair`";
$dbHelper = new databaseHelper();
$results = $dbHelper->ExecuteDataSet($sql);

foreach ($results as $itemValue){

    
    if($itemValue['pincode']!=NULL){
        
//        echo "<pre>";
//        print_r($itemValue);
//        echo "</pre>";
    
        
        if (($pos = strpos($itemValue['pincode'], "-")) !== FALSE) { 
                $whatIWant = substr($itemValue['pincode'], $pos+1); 
                if(strlen($whatIWant)==6 && is_numeric($whatIWant)){
                    echo $whatIWant."</br>";
                    
                    $updateSQL="UPDATE `jd_repair` SET `pincode`="'.$whatIWant.'" where id=$itemValue['id']";
                }
                
                
                }

    }


}

?>
