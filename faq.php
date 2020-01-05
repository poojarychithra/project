 <?php
include("header.php");
if(isset($_POST[submit]))
{
	$dttim = date("Y-m-d H:i:s");
	$ins = "INSERT INTO message(message_date_time,product_id,message,status) VALUES ('$dttim','0','$_POST[question]','FAQ')";
	$qsqlins = mysqli_query($con,$ins);
	echo "<script>alert('Question  sent successfully...');</script>";
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
			<h3>FAQ - Frequently Asked Questions</h3>
			<?php
			if(isset($_SESSION["customerid"]))
			{
			?>
			<p class="animi">
				<form method="post" action="" onsubmit="return validateform()">
					<textarea name='question' class="form-control"></textarea>
					<input type="submit" name="submit" id="submit"value="Post question" class="form-control" style="width:250px;" >
					<span id='idcustomer_name' style="color:red;"></span>
				</form>
			</p>
			<?php
			}
			?>
			<hr>
			<div class="agile_about_grids">
				
				<div class="col-md-12 agile_about_grid_left">
					<ol>
					<?php
					$sqlquestion = "select * from message where status='FAQ'";
					$qsqlquestion = mysqli_query($con,$sqlquestion);
					while($rsquestion = mysqli_fetch_array($qsqlquestion))
					{
						$sqlans = "select * from message where status='FAQREPLY' AND product_id='$rsquestion[0]' ";
						$qsqlans = mysqli_query($con,$sqlans);
						 $rsans = mysqli_fetch_array($qsqlans);
						 if(mysqli_num_rows($qsqlans) == 1)
						 {
					?>
						<li>
							<b><?php echo $rsquestion[message]; ?></b>
							<p>
						<?php 
						
						echo $rsans[message]; 
						
						?>
						</p>
						</li>
					<?php
						 }
					}
					?>
					</ol>
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