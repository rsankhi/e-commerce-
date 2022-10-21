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
		.box-box{
			padding: 15px;
			
			background: rgba(244, 244, 244, 0.19);
			font-size: 13px;
			font-family: MV Boli;
			border-radius: 3px;
			box-shadow: .01px .01px 4px #fff9f9;
			color:#01015c;
			letter-spacing: .1px;
			font-weight: 300;
			
			
		}
	
	</style>
	<div class="main-page">
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?> 
     <!--End nav bar menu start -->
	<div class="container-fluid"> <br>
		<div class="row">
			<div class="box box-header">
				<center><h3 style="color:red"><b>My E-Comarce : " Seller/Products/Admin Ditails "</b></h3></center>
				</div>
			<div class="col-md-11">
				
		<div class="box" style="background-color:rgba(239, 239, 239, 0);border:none"> <br><br>
		 	<div class="row">
				
				<div class="col-md-6 col-lg-4 text-justify box-box"  style="border-left:2px solid #574c53;color:#1a151c">
					E-commerce (electronic commerce) is the activity of electronically buying or selling of products on online services or over the Internet. Electronic commerce draws on technologies such as mobile commerce, electronic funds transfer, supply chain management, Internet marketing, online transaction processing, electronic data interchange (EDI), inventory management systems, and automated data collection systems. E-commerce is in turn driven by the technological advances of the semiconductor industry, and is the largest sector of the electronics industry.
				</div>
				<div class="col-md-6 col-lg-1 "></div>
				<div class="col-md-6 col-lg-6"><img src="images/AdobeStock_113126068-Converted.jpg" class="img-responsive" width="330px" style="border-radius:10px" align="right"></div>
			</div><hr><br>
			<div class="row">
				<div class="col-md-6 col-lg-4 text-justify box-box" align="right" style="border-left:2px solid #92def5;color:#628893"><br> <br>
					E-commerce (electronic commerce) is the activity of electronically buying or selling of products on online services or over the Internet. Electronic commerce draws on technologies such as mobile commerce, electronic funds transfer, supply chain management, Internet marketing, online transaction processing, electronic data interchange (EDI), inventory management systems, and automated data collection systems. E-commerce is in turn driven by the technological advances of the semiconductor industry, and is the largest sector of the electronics industry.
				</div>
				<div class="col-md-6 col-lg-1 "></div>
				<div class="col-md-6 col-lg-6"><img src="images/adminpics1.png" align="right" class="img-responsive" width="330px" style="border-radius:10px"></div>
				
			</div><hr> <br><br>
			<div class="row">
				<div class="col-md-6 col-lg-6"><img src="images/45.jpg" class="img-responsive" width="330px" style="border-radius:10px"></div>
				<div class="col-md-6 col-lg-1 "></div>
				<div class="col-md-6 col-lg-4 text-justify box-box" style="border-right:2px solid #a5ac0b;color:#a5a136">
					E-commerce (electronic commerce) is the activity of electronically buying or selling of products on online services or over the Internet. Electronic commerce draws on technologies such as mobile commerce, electronic funds transfer, supply chain management, Internet marketing, online transaction processing, electronic data interchange (EDI), inventory management systems, and automated data collection systems. E-commerce is in turn driven by the technological advances of the semiconductor industry, and is the largest sector of the electronics industry.
				</div>
			</div><hr><br>
			<div class="row">
				<div class="col-md-6 col-lg-6"><img src="images/45.jpg" class="img-responsive" width="330px" style="border-radius:10px"></div>
				<div class="col-md-6 col-lg-1 "></div>
				<div class="col-md-6 col-lg-4 text-justify box-box" style="border-right:2px solid #a5ac0b;color:#a5a136">
					E-commerce (electronic commerce) is the activity of electronically buying or selling of products on online services or over the Internet. Electronic commerce draws on technologies such as mobile commerce, electronic funds transfer, supply chain management, Internet marketing, online transaction processing, electronic data interchange (EDI), inventory management systems, and automated data collection systems. E-commerce is in turn driven by the technological advances of the semiconductor industry, and is the largest sector of the electronics industry.
				</div>
			</div><hr><br>
			
			<div class="row">
				<div class="container-fluid">
						<h3 class=" thumb text-center">Business Info</h3>
				</div>
			</div>
		 </div>
	
	</div>
		</div>
	</div>
	 <?php include_once('includes/footer.php'); ?>
	</div>
	</body>
</html>