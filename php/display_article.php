<?php
include('db_config.php');
session_start();

$pref=$_SESSION['preferences'];
print($pref);
$arr=array_map('intval', explode(',', $pref));
print_r($arr);
$pref1="11,14";
$stmt=$dbcon->prepare("SELECT * FROM articles as art, a_images as aimg WHERE a_category IN(?) and art.aid=aimg.aid");
 $stmt->execute($arr);  
 if($stmt->rowCount()){
     foreach($stmt as $row){
             print($row['aid']);
             
             
     }    
         
         
 }


?>