<?php
include("header.php");
if(isset($_POST[submit]))
{
	$imgname= rand(). $_FILES["category_icon"]["name"];
	move_uploaded_file($_FILES["category_icon"]["tmp_name"],"imgcategory/".$imgname);
	if(isset($_GET[editid]))
	{
		$sql = "UPDATE category SET category_name='$_POST[category_name]',category_icon='$imgname',status='$_POST[status]' where category_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('category record updated successfully..');</script>";
			echo "<script>window.location='viewcategory.php';</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO  category (category_id,category_name,category_icon,status) VALUES('$_POST[category_id]','$_POST[category_name]','$imgname','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) == 1)
		{
			echo "<script>alert('Category record inserted successfully..');</script>";
			echo "<script>window.location='viewcategory.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		
	}
}
if(isset($_GET[editid]))
	{
	$sqledit = "SELECT * FROM category WHERE category_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit= mysqli_fetch_array($qsqledit);
}
?>
<!-- banner -->
	<div class="banner">
<!-- about -->
		<div class="privacy about">
			<h3>Category <span>Form</span></h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
				<form action="" method="post" onsubmit="return validateform()" class="creditly-card-form agileinfo_form" enctype="multipart/form-data">
									<section class="creditly-wrapper wthree, w3_agileits_wrapper">
										<div class="information-wrapper">
											<div class="first-row form-group">
<div class="controls">
<label class="control-label">category name</label>
<span id='idcategory_name' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="category_name" id="category_name" placeholder="category name" value="<?php echo $rsedit[category_name]; ?>">

</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">category icon</label>
		<span id='idcategory_icon' style="color:red;"></span>
		<input name="category_icon" id="category_icon" class="form-control" type="file" placeholder="category icon" value="<?php echo $rsedit[category_icon]; ?>">
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
<button class="submit check_out" type="submit" name="submit">Submit</button>
										</div>
									</section>
								</form>
									
					</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
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
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
    $("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("category_name").value.match(alphaspaceExp))
	{
		document.getElementById("idcategory_name").innerHTML ="Category name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("category_name").value == "")
	{
		document.getElementById("idcategory_name").innerHTML ="Category name should not be empty....";	
		i=1;		
	}
	if(document.getElementById("category_icon").value == "")
	{
		document.getElementById("idcategory_icon").innerHTML ="Category icon should not be empty....";	
		i=1;		
	}
		
	if(document.getElementById("status").value == "")
	{
		document.getElementById("idstatus").innerHTML ="Kindly select Employee status....";	
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