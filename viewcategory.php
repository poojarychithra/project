<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM category WHERE category_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Category record deleted successfully...');</script>";
	}
}
?>
<!-- banner -->
	<div class="banner">
<!-- about -->
		<div class="privacy about">
			<h3>View Category</h3>

			<div class="checkout-left">	

				<div class="col-md-12 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
	<thead>
		<tr>
			<th>Icon</th>
			<th>Category name</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$sql = "select * from category";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
				<td><img src='imgcategory/$rs[category_icon]' width='200px;' ></td>
				<td>$rs[category_name]</td>
				<td>$rs[status]</td>
				<td><a href='category.php?editid=$rs[category_id]'>Edit | <a href='viewcategory.php?delid=$rs[category_id]' onclick='return deleteconfirm()'>Delete</a></td>
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