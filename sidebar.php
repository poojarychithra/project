		<div class="w3l_banner_nav_left">
			<nav class="navbar nav_bottom">
			 <!-- Brand and toggle get grouped for better mobile display -->
			  <div class="navbar-header nav_2">
				  <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
			   </div> 
			   <!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav nav_1">
	<?php
	$sqlcategory = "SELECT  * FROM category where status='Active'";
	$qsqlcategory = mysqli_query($con,$sqlcategory);
	while($rscategory = mysqli_fetch_array($qsqlcategory))
	{
		echo "<li><a href='allproducts.php?category_id=$rscategory[category_id]'>$rscategory[category_name]</a></li>";
	}
	?>
					</ul>
				 </div><!-- /.navbar-collapse -->
			</nav>
		</div>