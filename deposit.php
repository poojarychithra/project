<?php
include("header.php");
if(isset($_POST[submit]))
{
	$sql = "INSERT INTO  billing (purchase_date,purchase_amount,payment_type,card_type,card_number,expire_date,cvv_number,card_holder,status,customer_id) VALUES('$dt','$_POST[paid_amount]','Deposit','$_POST[card_type]','$_POST[card_number]','$_POST[expire_date]-01','$_POST[cvv_number]','$_POST[card_holder]','Active','$_SESSION[customerid]')";
	$qsql = mysqli_query($con,$sql);
	$paymentid=mysqli_insert_id($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('You have deposited Rs. $_POST[paid_amount] successfully...');</script>";
		echo "<SCRIPT>window.location='paymentreceipt.php?paymentid=$paymentid';</SCRIPT>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM payment WHERE payment_id='$_GET[editid]'";
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
		
		<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >				
		<tr>
		    <th>Deposit amount</th>
		    <td>
			<?php
			$sql = "SELECT SUM(purchase_amount) FROM billing WHERE customer_id='$_SESSION[customerid]' and status='Active' and payment_type='Deposit'";
			$qsql = mysqli_query($con,$sql);
			$rs = mysqli_fetch_array($qsql);
			echo "Rs. " . $depamt =  $rs[0];
			?>
			</td>
		</tr>

		<tr>
		    <th>Withdrawn amount</th>
		    <td>
			<?php
			$sql = "SELECT SUM(paid_amount) FROM payment WHERE customer_id='$_SESSION[customerid]' and status='Active' and payment_type='Bid'";
			$qsql = mysqli_query($con,$sql);
			$rs = mysqli_fetch_array($qsql);
			echo "Rs. " . $widamt = $rs[0];
			?></td>
		</tr>

		<tr>
		    <th>Balance amount</th>
		    <td>Rs. <?php echo $depamt-$widamt; ?></td>
		</tr>

		
		</table>

		
		<hr>
		
			<h3>Deposit <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
											<div class="w3_agileits_card_number_grid_right">
	

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Deposit amount</label>
		<span id='idpaid_amount' style="color:red;"></span>
		<input name="paid_amount" id="paid_amount" class="form-control" type="text" placeholder="Deposit amount" value="<?php 
		if($rsedit[paid_amount] != "")
		{
		echo $rsedit[paid_amount]; 
		}
		else
		{
		echo "100";
		}
		?>"
		readonly style="background-color:#ddd;color:black;font-size:18px;" >
	</div>
</div>

<div class="controls">
	<label class="control-label">Card type</label>
	<span id='idcard_type' style="color:red;"></span>
	<br>
	<select name="card_type" id="card_type" class="form-control">
		<option value=''>Select</option>
		<option value='Credit card'>Credit card</option>
		<option value='Debit Card'>Debit Card</option>
	</select>
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Card holder</label>
		<span id='idcard_holder' style="color:red;"></span>
		<input name="card_holder" id="card_holder" class="form-control" placeholder="card holder"  value="<?php echo $rsedit[card_holder]; ?>">
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Card number</label>
		<span id='idcard_number' style="color:red;"></span>
		<input name="card_number" id="card_number" class="form-control" placeholder="Card number"  value="<?php echo $rsedit[card_number]; ?>">
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">CVV number</label>
		<span id='idcvv_number' style="color:red;"></span>
		<input name="cvv_number" id="cvv_number" class="form-control" placeholder="CVV number"  value="<?php echo $rsedit[cvv_number]; ?>">
	</div>
</div>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Card Expiry date</label>
		<span id='idexpire_date' style="color:red;"></span>
		<input name="expire_date" id="expire_date" type="month" class="form-control" placeholder="expire date"  value="<?php echo $rsedit[expire_date]; ?>" min="<?php echo date("Y-m"); ?>">
	</div>
</div>

<button class="submit check_out" type="submit" name="submit">Click here to make payment</button>
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
	
	if(!document.getElementById("paid_amount").value.match(numericExpression))
	{
		document.getElementById("idpaid_amount").innerHTML ="Paid amount must contain digits....";	
		i=1;		
	}
	if(document.getElementById("paid_amount").value == "")
	{
		document.getElementById("idpaid_amount").innerHTML ="Paid amount cannot be empty....";	
		i=1;		
	}
	if(document.getElementById("card_type").value=="")
	{
		document.getElementById("idcard_type").innerHTML ="Kindly select the type...";	
		i=1;		
	}
	if(!document.getElementById("card_holder").value.match(alphaspaceExp))
	{
		document.getElementById("idcard_holder").innerHTML ="Holder name must contain alphabets....";	
		i=1;		
	}	
	if(document.getElementById("card_holder").value=="")
	{
		document.getElementById("idcard_holder").innerHTML ="Holder name cannot be blank..";	
		i=1;		
	}
	if(!document.getElementById("card_number").value.match(numericExpression))
	{
		document.getElementById("idcard_number").innerHTML ="Card number must contain digits....";	
		i=1;		
	}
	if(document.getElementById("card_number").value=="")
	{
		document.getElementById("idcard_number").innerHTML ="Card number cannot be blank..";	
		i=1;		
	}
	if(document.getElementById("card_number").value.length != 16)
	{
		document.getElementById("idcard_number").innerHTML ="Card number should contain 16 digit..";	
		i=1;		
	}
	if(!document.getElementById("cvv_number").value.match(numericExpression))
	{
		document.getElementById("idcvv_number").innerHTML ="CVV number must contain digits....";	
		i=1;		
	}
	if(document.getElementById("cvv_number").value=="")
	{
		document.getElementById("idcvv_number").innerHTML ="CVV number cannot be blank..";	
		i=1;		
	}
	if(document.getElementById("cvv_number").value.length != 3)
	{
		document.getElementById("idcvv_number").innerHTML ="CVV number should contain 3 digit..";	
		i=1;		
	}
	if(document.getElementById("expire_date").value=="")
	{
		document.getElementById("idexpire_date").innerHTML ="Kindly enter the date....";	
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