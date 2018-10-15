<?php
ini_set('display_errors', 1);
session_start();


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Article</title>
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.0.0/flatly/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/paraia_multi_select.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <style>
    body { background-color: #fafafa; font-family: 'Roboto'; }
    .container { margin: 150px auto; }
    
    
    .modal-content{
			background-color: darkcyan;
		}
		.btn-link{
			color:white;
		}
		.modal-heading h2{
			color:#ffffff;
		}
                
                .modal-content  {
                height:570px;
                }
                
                .modal-body {
    position: sticky;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    margin-top: 140px;
}

.form-control {
    display: block;
    width: 75%;
    padding: 0.375rem 0.75rem;
    font-size: 0.9375rem;
    line-height: 1.5;
    color: #7b8a8b;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
    align: center;
}
.modal-register{
  
  position: sticky;
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    margin:auto ;
    width: 100%;
    padding-left: 90px;



}
</style>
</head>
<body>
<div class="container">

    
    <div class="row">
        <div class="col-md-6">
        <h1 class="text-center">Register</h1>
        <div class="modal-content">
        
            <br>
            
           <div class="modal-register">
            <form>
            
            <input type="text" class="form-control"  name="fname" placeholder="first name" id="first_name" required>
            <br>
            <input type="text" class="form-control"  name="lname" placeholder="last name" id="last_name" required>
            <br>
            <input type="text"  class="form-control"  name="phone" placeholder="phone" id="phone" required>
            <br>
            <input type="email" class="form-control"  name="email" placeholder="email" id="email" required>
            <br>
            <input type="password" class="form-control"  name="pass1" placeholder="password" id="pass" required>
            <br>
            <input type="password" class="form-control"  name="pass2" placeholder="Confirm password" id="con_pass" required>
            <br>
            <input type="Date" class="form-control"  name="date" placeholder="Date of Brith" id="dob" max="2000-12-31" min="1918-12-31" required>
            <br>
            <input type="text" class="form-control" name="brands" data-paraia-multi-select="true" placeholder="Select a brand" id="preferences" >
            <br>
                   
                   
                   
            
            <!--button class="btn btn-primary" id="show_selected">Show Selected Items</button-->
             <input type="submit" id="submit" class="btn btn-success btn-lg" name="submit" value="submit"/>
             
              
             
        </form>
        </div>
        <p id="err_msg" style="color:red;size:12px;"></p><p id="cr_msg" style="color:green;size:12px;"></p>

        </div>
        </div>
       
        
      <div class="col-md-1">

</div>      
        
        
        <div class="col-md-5">
        <h2 style="text-align:center;color:black;">Login</h2>
        <div class="modal-heading" style="">
				
			</div>
        <div class="modal-dialog">
		<div class="modal-content">
			
			<hr />
			<div class="modal-body">
				<form action="" role="form">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-user"></span>
							</span>
							<input type="text" class="form-control" placeholder="User Name" id="uname" required>
						</div><br>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
							<span class="glyphicon glyphicon-lock"></span>
							</span>
							<input type="password" class="form-control" placeholder="Password" id="password" required>

						</div>

					</div>
       <br/>
       <br/>
       <br/>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg" id="submit-login" >Login</button>
						<a href="#" class="btn btn-link">forget Password</a>
					</div>

				</form>
			</div>
		</div>
	</div>

    </div>
</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="dist/js/paraia_multi_select.min.js"></script>
<script>
    // You'd better put the code inside ready() function
    $(document).ready(function () {
        // Items to select
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
            defaults: [11],
            rtl: false
        });

        // Get selected items
        $('#show_selected').click(function () {
            alert(select.paraia_multi_select('get_items'))
        });
        
        $("#submit").click(function (event) {
        
          event.preventDefault();            
          console.log($('#first_name').val());
          console.log($('#dob').val());
          
          var regname = /^[a-zA-Z ]+$/;
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
         // password verification
         
         var pas=document.getElementById('pass');
         var cpas=document.getElementById('con_pass');
         if ( pas.value!=cpas.value){
          $("#err_msg").html('*Invalid password');
                pas.value="";
	        cpas.value="";
                $("#pass").focus();
	  
                return false;
          }
         
         
         var pref=select.paraia_multi_select('get_items')
          if (pref==""){
          $("#err_msg").html("select the preferences");
          }
          
          console.log(pref);
            
        var json_data={
	        "fname":$("#first_name").val(),
		"lname":$("#last_name").val(),
		"email":$("#email").val(),
		"password":$("#pass").val(),
		"preferences":pref.toString(),
                "phone":$("#phone").val(),
                "dob":$('#dob').val()
		
		 };
     console.log(json_data);
   
   $.ajax({
	type:'POST',
	url:'php/reg.php',
	data:json_data,
	success:function(usr_result)
	{
		//alert("i called "+usr_result);
              
                var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {
			 $("#err_msg").html('email id is already registered login with your ceredentials </a>');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 
                         $("#cr_msg").html('registered successfully! now login thank you')
                         alert("Succesfully Registered, Login")
		         
		 }
		 else
		 {
		     	console.log(usr_result.flag+"part"+usr_result);
                $("#err_msg").html('failed to register try again');				
		 } 
	}	
});
       
        
        
        
        });
        
        
$("#submit-login").click(function (event) {

          event.preventDefault();         
          
         
         json_data1={
                "username":$('#uname').val(),
                "password":$('#password').val()
         };
         console.log(json_data1);
  $.ajax({
	type:'POST',
	url:'php/login.php',
	data:json_data1,
	success:function(usr_result)
	{
		//alert("i called "+usr_result);
              
                var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result==0)
		 {

                         $("#err_msg").html('username or password incorrect </a>');
			 
		 }
		 else if(usr_result==1)
		 {
		     	 //$("#err_msg").html('registered successfully! now login thank you')
                         alert("Succesfull login");
                         window.location.href="dashboard.html";
		         
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
