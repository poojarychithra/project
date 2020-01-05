<?php
$con=mysqli_connect("localhost","root","","techstore");
if(mysqli_connect_errno($con))
{
	echo "failed to connect to mysql:" . mysqli_connect_error();
}
?>