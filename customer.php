<?php
include("header.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
	    $sql = "UPDATE customer SET customer_name='$_POST[customer_name]',email_id='$_POST[email_id]',password='$_POST[password]',address='$_POST[address]',state='$_POST[state]',city='$_POST[city]',landmark='$_POST[landmark]',pincode='$_POST[pincode]',mobile_no='$_POST[mobile_no]',note='$_POST[note]',status='$_POST[status]' where customer_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('customer profile updated successfully..');</script>";
		}
	}
	  else
	{
	$sql = "INSERT INTO  customer (customer_name,email_id,password,address,state,city,landmark,pincode,mobile_no,note,status) VALUES('$_POST[customer_name]','$_POST[email_id]','$_POST[password]','$_POST[address]','$_POST[state]','$_POST[city]','$_POST[landmark]','$_POST[pincode]','$_POST[mobile_no]','$_POST[note]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('customer record inserted successfully..');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	
}
}

if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM customer WHERE customerid='$_GET[editid]'";
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
			<h3>customer <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
<div class="controls">
<label class="control-label">Customer Name</label>
<span id='idcustomer_name' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="customer_name" id="customer_name" placeholder="customer name" value="<?php echo $rsedit[customer_name]; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Email ID</label>
		<span id='idemail_id' style="color:red;"></span>
		<input name="email_id" id="email_id" class="form-control" type="email_id" placeholder="Email ID" value="<?php echo $rsedit[email_id]; ?>">
	</div>
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Password</label>
		<span id='idemail_id' style="color:red;"></span>
		<input type="password" name="password" id="password" class="form-control" placeholder="Password" value="<?php echo $rsedit[password]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Address</label>
		<span id='idaddress' style="color:red;"></span>
		<textarea name="address" id="address" class="form-control"><?php echo $rsedit[address]; ?></textarea>
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">State</label>
		<span id='idstate' style="color:red;"></span>
		<input name="state" id="state" class="form-control" placeholder="State" value="<?php echo $rsedit[state]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">City</label>
		<span id='idcity' style="color:red;"></span>
		<input name="city" id="city" class="form-control" placeholder="City" value="<?php echo $rsedit[city]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Landmark</label>
		<span id='idlandmark' style="color:red;"></span>
		<input name="landmark" id="landmark" class="form-control" placeholder="Landmark" value="<?php echo $rsedit[landmark]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Pincode</label>
		<span id='idpincode' style="color:red;"></span>
		<input name="pincode" id="pincode" class="form-control" placeholder="Pincode" value="<?php echo $rsedit[pincode]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Mobile number</label>
		<span id='idmobile_no' style="color:red;"></span>
		<input name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile number" value="<?php echo $rsedit[mobile_no]; ?>">
	</div>
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Note</label>
		<span id='idnote' style="color:red;"></span>
		<textarea name="note" id="note" class="form-control"><?php echo $rsedit[note]; ?></textarea>
	</div>
</div>
												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Status:</label>
		<span id='idstatus' style="color:red;"></span>
			<br><select name="status" id="status" style="width:90%;" class="form-control" >
				<option value=''>Select</option>
				<?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit[status])
					{
					echo "<option value='$val' selected>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
				?>
			</select>
	</div>
</div>
													
											</div>
<button class="submit check_out" type="submit" name="submit">Update profile</button>
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
	
	if(!document.getElementById("customer_name").value.match(alphaspaceExp))
	{
		document.getElementById("idcustomer_name").innerHTML ="Customer name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("customer_name").value == "")
	{
		document.getElementById("idcustomer_name").innerHTML ="Customer name should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("email_id").value.match(emailpattern))
	{
		document.getElementById("idemail_id").innerHTML ="Entered Email ID is not valid...";	
		i=1;		
	}
	if(document.getElementById("email_id").value == "")
	{
		document.getElementById("idemail_id").innerHTML ="Email ID should not be empty....";	
		i=1;		
	}	
	if(document.getElementById("password").value.length<6)
	{
		document.getElementById("idpassword").innerHTML ="Password should contain more than 6 character..";	
		i=1;		
	}
	if(document.getElementById("password").value == "")
	{
		document.getElementById("idpassword").innerHTML ="Password should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("address").value.match(alphanumericExp))
	{
		document.getElementById("idaddress").innerHTML ="Address must contain Alphabets....";	
		i=1;		
	}
	
	if(document.getElementById("address").value=="")
	{
		document.getElementById("idaddress").innerHTML ="Address cannot be empty.....";	
		i=1;		
	}	
	if(!document.getElementById("state").value.match(alphaspaceExp))
	{
		document.getElementById("idstate").innerHTML ="State must contain only alphabets..";	
		i=1;		
	}
	if(document.getElementById("state").value=="")
	{
		document.getElementById("state").innerHTML ="State cannot be empty..";	
		i=1;		
	}
	if(!document.getElementById("city").value.match(alphaspaceExp))
	{
		document.getElementById("idcity").innerHTML ="city must contain only alphabets..";	
		i=1;		
	}
	if(document.getElementById("city").value=="")
	{
		document.getElementById("idcity").innerHTML ="State cannot be empty..";	
		i=1;		
	}
	if(!document.getElementById("landmark").value.match(alphaspaceExp))
	{
		document.getElementById("idlandmark").innerHTML ="landmark must contain only alphabets..";	
		i=1;		
	}
	if(document.getElementById("landmark").value=="")
	{
		document.getElementById("idlandmark").innerHTML ="landmark cannot be empty..";	
		i=1;		
	}
	if(document.getElementById("pincode").value.length != 6)
	{
		document.getElementById("idpincode").innerHTML ="pincode should contain 6 digit..";	
		i=1;		
	}
	if(!document.getElementById("pincode").value.match(numericExpression))
	{
		document.getElementById("idpincode").innerHTML ="pincode should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("pincode").value == "")
	{
		document.getElementById("idpincode").innerHTML ="Pincode should not be empty....";	
		i=1;		
	}
	if(document.getElementById("mobile_no").value.length != 10)
	{
		document.getElementById("idmobile_no").innerHTML ="Mobile number should contain 10 digit..";	
		i=1;		
	}
	if(!document.getElementById("mobile_no").value.match(numericExpression))
	{
		document.getElementById("idmobile_no").innerHTML ="Mobile number should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("mobile_no").value == "")
	{
		document.getElementById("idmobile_no").innerHTML ="Mobile number should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("note").value.match(alphaspaceExp))
		{
		document.getElementById("idnote").innerHTML ="Note must contain digits..";	
		i=1;		
	}
	if(document.getElementById("note").value=="")
	{
		document.getElementById("idnote").innerHTML ="Note should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("status").value.match(alphaspaceExp))
		{
		document.getElementById("idstatus").innerHTML ="status must contain Alphabets..";	
		i=1;		
	}
	if(document.getElementById("status").value=="")
	{
		document.getElementById("idstatus").innerHTML ="Status should not be empty....";	
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