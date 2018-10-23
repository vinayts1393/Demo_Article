<?php
session_start();
include('db_config.php');
$aid=$_GET['id'];
//print($aid);
try{
        $email=$_SESSION['email'];
        $stmt=$dbcon->prepare("select * from articles where aid=? and email=?");
        $stmt->execute(array($aid,$email));

        $arr=array();
        foreach($stmt as $row){
               $arr['atit']=$row['a_title'];
               $arr['desp']=$row['a_description'];
               $arr['tags']=$row['a_tags'];
               $arr['cate']=$row['a_category'];
                
        }
        //print_r($arr);

       /* $stmt1=$dbcon->prepare("select * from a_images where aid=? ");
        $stmt1->execute(array($aid));
        $imgarr=array();
        $i=0;
        foreach($stmt1 as $row)
        {
                $img=base64_encode($row['image']);
                //print_r($img);
                $imgarr['id'][$i]=$row['imgid'];
                $imgarr['image'][$i]=$img;        
                $i=$i+1;
        }

        array_push($arr,$imgarr);
 */
       $arr['flag']=1; 
        echo json_encode($arr);
}
catch(Exception $e){
        echo json_encode($e->getMessage());
        
}

?>