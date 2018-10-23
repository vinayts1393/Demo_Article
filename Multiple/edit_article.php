<?php

session_start();
include('php/db_config.php');
$aid=$_GET['id'];
//print($aid);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
    
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
    <form>
<div class="container">


		<div class="modal-content">

                <div class="modal-body">
                        <form name="myform"  id="article_form" >
                        <div class="form-group">
                          <label for="usr"> Article Title </label>
                          <input type="text" class="form-control" id="article_title" required>
                        </div>
                        
                        <div class="form-group">
                         <label for="usr"> Article Description </label>
                    <textarea class="form-control" id="art_desp" id="" placeholder="Article Description" required="required" ></textarea>
                    
                  </div>
                        
                        <div class="form-group">
                          <label for="usr"> Images</label>
                          <input type="file" class="form-control" name="files" id="img_file" multiple >
                        </div>
                        
             <div class="form-group">
                <label for="article_caterogy">Article Category</label>
                <select id="article_caterogy" class="form-control" required>
                  <option selected>Choose...</option>
                  <option value="11">Arts</option>
                  <option value="12">Culture</option>
                  <option value="13">Science</option>
                  <option value="14">Education</option>
                  <option value="15">Health</option>                  
                  <option value="16">Space</option>
                  <option value="17">Sports</option>
                  <option value="18">Politics</option>
                </select>
              </div>

                        
                        <div class="form-group">
                          <label for="usr"> Article Tags </label>
                          <input type="text" class="form-control" id="article_tags" required>
                        </div>
        
         <div class="modal-footer">
            <input type="submit" class="btn btn-success btn-lg" id="update_article" name="submit" value="update"/>
                     <a class="btn btn-success btn-lg" href="dashboard.php">close</a>
            
          </div>
          <input type="hidden" id="a_aid" name="artID" value="">
        </form>
        <div id="imag">
        
        </div>
        <p id="err_msg" style="color:red;size:12px;"></p><p id="cr_msg" style="color:green;size:12px;"></p>
</div >


<?php
 $stmt1=$dbcon->prepare("select * from a_images where aid=? ");
        $stmt1->execute(array($aid));
        $imgarr=array();
        $i=0;
        foreach($stmt1 as $row)
        {
                 $data1=$row['image'];
                 echo '<img class="rounded imgstyle" src ="data:image/jpeg;base64,'.base64_encode($data1).'"  > ';
                 echo '<a class="btn btn-success btn-lg" href="php/delete_image.php?id='.$row['imgid'].'&aid='.$row['aid'].' ">delete</a>';
                
                
                
        }


?>


</div>
</div>        

</body>
</form>

<script>

$(document).ready(function(){
    
    
   
   
   var data_id=window.location.search;
   
  

                   
   
   
   $.ajax({
       url:'php/get_article.php'.concat(data_id),
       cache: false,
       contentType: false,
       
       processData: false, 
       type:'GET',
       success: function(usr_result){
               var usr=JSON.parse(usr_result);
               //console.log(usr[0]['id'].length);
               if(usr.flag==1){
                       $('#article_title').val(usr.atit);
                       $('#art_desp').val(usr.desp);
                       $('#article_tags').val(usr.tags);
                       $('#article_caterogy').val(usr.cate);
                       
                       
               } 
               
              
               
       }       
           
           
   });





$('#update_article').on('click', function(event) {
       
        
        event.preventDefault();
         var daid='<?php echo $aid; ?>';
         var newid=parseInt(daid);
         console.log(newid);
         console.log(typeof newid);
         
        var count=0;
        var data = new FormData();
        if(document.getElementById('img_file').files.length!=0){
                jQuery.each(jQuery('#img_file')[0].files, function(i, file) {
                data.append('file'+i, file);
                count=count+1;
                });
        
        }
     data.append('aid',newid);        
    data.append('atitle',$('#article_title').val());
    data.append('adesp',$('#art_desp').val());
    data.append('acat',$('#article_caterogy').val());
    data.append('atags',$('#article_tags').val());
    data.append('cc',count);
    //alert(data);                             
    $.ajax({
        url:'php/update_article.php', // point to server-side PHP script 
        //dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: data,                         
        type: 'POST',
        success: function(usr_result){
            //alert(usr_result); // display response from the PHP script, if any
           var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 $("#err_msg").html('something went wrong try later..! </a>');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 //$("#err_msg").html('registered successfully! now login thank you')
                         alert("updated Succesfully artcile");
                         window.location.href="dashboard.php";
		         
		 }
		 else
		 {
		     	console.log(usr_result);
                $("#err_msg").html('Try Later');				
		 } 
        
        
        
        }
     });
});

});

</script>
         
</html>