<?php
session_start();
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>

<?php 
    if(isset($_GET['customer_id'])){
    if(isset($_SESSION['customer_email'])){
        $customer_id=$_GET['customer_id'];
       
    
 $customer_ip=getUserIP();
 $status="pending";

$select_cart="select * from cart where ip_add='$customer_ip'";
$run_cart=mysqli_query($con,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart)){
    $pro_id=$row_cart['p_id'];
    $pro_qty=$row_cart['qty'];
    $pro_size=$row_cart['size'];
    $invoice_no=mt_rand();
    
    $get_pro="select * from products where product_id='$pro_id'";
        $run_pro=mysqli_query($con,$get_pro);
    while($row_pro=mysqli_fetch_array($run_pro)){
        $sub_total=$row_pro['product_price'] * $pro_qty;
        
       $insert_customer_order="insert into customer_order(customer_id,product_id,due_amount,invoice_no,qty,size,order_date,order_status) values('$customer_id','$pro_id','$sub_total','$invoice_no','$pro_qty','$pro_size',NOW(),'$status')";
       $run_customer_order=mysqli_query($con,$insert_customer_order);
        
      
        
        $delete_cart_item="delete from cart where ip_add='$customer_ip'";
        $run_delete_cart_item=mysqli_query($con,$delete_cart_item);
        
            
    }
    
    
}
        echo"<script>alert('your order has been placed successfull ! Thanks For Placing Orders ','_Self');window.open('customer/my_account.php?my_order', '_self')</script>";
        
        
    }
    }
?>