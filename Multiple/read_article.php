<?php
session_start();
include('php/db_config.php');
$aid=$_GET['id'];
//print($aid);


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
                
        </style>    
   
</head>

<body>
<div class="container">


		<div class="modal-content">
			
			
			<div class="modal-body">
				
					    <?php
                                                $stmt=$dbcon->prepare("SELECT * FROM articles where aid=?");
                                                $stmt->execute(array($aid));
                                                foreach($stmt as $row){
                                                        
                                                        echo '<b>Title:&nbsp;</b><p>'.$row['a_title'].'</p><br><br>';
                                                        echo '<b>Article Description:&nbsp;</b><p>'.$row['a_description'].'</p><br><br>';
                                                        echo '<b>Article Tags:&nbsp;</b><p>'.$row['a_tags'].'</p><br><br>';
                                                        
                                                        
                                                }
                                                
                                                $stmt1=$dbcon->prepare("Select * from a_images where aid=?");
                                                $stmt1->execute(array($aid));
                                                echo '<b>Article Images</b></br>';
                                                foreach($stmt1 as $row){
                                                        
                                                        $data1=$row['image'];
                                                       
                                                       
                                                        echo '<img class="rounded imgstyle" src ="data:image/jpeg;base64,'.base64_encode($data1).'" /> &nbsp;';
                                                        
                                                }
                                            
                                            
                                            
                                            
                                            
                                            
                                            ?>
                                               
						
                        </div>	
                       
				
                </div>
                 <a href="dashboard.php" class="btn btn-success btn-lg" >close </a>
                 <input type="submit" value="Like" id="like_article" class="btn btn-success btn-lg" />
                 <input type="submit" value="disLike" id="dislike_article" class="btn btn-success btn-lg"  />
                 <input type="submit" value="Block" id="block_article" class="btn btn-success btn-lg" />                 
 </div>
	

</div>

</div>

</body>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58ee16ff43f4a4b4"></script>
<script>
$(document).ready( function (event){
        event.preventDefault;
       
        var id='<?php echo $aid;?>';
        var like=0;
        
        var block=0;
         var json_data1={
                    
                     "aid":id,
                      
                     
                       
                       
               }; 
       
        $.ajax({
           url:'php/get_feedback.php',
           type:'POST',
           data:json_data1,
           success:function(usr_result){
                   var usr=JSON.parse(usr_result);
                   console.log(usr);
                   if(usr.flag==1){
                   
                   if(usr.like==1){
                        $('#like_article').val('Liked');   
                           
                   } 
                   else if (usr.like==0){
                           $('#dislike_article').val('disliked'); 
                   }
           
                   }
           }
                
                
        });
        
        
        
        
        
        
        
        
        
        
        
        
        
        $('#like_article').click(function (){
               var json_data={
                    "like":"1",
                     "aid":id,
                      
                       "block":block 
                       
                       
               }; 
                
                
               $.ajax({ 
                url:'php/aliked.php',
                type:'POST',
                data:json_data,
                success: function(usr_result){
                        var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 alert('you have already liked this article');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 
                         alert('thanks for your feed back');
                          $('#like_article').val('Liked');   
                           $('#dislike_article').val('dislike'); 
		         
		 }
		 else
		 {
		     	console.log(usr_result.flag+"part"+usr_result);
                $("#err_msg").html('failed to register feedback try again');				
		 } 
                
                        
                        
                }      });   
                
        });
        $('#dislike_article').click(function (){
               var json_data={
                    "dislike":"1",
                     "aid":id,
                      "like":like,
                      "block":block
                       
               }; 
                
                
               $.ajax({ 
                url:'php/aliked.php',
                type:'POST',
                data:json_data,
                success: function(usr_result){
                        var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 alert('you have already dis liked this article');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 
                         alert('thanks for your feed back');
                          $('#like_article').val('Like');   
                           $('#dislike_article').val('disliked'); 
		         
		         
		 }
		 else
		 {
		     	console.log(usr_result.flag+"part"+usr_result);
                $("#err_msg").html('failed to register feedback try again');				
		 } 
                
                        
                        
                }      });   
                
                
                
                
        });
       
        $('#block_article').click(function (){
               var json_data={
                    
                     "aid":id,
                      "like":like,
                      "block":"1"
                       
               }; 
                
                
               $.ajax({ 
                url:'php/aliked.php',
                type:'POST',
                data:json_data,
                success: function(usr_result){
                        var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 alert('you have already blocked this article');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 
                         alert('we have blocked this article for you');
                         
		         
		 }
		 else
		 {
		     	console.log(usr_result.flag+"part"+usr_result);
                $("#err_msg").html('failed to register feedback try again');				
		 } 
                
                        
                        
                }      });   
                
                
                
                
        });


       
});



</script>

</html>