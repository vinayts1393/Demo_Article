
<?php
session_start();

include('db_config.php');
    $preferences = $_POST['pref'];
    
    $email = $_SESSION['email'];
        
    //$dob = $_POST['dob'];
   try{ 
    $check = "update register SET  preferences=? WHERE email=?";

      
      $stmt=$dbcon->prepare($check)->execute([$preferences,$email]);
      
       if($stmt){
             
         $flag=1;   
          $_SESSION['preferences']=$preferences;      
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
