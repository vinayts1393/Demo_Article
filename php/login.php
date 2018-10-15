<?php

include("db_config.php");
$username=$_POST['username'];
$password=$_POST['password'];
session_start();
// $check="select * from register where email='$username' and password='$password' ";
 
try{
    //$res=$dbcon->query($check)
      $stmt=$dbcon->prepare("select * from register where email=:mail and password=:pass");
      $stmt->execute(array(':mail' => $username,':pass' => $password));
        if($stmt->rowCount())
        {
                 foreach($stmt as $row){     
                   //print($row['email']);
                   //print($row['preferences']);
                   $_SESSION['email']=$row['email'];    
                   $_SESSION['preferences']=$row['preferences'];   
                   $_SESSION['dob']=$row['dob'];
                   $_SESSION['phone']=$row['phone'];
                   $_SESSION['fname']=$row['firstname'];
                   $_SESSION['lname']=$row['lastname'];     
                }
                $flag=1;
                echo json_encode($flag);
        
        }
        
        else{
                $flag=0;
                echo json_encode($flag);
                
        }
      
 }
 
 catch(Exception $e) {
         $error_msg=$e->getMessage();
        // print($error_msg);
  echo  json_encode($error_msg);
}
 



?>