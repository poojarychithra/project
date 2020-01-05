<?php
include("header.php");
?>
<!-- banner -->
	<div class="banner">
		
		<div class="w3l_banner_nav_right">
<!-- about -->
		<div class="privacy about">
			<h3>View Transaction Report</h3>

			<div class="checkout-left">	

				<div class="col-md-12 ">
				
				

	

				
				
				
				
				
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
	<thead>
		<tr>
			
						<tr>
		<th>Card holder name</th>
		<th>Phone</th>
		<th>Product name</th>
			<th>company name</th>
			<th>Total cost</th>
		    <th>status</th>
		
		</tr>
						
						
		</tr>
		</thead>
		<tbody>
			<?php
	
		$sql = "SELECT * FROM booking LEFT JOIN customer on booking.customerid=customer.customerid LEFT JOIN product ON booking.productid=product.productid where booking.customerid=$_SESSION[customerid]";
		
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
			<td>$rs[username]</td>
				<td>$rs[phone]</td>
				<td>$rs[productname]</td>
				<td>$rs[company]</td>
				<td>$rs[cost]</td>
                <td>Active</td>	</tr>";
		}
		?>
	</tbody>
</table>

				</div>
			
				<div class="clearfix"> </div>
				
			</div>

		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<script>
function deleteconfirm()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return  true;
	}
	else
	{
		return false;
	}
}
</script>

<?php
include("datatable.php");
include("footer.php");
?>




<!--$sql1="SELECT * FROM booking LEFT JOIN product on booking.productid=product.productid where booking.customerid=$_SESSION[customerid]";
	    $qsql1 = mysqli_query($con,$sql1);
		while($rs1 = mysqli_fetch_array($qsql1));
		{
			echo "<tr>
			<td>$rs1[productname]</td></tr>";
		}-->