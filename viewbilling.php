<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM billing WHERE billingid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('billing record deleted successfully...');</script>";
	}
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
			<h3>transaction report</h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
	<thead>
		<tr>
			
		
		<th>Card holder name</th>
			<th>Phone</th>
		<th>Product name</th>
			<th>company name</th>
			<th>Total cost</th>
		    <th>status</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
	
		$sql = "SELECT * FROM booking LEFT JOIN customer on booking.customerid=customer.customerid LEFT JOIN product ON booking.productid=product.productid";
		
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
			<td>$rs[username]</td>
				<td>$rs[phone]</td>
				<td>$rs[productname]</td>
				<td>$rs[company]</td>
				<td>$rs[cost]</td>
                <td>Active</td>				
				<td><a href='billing.php?editid=$rs[billingid]'></a> ";
				
			
			
			echo " <a href='viewbilling.php?delid=$rs[billingid]' onclick='return deleteconfirm()'>Delete</a> <a href='billingreceipt.php?billingid=$rs[billingid]' target='_blank' >Receipt</a>";
		
			
			echo "</td></tr>";
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