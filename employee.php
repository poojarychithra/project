<?php
include("header.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql = "UPDATE admin SET adminname='$_POST[adminname]',loginid='$_POST[loginid]',password='$_POST[password]',cpassword='$_POST[cpassword]',emp_type='$_POST[emp_type]' where adminid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('employee record updated successfully..');</script>";
			
		}
	}
	else
	{
	$sql = "INSERT INTO admin (adminname,loginid,password,cpassword,emp_type) VALUES('$_POST[adminname]','$_POST[loginid]','$_POST[password]','$_POST[cpassword]','$_POST[emp_type]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('employee record inserted successfully..');</script>";
		echo "<script>window.location='viewemployee.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET[editid]))
	{
	$sqledit = "SELECT * FROM admin WHERE adminid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit= mysqli_fetch_array($qsqledit);
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
			<h3>Add Employee <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
<div class="controls">
<label class="control-label">Employee Name: </label>
<span id='idadminname' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="adminname" id="adminname" placeholder="Employee name"  value="<?php echo $rsedit[adminname]; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Login ID:</label>
		<span id='idloginid' style="color:red;"></span>
		<input name="loginid"id="loginid" class="form-control" type="text" placeholder="Login ID"  value="<?php echo $rsedit[loginid]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Password:</label>
		<span id='idpassword' style="color:red;"></span>
		<input name="password" id="password"class="form-control" type="password" placeholder="Password"  value="<?php echo $rsedit[password]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Confirm Password:</label>
		<span id='idcpassword' style="color:red;"></span>
		<input name="cpassword" id="cpassword" class="form-control" type="password" placeholder="Confirm Password"  value="<?php echo $rsedit[cpassword]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_right">
	<div class="controls">
		<label class="control-label">Employee Type: </label>
<span id='idemp_type' style="color:red;"></span>
<select name="emp_type" id="emp_type" class="form-control" placeholder="Enter Employee type"  value="<?php echo $rsedit[emp_type]; ?>">
<option value=''>Select</option>
<option value='Employee'>Employee</option>
<option value='Admin'>Admin</option>
</select>
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
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id		
 var passw=  /^[A-Za-z]\w{7,14}$/;	//For password	
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("adminname").value.match(alphaExp))
	{
		document.getElementById("idadminname").innerHTML ="Employee name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("adminname").value == "")
	{
		document.getElementById("idadminname").innerHTML ="Employee name should not be empty....";	
		i=1;		
	}
	
	if(document.getElementById("loginid").value == "")
	{
		document.getElementById("idloginid").innerHTML ="Login ID should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("loginid").value.match(emailpattern))
	{
		document.getElementById("idloginid").innerHTML ="Entered Email ID is not valid...";	
		i=1;		
	}
	
	if(!document.getElementById("password").value.match(passw))
	{
		document.getElementById("idpassword").innerHTML ="should have 7 to 15 characters which contain only characters, numeric digits, underscore and first character must be a letter..";	
		i=1;		
	}
	if(document.getElementById("password").value == "")
	{
		document.getElementById("idpassword").innerHTML ="Password should not be empty....";	
		i=1;		
	}
		if(document.getElementById("cpassword").value == "")
	{
		document.getElementById("idcpassword").innerHTML ="cPassword should not be empty....";	
		i=1;		
	}
	
	if(document.getElementById("password").value != document.getElementById("cpassword").value)
	{
		document.getElementById("idcpassword").innerHTML ="cPassword and confirm password must match.....";	
		i=1;		
	}
	if(document.getElementById("emp_type").value == "")
	{
		document.getElementById("idemp_type").innerHTML ="Kindly select Employee type....";	
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