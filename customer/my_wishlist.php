
<div class="box">
   <div class="box-header text-center">
        <h2>Your Wishlist Products :</h2>                    
    </div>
    <div class="row">
    <?php
        $customer_email=$_SESSION['customer_email'];
    $get_cust_id="select * from customers where customer_email='$customer_email'";
    $run_cust_id=mysqli_query($con,$get_cust_id);
    $result_cust_id=mysqli_fetch_array($run_cust_id);
    $customer_id=$result_cust_id['customer_id'];
        
 $get_wishlist_pro="select * from wishlist where customer_id='$customer_id'";
        $run_wishlist_pro=mysqli_query($con,$get_wishlist_pro);
    while($result_wishlist_pro=mysqli_fetch_array($run_wishlist_pro)){
            $pro_id=$result_wishlist_pro['pro_id'];
        
 $get_products="select * from products where product_id='$pro_id'";
    $run_products=mysqli_query($db,$get_products);
    $row_product=mysqli_fetch_array($run_products);
    	$pro_id=$row_product['product_id'];
    	$pro_title=$row_product['product_title'];
    	$pro_price=$row_product['product_price'];
    	$pro_img1=$row_product['product_img1'];

    	echo"<div class='col-md-4 col-sm-6 same-height' style='max-height:410px;min-height:410px'>
    		<div class='product'><br>
    		<a href='../ditails.php?pro_id=$pro_id'>
    			<img src='../seller_ac/product_images/$pro_img1' class='img-responsive'>
    		</a>
    		<div class='text'>
    		<h3><a href='../ditails.php?pro_id=$pro_id'>$pro_title </a></h3>
    		<p class='price'>INR $pro_price </p>
    		<p class='buttons'>
    			<a href='../ditails.php?pro_id=$pro_id' class='btn btn-default'> view ditails</a>
    			<a href='../ditails.php?pro_id=$pro_id' class='btn btn-primary'>Add To Cart </a>
    		 </p>


    		</div>
    		</div>
    		</div>

    	";
    }
?>
    </div>
</div>
