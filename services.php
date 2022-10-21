<?php
session_start();
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>My E-com | About</title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
	
<body>
	<style>
		body{
			background: #fbfbfb;
		}
		
	</style>
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?> 
     <!--End nav bar menu start -->
	<div class="container-fluid"> <br>
		<div class="row">
			<div class="box box-header">
				<center><h3 style="color:red"><b>Services:</b></h3></center>
				</div>
			
				
		<div class="box" style="background-color:rgba(239, 239, 239, 0);border:none"> <br><br>
		 	<div class="row">
				<h4>Seller Ac Services</h4>
				<ul>
					<li>Sell On My-Ecom</li>
					<li>Manage Our Ac</li>
					<li>Manage Our Seller Ac</li>
					<li>Manage 
						<ul>
							<li>Edit Profile</li>
							<li>Manage Products</li>
							<li>Manage Customers</li>
							<li>Manage Customer Orders</li>
							<li>View Customer profile</li>
							<li></li>
							<li>Auto Alert Notification</li>
						</ul>
					
					</li>
					
				</ul>
			</div><hr><br>
			<div class="row">
			</div>
		
	
	</div>
		</div>
	</div>
	 <?php include_once('includes/footer.php'); ?>
	</body>
</html>