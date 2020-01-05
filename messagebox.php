<?php
include("header.php");
?>
<!-- services -->
<div class="services" id="services">
		<div class="container">
		<div class="heading">
			<h3 data-aos="zoom-in" >Message Box</h3>
</div>

<form method="post"	action="" onsubmit="return validateform()" enctype="multipart/form-data" >	
		<div  class="col-md-3" style='padding-left:5px;cursor:pointer; border-color: #afdfa0;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);'>
<?php
	$sqlmessagelist ="SELECT * FROM message LEFT JOIN customer as sender on message.sender_id =sender.customerid LEFT JOIN admin as receiver on receiver.adminid=message.receiver_id WHERE message.messageid!='0' ";
	if(isset($_SESSION[adminid]))
	{ 
	$sqlmessagelist = $sqlmessagelist . " AND (message.receiver_id='$_SESSION[adminid]' OR  message.sender_id ='$_SESSION[adminid]')";
	}
	$sqlmessagelist = $sqlmessagelist . " GROUP BY message.sender_id ORDER BY message.message_date_time DESC";
	echo mysqli_error($con);
	$qsqlmessagelist = mysqli_query($con,$sqlmessagelist);
	while($rsmessagelist = mysqli_fetch_array($qsqlmessagelist))
	{
		
		if($rsmessagelist[1] == $_SESSION[adminid])
		{
			$custnname= $rsmessagelist[20];
			$senderid= $rsmessagelist[1];
			$receiverid = $rsmessagelist[2];
		}
		if($rsmessagelist[2] == $_SESSION[customerid])
		{
			$custnname= $rsmessagelist[8];
			$senderid= $rsmessagelist[2];
			$receiverid =$rsmessagelist[1];
		}
		echo "<div class='panel panel-default' style='padding-left:5px;cursor:pointer; border-color: #cfdc00;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);' onclick='loadmessage($_SESSION[customerid],$receiverid])'>";
		echo "<b>" .$custnname . "</b><br>";
		echo "<i class='fa fa-calendar'></i>" . date("d-M-Y h:i A",strtotime($rsmessagelist[message_date_time])) . "<br>";
		echo "<i class='fa fa fa-flickr'></i>" .$rsmessagelist[username] ;
		echo "</div>";
	}
?>
		</div>
		<div  class="col-md-9"  style='padding-left:5px;cursor:pointer; border-color: #afdfa0;  box-shadow: 0 0 5px rgba(207, 220, 0, 0.4);'>
<div class="popup-box chat-popup" id="qnimate" >
    		  <div class="popup-head">
				<div class="popup-head-left pull-left"><?php echo $rsproduct[1]; ?></div>
			  </div>
			  
			<div class="popup-messages" id="popup-messages"  style='overflow:auto; height:400px;'>
			<?php
			//include("chatmessenger.php");
			?>
			</div>

			<div class="popup-messages-footer"  id="popup-messages-footer">
				<textarea id="status_message" placeholder="Type a message..." style="width:100%;" name="message"></textarea>
			</div>
	  </div>

		</div>
		
		<div  class="col-md-12">
			<hr>
		</div>


				<div class="clearfix"> </div>
		</div>






</form>								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
<!-- //services -->
<?php
include("footer.php");
?>
<script>

$('#status_message').bind('keyup', function(e) {
	var message = $('#status_message').val();
	if(message != "")
	{
		if ( e.keyCode === 13 ) 
		{	// 13 is enter key
	
			$.post("chatmessenger.php",
			{
				'message': message,
				
				'senderid': 0,
				'receiverid': 0,
				'status':'Hall',
				'btnmessage':'btnmessage'
			},
			function(data, status){
				$('#status_message').val('');
				$('#popup-messages').html(data);
				$('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
			});
	
		}
	}
});

function loadmessage(senderid,receiverid,productid)
{
	var message = "";
			$.post("chatmessenger.php",
			{
				'message': message,
				
				'senderid': senderid,
				'receiverid': receiverid,
				'status':'Seller',
				'btnmessage':'btnmessage'
			},
			function(data, status){
				//$('#status_message').val('');
				$('#popup-messages').html(data);
				$('#popup-messages').scrollTop($('#popup-messages')[0].scrollHeight);
			});
}
</script>
<script>
setInterval(function(){
   loadmessage('<?php echo $_SESSION[customerid]; ?>','<?php echo $receiverid; ?>'); // this will run after every 5 seconds
}, 5000);
</script>