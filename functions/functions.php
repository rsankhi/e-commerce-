<?php
error_reporting(0);
 $db=mysqli_connect('sql307.byethost.com','ltm_26044722','hrbajar.com','ltm_26044722_ecom');
/**--- show letest top 8 products on index.php home page---*/
/* getting user ip  start*/

function getUserIP(){
    switch (true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) :return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) :  return $_SERVER['HTTP_X_FORWARDED_FOR'] ;
        default :return $_SERVER['REMOTE_ADDR'];
    }
}

/* getting user ip end */
/* add to cart start */
function addCart(){
    global $db;
    
    if(isset($_GET['add_cart'])){
        
        $ip_add=getUserIP();
        $p_id=$_GET['add_cart'];
        $product_qty=$_POST['product_qty'];
        $product_size=$_POST['product_size'];
        
        $check_product="select * from cart where ip_add=' $ip_add'and qty='$product_qty'and size='$product_size'and p_id='$p_id'";
        $run_check=mysqli_query($db,$check_product);
        if(mysqli_num_rows($run_check)>0){
            echo"<script> alert('This product alredy added in Your Cart ') ;
                  window.open('ditails.php?pro_id=$p_id','_self') </script>";
        }
        else{
            $query="insert into cart(p_id,ip_add,qty,size) values('$p_id', ' $ip_add', '$product_qty', '$product_size')";
            $run_query=mysqli_query($db,$query);
            if($run_query==TRUE)
            {
           echo"<script>alert('New Product Successfully Added In Your Cart.', '_self') </script>";
            echo"<script> window.open('ditails.php?pro_id=$p_id','_self') </script>";
            }
        }
        
    }
}
/* add to cart end */
function addToWishlist(){
    global $db;
    $customer_email=$_SESSION['customer_email'];
    $get_cust_id="select * from customers where customer_email='$customer_email'";
    $run_cust_id=mysqli_query($db,$get_cust_id);
    $result_cust_id=mysqli_fetch_array($run_cust_id);
    $customer_id=$result_cust_id['customer_id'];
    
    $customer_ip=getUserIP();
    $p_id=$_GET['add_wishlist'];
    $check="select * from wishlist where customer_id='$customer_id' AND pro_id='$p_id' ";
    $run_check=mysqli_query($db,$check);
    $check_rows=mysqli_num_rows($run_check);
    if($check_rows>0){
         ?><script>alert('❌❌ Sorry, This Product Alredy Added In Tour Wishlist. ThankYou !!', '_self'),window.open('customer/my_account.php?my_wishlist', '_self')</script> <?php
        exit();
    }
    else{
    $insert_wishlist="insert into wishlist(customer_id,pro_id,ip_add) values('$customer_id','$p_id','$customer_ip')";
    $run_insert=mysqli_query($db,$insert_wishlist);
    
    if($run_insert==true){
        ?><script>alert('Successfully Added In Tour Wishlist. ThankYou !!', '_self'),window.open('customer/my_account.php?my_wishlist', '_self')</script> <?php
    }
    
}
}
/* buy */
function buy_now(){
	global $db;
	$pro_id=$_GET['add_cart'];
	$get_pro_ditails="select * from products where product_id='$pro_id'";
	$run_query=mysqli_query($db,$get_pro_ditails);
	if($num_rows=mysqli_num_rows($run_query)>0){
		$result=mysqli_fetch_array($run_query);
		$pro_name=$result['product_title'];
	}
	
	
}

/* count aded cart itm start */
function cart_item(){
     global $db;
     $ip_add=getUserIP();
    $get_items="select * from cart where ip_add=' $ip_add'";
    $run_items=mysqli_query($db,$get_items);
    $count_items=mysqli_num_rows($run_items);
    echo $count_items;
    
}
/* count aded cart itm end */
/*total only cart product price */
function totalPrice(){
     global $db;
    $ip_add=getUserIP();
    $total=0;
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    while($result=mysqli_fetch_array($run_price)){
        $pro_id=$result['p_id'];
        $pro_qty=$result['qty'];
        
        $get_p_price="select * from products where product_id='$pro_id'";
        $run_get_p_price=mysqli_query($db,$get_p_price);
        $row_result=mysqli_fetch_array($run_get_p_price);
        $p_price=$row_result['product_price'];
        $p_price *= $pro_qty;
        $total += $p_price;
        
    }
     echo $total;
}

/*total price End*/

/* shiping and heanding charge totaol */
function shipChargeTotal(){
         global $db;
    $ip_add=getUserIP();
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    
    $total_shipcharge =0;
    while($result=mysqli_fetch_array($run_price)){
         $pro_qty=$result['qty'];
         $ship_charge=36;
         if($pro_qty>=2){
             $shipcharge= $ship_charge / 1.44  ;
             $shipcharge *= $pro_qty;
             $shipcharge += 10;
             
         }
         else{
             $shipcharge =$ship_charge;
         }
         

    $total_shipcharge+= $shipcharge;
  
}
    echo $total_shipcharge ;  
}

/* shiping and heanding charge totaol  End*/

/* Only item payble price SHIPING + PRO PRICE */   
function item_payble_price(){
    /* once againt calculate total item price */
      global $db;
    $ip_add=getUserIP();
    $total=0;
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    while($result=mysqli_fetch_array($run_price)){
        $pro_id=$result['p_id'];
        $pro_qty=$result['qty'];
        
        $get_p_price="select * from products where product_id='$pro_id'";
        $run_get_p_price=mysqli_query($db,$get_p_price);
        $row_result=mysqli_fetch_array($run_get_p_price);
        $p_price=$row_result['product_price'];
        $p_price *= $pro_qty;
        $total += $p_price;
        
    }
    /* once againt calculate total item ship price */
      global $db;
    $ip_add=getUserIP();
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    
    $total_shipcharge =0;
    while($result=mysqli_fetch_array($run_price)){
         $pro_qty=$result['qty'];
         $ship_charge=36;
        
         if($pro_qty>=2){
             $shipcharge= $ship_charge / 1.44  ;
             $shipcharge *= $pro_qty;
             $shipcharge += 10;
             
         }
         else{
             $shipcharge =$ship_charge;
         }
         

    $total_shipcharge+= $shipcharge;
  
}
  echo $item_payble_payment= $total_shipcharge + $total ;
     
}
/* Only item payble price SHIPING + PRO PRICE */   

function tax_price(){
    /* once againt calculate total item price */
      global $db;
    $ip_add=getUserIP();
    $total=0;
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    while($result=mysqli_fetch_array($run_price)){
        $pro_id=$result['p_id'];
        $pro_qty=$result['qty'];
        
        $get_p_price="select * from products where product_id='$pro_id'";
        $run_get_p_price=mysqli_query($db,$get_p_price);
        $row_result=mysqli_fetch_array($run_get_p_price);
        $p_price=$row_result['product_price'];
        $p_price *= $pro_qty;
        $total += $p_price;
        
    }
    /* once againt calculate total item ship price */
      global $db;
    $ip_add=getUserIP();
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    
    $total_shipcharge =0;
    while($result=mysqli_fetch_array($run_price)){
         $pro_qty=$result['qty'];
        $ship_charge=36;
         if($pro_qty>=2){
             $shipcharge= $ship_charge / 1.44  ;
             $shipcharge *= $pro_qty;
             $shipcharge += 10;
             
         }
         else{
             $shipcharge =$ship_charge;
         }

    $total_shipcharge+= $shipcharge;
  
}
  $item_payble_payment= $total_shipcharge + $total ;
	
	// geting 18% gst 
    $gst=0;
		//$gst=$total * 18/100;
	
    /* getting tax price */
    if($item_payble_payment==0)
    {
    $local_tax= $item_payble_payment;
    $local_tax = 0 ;
     
    echo $local_tax."<br>";
		echo 'GST '.$gst;
}
    
    elseif($item_payble_payment<=199)
    {
    $local_tax= $item_payble_payment;
    $local_tax =0 ;
     
     echo $local_tax."<br>";
		echo 'GST '.$gst;
}elseif($item_payble_payment<=1000)
    {
    $local_tax= $item_payble_payment;
    $local_tax =10.22 ;
     
     echo $local_tax."<br>";
		echo 'GST '.$gst;
}
elseif($item_payble_payment<=2000)
{
    $local_tax= $item_payble_payment;
    $local_tax = 25.38;
     
    echo $local_tax."<br>";
		echo 'GST '.$gst;
}
elseif($item_payble_payment<=4000)
{
    $local_tax= $item_payble_payment;
    $local_tax = 35.11;
     
    echo $local_tax."<br>";
		echo 'GST '.$gst;
}
elseif($item_payble_payment<=5000)
{
    $local_tax= $item_payble_payment;
    $local_tax = 55.56;
     
    echo $local_tax."<br>";
		echo 'GST '.$gst;
}
elseif($item_payble_payment<=10000)
{
    $local_tax= $item_payble_payment;
    $local_tax = 70.88;
     
    echo $local_tax."<br>";
		echo 'GST '.$gst;
}
else{
    $local_tax= $item_payble_payment;
    $local_tax = 102.96;
     
    echo $local_tax."<br>";
		echo 'GST '.$gst;
}


}


/* fully final price with TAX + SHIPING + PRO PRICE */  
function final_user_payble_price(){
     /* once againt calculate total item price */
      global $db;
    $ip_add=getUserIP();
    $total=0;
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    while($result=mysqli_fetch_array($run_price)){
        $pro_id=$result['p_id'];
        $pro_qty=$result['qty'];
        
        $get_p_price="select * from products where product_id='$pro_id'";
        $run_get_p_price=mysqli_query($db,$get_p_price);
        $row_result=mysqli_fetch_array($run_get_p_price);
        $p_price=$row_result['product_price'];
        $p_price *= $pro_qty;
        $total += $p_price;
        
    }
    /* once againt calculate total item ship price */
      global $db;
    $ip_add=getUserIP();
    $get_price="select * from cart where ip_add=' $ip_add'";
    $run_price=mysqli_query($db,$get_price);
    
    $total_shipcharge =0;
    while($result=mysqli_fetch_array($run_price)){
         $pro_qty=$result['qty'];
        $ship_charge=36;
         if($pro_qty>=2){
             $shipcharge= $ship_charge / 1.44  ;
             $shipcharge *= $pro_qty;
             $shipcharge += 10;
             
         }
         else{
             $shipcharge =$ship_charge;
         }
         

    $total_shipcharge+= $shipcharge;
  
}
  $item_payble_payment= $total_shipcharge + $total ;
    
    /* getting tax price */
    
    //tax price
	if($total==0)
    {
    $local_tax= $total;
    $local_tax = 0 ;
     
    
}
    
    elseif($total<=199)
    {
    $local_tax= $total;
    $local_tax = 0;
     
    
}elseif($total<=1000)
    {
    $local_tax= $total;
    $local_tax = 10.22 ;
     
    
}
elseif($total<=2000)
{
    $local_tax= $total;
    $local_tax = 25.38;
     
    
}
elseif($total<=4000)
{
    $local_tax= $total;
    $local_tax = 35.11;
     
    
}
elseif($total<=5000)
{
    $local_tax= $total;
    $local_tax = 55.56;
     
    
}
elseif($total<=10000)
{
    $local_tax= $total;
    $local_tax = 70.88;
     
    
}
else{
    $local_tax= $total;
    $local_tax = 102.96;
     
   
}
     
  
	//gst charge 
	
	$gst=0;
   // $gst=$total * 18 /100;
    
   $item_payble_payment= $total_shipcharge + $total  ;
    $item_payble_payment +=$local_tax;
    $item_payble_payment +=$gst;
    $total_tax=$item_payble_payment;
    echo $total_tax."<br>";
	
}
/* fully final price with TAX + SHIPING + PRO PRICE  END*/  
 function showCartItem(){
     global $db;
     $ip_add=getUserIP();/*getting ip*/
     $get_item="select * from cart where ip_add=' $ip_add'";
     $run_get_item=mysqli_query($db,$get_item);
     $num_rows=mysqli_num_rows($run_get_item);
     if($num_rows>0){
     while($row=mysqli_fetch_array($run_get_item)){
         /*retrive item info from cart -*/
         $pro_id=$row['p_id'];
         $item_id=$row['id'];
         $pro_qty=$row['qty'];
         $pro_size=$row['size'];

         $get_product="select * from products where product_id='$pro_id'";
         $run_product=mysqli_query($db,$get_product);
         $result=mysqli_fetch_array($run_product);
          /*retrive product info from cart -*/
         $pro_title=$result['product_title'];
         $pro_price=$result['product_price'];
         $pro_img1=$result['product_img1'];

         $ship_charge=36;
         if($pro_qty>=2){
             /* calculate multipule item price */
             $total_ship_charge = $ship_charge / 1.44  ;
             $total_ship_charge *= $pro_qty;
             $total_ship_charge += 10;

         }/* if part eld */
         else{
             /*calculate single item price */ 
             $total_ship_charge =$ship_charge;
         }/*else part end*/
         $sub_total_price= $pro_price * $pro_qty ;
         echo"
         <tr>
         <td><a href='ditails.php?pro_id=$pro_id'><img width='50px' src='seller_ac/product_images/$pro_img1'> </a></td>
         <td><a href='ditails.php?pro_id=$pro_id'><b> $pro_title </b> </a></td>
         <td>$pro_qty </td>

         <td>$pro_size </td>
         <!-- cheack box se multipale value store karne ke liye yha hm remove[]; array ka use kar rhe hai -->
         <td><input type='checkbox' name='remove[]' value='$item_id' ></td>
        <td>INR $pro_price.00</td>
        <td>INR $total_ship_charge </td>
         <td>INR $sub_total_price.00</td>
         </tr> ";
     }/* loop end */
     }/* if part end*/
     else{
         echo"<h4 style='color:red;font-weight:bold'> No item's Found In Your Cart. </h4>";
     }/*else part end*/



 } /* function end */

/* show all cart items in cart.php End*/

function getPro(){
    global $db;
    $get_products="select * from products order by 1 DESC LIMIT 0,8";
    $run_products=mysqli_query($db,$get_products);
    while($row_product=mysqli_fetch_array($run_products)){
    	$pro_id=$row_product['product_id'];
    	$pro_title=$row_product['product_title'];
    	$pro_price=$row_product['product_price'];
    	$pro_total_price=$row_product['total_price'];
    	$pro_img1=$row_product['product_img1'];
		
		$offer=$pro_total_price - $pro_price;
		$offer=$offer/$pro_total_price *100;
        $offer=ceil($offer);
		
		$rating_reviews="select * from pro_rating_reviews";
		$run_rating=mysqli_query($db,$rating_reviews);
		$num_rating=mysqli_num_rows($run_rating);
		
    	echo"<div class='col-md-3 col-sm-6 same-height' >
    		<div class='product'><br>
    		<a href='ditails.php?pro_id=$pro_id'>
    			<img src='seller_ac/product_images/$pro_img1' class='img-responsive'>
    		</a>
    		<div class='text'>
    		<h3><a href='ditails.php?pro_id=$pro_id'>$pro_title </a></h3>
    		<p class='price'><font style='border:1px solid #0a840a;border-radius:2px; padding:0 5px'>INR $pro_price</font> <font style='color:rgba(242, 132, 166, 0.85);font-size:12px;font-weight:bold'> <del> INR $pro_total_price </del> </font>
			<font style='color:#e8dee3;font-size:15px;font-weight:bold;background:#3aa808;padding:0 5px;border-radius:3px'>  $offer% off </font>
			</p>
			<p style='margin:0 20px'><b class='pull-left'> Rating: </b>
			<img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'>
			</p>
			
    		<p class='buttons'>
    			<a href='ditails.php?pro_id=$pro_id' class='btn btn-default'> view ditails</a>
    			<a href='ditails.php?pro_id=$pro_id' class='btn btn-primary'>Add To Cart </a>
    		 </p>


    		</div>
    		</div>
    		</div>
          

    	";
    }
}

/**--- End show letest top 8 products on index.php home page---*/

/**---Start Products categories side bar ---*/
 function getPCats(){
     global $db;
     $get_p_cats="select * from product_categories";
     $run_p_cats=mysqli_query($db,$get_p_cats);
     while( $row_p_cats=mysqli_fetch_array($run_p_cats)){
         $p_cat_id=$row_p_cats['p_cat_id'];
         $p_cat_title=$row_p_cats['p_cat_title'];
         
         echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a> </li>";
         
     }
    
 }

/**---End Products categories side bar ---*/
/**---Start  categories side bar ---*/
function getCat(){
    global $db;
    $get_cats="select * from categories";
    $run_cats=mysqli_query($db,$get_cats);
    while($row_cat=mysqli_fetch_array($run_cats)){
        $cat_id=$row_cat['cat_id'];
        $cat_title=$row_cat['cat_title'];
        
        echo"<li><a href='shop.php?cat_id=$cat_id'>$cat_title</a></li>";
        
    }
}

/**---End categories side bar ---*/


/* get product categories products  */

function getPcatPro(){
    global $db;
     
    if(isset($_GET['p_cat']) OR isset($_GET['p_cat_page'])){
		 if(isset($_GET['p_cat'])){
            $p_cat_id =$_GET['p_cat'];
		 
		    $_SESSION['p_cat_value']=$p_cat_id; }
		else{
			$p_cat_id=$_SESSION['p_cat_value'];
		}
        /* get query for title box */
        $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
        $run_p_cat=mysqli_query($db,$get_p_cat);
		$num_row_p_cat=mysqli_num_rows($run_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
		
		if($num_row_p_cat>=1){
		
        $p_cat_title=$row_p_cat['p_cat_title'];
        $p_cat_desc=$row_p_cat['p_cat_desc'];
        
        
         /* get query for show products on p_Cat */
			if(isset($_GET['p_cat_page'])){
				$page=$_GET['p_cat_page'];
				if($page==0){
					$page=1;
				}
			}
			else{
				$page=1;
			}
			
			$per_page=6;
			$start_from=($page-1)*$per_page;
         
        $get_product= "select * from products where p_cat_id='$p_cat_id' order by 1 DESC LIMIT $start_from,$per_page";
        $run_product=mysqli_query($db,$get_product);
        
        $count=mysqli_num_rows($run_product);
        
        if($count<1){
           
            echo " 
            <div class='box'>
                <h3 style='text-transform:uppercase;color:#282ec9'><i class='fa fa-cart-plus'></i> $p_cat_title :</h3><br>
                <p style='color:red;font-weight:300;margin-top:-5px'> <i class='fa fa-times-circle'></i> Sorry !!, NO Product Found In This Product Category</p>
            </div>
                
            ";
        }
        else{
            
            echo"
            <div class='box'>
                <h3 style='text-transform:uppercase;color:#282ec9'><i class='fa fa-cart-plus'></i> $p_cat_title :</h3>
                <p style='color:#0f2367;font-weight:300;margin-top:19px'> <i class='fa fa-check-circle'></i> $p_cat_desc</p>
            </div>
            ";
          
        }
        ?> <div class="row"><?php
        while($row_products=mysqli_fetch_array($run_product)){
            $pro_id=$row_products['product_id'];
            $pro_title=$row_products['product_title'];
            $pro_price=$row_products['product_price'];
            $pro_img1=$row_products['product_img1'];
			 $pro_total_price=$row_products['total_price'];
				$offer=$pro_total_price - $pro_price;
				$offer=$offer/$pro_total_price *100;
				$offer=ceil($offer);
            
            echo"
                <div class='col-md-4 col-sm-6'>
                    <div class='product'>
                        <a href='ditails.php?pro_id=$pro_id'><br>
                            <img src='seller_ac/product_images/$pro_img1' class='img-responsive'> 
                        </a>
                    <div class='text'>
                        <h3><a href='ditails.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'><font style='border:1px solid #0a840a;border-radius:2px; padding:0 5px'>INR $pro_price</font> <font style='color:rgba(242, 132, 166, 0.85);font-size:12px;font-weight:bold'> <del> INR $pro_total_price </del> </font>
			<font style='color:#e8dee3;font-size:15px;font-weight:bold;background:#3aa808;padding:0 5px;border-radius:3px'>  $offer% off </font>
			</p>
			<p style='margin:0 20px'><b class='pull-left'> Rating: </b>
			<img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'>
			</p>
                         <p class='buttons'>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-default'>View Details </a>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart </a>
                                    </p>
                    </div>
                    </div>
                </div>
            ";
        } ?> </div> 
		
		<?php
			$get_page="select * from products where p_cat_id='$p_cat_id'";
			$run_page=mysqli_query($db,$get_page);
			$tota_rows=mysqli_num_rows($run_page);
			$total_page=ceil($tota_rows/$per_page);
			if($total_page>1){
				
	  	echo"<center>
	  			<ul class='pagination'>
					<li><a href='shop.php?p_cat_page=1'>First Page </a></li>
					
					";
				for($x=1;$x<=$total_page;$x++){
					
				if(isset($_GET['p_cat_page']))
							{
								$live_page=$_GET['p_cat_page'];
							}
							else{
								$live_page=1;
							}
							if($x==$live_page){
								$active="active";
							}
							else{
								$active="unactive";
							}
			
					echo"<li class='$active'> <a href='shop.php?p_cat_page=$x'> $x </a></li>";
				}
				echo"
				 <li><a href='shop.php?p_cat_page=$total_page'>Last Page </a></li>
				</ul>
	  
	  </center>";
			}
    }
		else{
		echo"<div class='box'><div class='box-heading'><h4 style='color:red'> ❎ ❎ Sorry, Wrong Product Cetegories. You Don't Get Any Ditail of this Product Cetegories.</h4> </div></div>";
		 }
		
		
		
	}
	
	
}


/* select get caegories */

function getCatPro(){
    global $db;
    if(isset($_GET['cat_id']) OR isset($_GET['cat_page'])){
		//agar categories get var me set hai to use session me store kar rhe hai taki pagination me kam me le sake or bata ske kii id cetegories ke kitne page hai.
		if(isset($_GET['cat_id'])){
        $cat_id=$_GET['cat_id'];
		$_SESSION['cat_value']=$cat_id;
		}
		else{		
		$cat_id=$_SESSION['cat_value'];
		}
		
		$get_cat="select * from categories where cat_id='$cat_id'";
        $run_cat=mysqli_query($db,$get_cat);
        $row_cat=mysqli_fetch_array($run_cat);
		$num_rows_cat=mysqli_num_rows($run_cat);
		if($num_rows_cat>=1){			
        	$cat_title=$row_cat ['cat_title'];
        	$cat_desc=$row_cat ['cat_desc'];
		
			
			//pagination ke liye get var se page value storing
			
			if(isset($_GET['cat_page'])){
				$page=$_GET['cat_page'];
				if($page==0){
					$page=1;
				}
			}
			else{
				$page=1;
			}
			
			$per_page=6;
			$start_from=($page-1)*$per_page;
			
			// yha hm cheak kar rhe hai ki p_cat se hame koi session me value mili ki nhi jis se ham cheak kar ske ki usi      pcat >cat_id ki value show
		if(isset($_SESSION['p_cat_value']))
		{
			$p_cat=$_SESSION['p_cat_value'];
		
		$get_p_cat="select * from product_categories where p_cat_id='$p_cat'";
        $run_p_cat=mysqli_query($db,$get_p_cat);
		$num_row_p_cat=mysqli_num_rows($run_p_cat);
		$row_p_cat=mysqli_fetch_array($run_p_cat);
 		$p_cat_title=$row_p_cat['p_cat_title'];
		$p_cat_desc=$row_p_cat['p_cat_desc'];
			
			
		$get_products="select * from products where p_cat_id='$p_cat' and cat_id='$cat_id' order by 1 DESC LIMIT $start_from,$per_page";
		
		}
			
		else{
			 $get_products="select * from products where cat_id='$cat_id' order by 1 DESC LIMIT $start_from,$per_page";
		}
        
        $run_products=mysqli_query($db,$get_products);
        $count=mysqli_num_rows($run_products);
       
        if($count<1){
			if(!isset($_SESSION['p_cat_value'])){
            echo"
            <div class='box'>
                <h3 style='text-transform:uppercase;color:#282ec9'><i class='fa fa-cart-plus'></i> $cat_title :</h3>
                <p style='color:red;font-weight:300;margin-top:0px'> <i class='fa fa-times-circle'></i> Sorry !!, NO Product Found In This Category</p>
            </div>
            ";
			 }
			 else{
				 echo"
            <div class='box'>
                <h3 style='text-transform:uppercase;color:#282ec9'><i class='fa fa-cart-plus'></i> $p_cat_title <i class='fa fa-chevron-right' style='color:#ed084e'> </i> $cat_title :</h3>
               <p style='color:red;font-weight:300;margin-top:0px'> <i class='fa fa-times-circle'></i> Sorry !!, NO Product Found In This Category</p>
            </div>
            ";
			 }
			
        }
        else{
			 
			 if(!isset($_SESSION['p_cat_value'])){
				 
             echo"<div class='box'>
                    <h3 style='text-transform:uppercase;color:#282ec9'><i class='fa fa-cart-plus'></i> $cat_title </h3>
                  <p style='color:#0f2367;font-weight:300;margin-top:0'> <i class='fa fa-check-circle'></i> $cat_desc </p>
            </div>
             ";
			 }
				else{
					echo"<div class='box'>
                    <h3 style='text-transform:uppercase;color:#282ec9'><i class='fa fa-cart-plus'></i> $p_cat_title <i class='fa fa-chevron-right' style='color:#ed084e'> </i> $cat_title </h3>
                   <p style='color:#0f2367;font-weight:300;margin-top:0'> <i class='fa fa-check-circle'></i> $p_cat_desc </p>
            </div>
             ";
				}
        }
		 ?> <div class="row"> <?php
		while($row_products=mysqli_fetch_array($run_products)){
            $pro_id=$row_products['product_id'];
            $pro_title=$row_products['product_title'];
            $pro_price=$row_products['product_price'];
            $pro_img1=$row_products['product_img1'];
             $pro_total_price=$row_products['total_price'];
				$offer=$pro_total_price - $pro_price;
				$offer=$offer/$pro_total_price *100;
				$offer=ceil($offer);
            echo" 
                <div class='col-md-4 col-sm-6'>
                    <div class='product'>
                        <a href='ditails.php?pro_id=$pro_id'><br>
                            <img src='seller_ac/product_images/$pro_img1' class='img-responsive'> 
                        </a>
                    <div class='text'>
                        <h3><a href='ditails.php?pro_id=$pro_id'>$pro_title</a></h3>
                        <p class='price'><font style='border:1px solid #0a840a;border-radius:2px; padding:0 5px'>INR $pro_price</font> <font style='color:rgba(242, 132, 166, 0.85);font-size:12px;font-weight:bold'> <del> INR $pro_total_price </del> </font>
			<font style='color:#e8dee3;font-size:15px;font-weight:bold;background:#3aa808;padding:0 5px;border-radius:3px'>  $offer% off </font>
			</p>
			<p style='margin:0 20px'><b class='pull-left'> Rating: </b>
			<img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'><img  style='width:25px;min-height:31px;max-height:31px;margin:-5px 0 0 0;' src='images/rating1 copy.png' alt='product rating' class='img-responsive pull-left'>
			</p>
                         <p class='buttons'>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-default'>View Details </a>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart </a>
                                    </p>
                    </div>
                    </div>
                </div>
            ";
        }
			?></div><?php
		 //pagination ke liye agar p_cat se session set hai to uske liye.
			if(isset($_SESSION['p_cat_value'])){
				$get_page="select * from products where p_cat_id='$p_cat' and cat_id='$cat_id'";
				$run_page=mysqli_query($db,$get_page);
				$total_row=mysqli_num_rows($run_page);
				$total_page=ceil($total_row/$per_page);
				if($total_page>0){
					echo"<center>
	  			<ul class='pagination'>
					<li><a href='shop.php?cat_page=1'>First Page </a></li>;
					
					";
				for($x=1;$x<=$total_page;$x++){
					
				if(isset($_GET['cat_page']))
							{
								$live_page=$_GET['cat_page'];
							}
							else{
								$live_page=1;
							}
							if($x==$live_page){
								$active="active";
							}
							else{
								$active="unactive";
							}
			 	
					echo"<li class='$active'> <a href='shop.php?cat_page=$x'> $x </a></li>";
				}
				echo"
				 <li><a href='shop.php?cat_page=$total_page'>Last Page </a></li>
				</ul>
	  
	  </center>";
					
				}
			}
			else{
				$get_page="select * from products where cat_id='$cat_id'";
				$run_page=mysqli_query($db,$get_page);
				$total_row=mysqli_num_rows($run_page);
				$total_page=ceil($total_row/$per_page);
				if($total_page>1){
					echo"<center>
	  			<ul class='pagination'>
					<li><a href='shop.php?cat_page=1'>First Page </a></li>
					
					";
				for($x=1;$x<=$total_page;$x++){
					
				if(isset($_GET['cat_page']))
							{
								$live_page=$_GET['cat_page'];
							}
							else{
								$live_page=1;
							}
							if($x==$live_page){
								$active="active";
							}
							else{
								$active="unactive";
							}
			
					echo"<li class='$active'> <a href='shop.php?cat_page=$x'> $x </a></li>";
				}
				echo"
				 <li><a href='shop.php?cat_page=$total_page'>Last Page </a></li>
				</ul>
	  
	  </center>";
					
				}
			}
			
		 //pagination ke liye agar p_cat se koi session set nhi hai to uske liye.
			
        
    }
	

	else{
		echo"<div class='box'><div class='box-heading'><h4 style='color:red'> ❎ ❎ Sorry, Wrong Cetegories. You Don't Get Any Ditail of this Cetegories.</h4> </div></div>";
		 }
	}
}

?>