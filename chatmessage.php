<?php
include("dbconnection.php");
$dttim = date("Y-m-d H:i:s");
if(isset($_POST["btnmessage"]))
{
	$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,message,status) values('$_POST[senderid]','$_POST[receiverid]','$dttim','$_POST[message]','Customer')";
	//$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,product_id,message,status) values('$_POST[senderid]','$_POST[receiverid]','$dttim','$productid','$_POST[message]','Customer')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}

$sqlmessage ="SELECT * FROM message LEFT JOIN customer as sender ON sender.customerid=message.sender_id LEFT JOIN admin as receiver ON receiver.adminid=message.receiver_id WHERE message.sender_id='$_POST[senderid]' AND  (message.sender_id='$_POST[senderid]' AND message.receiver_id='$_POST[receiverid]') OR  (message.sender_id='$_POST[receiverid]' AND message.receiver_id='$_POST[senderid]')";

//$sqlmessage ="SELECT * FROM message LEFT JOIN customer ON customer.customerid=message.customerid LEFT JOIN admin ON admin.adminid=message.adminid' WHERE message.customerid='$_POST[customerid]' AND(message.customerid='$_POST[customerid]' AND message.adminid='$_POST[adminid]')";
//$sqlmessage ="SELECT * FROM message LEFT JOIN customer as sender ON sender.customerid=message.sender_id LEFT JOIN admin as receiver ON receiver.adminid=message.receiver_id WHERE message.sender_id='$_POST[senderid]' AND  (message.sender_id='$_POST[senderid]' AND message.receiver_id='$_POST[receiverid]') OR  (message.sender_id='$_POST[receiverid]' AND message.receiver_id='$_POST[senderid]')";
//"SELECT * FROM message LEFT JOIN customer ON customer.customerid=message.customerid LEFT JOIN admin ON admin.adminid=message.adminid WHERE message.customerid='21' AND(message.customerid='21' AND message.adminid='3'";

 
$qsqlmessage = mysqli_query($con,$sqlmessage);
while($rsmessage = mysqli_fetch_array($qsqlmessage))
{
?>
<div class="direct-chat-messages">
	<?php					
	/*
	<div class="chat-box-single-line">
				<abbr class="timestamp">October 8th, 2015</abbr>
	</div>
	*/
	?>					
	<!-- Message. Default to the left -->
	<div class="direct-chat-msg doted-border">
	
	<?php
	/*
	  <div class="direct-chat-info clearfix">
		<span class="direct-chat-name pull-left">Osahan</span>
	  </div>
	  <img alt="message user image" src="http://bootsnipp.com/img/avatars/bcf1c0d13e5500875fdd5a7e8ad9752ee16e7462.jpg" class="direct-chat-img"><!-- /.direct-chat-img -->
	*/
	?>
	  <div class="direct-chat-text">
	  <b><?php echo $rsmessage[username]; ?></b><br>
		<span style="font: 15px arial, sans-serif;" ><?php echo $rsmessage[message]; ?></span>
	  </div>
	  <div class="direct-chat-info">
		<span class="direct-chat-timestamp pull-right"><?php echo date("d-M-Y h:i A",strtotime($rsmessage[message_date_time])); ?></span>
	  </div>
		<?php
		/*
		<div class="direct-chat-info clearfix">
		<span class="direct-chat-img-reply-small pull-left"></span>
		<span class="direct-chat-reply-name">Singh</span>
		</div>
		*/ 
		?>
	  <!-- /.direct-chat-text -->
	</div>
	<!-- /.direct-chat-msg -->
</div>
<?php
}
?>