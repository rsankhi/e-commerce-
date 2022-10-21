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
	<div class="main-page">
    <!--- Welcome-top-bar ---> 
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
                    <li>Cart</li>
                </ul>
            </div><!-- col-md-12- End--->
             <div class="col-md-9" id="cart"> <!-- col-md-9 start -->
                <div class="box"><!--- box start-->
                    <form action="cart.php" method="post" enctype="multipart/form-data"> <!-- Show cart productt form start -->
                        <h1> Shopping Cart </h1>
                        <p class="text-muted">Currently You Have <?php cart_item(); ?> item(s) in Your Cart.</p>
                        <div class="table-responsive"> <!-- table-responsive/list product start --->
                            <table class="table"> <!-- start table --->
                                <thead><!--- Table heading ---start --->
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        
                                        <th>Size</th>
                                        <th colspan="1"> Delete Product</th>
                                        <th>Unit Price</th>
                                        <th>Shipping Charge</th>
                                        <th colspan="1"> Sub Total</th>
                                        
                                    </tr> 
                                
                                </thead><!--- Table heading ---End --->
                                <tbody> <!-- table body start --->
                                   <?php 
                                   showCartItem();
                                    ?>
                                
                                </tbody> <!-- table body End -->
                                <tfoot> <!-- table footer-->
                                    <tr>
                                        <th colspan="5"></th>
                                        <th colspan="0"> </th>
                                        <th colspan="1"><?php shipChargeTotal(); ?>.00</th>
                                        <th colspan="1"><?php totalPrice(); ?>.00</th>
                                    </tr>
                                    <tr>
                                        <th colspan="6">Total Amount</th>
                                        <th colspan="0"> INR <?php item_payble_price(); ?>.00 </th>
                                       
                                        
                                    </tr>
                                </tfoot><!--tab;le footer---->
                            </table><!-- End table --->
                        </div><!-- table-responsive/list product End -->
                        
                        <div class="box-footer"> <!-- box footer-- start-->
                            <div class="pull-left"><!-- pull -left start -->
                                <a href="shop.php" class="btn btn-default">
                                     <i class="fa fa-chevron-left"></i> Continue Shoping
                                </a>
                            </div><!--- pull left end --->
                            <div  class="pull-right">
                            <button class="btn btn-default" type="submit" name="update" value="update cart">
                                <i class="fa fa-refresh"> Update Cart</i>
                                </button>
                                <a class="btn btn-primary" href='#'>
                                 Proceed To Checkout <i class="fa fa-chevron-right"> </i>
                                </a>
                         </div>
                        </div><!-- box footer end --end-->
                        
                        
                        
                    </form><!-- Show cart productt form End -->
                 </div><!--- box End-->
                 <?php
                 /* update cart code */
                  function update_cart() {
                      global $con;
                      if(isset($_POST['update'])){
                          if($_POST['remove']==!NULL )
                          {
                          /* yha hamm foreach ka use kar rhe hai multipale array fom value ko one click me use karne ke liye yha  $_POST['remove'] ek array hai jo hame showitem function se retrive ho rha hai    */
                          foreach($_POST['remove'] as $remove_id){
                              $delete_item="delete from cart where id='$remove_id'";
                              $run_delete=mysqli_query($con,$delete_item);
                              if($run_delete){
                                
                                  echo"<script>window.open('cart.php', '_self')</script>";
                                  
                              }
                              else{
                                  echo"Select Items";
                              }
                          }
                      }
                          else{
                              echo "<script> alert('Please select Item '), window.open('cart.php', '_self') </script>";
                          }
                      }
                  }
                 /* calling update_cart() function */
                 echo $update_cart=update_cart();
                 
                 ?>
                
             </div> <!-- #cart End  Col-md-9 End-->
             <!-- order summary box start -->
             <div class="col-md-3"><!--col-md-3 start-->
                 <div class="box" id="order-summary"><!-- box start-->
                    <div class="box-header">
                        <h3>Order Summary</h3>
                     </div>
                     <p class="text-muted">
                        shipping and additional costs are calculate based on the values you have enterd.
                     </p>
                     <div class="table-responsive">
                     <table class="table">
                         <thead>
                            <th>Chargess :</th>
                             <th>Price :</th>
                         </thead>
                         <tbody>
                            <tr>
                                <td>Order SubTotal</td>
                                <th>INR <?php totalPrice(); ?>.00 </th>
                             
                             </tr>
                         <tr>
                            <td>Shipping And Heandling </td>
                             <td>INR <?php shipChargeTotal(); ?></td>
                         </tr>
                         <tr>
                            <td>GST (18%) / TAX </td>
                             <td>INR <?php tax_price(); ?></td>
                         </tr>
                         <tr class="total">
                            <td > Total Pay </td>
                             <td> INR <?php final_user_payble_price(); ?></td>
                         </tr>
                         </tbody>
                         
                         </table>
                            </div>
                 </div>
             
             </div>
             
             
            
            </div><!-- show cart item ditails  Container End--->
            <!--- features products show container start-->
            <div class="container">
                 <div id="row same-height-row"> <!-- Feture Product Row Start--->
                    <div class="col-md-3 col-sm-6"> <!-- Col-md-3 col-sm-6 Start--->
                        <div class="box same-height headline"><!-- box smae height Start--->
                            <h3 class="text-center">You Also Like These Product</h3>
                        </div><!-- box smae height heading  End--->
                     </div><!-- Col-md-3 col-sm-6 End--->
                         <?php
                       /* get products from data base */ 
                     
                     $get_products="select * from products order by 1 DESC LIMIT 0,3";
                     $run_products=mysqli_query($con,$get_products);
                     
                     while($row=mysqli_fetch_array($run_products)){
                         $pro_id=$row['product_id'];
                         $pro_title=$row['product_title'];
                         $pro_price=$row['product_price'];
                         $pro_img1=$row['product_img1'];
                         
                         
                         echo"
                            <div class='center-responsive col-md-3 col-sm-6'>
                                <div class='product same-height'>
                                 <a href='ditails.php?pro_id=$pro_id'><br>
                                 <img src='seller_ac/product_images/$pro_img1' class='img-responsive'>                                 
                                 </a>
                                 <div class='text'>
                                   <a href='ditails.php?pro_id=$pro_id'>
                                   <h3> $pro_title </h3>
                                   </a>
                                   
                                   <p class='price'>
                                    INR $pro_price
                                   </p>
                                  
                                 </div>
                                 <center>
                                 <p class='buttons' >
                                 <a style='width:60%' href='ditails.php?pro_id=$pro_id' class='btn btn-default'>View Details </a><br>
                                 <h4><i  class='fa fa-arrow-circle-right '> </i>
                                 </h4>
                                 
                                 </p>
                                </center>
                                
                                </div>
                            </div>
                         
                         
                         ";
                     }
                     
                     ?>
                      </div> <!-- Feture Product Row End--->
            
            </div><!--- features products show container start-->
    
    </div><!-- Content End--->
    
     <!--- footer start--->
  <?php include_once('includes/footer.php');?>
        <!--- footer End--->
	</div>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>