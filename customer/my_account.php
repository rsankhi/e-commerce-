<?php
session_start();
if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
else{

 include_once('../includes/db_con.php');
 include_once('includes/db_con.php');


 include_once('../functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <?php include('includes/header_link.html'); ?>

    </head>
<body>
    <!--- Welcome-top-bar ---> 
    <?php include('includes/welcome_topbar.php'); ?>
     <!-- End Welcome Top  bar  ---->
    
     <!-- nav bar menu start -->
    <?php include('includes/menubar.php'); ?>
                           <!--End nav bar menu start -->
    <!-- Page Diraction path --->
        <div id="content"><!----- Content ---start-->
        <div class="container-fluid"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>MY ACCOUNT</li>
                </ul>
            </div><!-- col-md-12- End--->
            <!-- Side menu-->
            <div class="col-md-3">
                <?php include_once('includes/sidebar.php'); ?>
            </div>
            <!-- Side menu End -->
            <div class="col-md-9"><!---col-md-9 start--->
                <!--- including my order.php page ------->
                <?php 
                if(isset($_GET['my_order'])) { include('my_order.php');  }
                //including my order.php page  End ------->
               // <!--- including my pay_offline.php page ------->
                elseif(isset($_GET['pay_offline']))  {  include('pay_offline.php');  }
               // <!--- including my pay_offline.php page  End ------->
                // <!--- including my_address page ------->
                elseif(isset($_GET['my_address']))  {  include('my_order_addresh.php');  }
               // <!--- including my_address page  End ------->
               // <!--- including my edit_Account.php page ------->
                elseif(isset($_GET['edit_account'])){ include('edit_account.php');}
               // <!--- including my adit account.php page  End ------->
               // <!--- including my change_pass.php page ------->
                elseif(isset($_GET['change_pass'])){ include('change_pass.php'); }
              //  <!--- including my change_pass.php page  End ------->
                //<!--- including my my_wishlist.php page ------->
                elseif(isset($_GET['my_wishlist'])){ include('my_wishlist.php'); }
              //  <!--- including my change_pass.php page  End ------->
              //  <!--- including  delete_account.php page ------->
                elseif(isset($_GET['delete_ac'])){ include('delete_ac.php'); }
               // <!--- including my delete_account.php page  End ------->
				 elseif(isset($_GET['seller_ac'])){ 
					 		if(isset($_POST['create'])){ 
									$cust_email=$_SESSION['customer_email'];
								$check_alredy_exist="select * from admin where email='$cust_email' and job='seller'";
								$run_check=mysqli_query($con,$check_alredy_exist);
								$num_rows=mysqli_num_rows($run_check);
								if($num_rows>0){
				?> <script> alert('You have a alredy Seller account . Click To login & Manage Our Services ', '_self') </script>
					<?php
								}
								else{
								$get_cust_info="select * from customers where customer_email='$cust_email'";
								$run_cust_info=mysqli_query($con,$get_cust_info);
								$result_info=mysqli_fetch_array($run_cust_info);
								$cust_id=$result_info['customer_id'];
								$cust_ac_status=$result_info['ac_status'];
								$cust_name=$result_info['customer_name'];
								
								if($cust_ac_status=='open'){
									$update="update customers set seller_ac='yes' where customer_id='$cust_id'";
									$run_update=mysqli_query($con,$update);
									if($run_update==true){
										$job='seller';
										$insert_admin="insert into admin(`customer_id`, `name`, `email`, `job`) values('$cust_id','$cust_name','$cust_email','$job')";
										$run_insert=mysqli_query($con,$insert_admin);
										if($run_insert==true){
											
											?>
												<script> alert('You are Successfully Registre In Seller Account. Click To login And Manage Our Dashboard.', '_self')</script>	
											<?php
										}
									}
									
								}
							}
							}
					 if(isset($_POST['login'])){ 
						 		$cust_email=$_SESSION['customer_email'];
								$check_alredy_exist="select * from admin where email='$cust_email' and job='seller'";
								$run_check=mysqli_query($con,$check_alredy_exist);
								$num_rows=mysqli_num_rows($run_check);
								$result_info=mysqli_fetch_array($run_check);
								$seller_ac_status=$result_info['ac_status'];
								$seller_job=$result_info['job'];
						 		$open='open';
							if($num_rows>0){
						      if($seller_ac_status==$open){
								 
						             $_SESSION['seller_email']=$_SESSION['customer_email'];
									 ?> <script> alert('Welcome To Seller Panel . Manage Our Services','_self'); window.open('../seller_ac/index.php?dashboard', '_self') </script>
									<?php
					 				}
								 else{
									 ?><script> alert('Your Seller Account has been blocked. If you want to re-open than contact support team.', '_self'),window.open('../contact.php', '_self') </script> <?php
								 }
					 
								 }
						 	else{ ?>
								<script> alert('You have No seller account. click On Register Button  and Register your Seller Account Instant.', '_self')</script>	
								<?php
							 
							}
					 		}
				 			?>
							<div class="row ">
								<div class="box">
								<div class="box-header text-left">
									<h4>Seller Account Ditails:</h4>
								</div>
								<form action="my_account.php?seller_ac" method="post">
								<p class="text">
									if you have no seller account than create seller account. 
									
								</p><button type="submit" class="btn btn-danger" name="create"> Register  Account</button> <br><br>
								<p class="text">
									if you have no seller account than create seller account. 
									
								</p>
								<button type="submit" class="btn btn-success" name="login"> Login To Seller Account</button>
								</form>
								</div>
							
							</div>
						<?php
				 	}
                else{ ?>
                <div class="box">
                    <div class="box-header text-center">
                        <h3>Welcome To Our Dashbord</h3>
                        <p>Manage Your Orders and pressnol ditails. For any query contact to 24x7 help desk portal.</p>
                    </div>
                </div>
                <?php } ?>
            </div>
              </div><!----- container ---End-->
    <!----- Content ---End-->
    </div>
     <!--- footer start--->
  <?php include_once('includes/footer.php');?>
        <!--- footer End--->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
    
</html>
<?php  } ?>