<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	include("sendmail.php");
	//Insert statement starts here
	$dt = date("Y-m-d");
	$sql = "INSERT INTO  billing (card_type,card_number,expire_date,cvv_number,card_holder,status,customerid,bookingid) VALUES('$_POST[card_type]','$_POST[card_number]','$_POST[expire_date]-01','$_POST[cvv_number]','$_POST[card_holder]','Active','$_SESSION[customerid]','$_GET[bookingid]')";
	$qsql = mysqli_query($con,$sql);
	$billingid = mysqli_insert_id($con);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		$sqlcustomer="SELECT * FROM customer WHERE customerid='$_SESSION[customerid]'";
		$qsqlcustomer = mysqli_query($con,$sqlcustomer);
		$rscustomer = mysqli_fetch_array($qsqlcustomer);

$msg = "Online Tech store...".$_POST[msg];
//echo $mailmsg = $_POST[mailmsg];
sendmail($rscustomer[email],"Product booking report..",$msg,"Online Tech store")

?>
<iframe id="contact" src="http://smsc.co.in/api/mt/SendSMS?APIKey=04024e1f-2d50-4874-b1b5-b1b1d901e928&senderid=TESTIN&channel=2&DCS=0&flashsms=0&number=91<?php echo $rscustomer[phone]; ?>&text=<?php echo $msg; ?>&route=1" allowtransparency="true" frameborder="0" scrolling="yes" style="visibility:Hidden;"></iframe>
<?php
		
		
		
		echo "<SCRIPT>alert('Payment done successfully...');</SCRIPT>";
		$insid = mysqli_insert_id($con);
		
		echo "<script>window.location='billingreceipt.php?billingid=$billingid';</script>";
	
	}
}
//This code is to select data while updating
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM billing WHERE billingid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//This code is to select data while updating ends here	




$sqlproduct ="SELECT * FROM `product` LEFT JOIN booking ON product.productid=booking.productid where booking.bookingid=$_GET[bookingid]"; 
$qsqlproduct = mysqli_query($con,$sqlproduct);
$rsproduct= mysqli_fetch_array($qsqlproduct);


?>


<!-- display all-->
	 <div class="col-md-12 col-sm-12 w3features-right">			

					<div class="w3l_banner_nav_right">
<!-- about -->



<div class="privacy about">
			<h3>Payment <span>Receipt</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form  action="" method="post" name="billingfrm" onsubmit="return validateform()" > 
				
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Product name</label>
		<input type="text" class="form-control" name="productname" value='<?php echo $rsproduct[productname];?>'  readonly style="background-color:grey;color:white;" /><br><br>
	</div>
 </div>
 
 <div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Company name</label>
		<input type="text" class="form-control" name="productname" value='<?php echo $rsproduct[company];?>'  readonly style="background-color:grey;color:white;" /><br><br>
	</div>
 </div>
 
 <div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Warranty</label>
		<input type="text" class="form-control" name="productname" value='<?php echo $rsproduct[warranty];?>'  readonly style="background-color:grey;color:white;" /><br><br>
	</div>
 </div>

 
 <div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Cost</label>
		<input type="text" class="form-control" name="productname" value='<?php echo $rsproduct[cost];?>'  readonly style="background-color:grey;color:white;" /><br><br>
	</div>
 </div>




</form>
</div>
</div>
</div>
</div>
</div>

<?php
$mailmsg  = "<center>Online Tech store<center>
<b>Thanks for booking Product in Online Tech store...</b><br>";
$mailmsg  = "<br>". $mailmsg. " product:" . $rsproduct[productname].".. ";
$mailmsg  = "<br>". "<br>". $mailmsg . "company name: " . $rsproduct[company].".. ";
$mailmsg  = "<br>". $mailmsg ."cost: " . $rsproduct[cost].".. "; 
$mailmsg = "<br>". $mailmsg. " Amount - ". $rsproduct[cost];

$msg  = " Thanks for booking Product in Online Tech store...";
$msg  = $msg. " product:" . $rsproduct[productname].".. ";
$msg  = $msg . "company name: " . $rsproduct[company].".. ";
$msg  = $msg ."cost: " . $rsproduct[cost].".. ";
$msg = $msg. " Amount - ".$rsproduct[cost];
?>	
<input type='hidden' name="msg" value="<?php echo $msg; ?>" />	
<input type='hidden' name="mailmsg" value="<?php echo $mailmsg; ?>" />	





<!-- banner -->

		
		<div class="w3l_banner_nav_right">
<!-- about -->

		<div class="privacy about">
			<h3 align="center">Billing <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
	<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >				
		<tr>
		    <th>Product name</th>
		    <td>
			<?php
				echo $rsproduct[productname];
			?>
			</td>
		</tr>
		
	</table>

<div class="controls">

		<label class="control-label"><b style='color:green;'>Amount to be paid</b></label>
		<input type="text" class="form-control" name="productname" value='<?php echo $rsproduct[cost];?>'  readonly style="background-color:grey;color:white;" /><br><br>
	</div>



<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
	
	
	<label class="control-label">card type</label>
	<span id='idcard_type' style="color:red;"></span>
	<br>
	<select name="card_type" id="card_type" class="form-control">
		<option value=''>Select</option>
		<option value='Credit card'>Credit card</option>
		<option value='Debit Card'>Debit Card</option>
		<option value='VISA'>VISA</option>
		<option value='Master Card'>Master Card</option>
		
	</select>
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
		<label class="control-label">Expire date</label>
		<span id='idexpire_date' style="color:red;"></span>
		<input name="expire_date" id="expire_date" type="date" class="form-control" min="2019-11-23" placeholder="expire date"  value="<?php echo $rsedit[expire_date]; ?>">
		
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
		<label class="control-label">Card holder</label>
		<span id='idcard_holder' style="color:red;"></span>
		<input name="card_holder" id="card_holder" class="form-control" placeholder="card holder"  value="<?php echo $rsedit[card_holder]; ?>">
		
	</div>
</div>

</div>
<button class="submit check_out" type="submit" name="submit">Click here to Make payment</button>
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
	var alphaExp = /^[a-zA-Z\s]+$/;	//Variable to validate only alphabets
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(document.getElementById("card_type").value == "")
	{
		document.getElementById("idcard_type").innerHTML ="Kindly select card type....";	
		i=1;		
	}	
	
	if(document.getElementById("card_number").value.length != 16)
	{
		document.getElementById("idcard_number").innerHTML ="Card number should contain 16 digits..";	
		i=1;		
	}
	if(!document.getElementById("card_number").value.match(numericExpression))
	{
		document.getElementById("idcard_number").innerHTML ="Card number should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("card_number").value == "")
	{
		document.getElementById("idcard_number").innerHTML ="Card number should not be empty....";	
		i=1;		
	}	
	if(document.getElementById("expire_date").value=="")
	{
		document.getElementById("idexpire_date").innerHTML ="Expire date should not be empty..";	
		i=1;		
	}
	if(document.getElementById("cvv_number").value.length != 3)
	{
		document.getElementById("idcvv_number").innerHTML ="Cvv number should contain 3 digits....";	
		i=1;		
	}
	if(!document.getElementById("cvv_number").value.match(numericExpression))
	{
		document.getElementById("idcvv_number").innerHTML="Cvv number should contain only digits..";	
		i=1;		
	}
	if(document.getElementById("cvv_number").value == "")
	{
		document.getElementById("idcvv_number").innerHTML ="Cvv number should not be empty....";	
		i=1;		
	}
	
	if(!document.getElementById("card_holder").value.match(alphaExp))
	{
		document.getElementById("idcard_holder").innerHTML ="Card holder name should contain only alphabets....";	
		i=1;		
	}
if(document.getElementById("card_holder").value == "")
	{
		document.getElementById("idcard_holder").innerHTML ="Card holder name should not be empty....";	
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
