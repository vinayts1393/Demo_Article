<?php
session_start();
include('db_config.php');

$imag_id=$_GET['id'];
$aid=$_GET['aid'];
print($aid);

$sql="Delete from a_images where imgid=?";
$chk=$dbcon->prepare($sql);
$stmt=$chk->execute(array($imag_id));
$queryurl="../edit_article.php?id=".$aid;
print($queryurl);
if($chk->rowCount())
//if(1)        

{
        echo "<script> alert('deleted successfully'); window.location.href='$queryurl';
</script>";
        
}
 else{
          echo "<script> alert('Try again sorry'); window.location.href='$queryurl';
</script>";
         
 }

?>