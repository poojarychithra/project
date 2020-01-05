<?php
include("header.php");
if(isset($_GET[delid]))
{
	$sql = "DELETE FROM product WHERE productid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('product record deleted successfully...');</script>";
	}
}
?>
<!-- banner -->
	<div class="banner">
<!-- about -->
<div class="privacy about">
<h3>View Product</h3>

<div class="checkout-left">	

<div class="col-md-12 ">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
<thead>
<tr>
<th>Product Image</th>
<th style="width:175px;">Product name</th>		
<th>Company name</th>
<th>Product cost</th>
<th>Warranty</th>
<th>Action</th>
</tr>
</thead>

	<tbody>
				<?php
				$sql ="SELECT * FROM  product";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
if(file_exists("imgproduct/$rs[image]"))
	{
		$imgproduct = "imgproduct/$rs[image]";
	}
	else
	{
		$imgproduct = "images/noimage.gif";
	}
	
					echo "<tr>
						<td><img src='$imgproduct' width='150' height='100'></td>
						<td>$rs[productname]</td>
						<td>$rs[company]</td>
						<td>$rs[cost]</td>
						<td>$rs[warranty]</td>
						<td><a class='btn btn-primary' href='product.php?editid=$rs[productid]'>Edit</a> |
						<a class='btn btn-primary' href='viewproduct.php?delid=$rs[productid]' onclick='return confirmtodelete()'>Delete</a></td>
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
function confirmtodelete()
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