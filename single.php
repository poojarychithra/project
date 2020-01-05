<?php
include("header.php");

//Coding starts - customer Panel starts here..
if(isset($_SESSION["customerid"]))
{
	$sqlcustomerac ="SELECT * FROM customer WHERE customerid='$_SESSION[customerid]'";
	$qsqlcustomerac = mysqli_query($con,$sqlcustomerac);
	if(mysqli_num_rows($qsqlcustomerac) == 1)
	{
		$rscustomerac=mysqli_fetch_array($qsqlcustomerac);
	}
}
//Coding ends here - customer Panel ends here..

if(isset($_POST[submit]))
{
	
		$sql = "INSERT INTO  booking (customerid,productid) VALUES('$_SESSION[customerid]','$_GET[productid]')";
		$qsql = mysqli_query($con,$sql);
	$insid = mysqli_insert_id($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('booking done successfully..');</script>";
			echo "<script>window.location='billing.php?bookingid=$insid';</script>";
		}
		
	
	  
	
}
$sqlproduct ="SELECT * FROM product LEFT JOIN admin on product.adminid=admin.adminid where productid='$_GET[productid]'";
$qsqlproduct = mysqli_query($con,$sqlproduct);
$rsproduct= mysqli_fetch_array($qsqlproduct);

      if(file_exists("imgproduct/$rsproduct[image]"))
		{
		$imgproduct="imgproduct/$rsproduct[image]";
		}
		else
		{
		$imgproduct = "images/noimage.gif";
		}
?>
<!-- banner -->
	<div class="banner">
		
		<div class="w3l_banner_nav_right">

			<div class="agileinfo_single">
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="<?php echo $imgproduct; ?>" alt=" " class="img-responsive" />
					<hr>
					<b>Welcome..<b>
					<div style='overflow:auto; height:400px;font-family: "Times New Roman", Times, serif;font-size:15px;' >
					<?php
				if(isset($_SESSION["customerid"]))
                {
				 ?>
				  <a><?php echo $rscustomerac[username]; ?><span ></span></a>
				   <?php
				}
				?>
					</div>
					
				</div>
				<div class="col-md-8 agileinfo_single_right">
						
				<h2><?php echo $rsproduct[productname]; ?></h2>

						<div class="w3agile_description">								

						<h4>Product details :</h4>
					     <p><b>Uploaded By :</b> <?php echo $rsproduct[adminname]; ?></p>
						<p><b>Product Code :</b> <?php echo $rsproduct[productid]; ?></p>
						<p><b>Product warranty :</b> <?php echo $rsproduct[warranty]; ?></p>
						<p><b>Company :</b> <?php echo $rsproduct[company]; ?></p>
						<p><b>product cost</b> ₹<?php echo $rsproduct[cost]; ?></p>
						</div>	
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
						
						</div>
						
				<div class="snipcart-thumb agileinfo_single_right_snipcart">
				
				<?php 
				//echo print_r($rsproduct);
				//echo date("M d, Y H:i:s",strtotime($rsproduct[8])); 
				?>


				</div>

<form action="" method="post"  onsubmit="return confirmbooking()">

<?php
if(isset($_SESSION["customerid"]))
{
	 
	
?>
<div id="divbidstatus">
	<div class="w3_agileits_card_number_grid_left">
		<div class="controls">
				
		</div>
	</div> <br>
	<div class="snipcart-details agileinfo_single_right_details">
			<fieldset>
				<input type="submit" name="submit" value="Book Now" class="button" />
			</fieldset>
	</div>
</div>


<?php
	}

else
{
?>
<div class="snipcart-details agileinfo_single_right_details">
		<fieldset>
			<input type="button" onclick='window.location=`login.php`' name="submit" value="Login to Book" class="button" />
		</fieldset>
</div>
<?php
}
?>
<div class="w3agile_description">
	<h4>Description :</h4>
	<p><?php echo $rsproduct[description]; ?></p>
</div>
						
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</form>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<!-- brands -->
	<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_popular">
		
<!-- //brands -->
<?php
include("footer.php");
?>
<script>
function confirmbooking()
{
		
			if(confirm("confrim to book..!!") == true)
			{
				return true;
			}
			else
			{
				return false;
			}
		
}
</script>