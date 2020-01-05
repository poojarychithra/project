<?php
include("header.php");
if(isset($_POST[submit]))
{
	$sql = "UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]' WHERE adminid='$_SESSION[adminid]' AND emp_type='Admin'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('admin Profile updated successfully..');</script>";
	}
}

if(isset($_SESSION["adminid"]))
{
	$sqledit = "SELECT * FROM admin WHERE adminid='$_SESSION[adminid]'";
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
			<h3>Admin <span>Profile</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
<div class="controls">
<label class="control-label">Employee Name: </label>
<span id='idemp_name' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="emp_name" id="emp_name" placeholder="Employee name" value="<?php echo $rsedit[adminname]; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Login ID:</label>
		<span id='idlogin_id' style="color:red;"></span>
		<input name="login_id" id="login_id" class="form-control" type="text" placeholder="Login ID" value="<?php echo $rsedit[loginid]; ?>">
	</div>
</div>					
											</div>
<button class="submit check_out" type="submit" name="submit">Submit</button>
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
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id	
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space	      
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("emp_name").value.match(alphaspaceExp))
	{
		document.getElementById("idemp_name").innerHTML ="Customer name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("emp_name").value == "")
	{
		document.getElementById("idemp_name").innerHTML ="Customer name should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("login_id").value.match(alphaExp))
	{
		document.getElementById("idlogin_id").innerHTML ="Entered login ID is not valid...";	
		i=1;		
	}
	if(document.getElementById("login_id").value == "")
	{
		document.getElementById("idlogin_id").innerHTML ="Login ID should not be empty....";	
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