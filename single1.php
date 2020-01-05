<?php
include("header.php");
?>
<br>
<br>
<br>
<?php
//Coding starts - customer Panel starts here..
if(isset($_SESSION["customerid"]))
{
	$sqlcustomerac ="SELECT * FROM customer WHERE customerid='$_SESSION[customerid]'";
	$qsqlcustomerac = mysqli_query($con,$sqlcustomerac);
	if(mysqli_num_rows($qsqlcustomerac) == 1)
	{
		$rscustomerac=mysqli_fetch_array($qsqlcustomerac);
	}
}
//Coding ends here - customer Panel ends here..

					
						
if(isset($_SESSION["customerid"]))
{
	include("chat.php");
}
else
{
	echo "<center><h2><b style='color:red'><a href='login.php'>Login to chat..</a></b><h2><hr><center>";
}
					
?>