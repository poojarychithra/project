<?php
session_start();
include("dbconnection.php");
date_default_timezone_set('Asia/Kolkata');
$dttim = date("Y-m-d H:i:s");
if(isset($_SESSION[customerid]) )
{
	$senderid=$_SESSION[customerid];
}
if(isset($_SESSION[adminid]) )
{
	$senderid=$_SESSION[adminid];
}
if($_POST["message"] != "")
{
	$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,message,status) values('$_SESSION[adminid]','21','$dttim','$_POST[message]','Employee')";
	//"INSERT INTO message(sender_id,receiver_id,message_date_time,product_id,message,status) values('$_SESSION[senderid]','$_SESSION[receiverid]','$dttim','$_SESSION[productid]','$_POST[message]','Seller')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}
?>
<?php

if(isset($_SESSION[customerid]) )
{
$sqlmessage ="SELECT * FROM message LEFT JOIN customer as sender ON sender.customerid=message.sender_id LEFT JOIN admin as receiver ON receiver.adminid=message.receiver_id WHERE (message.sender_id='$_SESSION[customerid]' AND message.receiver_id='7') OR (message.sender_id='7' AND message.receiver_id='$_SESSION[customerid]') ";
}
if(isset($_SESSION[adminid]) )
{
$sqlmessage ="SELECT * FROM message LEFT JOIN admin as sender ON sender.adminid=message.sender_id LEFT JOIN customer as receiver ON receiver.customerid=message.receiver_id WHERE message.sender_id='$_SESSION[adminid]' OR message.sender_id='21'";
}

//$sqlmessage ="SELECT * FROM message LEFT JOIN customer as sender ON sender.customerid=message.sender_id LEFT JOIN admin as receiver ON receiver.adminid=message.receiver_id WHERE (message.sender_id='$_SESSION[senderid]' AND message.receiver_id='$_SESSION[receiverid]') OR  (message.sender_id='$_SESSION[receiverid]' AND message.receiver_id='$_SESSION[senderid]') ";
//my codeexecuting "SELECT * FROM message LEFT JOIN admin as sender ON sender.adminid=message.sender_id LEFT JOIN customer as receiver ON receiver.customerid=message.receiver_id WHERE (message.sender_id='$_SESSION[senderid]' AND message.receiver_id='$_SESSION[receiverid]') OR  (message.sender_id='$_SESSION[receiverid]' AND message.receiver_id='$_SESSION[senderid]') ";
//"SELECT * FROM message LEFT JOIN customer as sender ON sender.customerid=message.sender_id LEFT JOIN admin as receiver ON receiver.adminid=message.receiver_id WHERE (message.sender_id='$_SESSION[senderid]' AND message.receiver_id='$_SESSION[adminid]') OR  (message.sender_id='$_SESSION[adminid]' AND message.receiver_id='$_SESSION[senderid]') ";
//"SELECT * FROM message LEFT JOIN admin as sender ON sender.adminid=message.sender_id LEFT JOIN customer as receiver ON receiver.customerid=message.receiver_id WHERE (message.sender_id='$_SESSION[senderid]' AND message.receiver_id='$_SESSION[receiverid]') OR  (message.sender_id='$_SESSION[receiverid]' AND message.receiver_id='$_SESSION[senderid]') ";
//


$qsqlmessage = mysqli_query($con,$sqlmessage);
while($rsmessage = mysqli_fetch_array($qsqlmessage))
{
		$sendername = $rsmessage[7];

?>
<div class="direct-chat-messages panel panel-default" style="padding-left:10px;" >
	<div class="direct-chat-msg doted-border">
	  <div class="direct-chat-text">
	  <b><?php echo $sendername; ?></b> | sent on <?php echo date("d-M-Y h:i A",strtotime($rsmessage[message_date_time])); ?><br><?php echo $rsmessage[message]; ?>
	  </div>
	</div>
</div>
<?php
}
?>
			