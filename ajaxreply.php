<?php
include("dbconnection.php");
$sql = mysqli_query($con,"DELETE FROM message where product_id='$_GET[questionid]'");
$sql = "INSERT INTO message(message,product_id,status) values('$_GET[answer]','$_GET[questionid]','FAQREPLY')";
mysqli_query($con,$sql);
?>