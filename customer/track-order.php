<?php
session_start();
 include_once('includes/db_con.php');
 include_once('../functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>HR BAJAR | Track Order</title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
<body>
    <!--- Welcome-top-bar ---> 
	<?php if(!isset($_SESSION['customer_email'])){
		header('location:../checkout.php');
		}  else {
			
	
 ?>
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?>
     <!--End nav bar menu start -->
    
    <!-- Page Diraction path --->
        <div id="content"><!----- Content ---start-->
         <div class="container-fluid"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>Track Order Status</li>
                    
                </ul>
            </div><!-- col-md-12- End--->
            <!-- Side menu-->
            <div class="col-md-3">
                <?php include_once('includes/sidebar.php'); ?>
            </div>
            <!-- Side menu End -->
            
             <div class="col-md-9"><!-- col-md-9 start --->
                 <div class="row" id="productmain"><!-- product main start --->
	<?php 
		if(isset($_GET['order_id'])){
			$order_id=$_GET['order_id'];
			$customer_id=$_SESSION['customer_id'];
			//geting order info
			$get_order_info="select * from customer_order where customer_id='$customer_id' and order_id='$order_id'";
			$run_order_info=mysqli_query($con,$get_order_info);
			
			$num=mysqli_num_rows($run_order_info);
			if($num>0){
				$result=mysqli_fetch_array($run_order_info);
				$product_id=$result['product_id'];
				$due_amount=$result['due_amount'];
				$qty=$result['qty'];
				$size=$result['size'];
				$order_date=substr($result['order_date'], 0,11);
				$pay_status=$result['order_status'];
			//geting product info 	
				$pro_info="select * from products where product_id='$product_id'";
				$run_pro=mysqli_query($con,$pro_info);
				if(mysqli_num_rows($run_pro)>0){
					$result_pro=mysqli_fetch_array($run_pro);
					$pro_name=$result_pro['product_title'];
					 
					echo "<p style='background-color:#f0eeee;padding:10px;color:#1726db'>▶ $pro_name [ order no :$order_id ]</p><br>";
					echo"<p align='center' style='width:300px; background-color:#03123b;padding:5px;color:#f0f0f4;border-radius:5px' class='text-center'>PRODUCT ORDER DATE: $order_date </p> <div class='clearfix'></div> <hr>";
					
					echo"<div class='row'><div class='col-md-4'>
					
							<div class='col-md-2' style='margin:0'>
						  <img style='margin:0; padding:0' width='40px' src='../images/track-success.jpg' class='img-responsive' alt='success'  class=''>	
						  </div>
						  <div class='col-md-10' style='margin:0;padding:0'>
							<p style='color:green'>Order Register Success. </p>
						</div><br><br><br>
						 <p>[ Your product will be delivered within 7-10 days. ]</p>
						</div>";


					
				}
					  }
			
		}
	?>
				 </div>
			 </div>
			</div>
	</div>
	<?php 
}?>
	</body>
</html>