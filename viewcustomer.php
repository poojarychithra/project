<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM customer WHERE customerid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('customer record deleted successfully...');</script>";
	}
}
?>
<!-- banner -->
	<div class="banner">

<!-- about -->
		<div class="privacy about">
			<h3>View Customer</h3>

			<div class="checkout-left">	

				<div class="col-md-12 ">
				
				
				
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
    <thead>
		<tr>
			<th>Customer name</th>
			<th>Mobile number</th>
			<th>Email id</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = "select * from customer";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
				<td>$rs[username]</td>
				<td>$rs[phone]</td>
				<td>$rs[email]</td>
			     <td>Active</td>
				<td>";
				if($_SESSION["emp_type"] =="Admin")
				{
					echo " <a href='viewcustomer.php?delid=$rs[customerid]' onclick='return deleteconfirm()'>Delete</a>";
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