<?php
include("header.php");
if(isset($_POST[submit]))
{
	if(isset($_GET[editid]))
	{
		$sql = "UPDATE bidding SET customer_id='$_POST[customer_id]',product_id='$_POST[product_id]',bidding_amount='$_POST[bidding_amount]',bidding_date_time='$_POST[bidding_date_time]',note='$_POST[note]',status='$_POST[status]' where bidding_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('bidding record updated successfully..');</script>";
		}
	}
	  else
	{
	$sql = "INSERT INTO bidding (bidding_amount,bidding_date_time,note,status,customer_id,product_id) VALUES('$_POST[bidding_amount]','$_POST[bidding_date_time]','$_POST[note]','$_POST[status]','$_POST[customer_id]','$_POST[product_id]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Bidding amount inserted successfully..');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	
}
}
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM bidding WHERE bidding_id='$_GET[editid]'";
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
			<h3>Bidding <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
											<div class="controls" >
		<label class="control-label">Customer:</label>
		<span id='idcustomer_id' style="color:red;"></span>
			<br><select name="customer_id" id="customer_id" class="form-control"  >
				<option value=''>Select</option>
		<?php
		$sqlcustomer = "SELECT * FROM customer WHERE status='Active'";
		$qsqlcustomer = mysqli_query($con,$sqlcustomer);
		while($rscustomer = mysqli_fetch_array($qsqlcustomer))
		{
			echo "<OPTION VALUE='$rscustomer[customer_id]'>$rscustomer[customer_name]</option>";
		}
		?>
				</select>
	</div>
</div>

<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Product:</label>
		<span id='idproduct_id' style="color:red;"></span>
			<br><select name="product_id" id="product_id" class="form-control"  >
				<option value=''>Select</option>
		<?php
		$sqlproduct = "SELECT * FROM product WHERE status='Active'";
		$qsqlproduct = mysqli_query($con,$sqlproduct);
		while($rsproduct = mysqli_fetch_array($qsqlproduct))
		{
			echo "<OPTION VALUE='$rsproduct[product_id]'>$rsproduct[product_name]</option>";
		}
		?>
				</select>
	</div>
</div>



											
<div class="controls">
<label class="control-label">Bidding Amount: </label>
<span id='idbidding_amount' style="color:red;"></span>
<input class="billing-address-name form-control" type="int" name="bidding_amount" id="bidding_amount" placeholder="Bidding amount"  value="<?php echo $rsedit[bidding_amount]; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Bidding Date and Time:</label>
		<span id='idbidding_date_time' style="color:red;"></span>
		<input name="bidding_date_time" id="bidding_date_time" class="form-control" type="date" placeholder="bidding date and time"  value="<?php echo $rsedit[bidding_date_time]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Note:</label>
		<span id='idnote' style="color:red;"></span>
		<input name="note" id="note" class="form-control" type="text" placeholder="note">
	</div>
</div>


												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls">
		<label class="control-label">Status:</label>
		<span id='idstatus' style="color:red;"></span>
			<select name="status" id="status" class="form-control" >
				<option value=''>Select</option>
				<option value='Active'>Active</option>
				<option value='Inactive'>Inactive</option>
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
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(document.getElementById("customer_id").value == "")
	{
		document.getElementById("idcustomer_id").innerHTML ="Kindly select Customer ID....";	
		i=1;		
	}	
	if(document.getElementById("product_id").value == "")
	{
		document.getElementById("idproduct_id").innerHTML ="Kindly select Product ID....";	
		i=1;		
	}
	if(!document.getElementById("bidding_amount").value.match(numericExpression))
	{
		document.getElementById("idbidding_amount").innerHTML ="Bdding amount should only contain digits....";	
		i=1;		
	}

	if(document.getElementById("bidding_amount").value == "")
	{
		document.getElementById("idbidding_amount").innerHTML ="Bidding amount should not be empty....";	
		i=1;		
	}
	if(document.getElementById("bidding_date_time").value=="")
		{
		document.getElementById("idbidding_date_time").innerHTML ="Kindly enter the date..";	
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

