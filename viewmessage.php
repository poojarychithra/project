<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM message WHERE messageid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('message record deleted successfully...');</script>";
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
			<h3>View Message</h3>

			<div class="checkout-left">	

				<div class="col-md-8 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >							
	<thead>
		<tr><th>Message date time</th>
			<th>Message</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = "select * from message";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
			   <td>$rs[message_date_time]</td>
				<td>$rs[message]</td>
				<td>$rs[status]</td>
				
				<td>";
				if($_SESSION["emp_type"] =="Admin")
				{
				echo "<a href='viewmessage.php?delid=$rs[messageid]' onclick='return deleteconfirm()'>Delete</a>";
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