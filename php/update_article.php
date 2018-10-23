<?php 
session_start();

include('db_config.php');


$aids=$_POST['aid'];
$a_tit=$_POST['atitle'];
$a_desp=$_POST['adesp'];
$a_cat=$_POST['acat'];
$a_tags=$_POST['atags'];
$email = $_SESSION['email'];
$count=$_POST['cc'];

  try{
    //print("art ins");
    $sql = "update articles SET a_title=?,a_description=?,a_category=?,a_tags=? where aid=?";
    $chk=$dbcon->prepare($sql);
    $stmt=$chk->execute(array($a_tit,$a_desp,$a_cat,$a_tags,$aids));
   // print($chk->rowCount());
    //print("insterddddw");
    
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
           $sql = "insert into a_images (aid,imgname,image) VALUES ('$aids','$name','$temp')";
                $dbcon->exec($sql);
        
        
        }  
         if($chk->rowCount()){$flag=1;} else{$flag=0;}
         echo json_encode($flag);       
}



catch(Exception $e)
{
        $msg=$e->getMessage();
        echo json_encode($msg);
        
        
}



?>