<?php
session_start();
include('db_config.php');

$aid=$_GET['id'];
//print($aid);

$sql="Delete from articles where aid=?";
$chk=$dbcon->prepare($sql);
$stmt=$chk->execute(array($aid));
if($chk->rowCount())

{
        echo "<script> alert('deleted successfully'); window.location.href='../myarticle.php';
</script>";
        
}
 else{
          echo "<script> alert('Try again sorry'); window.location.href='../myarticle.php';
</script>";
         
 }

?>