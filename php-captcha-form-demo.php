<?php
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title>Registration Form with PHP Captcha Demo</title>
<meta name="title" content="Registration Form with PHP Captcha Demo"/>
<meta name="description" content=""/>
<meta name="keywords" content=""/>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> 

<!-- Bootstrap -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<!-- Responsive styles-->
<link rel="stylesheet" href="css/demo-style.css"> 
<!-- Font awosome -->
<link rel="stylesheet" href="css/font-awesome.min.css">  

</head>
<body>
<section class="pading-bottom-30">
 		<div class="bg_area_1">
 		    <div class="container">  
                <div class="row">
                    <div class="form-box-size login-form-3 box-shadow"> 
                       
                        <div class="login-form-title-3">
                            <h3>Register</h3>
                        </div>  
                        <div class="login-form-box-3">
                            <div class="form-wrapper"> 
                              <form name="register" action="#null" method="post" id="register">
                                <div class="form-group">
                                  <label class="form-label" for="fname">Full Name</label>
                                  <input id="fname" class="form-input" type="text" required />
                                  <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                
                                <div class="form-group">
                                  <label class="form-label" for="email">Email</label>
                                  <input id="email" class="form-input" type="email" required />
                                 <i class="fa fa-envelope" aria-hidden="true"></i>
                                </div>
								
								<div class="form-group">
                                  <label class="form-label" for="phone">Phone</label>
                                  <input id="phone" class="form-input" type="text" required />
                                 <i class="fa fa-phone-square" aria-hidden="true"></i>
                                </div>
								
                                <div class="form-group">
                                  <label class="form-label" for="password">Password</label>
                                  <input id="password" class="form-input" type="password" required />
                                  <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
                                
                                <div class="form-group">
                                  <label class="form-label" for="cpassword">Confirm Password</label>
                                  <input id="cpassword" class="form-input" type="password" required />
                                  <i class="fa fa-lock" aria-hidden="true"></i>
                                </div>
								
								<div class="form-group">
									<div class="captcha">
									<img src="demo_captcha.php" class="imgcaptcha" alt="captcha"  />
									<img src="images/refresh.png" alt="reload" class="refresh" />
									</div>
                                  <label class="form-label" for="captcha">Captcha</label>
                                  <input id="captcha" class="form-input" type="text" required />
                                  <i class="fa fa-cog" aria-hidden="true"></i>
                                </div>
                                
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" checked><span class="checkbox-material"><span class="check"></span></span> Remember Me
                                  </label>
                                </div>
                                
                                <div class="button-style">
                                    <button class="button login">
                                       Create Account <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                              </form>
                            </div>
                        </div>  
                        
                    </div>
                </div> 
            </div> 
 		</div> 
 	</section>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="js/main.js"></script>
<script language="javascript">
$(document).ready(function(){

$(".refresh").click(function () {
    $(".imgcaptcha").attr("src","demo_captcha.php?_="+((new Date()).getTime()));
    
});


 $('#register').submit(function() {
   
 if($('#password').val() != $('#cpassword').val()){
 	alert("Please re-enter confirm password");
 	$('#cpassword').val('');
 	$('#cpassword').focus();
 	return false;
 }
	var captcha = $('#captcha').val();
	$.post("submit_demo_captcha.php?"+$("#register").serialize(), {"captcha":captcha }, function(response){
        if(response==1){
           $(".imgcaptcha").attr("src","demo_captcha.php?_="+((new Date()).getTime()));
           clear_form();
           alert("Data Submitted Successfully.")
        }else{
			$("#captcha").val('');
			alert("wrong captcha code!");
        }
	});
	return false;
    });

});

function clear_form()
     {
        $("#fname").val('');
        $("#email").val('');
        $("#phone").val('');
        $("#username").val('');
        $("#password").val('');
        $("#cpassword").val('');
		$("#captcha").val('');
     }
</script>	




</body>
</html>