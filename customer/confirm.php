<?php
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<?php
session_start();
if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script 
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>

    <!---- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
    </head>
<body>
    <!--- Welcome-top-bar ---> 
     <div  id="top">
         <!--- BOOTSTRAP CONTAINER-->
        <div class="container">
            <!--1st col-md-6 start ---> <!-- top bar welcome guest  message  and btn ---->
            <div class="col-md-6 offer"> 
                <a href="#" class="btn btn-success btn-sm">Welcome Guest </a>
                <a href="#">Shopping card price : INR 100,Total item 2 </a>
            </div><!--- 1st col-md-6-- end---->
            <!---- 2nd col-md-6 start-->
            <div class="col-md-6"> <!-- top bar menu -->
                <ul class="menu">
                    <li><a href="../customber_registration.php"> Register | </a></li>
                    <li><a href="#">  My Account | </a> </li>
                    <li><a href="#">  GoTo Card | </a></li>
                    <li><a href="#">  LogIn </a></li>
                </ul>
            </div><!---- col-md-6 End-->
        </div> 
     </div><!-- End Welcome Top  bar  ---->
    
     <!-- nav bar menu start -->
     <div class="nav navbar-default" id="navbar">
         <div class="container">
            <div class="navbar-header"><!--navbar-header-->
                <!-- logo -->
                <a href="#" class="navbar-brand logo">
                    <img src="images/pc-logo.png" alt="My E-Com" class="hidden-xs">
                    <img  src="images/small-logo.png" alt="My E-Com" class="visible-xs">
                </a>
                <!-- menu bar show : btn -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only" >Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <!-- search bar btn--->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only"></span>
                    <i class="fa fa-search"></i>
                </button>
                
            </div><!-- End navbar-header-->
             
             <div class="navbar-collapse collapse" id="navigation"><!---navbar-collapse collapse start // Menu bar  ---->
                 <div class="padding-nav"><!-- padding nav start // menu bar --->
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="../index.php"> Home</a></li>
                        <li  class="active"><a href="../shop.php"> Shop</a></li>
                        <li><a href="my_account.php">My Account</a></li>
                        <li><a href="../cart.php">Shopping Cart</a></li>
                        <li><a href="../about.php">About Us</a></li>
                        <li><a href="../services.php">Services</a></li>
                        <li><a href="../contact.php">Contact</a></li>
                     </ul>
                 </div><!-- padding nav End // menu bar --->
                 
                 <!---menu cart btn --->
                 <a href="cart.php" class="btn btn-primary navbar-btn right">
                     <i class="fa fa-shopping-cart"></i>
                     <span>2 item in cart</span>
                                     
                 </a><!---menu cart btn End--->
                 
                 <!--search btn start --->
                 <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                     <span class="sr-only">Toggle Search</span>
                        <i  class="fa fa-search"></i>
                     </button>
                 </div><!--search btn End --->
                 
             </div><!---navbar-collapse collapse End // Menu bar  ---->
             <!-- search form start--->
             <div class="collapse clearflix" id="search">
                 <form class="navbar-form" method="get" action="result.php">
                    <div class="input-group">
                        <input type="text" name="user_query" placeholder="Search Products" class="form-control" required>
                       <span class="input-group-btn"> <button type="submit" value="Search" name="search" class="btn btn-primary">
                        <i class="fa fa-search"></i>
                           </button> </span>
                     </div>
                 </form>
             </div>
             <!--- search form end --->
                      </div>
    
     </div><!--End nav bar menu start -->
    
    <!-- Page Diraction path --->
        <div id="content"><!----- Content ---start-->
        <div class="container"><!----- container ---start-->
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
               <div class="box">
                   <?php
                            if(isset($_GET['order_id'])){
                                $order_id=$_GET['order_id'];
                                $get_order_ditails="select * from customer_order where order_id='$order_id'";
                                $run_order_ditails=mysqli_query($con,$get_order_ditails);
                                $num_rows=mysqli_num_rows($run_order_ditails);
                                if($num_rows==1){
                                    $order_ditails=mysqli_fetch_array($run_order_ditails);
                                    $customer_id=$order_ditails['customer_id'];
                                    $product_id=$order_ditails['product_id'];
                                    $due_amount=$order_ditails['due_amount'];
                                    $invoice_no=$order_ditails['invoice_no'];
                                    $order_date=$order_ditails['order_date'];
                                    
                                    $get_product="select * from products where product_id='$product_id'";
                                    $run_product=mysqli_query($con,$get_product);
                                    if(mysqli_num_rows($run_product)==1){
                                        $product_ditails=mysqli_fetch_array($run_product);
                                        $product_title=$product_ditails['product_title'];
                                   
                                    
                                    
                                    
                                }
                                
                                
                                }
                   
                   
                   ?><center>
                    <h2 style="font-weight:bold;color:#05012f">Please Confirm Your Payment :</h2>
                    <h3 style="font-weight:bold;color:#a50335"><?php echo $product_title; ?></h3></center>
                   <form action="confirm.php?order_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">
                       <fieldset disabled>
                        <div class="form-group">
                            <label>Invoice Number (Auto Select)</label>
                            <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_no; ?>" required>
                       </div>
                       </fieldset>
                       
                       <fieldset disabled>
                       <div class="form-group">
                            <label>Amount (Auto Select)</label>
                            <input type="text" class="form-control" name="amount" value="<?php echo $due_amount; ?>" required>
                       </div>
                       </fieldset>
                           
                           
                       
                       <div class="form-group">
                            <label>Select Payment Mode (Select)</label>
                            <select class="form-control " name="payment_mode">
                                <option>Bank Transfer</option>
                                <option>Paypal</option>
                                <option>paytm</option>
                                <option>GooglePay</option> 
                                <option>PhonePe</option>
                                <option>Cash On Delevery(COD)</option>
                           </select>
                       </div>
                           <div class="form-group">
                            <label>Enter Payment Ref NO.</label>
                            <input type="text" class="form-control" name="tref_number" required placeholder="">
                       </div>
                       <fieldset disabled>
                       <div class="form-group">
                            <label>Order Date (Auto Select)</label>
                            <input type="text" class="form-control" name="date" value="<?php echo $order_date; ?>" required placeholder="dd-mm-yyyy">
                       </div>
                       </fieldset>
                       
                       <div class="text-center">
                            <button type="submit" name="confirm_payment" class="btn btn-primary">Confirm payment    </button>
                            
                       </div>
                      
                   </form>
                </div>
                <?php
                      if(isset($_POST['confirm_payment'])){
                          $update_id=$_GET['order_id'];
                          $invoice_no_input=$invoice_no;
                          $amount_input=$due_amount;
                          $refrance_no=$_POST['tref_number'];
                          $payment_mode=$_POST['payment_mode'];
                          $cod_value="Cash On Delevery(COD)";
                          if($payment_mode==$cod_value){
                            $complate="UnPaid COD";
                          }
                          else{
                          $complate="Processing";
                          }
                          $insert_payment_ditails="insert into payments(customer_id,product_id,invoice_no,amount,payment_mode,refrance_no,payment_date) values('$customer_id','$product_id','$invoice_no_input','$amount_input','$payment_mode','$refrance_no',NOW())";
                          $run_isert=mysqli_query($con,$insert_payment_ditails);
                          
                         $update_customer="update customer_order set order_status='$complate' where order_id='$update_id' and invoice_no='$invoice_no_input' " ;
                         $run_update_customer=mysqli_query($con,$update_customer);
                         
                          
                          echo"<script>alert('your order recivied successfull ! ThankYou'),window.open('my_account.php?my_order', '_self') </script>";
                          
                      }
                                
                            
                            
                            } ?>
                
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