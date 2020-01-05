<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM bidding WHERE bidding_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('bidding record deleted successfully...');</script>";
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
			<h3>View Bidding</h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
	<thead>
		<tr> 
		    <th>Customer</th>
			<th>Product</th>
			<th>Bidding amount</th>
			<th>Bidding date time</th>
			<th>Note</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = "select * from bidding LEFT JOIN customer ON bidding.customer_id =customer.customer_id LEFT JOIN product ON bidding.product_id=product.product_id";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
			    <td>$rs[customer_name]</td>
				<td>$rs[product_name]</td>
				<td>$rs[bidding_amount]</td>
				<td>$rs[bidding_date_time]</td>
				<td>$rs[note]</td>
				<td>$rs[status]</td>
				<td><a href='bidding.php?editid=$rs[bidding_id]'></a> ";
			
			if($_SESSION["emp_type"] == "Admin")
			{
			echo " <a href='viewbidding.php?delid=$rs[bidding_id]' onclick='return deleteconfirm()'>Delete</a>";
			}
			
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