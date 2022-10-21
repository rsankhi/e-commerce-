<?php
session_start();
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>404 Page Not Found</title>
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
	<div class="container-fluid"> 
		<center><h4>Page Not Found</h4></center>

	</div>
	 <?php include_once('includes/footer.php'); ?>
	</div>
	</body>
</html>