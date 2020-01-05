 <?php
include("header.php");
if(isset($_POST[submit]))
{
	$dttim = date("Y-m-d H:i:s");
	$ins = "INSERT INTO message(message_date_time,product_id,message,status) VALUES ('$dttim','0','$_POST[question]','FAQ')";
	$qsqlins = mysqli_query($con,$ins);
	echo "<script>alert('Question  sent successfully...');</script>";
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
			<h3>FAQ - Frequently Asked Questions</h3>

			<hr>
			<div class="agile_about_grids">
				
				<div class="col-md-12 agile_about_grid_left">
					<ol>
					<?php
					$sqlquestion = "select * from message where status='FAQ'";
					$qsqlquestion = mysqli_query($con,$sqlquestion);
					while($rsquestion = mysqli_fetch_array($qsqlquestion))
					{
						$sqlans = "select * from message where status='FAQREPLY' AND product_id='$rsquestion[0]' ";
						$qsqlans = mysqli_query($con,$sqlans);
						 $rsans = mysqli_fetch_array($qsqlans);
						 
					?>
						<li>
							<?php echo $rsquestion[message]; ?>
						<textarea class="form-control" name="msg<?php echo $rsquestion[0]; ?>"  id="msg<?php echo $rsquestion[0]; ?>" ><?php 
						
						echo $rsans[message]; 
						
						?></textarea>
						<input type="button" name="button" value="Submit" onclick="replytoadmin(msg<?php echo $rsquestion[0]; ?>.value,<?php echo $rsquestion[0]; ?>)">
						</li>
					<?php
					}
					?>					
					</ol>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
<!-- //about -->
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->

<?php
include("footer.php");
?>
<script>
function replytoadmin(answer,questionid)
{
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
               // document.getElementById("txtHint").innerHTML = this.responseText;
			   alert("FAQ Record updated successfully..");
            }
        };
        xmlhttp.open("GET","ajaxreply.php?answer="+answer+"&questionid="+questionid,true);
        xmlhttp.send();
}
</script>