<?php
include("header.php");
if(isset($_SESSION["adminid"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST["empsubmit"]))
{
	$sql = "INSERT INTO admin (adminname,loginid,password,cpassword) VALUES ('$_POST[adminname]','$_POST[loginid]','$_POST[password]','$_POST[cpassword]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Registration done successfully..');</script>";
		echo "<script>window.location='emplogin.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	
}
?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
<!-- login -->
		<div class="w3_login">
			<h3>Admin Registration Panel</h3>
			<div class="w3_login_module">
				<div class="module form-module">
				  <div><i class="fa"></i>
					<div class="tooltip">Click Me</div>
				  </div>
				  <div class="form">
					<h2>Kindly enter Registration details</h2>
					<form action="" method="post" onsubmit="return validateform()">
					<span id='idadminname' style="color:red;"></span>
					  <input type="text" name="adminname" id="adminname" placeholder="User Name" >
					  
					  
					  
					  <span id='idloginid' style="color:red;"></span>
					  <input type="text" name="loginid" id="loginid" placeholder="Email Address" >
					  
					  <span id='idpassword' style="color:red;"></span>
					  <input type="password" name="password" id="password" placeholder="Password" >
					  
					  <span id='idcpassword' style="color:red;"></span>
					  <input type="password" name="cpassword" id="cpassword" placeholder="Confirm Password" >
					  
					  
					  
					  
					  <input type="submit" name="empsubmit" value="Register">
					</form>
				  </div>
				  <div class="cta">
					Are you existing User?<br>
				  <a href="login.php">
				   <input type="submit"  value="Click Here to Login">
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
      var passw=  /^[A-Za-z]\w{7,14}$/;	
	$("span").html("");
	var i=0;
	/* ########end 1######## */
		if(document.getElementById("adminname").value == "")
	{
		document.getElementById("idadminname").innerHTML ="Customer name should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("adminname").value.match(alphaspaceExp))
	{
		document.getElementById("idadminname").innerHTML ="admin name should contain only alphabets....";	
		i=1;		
	}

	if(document.getElementById("loginid").value == "")
	{
		document.getElementById("idloginid").innerHTML ="Email ID should not be empty....";	
		i=1;		
	}	
	if(!document.getElementById("loginid").value.match(emailpattern))
	{
		document.getElementById("idloginid").innerHTML ="Entered Email ID is not valid...";	
		i=1;		
	}
	
	if(document.getElementById("password").value == "")
	{
		document.getElementById("idpassword").innerHTML ="Password should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("password").value.match(passw))
	{
		document.getElementById("idpassword").innerHTML ="7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter";	
		i=1;		
	}
	
	if(document.getElementById("cpassword").value == "")
	{
		document.getElementById("idcpassword").innerHTML ="confirm Password should not be empty....";	
		i=1;		
	}
	if((document.getElementById("password").value)!=(document.getElementById("cpassword").value))
	{
		document.getElementById("idcpassword").innerHTML ="Password should match confirm password..";	
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
