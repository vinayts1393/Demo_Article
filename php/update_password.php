
<?php
session_start();

include('db_config.php');
    $password = $_POST['pass'];
    
    $email = $_SESSION['email'];
        
    //$dob = $_POST['dob'];
   try{ 
    $check = "update register SET  password=? WHERE email=?";

      
      $stmt=$dbcon->prepare($check)->execute([$password,$email]);
      
       if($stmt){
             
         $flag=1;    
        echo json_encode($flag);
       }
       else
       {
          $flag=0;
          echo json_encode($flag);      
               
       }
   }
   catch(Exception $e)
   {
           $err_message=$e->getMessage();
           echo json_encode($err_message);
           
   }
   
   
   

?>