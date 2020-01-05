<?php
include("header.php");
if($_POST["submitchatmessage"])
{
	$sql ="INSERT INTO message(senderid,recieverid,message_date_time,message,status) 
	values('$_POST[senderid]','$_POST[recieverid]','$_POST[message_date_time]','$_POST[message]','$_POST[status]')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}
?>