<?php
include("header.php");
if(isset($_POST[submit]))
{
	$imgname = rand() . $_FILES["winners_image"]["name"];
	move_uploaded_file($_FILES["winners_image"]["tmp_name"],"imgwinner/".$imgname);
	if(isset($_GET[editid]))
	{
		$sql = "UPDATE winners SET product_id='$_POST[product_id]',customer_id='$_POST[customer_id]',winners_image='$imgname',winning_bid='$_POST[winning_bid]',end_date='$_POST[end_date]',status='$_POST[status]' where winner_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('winners record updated successfully..');</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO  winners (winners_image,winning_bid,end_date,status,product_id,customer_id) VALUES('$imgname','$_POST[winning_bid]','$_POST[end_date]','$_POST[status]','$_POST[product_id]','$_POST[customer_id]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('winners record inserted successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET[editid]))
{
	$sqledit = "SELECT * FROM winners WHERE winner_id='$_GET[editid]'";
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
			<h3>Winners <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form" enctype="multipart/form-data" >
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
		
<div class="w3_agileits_card_number_grid_right">
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
<label class="control-label">Winners image</label>
<span id='idwinners_image' style="color:red;"></span>
<input class="form-control" type="file" name="winners_image" id="winners_image" placeholder="winners image" value="<?php echo $rsedit[winners_image]; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Winning bid</label>
		<span id='idwinning_bid' style="color:red;"></span>
		<input name="winning_bid" id="winning_bid" class="form-control" type="text" placeholder="winning bid" value="<?php echo $rsedit[winning_bid]; ?>">
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">End date</label>
		<span id='idend_date' style="color:red;"></span>
     	<input name="end_date" id="end_date" class="form-control" type="date" placeholder="end date" value="<?php echo $rsedit[end_date]; ?>">
	</div>
</div>

												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Status:</label>
		<span id='idstatus' style="color:red;"></span>
			<br><select name="status" id="status"  class="form-control">
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
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(document.getElementById("customer_id").value=="")
	{
		document.getElementById("idcustomer_id").innerHTML ="Kindly select the Customer ID....";	
		i=1;		
	}
	if(document.getElementById("product_id").value == "")
	{
		document.getElementById("idproduct_id").innerHTML ="Kindly select the Product ID....";	
		i=1;		
	}
	if(document.getElementById("winners_image").value=="")
	{
		document.getElementById("idwinners_image").innerHTML ="Kidnly select the Image...";	
		i=1;		
	}
	if(!document.getElementById("winning_bid").value.match(numericExpression))
	{
		document.getElementById("idwinning_bid").innerHTML ="Winning bid must contain numbers....";	
		i=1;		
	}	
	if(document.getElementById("winning_bid").value=="")
	{
		document.getElementById("idwinning_bid").innerHTML ="Winning bid cannot be blank..";	
		i=1;		
	}
	if(document.getElementById("end_date").value=="")
	{
		document.getElementById("idend_date").innerHTML ="Kindly select the Date....";	
		i=1;		
	}
	if(document.getElementById("status").value == "")
	{
		document.getElementById("idstatus").innerHTML ="Kindly select the status....";	
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