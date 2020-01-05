<?php
include("header.php");
error_reporting(0);
if(isset($_POST[submit]))
{
	//$productname=$_POST['productname'];
	
	 
	$imgproduct = rand(). $_FILES["image"]["user"];
	move_uploaded_file($_FILES["image"]["tmp_name"],"imgproduct/".$imgproduct);
	
	//$description=$_POST['description'];
	//$cost=$_POST['cost'];
	//$warranty=$_POST['warranty'];
	//$company=$_POST['company'];
	
	$productname = mysqli_real_escape_string($con,$_POST[productname]);
	if(isset($_GET[editid])) //if block to update the record
	{
		//Update statement starts here
		$sql ="UPDATE product SET productname='$_POST[productname]',image='$imgproduct',description='$_POST[description]',cost='$_POST[cost]',warranty='$_POST[warranty]',company='$_POST[company]' WHERE productid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<SCRIPT>alert('product record updated successfully...');</SCRIPT>";
		}
		//Update statement ends here
	}//if block
	else
	{
		$sql = $sql = "INSERT INTO product (adminid,productname,image,description,cost,warranty,company) VALUES ('$_SESSION[adminid]','$_POST[productname]','$imgproduct','$_POST[description]','$_POST[cost]','$_POST[warranty]','$_POST[company]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('product record added successfully..');</script>";
			
		}
		
	}
}
if(isset($_GET[editid]))
{
	$sqledit="SELECT * FROM product LEFT JOIN admin ON product.adminid=admin.adminid where product.productid='$_GET[editid]'";
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
			<h3>Upload <span>Product</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">


									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">


	
<div class="controls">
<label class="control-label">adminID</label>
<span id='idadminid' style="color:red;"></span>
<input type="text" class="form-control" name="adminid" value='<?php echo $_SESSION[adminid];?>'  readonly style="background-color:grey;color:white;" /><br><br>

</div>
		
											
<div class="controls">
<label class="control-label">Product Name</label>
<span id='idproductname' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="productname" id="productname" placeholder="Product name" value='<?php echo $rsedit[productname]; ?>'>

</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Product description</label>
		<span id='iddescription' style="color:red;"></span>
		<textarea name="description" id="description" class="form-control" type="text" placeholder="Product description"><?php echo $rsedit[description]; ?></textarea>
		
	</div>
</div>

<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Cost</label>
		<span id='idcost' style="color:red;"></span>
		<input name="cost" id="cost" class="form-control" type="text" placeholder="product cost" value="<?php echo $rsedit[cost]; ?>">
		
</div>
</div>



<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Product warranty</label>
		<span id='idwarranty' style="color:red;"></span>
		<input name="warranty" id="warranty" class="form-control" type="text" placeholder="product warranty" value="<?php echo $rsedit[warranty]; ?>">
		
</div>
</div>



<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Company name</label>
		<span id='idcompany' style="color:red;"></span>
		<input name="company" id="company" class="form-control" type="text" placeholder="company name" value="<?php echo $rsedit[company]; ?>">
		
	</div>
</div>
												
<?php
if(isset($_SESSION["employeeid"]))
{
?>												
<div class="w3_agileits_card_number_grid_right">
	<div class="controls" >
		<label class="control-label">Status:</label>
		<span id='idstatus' style="color:red;"></span>
			<br><select name="status" id="status" class="form-control" >
				<option value=''>Select</option>
				<?php
				$arr = array("Active","Inactive");
				foreach($arr as $val)
				{
					if($val == $rsedit[status])
					{
					echo "<option selected value='$val'>$val</option>";
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
<?php
}
else
{
?>
<span id='idstatus' style="visibility: hidden;"></span>
<input type='hidden' name='status' id='status' value="<?php 
if(isset($_GET[editid]))
{
echo $rsedit[status];
}
else
{
	echo "Pending";
}
?>" >
<?php
}
?>
											</div>

<button class="submit check_out" type="submit" name="submit">Submit</button>

										</div>
									</section>
									
					</div>

					
				<div class="col-md-4 ">
				
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Upload image</label><br>
		<span id='idimage' style="color:red;"></span>
		
		<input name="image" id="image" class="form-control" type="file" placeholder="product images">
		<input type="hidden" name="varproduct_images" id="varproduct_images" value="<?php
		if(isset($_GET[editid]))
		{
			echo $_GET[editid];
		} 
		?>"  >
		<br>
		<?php
		if(isset($_GET[editid]))
		{
		?>
			<img src='imgproduct/<?php echo $rsedit[image]; ?>' style="width:100%;">
		<?php
		}
		?>
	</div>
</div>

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
	
	if(!document.getElementById("productname").value.match(alphaspaceExp))
	{
		document.getElementById("idproductname").innerHTML ="Product name should contain only alphabets and spaces....";	
		i=1;		
	}
	if(document.getElementById("productname").value == "")
	{
		document.getElementById("idproductname").innerHTML ="Product name should not be empty....";	
		i=1;		
	}
	if(document.getElementById("description").value == "")
	{
		document.getElementById("iddescription").innerHTML ="Description should not be empty....";	
		i=1;		
	}	
	
	if(document.getElementById("cost").value <= 0)
	{
		document.getElementById("idcost").innerHTML ="Product cost should be more than RS.1";	
		i=1;		
	}	
	if(document.getElementById("cost").value == "")
	{
		document.getElementById("idcost").innerHTML ="Product cost should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("cost").value.match(numericExpression))
	{
		document.getElementById("idcost").innerHTML ="Product cost should be digits";	
		i=1;		
	}
	if(document.getElementById("warranty").value <= 0 )
	{
		document.getElementById("idwarranty").innerHTML ="Warranty must be more than a month /year....";	
		i=1;		
	}
	if(document.getElementById("warranty").value=="")
	{
		document.getElementById("idwarranty").innerHTML ="Warranty should not be empty..";	
		i=1;		
	}
	
	if(document.getElementById("company").value=="")
	{
		document.getElementById("idcompany").innerHTML ="Company name should not be empty....";	
		i=1;		
	}
	if(document.getElementById("image").value=="")
	{
		if(document.getElementById("varproduct_images").value == "")
		{
			document.getElementById("idimage").innerHTML ="Product image should not be empty....";	
			i=1;
		}
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