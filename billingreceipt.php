<?php
include("header.php");
$sqlpayment ="SELECT * FROM billing LEFT JOIN customer ON customer.customerid=billing.customerid";
if($_GET[billproductid] != "")
{
$sqlpayment = $sqlpayment . " WHERE billing.product_id='$_GET[billproductid]'";
}
if($_GET[billingid] != "")
{
$sqlpayment = $sqlpayment . "  WHERE billing.billingid='$_GET[billingid]'";
}
$qsqlpayment = mysqli_query($con,$sqlpayment);
echo mysqli_error($con);
$rspayment= mysqli_fetch_array($qsqlpayment);
?>
<!-- banner -->
<?php
$sqlpayment1 ="SELECT * FROM billing LEFT JOIN customer ON customer.customerid=billing.customerid where billing.billingid='$_GET[billingid]'";
$qsqlpayment1 = mysqli_query($con,$sqlpayment1);
echo mysqli_error($con);
$rspayment1= mysqli_fetch_array($qsqlpayment1);



?>


	<div class="banner">
		
		<div class="w3l_banner_nav_right">

			<div class="agileinfo_single">
		
				<div class="col-md-12 agileinfo_single_right">
					
						
				<h2>Billing Receipt</h2>
				
					<div class="snipcart-item block">
						<div class="w3agile_description">
<div id="printableArea">
<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >		
       <tr>
	   <th colspan="3"><center>Online Tech Store</center></th>
	   </tr>
	   <tr>
	   <th colspan="3"><center> Mangalore</center></th>
	   </tr>
		<tr>
			<td><b>Bill No: </b> <?php echo $rspayment1[billingid]; ?> </td>
			 <td><b>Customer: </b> <?php echo $rspayment1[username]; ?></td>
		</tr>
		<tr>
			<td><b>phone: </b> <?php echo $rspayment1[phone]; ?> </td>
			 <td><b>email id: </b> <?php echo $rspayment1[email]; ?></td>
		</tr>
		<tr>
		   
			<td><b>Payment type: </b> <?php echo $rspayment1[card_type]; ?></td>
			<td></td>
		</tr>
		
</table>
</div>
<center><input type="button" name='print'  onclick="printDiv('printableArea')" value="Click here to Print"></center>

						</div>	
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
<!-- //banner -->
<?php
include("footer.php");
?>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>