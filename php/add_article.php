<?php 
session_start();

include('db_config.php');



$a_tit=$_POST['atitle'];
$a_desp=$_POST['adesp'];
$a_cat=$_POST['acat'];
$a_tags=$_POST['atags'];
$email = $_SESSION['email'];
$count=$_POST['cc'];
//print($count);
//print_r($a_cat);

  try{
    //print("art ins");
    $sql = "insert into articles (a_title,a_description,a_category,a_tags,email) VALUES ('$a_tit','$a_desp','$a_cat','$a_tags','$email')";
    $dbcon->exec($sql);
    //print("insterddddw");
    $last_id=$dbcon->lastInsertID();   
    //print($last_id);
  
// images uploading
        for($i=0;$i<$count;$i++){
                
                $file_name=$_FILES['file'.$i]['name'];
                $file_tmp=$_FILES['file'.$i]['tmp_name'];
                $filetype=$_FILES['file'.$i]['type'];
                $filesize=$_FILES['file'.$i]['size'];
                //print_r($file_tmp);
        //print(count(S_FILES['file']));

          $name=addslashes($file_name);
          $temp=addslashes(file_get_contents($file_tmp));
          
          //die();
           $sql = "insert into a_images (aid,imgname,image) VALUES ('$last_id','$name','$temp')";
                $dbcon->exec($sql);
        
        
        }  
         $flag=1;
         echo json_encode($flag);       
}



catch(Exception $e)
{
        $msg=$e->getMessage();
        echo json_encode($msg);
        
        
}



?>