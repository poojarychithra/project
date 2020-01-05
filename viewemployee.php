<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM admin WHERE adminid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('employee record deleted successfully...');</script>";
	}
}
?>
<!-- banner -->
	<div class="banner">
	
<!-- about -->
		<div class="privacy about">
			<h3>View Employee</h3>

			<div class="checkout-left">	

				<div class="col-md-12 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >				
	<thead>
		<tr>
			<th>Employee name</th>
			<th>Login ID</th>
			<th>Employee type</th>
		
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = "select * from admin";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
				<td>$rs[adminname]</td>
				<td>$rs[loginid]</td>
				<td>$rs[emp_type]</td>
			<td><a href='employee.php?editid=$rs[adminid]'>Edit | <a href='viewemployee.php?delid=$rs[adminid]' onclick='return deleteconfirm()'>Delete</a></td>
			</tr>";
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