<?php
include("header.php");
if(isset($_SESSION["customerid"]))
{
	echo "<script>window.location='index.php';</script>";
}
?>
<!-- banner -->
	<div class="banner">
		
		<div class="w3l_banner_nav_right">
		<!-- login -->
		<div class="w3_login">
			<h3>Sign In</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div><i class="fa"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Login to your account</h2>
						<form action="" method="post" onsubmit="return validateform()">
					<span id='idemail' style="color:red;"></span>
					  <input type="text" name="email" id="email" placeholder="Email ID" >
					  
					  <span id='idpassword' style="color:red;"></span>
					  <input type="password" name="password" id="password" placeholder="Password">
					  
					  <input type="submit" name="btnlogin" value="Login">
					</form>
				  </div>
				  <div class="form">
					<h2>Create an account</h2>
					<form action="#" method="post">
					  <input type="text" name="Username" placeholder="Username" required=" ">
					  <input type="password" name="Password" placeholder="Password" required=" ">
					  <input type="email" name="Email" placeholder="Email Address" required=" ">
					  <input type="text" name="Phone" placeholder="Phone Number" required=" ">
					  <input type="submit" value="Register">
					</form>
				  </div>
				  <div class="cta">
				  <a href="register.php">
				   <input type="submit" value="Click Here to Register">
				  </a></div>
				</div>
			</div>
			<script>
				$('.toggle').click(function(){
				  // Switches the Icon
				  $(this).children('i').toggleClass('fa-pencil');
				  // Switches the forms  
				  $('.form').animate({
					height: "toggle",
					'padding-top': 'toggle',
					'padding-bottom': 'toggle',
					opacity: "toggle"
				  }, "slow");
				});
			</script>
		</div>
<!-- //login -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<?php
include("footer.php");
?>
<script>
function validateform()
{ 
	/* #######start 1######### */
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id		
  var passw=  /^[A-Za-z]\w{7,14}$/;	//For password	
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	if(document.getElementById("email").value == "")
	{
		document.getElementById("email").innerHTML ="Email ID should not be empty....";	
		i=1;		
	}
	
	if(!document.getElementById("email").value.match(emailpattern))
	{
		document.getElementById("idemail").innerHTML ="Entered Email ID is not valid...";	
		i=1;		
	}
	if(document.getElementById("password").value == "")
	{
		document.getElementById("idpassword").innerHTML ="Password should not be empty....";	
		i=1;		
	}
		
	if(!document.getElementById("password").value.match(passw))
	{
		document.getElementById("idpassword").innerHTML ="should have 7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter";	
		i=1;		
	}
	
	
	
	/* #######start 2######### */
	if(i==0)
	{
		return true;
	}
	else
	{
	return false;
	}
	/* #######end 2######### */
}
</script>
