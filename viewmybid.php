<?php
include("header.php");
?>
<script>
function countdowntimer(id, time)
{
		// Set the date we're counting down to
		var countDownDate = new Date(time).getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		// Get todays date and time
		var now = new Date().getTime();
		
		// Find the distance between now an the count down date
		var distance = countDownDate - now;
		
		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
		// Output the result in an element with id="demo"
		document.getElementById("countdowntime"+id).innerHTML = "<b  style='color: red;'>Time Remaining</b> <br><b>" + days + "Days " + hours + "hrs " + minutes + "min " + seconds + "sec</b>";
		
		// If the count down is over, write some text 
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("countdowntime"+id).innerHTML = "<center><b  style='color: red;'>EXPIRED</b></center>";
		}
	}, 1000);
	
}
</script>  
<!-- banner -->
	<div class="banner">
		<?php
		include("sidebar.php");
		?>
		<div class="w3l_banner_nav_right">
			<div class="w3ls_w3l_banner_nav_right_grid">
			<br>
				<center><H2> &nbsp; &nbsp; My bidding list</H2></center>
				
		<?php
		$sqlpayment = "select * from payment WHERE customer_id='$_SESSION[customerid]' and status='Active' GROUP BY product_id ";		
		$qsqlpayment = mysqli_query($con,$sqlpayment);
		while($rspayment = mysqli_fetch_array($qsqlpayment))
		{
		?>	
				<div class="w3ls_w3l_banner_nav_right_grid1">
			<?php
			$sqlproduct = "select * from product WHERE status='Active' AND product_id='$rspayment[product_id]' ";
			if($_GET[auctiontype] == "LatestAuctions")
			{
				$sqlproduct = $sqlproduct  . " order by product_id DESC limit 0,3";
			}
			else
			{
				$sqlproduct = $sqlproduct  . " order by product_id DESC limit 0,3";
			}
			$qsqlproduct = mysqli_query($con,$sqlproduct);
			while($rsproduct = mysqli_fetch_array($qsqlproduct))
			{
				if (file_exists("imgproduct/".$rsproduct[product_images])) 
				{
					 $imgname = "imgproduct/".$rsproduct[product_images];
				} 
				else 
				{
					$imgname = "images/noimage.gif";
				}
?>
					 <div class="col-md-4 w3ls_w3l_banner_left">
						<div class="hover14 column">
						<div class="agile_top_brand_left_grid w3l_agile_top_brand_left_grid">
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb"	>

											<p><b><a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><?php echo $rsproduct[product_name]; ?>
											<br>
											<b>Product Code :</b> <?php echo $rsproduct[product_id]; ?></p>
											
											<a href="single.php?productid=<?php echo $rsproduct[0]; ?>"><img src="<?php echo $imgname; ?>" alt=" " class="img-responsive"style="height: 250px;" /></a>
											
											
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0]; ?>"></p>
<?php
echo $bidstatus = `<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0]; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct[end_date_time])); ?>');</script>`;
?>
<!-- Timer code ends here -->
											
											<h4>Starting bid Amount : ₹<?php echo $rsproduct[starting_bid]; ?> </h4>
										</div>
                                               <div class="snipcart-details">
												<fieldset>
<?php
$currentdttim = strtotime($dt . " ". $tim);
$biddingenddate = strtotime($rsproduct[end_date_time]);

if($currentdttim >  $biddingenddate)
{
?>
	<a href='#'><input type="button" name="submit" value="Bidding closed" class="button" /></a>
<?php
}
else
{
?>
	<a href='single.php?productid=<?php echo $rsproduct[product_id]; ?>'><input type="button" name="submit" value="Bid Now" class="button" /></a>
<?php
}
?>													
												</fieldset>  
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
							<div class="agile_top_brand_left_grid1">
								<figure>
									<div class="snipcart-item block">
										<div class="snipcart-thumb"	>
										
										
											<p><b>Product Code :</b> <?php echo $rsproduct[product_id]; ?></p>
<!-- Timer code starts here -->
<p id="countdowntime<?php echo $rsproduct[0]; ?>"></p>
<script type="application/javascript">countdowntimer('<?php echo $rsproduct[0]; ?>', '<?php echo date("M d, Y H:i:s",strtotime($rsproduct[end_date_time])); ?>');</script>
<!-- Timer code ends here -->
											
											<h4>Current Bid Amount : ₹<?php echo $rsproduct[ending_bid]; ?> </h4>
											<hr>
					<b>My biddings for this product:<b>	
					
<div style='overflow:auto; height:200px;font-family: "Times New Roman", Times, serif;font-size:15px;' >
	<?php
		$sqledit = "SELECT * FROM bidding LEFT JOIN customer ON bidding.customer_id = customer.customer_id WHERE product_id='$rspayment[product_id]' AND bidding.customer_id='$_SESSION[customerid]' ORDER BY bidding_id DESC";
		$qsqledit = mysqli_query($con,$sqledit);
		while($rsedit= mysqli_fetch_array($qsqledit))
		{
			echo "$rsedit[customer_name] bidded ₹$rsedit[bidding_amount] on $rsedit[bidding_date_time]<hr>";
		}
	?>	
</div>
                                               <div class="snipcart-details">
												<fieldset>
													<a href='single.php?productid=<?php echo $rsproduct[product_id]; ?>'><input type="button" name="submit" value="Bidding closed" class="button" /></a>
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
		}
		?>	
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<?php
include("footer.php");
?>