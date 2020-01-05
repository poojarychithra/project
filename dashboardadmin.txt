<?php
session_start();
error_reporting(0);
//default_time_stamp();
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
$tim = date("H:i:s");
include("dbconnection.php");
$currentpagename= trim(basename($_SERVER['PHP_SELF']));	
//customer login panel
if(isset($_POST["btnlogin"]))
{
	$sql= "SELECT * FROM customer WHERE email='$_POST[email]' AND password='$_POST[password]'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) == 1 )
	{
		$rs = mysqli_fetch_array($qresult);
		$_SESSION["customerid"] = $rs[customerid];
	echo "<script>window.location='index.php';</script>";
	}
	
	else
	{
		echo "<script>alert('Failed to login...');</script>";
	}
}
//customer login panel ends here
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


//Coding starts - customer Panel starts here..
if(isset($_SESSION["adminid"]))
{
	$sqladminac ="SELECT * FROM admin WHERE adminid='$_SESSION[adminid]'";
	$qsqladminac = mysqli_query($con,$sqladminac);
	if(mysqli_num_rows($qsqladminac) == 1)
	{
		$rsadminac=mysqli_fetch_array($qsqladminac);
	}
}
//Coding ends here - customer Panel ends here..



?>


<!DOCTYPE html>
<html>
<head>
<title>Online Tech Store</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Ubuntu:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<!-- header -->
<?php
if(isset($_SESSION["adminid"]))
{
?>

<style>
.navbar1 {
    overflow: hidden;
    background-color: #333;
    font-family: Arial;
}

.navbar1 a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown1 {
    float: left;
    overflow: hidden;
}

.dropdown1 .dropbtn1 {
    font-size: 16px;    
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
}

.navbar1 a:hover, .dropdown1:hover .dropbtn1 {
    background-color: red;
}

.dropdown-content1 {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content1 a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content1 a:hover {
    background-color: #ddd;
}

.dropdown1:hover .dropdown-content1 {
    display: block;
}
</style>
<div class="navbar1">
  <a href="dashboard.php">Dashboard</a>
  
  <div class="dropdown1">
    <button class="dropbtn1">Profile 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
		<a href="empprofile.php">Profile</a>
		<a href="empchangepassword.php">Change password</a>
    </div>
  </div> 
  
<?php
if($_SESSION[emp_type] == "Admin")
{
?>
  <div class="dropdown1">
    <button class="dropbtn1">Employee 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
		<a href="employee.php">Add Employee</a>
		<a href="viewemployee.php">View Employee</a>
    </div>
  </div> 
<?php
}
if($_SESSION[emp_type] == "Admin")
{
?>
   <div class="dropdown1">
    <button class="dropbtn1">Billing 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
		<a href="viewbillingadmin.php">View Billing</a>
    </div>
  </div> 
  
  
 
  
<?php
}
?>	
   <div class="dropdown1">
    <button class="dropbtn1">Report 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
		<a href="viewcustomer.php">Customer Report</a>
		<a href="viewmessage.php">View Messages</a>
	
		
    </div>
	
  </div> 

  <?php

?>
  
   <div class="dropdown1">
    <button class="dropbtn1">Product 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content1">
		<a href="product.php">Add Product</a>
		<a href="viewproduct.php">View Product</a>
    </div>
  </div> 
  
  <a href="logout.php">Logout</a>
  <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
   <a></a>
  <a></a>
 <a> <?php
	if(isset($_SESSION["adminid"]))
                {
				 ?>
				  <h2 style="color:red"> <a href="#">Welcome     <?php echo $rsadminac[adminname]; ?></a></h2>
				   <?php
				}
				?>
				</a>
  <!--<div class="product_list_header">  
	<fieldset style="color: #fff;font-size: 14px;outline: none;text-transform: capitalize; padding: .5em 2.5em .5em 1em;border: 1px solid #84c639;margin: .35em 0 0; 
    background-color: black;">
			<a href="messagebox.php"><i class="fa fa-comments-o" style="font-size:18px;color:red;cursor:pointer;"></i></a>
		</fieldset>-->

</div>	
  
 
  
</div>

<div class="agileits_header">
</div>
<?php
}
else
{
?>
	<div class="agileits_header">
	


		<div class="w3l_search">
		
				<input type="text" name="product" placeholder="Search a product..." value="<?php echo $_GET[product]; ?>">
				<input type="submit" value="" onclick="window.location='displayproduct.php'">
				
		</div>
		
		
<?php
if(isset($_SESSION["customerid"]))
{
?>
<!--<div class="product_list_header">  
	<form action="viewmybid.php" method="post" class="last">
		<fieldset>
			<input type="submit" name="submit" value="View my book (<?php
$sql = "SELECT * FROM booking WHERE customerid='$_SESSION[customerid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_num_rows($qsql);
?>)" class="button" />
		</fieldset>
	</form>
</div>-->
	

		
<!--<div class="product_list_header">  
	<fieldset style="color: #fff;font-size: 14px;outline: none;text-transform: capitalize; padding: .5em 2.5em .5em 1em;border: 1px solid #84c639;margin: .35em 0 0; 
    background-color: black;">
			<a href="messagebox.php"><i class="fa fa-comments-o" style="font-size:18px;color:red;cursor:pointer;"></i></a>
		</fieldset>

</div>-->		
<?php
}
?>
		<div class="w3l_header_right">
			<ul>
				<li class="dropdown profile_details_drop">
					<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true"></i><span class="caret"></span></a>
					<div class="mega-dropdown-menu">
						<div class="w3ls_vegetables">
							<ul class="dropdown-menu drp-mnu">
							<?php
							if(isset($_SESSION["customerid"]))
							{
							?>   
							    <li><a href="customerpanel.php">Customer Panel</a></li>
								<li><a href="displayproduct.php">View Product</a></li>
						<li><a href="viewbillingcustomer.php">View Trasaction</a></li>
								<li><a href="logout.php">Logout</a></li>
							<?php
							}
							else if(isset($_SESSION["adminid"]))
							{
							?>
								<li><a href="empprofile.php">Profile</a></li>
								<li><a href="empchangepassword.php">Change password</a></li>
                                 	<li><a href="logout.php">Logout</a></li>
							<?php
							}
							else
							{
							?>
								<li><a href="login.php">Sign In</a></li> 
								<li><a href="register.php">Sign Up</a></li>							
							<?php
							}
							?>
							</ul>
						</div>                  
					</div>	
				</li>
			</ul>
		</div>
		<div class="w3l_header_right1">
		<?php
				if(isset($_SESSION["customerid"]))
                {
				 ?>
				  <h2> <a href="#">Welcome  <?php echo $rscustomerac[username]; ?></a></h2>
				   <?php
				}
				
				
				?>
			
			
		</div>
		<div class="clearfix"> </div>
	</div>
<?php
}
?>
<!-- script-for sticky-nav -->
	<script>
	$(document).ready(function() {
		 var navoffeset=$(".agileits_header").offset().top;
		 $(window).scroll(function(){
			var scrollpos=$(window).scrollTop(); 
			if(scrollpos >=navoffeset){
				$(".agileits_header").addClass("fixed");
			}else{
				$(".agileits_header").removeClass("fixed");
			}
		 });
		 
	});
	</script>
<!-- //script-for sticky-nav -->
		<div class="logo_products">
		<div class="container">
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php"><span>Online</span>Tech<span>Store</span></a></h1>	
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="special_items">
					<li><a href="about.php">About Us</a><i>/</i></li>
					
					
				</ul>
			</div>
			<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>+91-878979797</li>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:contact@onlinetechstore.com">contact@onlinetechstore.com</a></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- products-breadcrumb -->
		<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Home</a><span>      </span></li>
				
	      <li>
			   
				<!--if(isset($_SESSION["customerid"]))
					put php bfr if
               {
	             include("chat.php");
               }
			    else if(!isset($_SESSION["adminid"]))
                  {
	             echo "<a href='login.php'>Login to chat..</a>";
                    }
						
                    ?>-->
               
				</li>
				
				
				
	</ul>
		</div>
	</div>
<!-- //products-breadcrumb -->