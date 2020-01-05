<?php
include("header.php");
?>

<!-- banner -->
	
 <div> <center><img src="images/slider2.jpg" style="width:70%;height:450px;" alt="First slide"></center>
		<div class="more">
		</div>
</div>
						
<!-- top-brands -->


<!-- #########Latest Auctions-->
	<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="">Latest Product</a></li>
			</ul>
		</div>
	</div>
	<?php
$i=0;	
	?>	
				<div class="w3ls_w3l_banner_nav_right_grid1">
				
			<?php
		   $sqlshowlist = "SELECT * FROM product ORDER BY productid desc limit 0,4";
	$qsqlshowlist = mysqli_query($con,$sqlshowlist);
	echo mysqli_error($con);
	while($rsproduct = mysqli_fetch_array($qsqlshowlist))
	{							
		if(file_exists("imgproduct/$rsproduct[image]"))
		{
		$imgproduct="imgproduct/$rsproduct[image]";
		}
		else
		{
		$imgproduct = "images/noimage.gif";
		}
?>
					 <div class="col-md-3 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb"	>
											<a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><img src="<?php echo $imgproduct; ?>" alt=" " class="img-responsive"style="height: 150px;" /></a>
											<p><b><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct[productname]; ?></a></b></p>

											
						
										</div>
                                              <!-- <div class="snipcart-details" >
												<fieldset>
													<a href='single.php?productid=<?php echo $rsproduct[productid]; ?>'><input type="button" name="submit" value="Book Now" class="button" /></a><br><br>
													
													
												</fieldset>  
										      </div>-->
											  
											  <div class="snipcart-details">
											<form action="#" method="post">
												<fieldset>
													
													<a href='single.php?productid=<?php echo $rsproduct[productid]; ?>'><input type="button" name="submit" value="Book Now" class="button" /></a><br><br>
													
													
												</fieldset>
											</form>
										</div>
											  
											  
											  
											  
											  
											  
											  
											  
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
					
	<!--new cart
	
		<div class="col-md-3 w3ls_w3l_banner_left w3ls_w3l_banner_left_asdfdfd">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid_pos">
								<img src="images/offer.png" alt=" " class="img-responsive" />
							</div>
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb">
											<a href="single.html"><img src="images/41.png" alt=" " class="img-responsive" /></a>
											<p>masala bread (500 gm)</p>
											<h4>$3.00 <span>$5.00</span></h4>
										</div>
										
									</div>
								</figure>
							</div>
						</div>
						</div>
					</div>
	
	
		new cart-->
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
			<?php
			}
			?>
					<div class="clearfix"> </div>
			</div> 
				<div class="panel-footer" ><a href="displayproduct.php">View More >></a></div>

			</div>
			
			                              <div class="snipcart-details">
												<fieldset>
												
												<a href='single1.php?customerid=<?php echo $_SESSION[customerid]; ?>' ><input type="button" name="submit" value="Chat Now or Send Query" class="button" /></a>
												</fieldset>  
										      </div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- <!-- #########Latest product ends here-->





<?php
include("footer.php");
?>