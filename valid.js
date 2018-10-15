function validate()
{
  var regname = /^[a-zA-Z]+$/;
  var fname=document.getElementById('fn');
  console.log("start validate");
  if(fname.value=="") 
  {
      $("#err_msg").html("*please enter name");  
      $("#fn").focus(); 
      return false;
  }
  if(!fname.value.match(regname))
  {
	 $("#err_msg").html("* please enter a proper name");
     fname.focus(); 
      return false;
  }
  var lname=document.getElementById('ln');
    if(lname.value=="")
	{
		$("#err_msg").html("please enter last name");
	    lname.focus();
	    return false;
	}	
   
   if(!lname.value.match(regname))
  {	
      $("#err_msg").html("please enter proper last name");  
      $("#ln").focus(); 
	  return false;
  }
	
 if((document.getElementById('eid').value)=="")
  {
	$("#err_msg").html("*Enter the email");
	document.getElementById('eid').focus();
	return false;
  }
 var e=document.getElementById('eid').value;
 var atpos=e.indexOf("@");
 var dotpos=e.lastIndexOf(".");
if(atpos<1 || dotpos<atpos+2 || dotpos+2>e.length)
 {
	$("#err_msg").html('*Invalid email');
	document.getElementById('eid').focus();
	return false;
 }
	
 var pas=document.getElementById('pass');
 var cpas=document.getElementById('cpass');
  if(pas.value=="" && cpas.value=="")
  {
	  $("#err_msg").html("*enter password");
       pas.focus();
	  return false;
       
  }
  else if(pas.value.length<6)
  {
	  $("#err_msg").html("*password length should be min 6");
	  pas.focus();
	  return false;
  }
  
  else if(pas.value != cpas.value)
  {
	  $("#err_msg").html("*password doesnot match");
	  pas.value="";
	  cpas.value="";
      $("#pass").focus();
	  return false;
  }
  
 var no=document.getElementById('ph').value;
 if((document.getElementById('ph').value)=="")
 $("#err_msg").html('*Enter mobile Number');
 if(no.length>10 || no.length<10)
  {
	$("#err_msg").html('*mobile no. shd b 10digit');
	return false;
}
if(!(no.charAt(0)=="9" || no.charAt(0)=="8" || no.charAt(0)=="7"))
 {
	$("#err_msg").html('*mobile no. invalid should stat wit 9 or 8 or 7');
	return false;
}
var ph = /^\d{10}$/;
if((document.getElementById('ph').value.match(ph)))
{
	document.getElementById('ph').focus();
}
else
{
	$("#err_msg").html('*Invalid phone number');
	document.getElementById('ph').focus();
	return false;
}





  
  if (document.getElementById('country').value=="cn")
  {
	  $("#err_msg").html("*please select your country");
      return false;
  }

  console.log("validate");
  
   
   console.log("json data started");
   
   var json_data={
	    "fname":$("#fn").val(),
		"lname":$("#ln").val(),
		"email":$("#eid").val(),
		"password":$("#pass").val(),
		"phone":$("#ph").val(),
		"country":$("#country").val(),
        "state":$("#st").val()
		 };
     console.log(json_data);
   
   
		//"emp_id": $('#e_id').val(),
   

console.log("ajax code started");

$.ajax({
	type:'POST',
	url:'./phpscript/reg.php',
	data:json_data,
	success:function(usr_result)
	{
		var usr_result=JSON.parse(usr_result);
		 console.log(usr_result);
		 if(usr_result.flag==2)
		 {
			 $("#err_msg").html('email id is already registered <a href="indexlog.php">click to login</a>');
			 
		 }
		 else if(usr_result.flag==1)
		 {
		     	 $("#err_msg").html('registered successfully! thank you')
		         
		 }
		 else
		 {
		     	console.log(usr_result.flag+"part"+usr_result.message);
                $("#err_msg").html('failed to register try again');				
		 }
	}	
});

	
	
}