<?php
include("header.php");
if(isset($_POST[submit]))
{
	$sql = "UPDATE customer SET username='$_POST[username]',phone='$_POST[phone]',email='$_POST[email]' WHERE  customerid='$_SESSION[customerid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('customer profile updated successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
if(isset($_SESSION["customerid"]))
{
	$sqledit = "SELECT * FROM customer WHERE customerid='$_SESSION[customerid]'";
	$qsqledit= mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>Customer <span>Profile</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
<div class="controls">
<label class="control-label">Customer Name</label>
<span id='idusername' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="username" id="username" placeholder="customer name" value="<?php echo $rsedit[username]; ?>">
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Mobile number</label>
		<span id='idphone' style="color:red;"></span>
		<input name="phone" id="phone" class="form-control" placeholder="Mobile number" value="<?php echo $rsedit[phone]; ?>">
	</div>
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Email ID</label>
		<span id='idemail' style="color:red;"></span>
		<input name="email" id="email" class="form-control" type="text" placeholder="Email ID" value="<?php echo $rsedit[email]; ?>">
	</div>
</div>





													
</div>
<button class="submit check_out" type="submit" name="submit">Update Profile</button>
</div>
									</section>
								</form>
									
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
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
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	if(!document.getElementById("username").value.match(alphaspaceExp))
	{
		document.getElementById("idusername").innerHTML ="Customer name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("username").value == "")
	{
		document.getElementById("idusername").innerHTML ="Customer name should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("email").value.match(emailpattern))
	{
		document.getElementById("idemail").innerHTML ="Entered Email ID is not valid...";	
		i=1;		
	}
	if(document.getElementById("email").value == "")
	{
		document.getElementById("idemail").innerHTML ="Email ID should not be empty....";	
		i=1;		
	}
	
	if(!document.getElementById("phone").value.match(numericExpression))
	{
		document.getElementById("idphone").innerHTML ="Mobile number should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("phone").value == "")
	{
		document.getElementById("idphone").innerHTML ="Mobile number should not be empty....";	
		i=1;		
	}
	if(document.getElementById("phone").value.length != 10)
	{
		document.getElementById("idphone").innerHTML ="Mobile number should contain 10 digit..";	
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