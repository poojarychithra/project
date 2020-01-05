<?php
include("header.php");
?>
<div class="w3ls_w3l_banner_nav_right_grid1">
				
			<?php
		   $sqlshowlist = "SELECT * FROM product ORDER BY productid desc";
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
                                               <div class="snipcart-details">
												<fieldset>
													<a href='single.php?productid=<?php echo $rsproduct[productid]; ?>'><input type="button" name="submit" value="Book Now" class="button" /></a>
												</fieldset>  
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
					<div class="clearfix"> </div>
			</div> 
			
			<?php
include("footer.php");
?>