
<?php


include('db_config.php');
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone=$_POST['phone'];
    $password = $_POST['password'];
    $preferences = $_POST['preferences'];
    $dob = $_POST['dob'];
    
    $check = "SELECT * FROM register WHERE email='$email'";

      $res = $dbcon->query($check);
      $count = $res->fetchColumn();
      
      if ($count<=0){      
      
        $sql = "insert into register (firstname,lastname,email,phone,dob,preferences,password) VALUES ('$fname','$lname','$email','$phone','$dob','$preferences','$password')";
        $dbcon->exec($sql);
        //echo $dbcon->lastInsertId();
        $flag=1;
        echo json_encode($flag);
   }
    
    else{
            $flag=0;
            echo json_encode($flag);
            
    }












?>