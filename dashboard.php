<?php
include("header.php");
?>
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">

			<div class="w3ls_w3l_banner_nav_right_grid w3ls_w3l_banner_nav_right_grid_sub">
				<?php
				if($_SESSION["emp_type"] == "Admin")
				{
				?>
				<h3 class="w3l_fruit">Admin Dashboard</h3>
				<?php
				}
				if($_SESSION["emp_type"] == "Employee")
				{
				?>
				<h3 class="w3l_fruit">Employee Panel</h3>
				<?php
				}
				?>
				
				<div class="w3ls_w3l_banner_nav_right_grid1 w3ls_w3l_banner_nav_right_grid1_veg">
					
					
			
					
					
					<!--- Starts here -->
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/b.jpg" alt=" " class="img-responsive" style="height: 200px;"  /></a>
											<p>Number of billing records</p>
											<h4>
<center>
											<?php
$sql = "SELECT * FROM booking";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>
</center>

											</h4>
										</div>
										<div class="snipcart-details">
											<form action="viewbillingadmin.php" method="post">
												<fieldset>
													<input type="submit" name="submit" value="View" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<!--- Ends here -->
					
			<!--- Starts here -->
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/cus.png" alt=" " class="img-responsive" style="height: 200px;"  /></a>
											<p>Number of customer records</p>
											<h4>
<center>
											<?php
$sql = "SELECT * FROM customer";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>
</center>

											</h4>
										</div>
										<div class="snipcart-details">
											<form action="viewcustomer.php" method="post">
												<fieldset>
													<input type="submit" name="submit" value="View" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<!--- Ends here -->
					
					<!--- Starts here -->
					<?php
				if($_SESSION["emp_type"] == "Admin")
				{
				?>
				<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/emp.jpg" alt=" " class="img-responsive"  style="height: 200px;" /></a>
											<p>Number of employee records</p>
											<h4>
<center>
											<?php
$sql = "SELECT * FROM admin";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>
</center>

											</h4>
										</div>
										<div class="snipcart-details">
											<form action="viewemployee.php" method="post">
												<fieldset>
													<input type="submit" name="submit" value="View" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
				<?php
				}
				?>
					
					<!--- Ends here -->
					
					<!--- Starts here -->
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/mes.jpg" alt=" " class="img-responsive"  style="height: 200px;" /></a>
											<p>Number of message records</p>
											<h4>
<center>
											<?php
$sql = "SELECT * FROM message";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>
</center>

											</h4>
										</div>
										<div class="snipcart-details">
											<form action="viewmessage.php" method="post">
												<fieldset>
													<input type="submit" name="submit" value="View" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<!--- Ends here -->
					
					
					
					<!--- Starts here -->
					<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/prod.jpg" alt=" " class="img-responsive"  style="height: 200px;" /></a>
											<p>Number of product records</p>
											<h4>
<center>
											<?php
$sql = "SELECT * FROM product";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>
</center>

											</h4>
										</div>
										<div class="snipcart-details">
											<form action="viewproduct.php" method="post">
												<fieldset>
													<input type="submit" name="submit" value="View" class="button" />
												</fieldset>
											</form>
										</div>
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					<!--- Ends here -->
					
				
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<?php
include("footer.php");
?>