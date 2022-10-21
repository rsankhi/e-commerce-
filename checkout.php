 <?php
session_start();
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home | Welcome</title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
<body>
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?>
     <!--End nav bar menu start -->
    
    <!-- Page Diraction path --->
        <div id="content"><!----- Content ---start-->
         <div class="container"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>Checkout</li>
                </ul>
            </div><!-- col-md-12- End--->
             <div class="col-md-3"><!--sidebar col-md-3 start ---->
                <?php include_once("includes/sidebar.php"); ?>
             </div><!--sidebar col-md-3 end ---->
             <!-- col-md-9 start -->
             <div class="col-md-9">
         <?php
                        if(!isset($_SESSION['customer_email'])){
                            include('customer/customer_login.php');
                        }
                 else{
                      $customer_ip=getUserIP();
                 $select_cart="select * from cart where ip_add='$customer_ip'";
                $run_cart=mysqli_query($con,$select_cart);
                 $row=mysqli_num_rows($run_cart);
                 
                     if($row>0){
                     
                 
                     include('payment_options.php');
                 }
                     else{
                         echo"<script>alert('No Item Found In your Cart, Add Item In Cart  ','_Self');window.open('cart.php', '_self')</script>";
                     }
                 }
                
                 ?>
             </div> <!--col-md-9 End-->
                         
              </div><!----- container ---End-->
    <!----- Content ---End-->
    </div>
     <!--- footer start--->
  <?php include_once('includes/footer.php');?>
        <!--- footer End--->
  
    </body>
</html>

