<?php
include("header.php");
if(isset($_POST[submit]))
{
	$imgname = rand(). $_FILES["file"]["name"];
	move_uploaded_file($_FILES["file"]["tmp_name"],"imgwinner/".$imgname);
	
	$sql ="UPDATE customer SET address='$_POST[address]',state='$_POST[state]',city='$_POST[city]',landmark='$_POST[landmark]',pincode='$_POST[pincode]',mobile_no='$_POST[mobile_no]' WHERE customer_id='$_POST[customer_id]'";
	$qsql = mysqli_query($con,$sql);
	
	$sql ="UPDATE winners SET winners_image='$imgname',status='Active' WHERE winner_id='$_GET[winner_id]'";
	$qsql = mysqli_query($con,$sql);
	
	$sql = "INSERT INTO  billing (purchase_date,product_id,purchase_amount,payment_type,card_type,card_number,expire_date,cvv_number,card_holder,status,customer_id) VALUES('$dt','$_POST[product_id]','$_POST[paid_amount]','Winners','$_POST[card_type]','$_POST[card_number]','$_POST[expire_date]-01','$_POST[cvv_number]','$_POST[card_holder]','Active','$_SESSION[customerid]')";
	$qsql = mysqli_query($con,$sql);
	$paymentid=mysqli_insert_id($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('You have paid Rs. $_POST[paid_amount] successfully for winning bid...');</script>";
		echo "<SCRIPT>window.location='paymentreceiptwinningbid.php?paymentid=$paymentid';</SCRIPT>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
	$sql = "SELECT SUM(winning_bid) FROM winners WHERE winner_id='$_GET[winner_id]'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	
	$sqlwinners = "SELECT * FROM winners WHERE winner_id='$_GET[winner_id]'";
	$qsqlwinners = mysqli_query($con,$sqlwinners);
	$rswinners = mysqli_fetch_array($qsqlwinners);

	$sqlcustomer = "SELECT * FROM customer WHERE customer_id='$rswinners[customer_id]'";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	$rscustomer= mysqli_fetch_array($qsqlcustomer);			
?>
<!-- banner -->
	<div class="banner">

	
	
		<div class="w3l_banner_nav_right" style="float: right;width: 100%;">
			<div class="w3ls_w3l_banner_nav_right_grid">
			<br>
				<center><H2> &nbsp; &nbsp; Winners list</H2></center>				
		<?php
		$dttim = date("Y-m-d h:i:s");
$sqlproduct = "SELECT * FROM winners LEFT JOIN product ON winners.product_id = product.product_id LEFT JOIN customer ON winners.customer_id=customer.customer_id where winners.winner_id='$_GET[winner_id]'  ";
	$qsqlproduct = mysqli_query($con,$sqlproduct);
		$rsproduct = mysqli_fetch_array($qsqlproduct);
		{
				if (file_exists("imgproduct/".$rsproduct["product_images"])) 
				{
					 $imgname = "imgproduct/".$rsproduct["product_images"];
				}
				else 
				{
					$imgname = "images/noimage.gif";
				}				
				if (file_exists("imgwinner/".$rsproduct[winners_image])) 
				{
					 $imgwinner = "imgwinner/".$rsproduct[winners_image];
				} 
				else 
				{
					$imgwinner = "images/noimage.gif";
				}
		?>
				<div class="w3ls_w3l_banner_nav_right_grid1">
					 <div class="col-md-12 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1"> 
 
					 <div class="col-md-4 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb"	>

											<p><center><b>Product Name:</b> <?php echo $rsproduct[product_name]; ?>
											<br>
											<b>Product Code :</b> <?php echo $rsproduct[product_id]; ?></center></p>
											
											<a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><img src="<?php echo $imgname; ?>" alt=" " class="img-responsive"style="height: 250px;" /></a>

										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
				
					
					 <div class="col-md-8 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb"	>
										

<p><b>Product Name:</b> <?php echo $rsproduct[product_name]; ?>
<br>
<b>Product Code :</b> <?php echo $rsproduct[product_id]; ?>
</p>
<p><b>Customer : </b><?php echo $rsproduct[customer_name]; ?>
<br>
<b>Location :</b> <?php echo $rsproduct[city]; ?></p>
<hr>
<b>Winning Date  :</b> <?php echo date("d - M - Y",strtotime($rsproduct[end_date])); ?></p>
<b>Winning Bid  :</b> <?php echo $rsproduct[winning_bid]; ?></p>
<br><br><br>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>

					<div class="clearfix"> </div>
				</div>
				
										</div>
									</div>
								</div>
					</div>
</div>				
		<?php
		}
		?>	
			</div>
		</div>
	
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
		

			<h3>Payment <span>Form</span></h3>
		
		<hr>
		

			<div class="checkout-left">	

				
<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
<input type='hidden' name='product_id' value='<?php echo $rsproduct[product_id]; ?>'>
<input type='hidden' name='customer_id' value='<?php echo $rsproduct[customer_id]; ?>'>
				
<div class="col-md-6 ">
		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">Customer name</label>
				<span id='idcustname' style="color:red;"></span>
				<input name="custname" id="custname" class="form-control" type="text" readonly value='<?php echo $rscustomer[customer_name]; ?>'>
			</div>
		</div>										
							
		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">Upload image</label>
				<span id='idfile' style="color:red;"></span>
				<input name="file" id="file" class="form-control" type="file" >
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">Address</label>
				<span id='idaddress' style="color:red;"></span>
				<textarea name="address" id="address" class="form-control" placeholder="Enter Address"><?php echo $rscustomer[address]; ?></textarea>
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">State</label>
				<span id='idstate' style="color:red;"></span>
				<input name="state" id="state" class="form-control" placeholder="State" value="<?php echo $rscustomer[state]; ?>">
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">City</label>
				<span id='idcity' style="color:red;"></span>
				<input name="city" id="city" class="form-control" placeholder="City" value="<?php echo $rscustomer[city]; ?>">
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">Landmark</label>
				<span id='idlandmark' style="color:red;"></span>
				<input name="landmark" id="landmark" class="form-control" placeholder="Landmark" value="<?php echo $rscustomer[landmark]; ?>">
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">PIN code</label>
				<span id='idpincode' style="color:red;"></span>
				<input name="pincode" id="pincode" class="form-control" placeholder="Pincode" value="<?php echo $rscustomer[pincode]; ?>">
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">Mobile number</label>
				<span id='idmobile_no' style="color:red;"></span>
				<input name="mobile_no" id="mobile_no" class="form-control" placeholder="Mobile number" value="<?php echo $rscustomer[mobile_no]; ?>">
			</div>
		</div>
</div>
<div class="col-md-6 ">													
		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
				<label class="control-label">Paid amount</label>
				<span id='idpaid_amount' style="color:red;"></span>
				<input name="paid_amount" id="paid_amount" class="form-control" type="text" placeholder="Paid amount" value="<?php echo $rsproduct[winning_bid]; ?>" readonly style='background-color:grey;color:white;'>
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
				<label class="control-label">Expiry date</label>
				<span id='idexpire_date' style="color:red;"></span>
				<input name="expire_date" id="expire_date" type="month" class="form-control" placeholder="expire date"  value="<?php echo $rsedit[expire_date]; ?>">
			</div>
		</div>

		<div class="w3_agileits_card_number_grid_left">
			<div class="controls">
			<br>
		<button class="submit check_out" type="submit" name="submit">Click here to make payment</button>
			</div>
		</div>
</div>
				
</form>
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
	
	if(document.getElementById("file").value=="")
	{
		document.getElementById("idfile").innerHTML ="Kindly upload an image....";	
		i=1;		
	}
	if(document.getElementById("address").value == "")
	{
		document.getElementById("idaddress").innerHTML ="Address cannot be empty....";	
		i=1;		
	}
	
	if(document.getElementById("state").value == "")
	{
		document.getElementById("idstate").innerHTML ="State cannot be empty....";	
		i=1;		
	}	
	if(!document.getElementById("state").value.match(alphaspaceExp))
	{
		document.getElementById("idstate").innerHTML ="state must contain alphabets..";	
		i=1;		
	}
	if(document.getElementById("city").value == "")
	{
		document.getElementById("idcity").innerHTML ="City cannot be empty....";	
		i=1;		
	}
	if(!document.getElementById("city").value.match(alphaspaceExp))
	{
		document.getElementById("idcity").innerHTML ="City must contain alphabets....";	
		i=1;		
	}
	
	if(document.getElementById("landmark").value=="")
	{
		document.getElementById("idlandmark").innerHTML ="Landmark cannot be empty.....";	
		i=1;		
	}	
	if(!document.getElementById("landmark").value.match(alphaspaceExp))
	{
		document.getElementById("idlandmark").innerHTML ="Landmark must contain alphabets..";	
		i=1;		
	}
	if(document.getElementById("pincode").value == "")
	{
		document.getElementById("idpincode").innerHTML ="Pincode cannot be empty....";	
		i=1;		
	}	
	if(!document.getElementById("pincode").value.match(numericExpression))
	{
		document.getElementById("idpincode").innerHTML ="Pincod must contain numbers..";	
		i=1;		
	}
	if(document.getElementById("pincode").value.length!=6)
	{
		document.getElementById("idpincode").innerHTML ="Pincode should contain 6 character..";	
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
	if(document.getElementById("mobile_no").value.length != 10)
	{
		document.getElementById("idmobile_no").innerHTML ="Mobile number should contain 10 digit..";	
		i=1;		
	}
	if(document.getElementById("card_type").value=="")
	{
		document.getElementById("idcard_type").innerHTML ="Kindly select the Card type....";	
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