<?php
session_start();
include('db_config.php');
$aid= $_POST['aid'];
$email=$_SESSION['email'];
try{
$stmt=$dbcon->prepare("SELECT * FROM feedback WHERE email=? and aid=?");
       $res=$stmt->execute(array($email,$aid));
      
       $count = $stmt->rowCount();
       $ress=array();
        if($count>=0){
        foreach($stmt as $row){
          $ress['like']=$row['like_dislike'];
        
          }  
        
        $ress['flag']=1;
        echo json_encode($ress);     
        }
        else{
         $ress['flag']=2;
        echo json_encode($ress);        
}}

catch(Exception $e){
        $flag=0;
        $ress['flag']=0;
        $ress['msg']=$e->getMessage();
        echo json_encode($ress);
        
        
}
      

?>