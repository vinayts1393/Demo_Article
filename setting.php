<?php
ini_set('display_errors', 1);
session_start();
//print($_SESSION['preferences']);
$prefrences=$_SESSION['preferences'];
          
 $dob=  $_SESSION['dob'];
 $phone=  $_SESSION['phone'];
 $fname=  $_SESSION['fname'];
 $lname=  $_SESSION['lname'];     

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

  .modal-content{ height:500px;}

.modal-body {
   position: sticky;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
   flex: 1 1 auto;
    padding: 1rem;
    margin-top: 10px;
}        
                
                
        </style>    
   
</head>

<body>
<div class="container">


		<div class="modal-content">
			
			
			<div class="modal-body">
				<div class="form group">
				<div class="radio">
                                        <label><input type="radio" name="optradio" id="change_pass" value="1"  />Password reset</label>
                                        </div>
                                        <div class="radio">
                                          <label><input type="radio" name="optradio" id="change_pref" value="2" />change preferences</label>
                                        </div>	
                                        <div class="radio">
                                          <label><input type="radio" name="optradio" id="change_personal" value="3" />personal info</label>
                                        </div>	
                                    </div>   
                                <div id="divpass">
                                <div class="form-group">
                                  <label for="usr">New Password:</label>
                                  <input type="password" class="form-control" id="pass">
                                </div>
                                       <div class="form-group">
                                  <label for="usr">Confirm Password:</label>
                                  <input type="password" class="form-control" id="con_pass">
                                </div>
				
                                
                                <div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg" id="update_pass" >update password</button>
						
					</div></div>
                                <div id="pref">
                                
                                <input type="text" class="form-control" name="brands" data-paraia-multi-select="true" placeholder="Select a brand" id="preferences" >
            
                                <div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg" id="update_pref" >update Preferences</button>
						
					</div>
                                 </div>
                                 
                                 <div id="divpersonal">
                                <div class="form-group">
                                  <label for="usr">first name:</label>
                                  <input type="text" class="form-control" id="first_name" required>
                                </div>
                               <div class="form-group">
                                  <label for="usr">Last name:</label>
                                  <input type="text" class="form-control" id="last_name" required>
                                </div>
                                 
                                <div class="form-group">
                                  <label for="usr">phone:</label>
                                  <input type="number" class="form-control" id="phone" required>
                                </div>
                                <div class="form-group">
                                  <label for="usr">DOB:</label>
                                  <input type="date" class="form-control" id="dob"  required>
                                </div>
				<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg" id="update_personal" >update</button>
						
					</div>	
                       
				
			</div>
		</div>
	

         <a class="btn btn-success btn-lg" href="dashboard.html">close</a>
</div>
<p id="err_msg" style="color:red;size:12px;"></p><p id="cr_msg" style="color:green;size:12px;"></p>
</div>
<script src="dist/js/paraia_multi_select.min.js"></script>

<script>
    // You'd better put the code inside ready() function
    $(document).ready(function () {
        // Items to select
        
        
        
        $('#divpass').hide();
         $('#pref').hide();
         $('#divpersonal').hide();
        var pref="<?php echo $prefrences;?>";
        console.log(pref)
        var items = [
            {value: 11, text: 'Arts'},
            {value: 12, text: 'Culture'},
            {value: 13, text: 'Science'},
            {value: 14, text: 'Education'},
            {value: 15, text: 'Health'},
            {value: 16, text: 'Space'},
            {value: 17, text: 'Sports'},
            {value: 18, text: 'Politics'}
        ];

        // Initialize paraia-multi-select
        var select = $('[data-paraia-multi-select="true"]').paraia_multi_select({
            multi_select: true,
            items: items,
            defaults: JSON.parse("[" +pref+"]"),
            rtl: false
        });
        
       
        
        
        $("#change_pass").click(function (){
                
        $('#divpass').show();
        $('#pref').hide();
         $('#divpersonal').hide();       
        });
        
        
        $("#change_pref").click(function (){
            $('#divpersonal').hide();      
            $('#divpass').hide();
            $('#pref').show();
        
                
        });
        
        $('#change_personal').click(function (){
          
          $('#divpass').hide();
          $('#pref').hide();   
          $('#divpersonal').show();      
          $('#first_name').val("<?php echo $fname; ?>");
          $('#last_name').val("<?php echo $lname; ?>");
          $('#phone').val("<?php echo $phone; ?>");
          var d_str="<?php echo $dob; ?>";
         
          
          $('#dob').val(d_str); 
           console.log($('#dob').val());     
        });
        
        
 // update personal info

        $('#update_personal').click(function (event){
                
         event.preventDefault();            
          console.log($('#first_name').val());
          console.log($('#dob').val());
          
          var regname = /^[a-zA-Z]+$/;
        var fname=document.getElementById('first_name');
        console.log("start validate");
  
          if(!fname.value.match(regname))
          {
             $("#err_msg").html("* please enter a proper name");
             fname.focus(); 
              return false;
          }
           // last name 
         var lname=document.getElementById('last_name');
        console.log("start validate");
  
          if(!lname.value.match(regname))
          {
             $("#err_msg").html("* please enter a proper last name");
             fname.focus(); 
              return false;
          }  
          
         //phone number          
          var no=document.getElementById('phone').value;
         if((document.getElementById('phone').value)=="")
         $("#err_msg").html('*Enter mobile Number');
         if(no.length>10 || no.length<10)
          {
                $("#err_msg").html('*mobile no. shd b 10digit');
                return false;
        }
        if(!(no.charAt(0)=="9" || no.charAt(0)=="8" || no.charAt(0)=="7" || no.charAt(0)=="6"))
         {
                $("#err_msg").html('*mobile no. invalid should start with 6,7,8,9 ');
                return false;
        }
        var ph = /^\d{10}$/;
        if((document.getElementById('phone').value.match(ph)))
        {
                document.getElementById('phone').focus();
        }
        else
        {
                $("#err_msg").html('*Invalid phone number');
                document.getElementById('phone').focus();
                return false;
        }       
                
                
                
        var json_data={
	        "fname":$("#first_name").val(),
		"lname":$("#last_name").val(),
                "phone":$("#phone").val(),
                "dob":$('#dob').val()
		
		 };
         $.ajax({
	type:'POST',
	url:'php/update_personal.php',
	data:json_data,
	success:function(usr_result)
	{
		//alert("i called "+usr_result);
              
                var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 $("#err_msg").html('something went wrong try later..! </a>');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 //$("#err_msg").html('registered successfully! now login thank you')
                         alert("Succesfully Updated");
                         window.location.href="setting.php";
		         
		 }
		 else
		 {
		     	console.log(usr_result);
                $("#err_msg").html('Try Later');				
		 } 
	}	
        });       
                
        });
        
        
        $('#update_pref').click(function (event){
         
        
          event.preventDefault();            
         var pref=select.paraia_multi_select('get_items')
          if (pref==""){
          $("#err_msg").html("select the preferences");
          }
          
          var json_pref={
                  'pref':pref.toString()
                  
                  
          };      
                
                  $.ajax({
	type:'POST',
	url:'php/update_pref.php',
	data:json_pref,
	success:function(usr_result)
	{
		//alert("i called "+usr_result);
              
                var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 $("#err_msg").html('something went wrong try later..! </a>');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 //$("#err_msg").html('registered successfully! now login thank you')
                         alert("Succesfully Updated");
                         window.location.href="setting.php";
		         
		 }
		 else
		 {
		     	console.log(usr_result);
                $("#err_msg").html('Try Later');				
		 } 
	}	
        });       
                
                
        });
        
        
        
        
        $('#update_pass').click(function (event){
         
        
          event.preventDefault();            
          var pas=document.getElementById('pass');
         var cpas=document.getElementById('con_pass');
         if ( pas.value!=cpas.value){
          $("#err_msg").html('*Invalid password');
                pas.value="";
	        cpas.value="";
                $("#pass").focus();
	  
                return false;
          }
          
          var json_pass={
                  'pass':$('#pass').val()
                  
                  
          };      
                
                  $.ajax({
	type:'POST',
	url:'php/update_password.php',
	data:json_pass,
	success:function(usr_result)
	{
		//alert("i called "+usr_result);
              
                var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 $("#err_msg").html('something went wrong try later..! </a>');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 //$("#err_msg").html('registered successfully! now login thank you')
                         alert("Succesfully Updated");
                         window.location.href="setting.php";
		         
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



</body>


</html>