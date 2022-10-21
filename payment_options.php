<div class="box">

    <?php
    $session_email=$_SESSION['customer_email'];
    
    $select_query="select * from customers where customer_email='$session_email'";
    $run_query=mysqli_query($con,$select_query);
    $row=mysqli_fetch_array($run_query);
    $customer_id=$row['customer_id'];
    
    
    if(isset($_GET['pay_cart'])){
		
	}
    
    ?>
	
	<h3>Continue Shopping With Cart.</h3>
	 <h5 style="color:#1b33e8"> &raquo; currently you have(<?php cart_Item(); ?>) Item's in your cart.</h5>
	 
	<h4 class="btn btn-default">Total Cart Amount  [ INR <?php final_user_payble_price() ?> ]</h4> <br>
	<a href="shop.php">	<h4 class="btn btn-success"> Countinue Shopping &raquo; &raquo;</h4></a>
	
</div>





