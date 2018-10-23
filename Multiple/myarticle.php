<?php
session_start();
include('php/db_config.php');
$email=$_SESSION['email'];
//print($email)




?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/paraia_multi_select.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<style>

  .modal-content{ height:auto;}

.modal-body {
   position: sticky;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
   flex: 1 1 auto;
    padding: 1rem;
    margin-top: 10px;
}        
    
    .imgstyle{
            height:120px;
            width:120px;
            
    }   

.desp_dis{
       margin-left:25px;
    //white-space: nowrap; 
    //height:20%; 
    //width:270%; 
    line-height:1.2em;
  height:3.6em;
  overflow:hidden;
    
    text-overflow: ellipsis;     
            
    }
                
        </style>    
   
</head>

<body>
<div class="container">


		<div class="modal-content">
			 <!--a href="dashboard.php" class="btn btn-success btn-lg">back</a--> 
			  <p class="btn btn-success btn -lg"> My Articles</p>
			<div class="modal-body">
				
	
                               
                                
                                <?php      
                                         $pref=$_SESSION['preferences'];
                                        //print($pref);
                                        include('php/db_config.php');
                                        
                                        $stmt=$dbcon->prepare("SELECT * FROM articles as art, a_images as aimg WHERE email=? and art.aid=aimg.aid");
                                         $stmt->execute(array($email));  
                                          $arr=array();
                                          foreach($stmt as $row){ 
                                                if(in_array($row['aid'],$arr)){}
                                                else{
                                                array_push($arr,$row['aid']);
                                                
                                                echo '<div class="row">';
                                                
                                                echo '<h1>'.$row['a_title'].'</h1>';
                                                echo '</div><div class="row"><div class="col-md-9">';
                                                echo '<p class="desp_dis">'.$row['a_description'].' </p></div> <div class="col-md-3 size" > ';
                                                $data1=$row['image'];
                                                echo '<img class="rounded imgstyle" src ="data:image/jpeg;base64,'.base64_encode($data1).'"  >    </div>  </div>';
                                                echo '<div class="row">';
                                                echo '<a href="edit_article.php?id='.$row['aid'].'" class="btn btn-success btn-md" id="art_edit">Edit</a>&nbsp;&nbsp;';
                                                echo '<a href="php/delete_article.php?id='.$row['aid'].'" class="btn btn-success btn-md" id="art_del">Delete</a>&nbsp;&nbsp;';
                                                echo '<a href="read_article.php?id='.$row['aid'].'">read more</a></div><hr><br>';
                                                }

                                          }  
                                        
                                    
                                ?>
                                

                                
                                
                                
                                
                                </div>
                                
                                
                                
                                
                                
                                
                              <a href="dashboard.php" class="btn btn-success btn-lg">back</a> 
                                
                        </div>
</div>
                     