<?php
session_start();
include('db_config.php');
$aid=$_POST['aid'];
$email=$_SESSION['email'];
$like=$_POST['like'];
$block=$_POST['block'];

if(!$block){
//$check = "SELECT * FROM feedback WHERE email='$email' and aid='$aid'";
      $stmt=$dbcon->prepare("SELECT * FROM feedback WHERE email=? and aid=?");
      $res=$stmt->execute(array($email,$aid));
      
      $count = $stmt->rowCount();
      
      //print($count);
      if ($count<=0){      
      
        $sql = "insert into feedback (aid,email,like_dislike,block) VALUES ('$aid','$email','$like','$block')";
        $dbcon->exec($sql);
        //echo $dbcon->lastInsertId();
        $flag=1;
        echo json_encode($flag);
   }
   
   else {
           foreach($stmt as $row){
              $liked=$row['like_dislike'];
              //print($row['like_dislike']);
                }
           if($liked==$like){
            $flag=0;
           echo json_encode($flag);
           }
           
   
        else {
              $sql1="update feedback SET like_dislike=? where email=? and aid=? ";
              $chk=$dbcon->prepare($sql1);
              $stmt=$chk->execute(array($like,$email,$aid));
              if($chk->rowCount()){
                     $flag=1;
                     echo json_encode($flag);
           
           
           
                }
   }     
           
   }    
           
}     
   
if($block){
        $stmt=$dbcon->prepare("SELECT * FROM feedback WHERE email=? and aid=?");
      $res=$stmt->execute(array($email,$aid));
      
      $count = $stmt->rowCount();
      foreach($stmt as $row){
              $block=$row['block'];
              
      }
      
      if (!$block){      
      
        $sql = "insert into feedback (aid,email,like_dislike,block) VALUES ('$aid','$email','$like',$block)";
        $dbcon->exec($sql);
        //echo $dbcon->lastInsertId();
        $flag=1;
        echo json_encode($flag);
   }
    
    else{
            $flag=0;
            
            echo json_encode($flag);
            
    }

}























/*

if($like){
//$check = "SELECT * FROM feedback WHERE email='$email' and aid='$aid'";
      $stmt=$dbcon->prepare("SELECT * FROM feedback WHERE email=? and aid=?");
      $res=$stmt->execute(array($email,$aid));
      
      $count = $stmt->rowCount();
      //print($count);
      if ($count<=0){      
      
        $sql = "insert into feedback (aid,email,like_dislike,block) VALUES ('$aid','$email','$like','$block')";
        $dbcon->exec($sql);
        //echo $dbcon->lastInsertId();
        $flag=1;
        echo json_encode($flag);
   }
    
    else {
            foreach($stmt as $row){
              $liked=$row['liked'];
              //print($row['like_dislike']);
                }
            
            
            if($liked){
           
            
            $flag=0;
            echo json_encode($flag);
            
            }
        
        else{
            $sql1="update feedback SET liked=? where email=? and aid=? ";
            $chk=$dbcon->prepare($sql1);
            $stmt=$chk->execute(array($like,$email,$aid));
             if($chk->rowCount()){
                     $flag=1;
                     echo json_encode($flag);
                     
           }}   
            
      }

}
else if($dislike){
        
$stmt=$dbcon->prepare("SELECT * FROM feedback WHERE email=? and aid=?");
      $res=$stmt->execute(array($email,$aid));
      
      $count = $stmt->rowCount();
      //print($count);
      if ($count<=0){      
      
        $sql = "insert into feedback (aid,email,liked,dislike,block) VALUES ('$aid','$email','$like','$dislike','$block')";
        $dbcon->exec($sql);
        //echo $dbcon->lastInsertId();
        $flag=1;
        echo json_encode($flag);
   }
    
    else {
            foreach($stmt as $row){
              $liked=$row['dislike'];
              //print($row['like_dislike']);
                }
            
            
            if($liked){
           
            
            $flag=0;
            echo json_encode($flag);
            
            }
        
        else{
            $sql1="update feedback SET dislike=?, liked=0 where email=? and aid=? ";
            $chk=$dbcon->prepare($sql1);
            $stmt=$chk->execute(array($dislike,$email,$aid));
             if($chk->rowCount()){
                     $flag=1;
                     echo json_encode($flag);
                     
           }}   
            
      }
    
        
        
        
        
}



if($block){
        $stmt=$dbcon->prepare("SELECT * FROM feedback WHERE email=? and aid=?");
      $res=$stmt->execute(array($email,$aid));
      
      $count = $stmt->rowCount();
      foreach($stmt as $row){
              $block=$row['block'];
              
      }
      
      if (!$block){      
      
        $sql = "insert into feedback (aid,email,liked,dislike,block) VALUES ('$aid','$email','$like','$dislike',$block)";
        $dbcon->exec($sql);
        //echo $dbcon->lastInsertId();
        $flag=1;
        echo json_encode($flag);
   }
    
    else{
            $flag=0;
            
            echo json_encode($flag);
            
    }
        
        
        
}*/

?>