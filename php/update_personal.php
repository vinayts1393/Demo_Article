
<?php
session_start();

include('db_config.php');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_SESSION['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    //$dob = $_POST['dob'];
   try{ 
    $check = "update register SET firstname=? , lastname=?, phone=?,dob=? WHERE email=?";

      
      $stmt=$dbcon->prepare($check)->execute([$fname, $lname, $phone, $email,$dob]);
      
       if($stmt){
             
         $flag=1;
          
              
           $_SESSION['dob']=$dob;
           $_SESSION['phone']=$phone;
           $_SESSION['fname']=$fname;
           $_SESSION['lname']=$lname;         
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