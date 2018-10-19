<?php
 session_start();
 $preferences=$_SESSION['preferences'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 760px;
    
    }
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
    
    position: relative;
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      
      .row.content {height:auto;} 
    }
    #sn{
       height: 100%;
        padding: 10px;  
    }
    
    .size {
    margin:30px;
    }
    
    .imgstyle{
            height:120px;
            width:120px;
            
    }
    
  </style>
 
  
  
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="dashboard.php">Home</a></li>
       
      </ul>
    
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav" id="sn">
      <p><a href="addarticle.php" >Add Article</a></p>
      <p><a href="myarticle.php" >My Articles</a></p>
      <p><a href="setting.php" id="setting" >Setting</a></p>
    </div>
   
	
        
        
	<div class="row">
	<div class="col-md-2">
	</div>
 <?php      
 $pref=$_SESSION['preferences'];
//print($pref);
include('php/db_config.php');
$arr=explode(',', $pref);
$dummyarr=array();
foreach ($arr as $a){
$stmt=$dbcon->prepare("SELECT * FROM articles as art, a_images as aimg WHERE a_category IN(?) and art.aid=aimg.aid");
 $stmt->execute(array($a)); 
   
  foreach($stmt as $row){
       if(in_array($row['aid'],$dummyarr)){}
        else{
        array_push($dummyarr,$row['aid']);          
        
        echo '<div class="col-sm-8 text-left" id="includeContent" > <div class="col-md-6">';  
        echo '<h1>'.$row['a_title'].'</h1>';
        echo '<p>'.$row['a_description'].' </p></div> <div class="col-md-2 size" > ';
        $data1=$row['image'];
        echo '<img class="rounded imgstyle" src ="data:image/jpeg;base64,'.base64_encode($data1).'"  >    </div>  ';
        
        echo '<a href="read_article.php?id='.$row['aid'].'">read more</a></div>';
        }

  }  
}
    
    ?>
	</div>

  </div>
</div>

<footer class="container-fluid text-center" id="footer" >
  <p>Footer Text</p>
</footer>

</body>






</html>
