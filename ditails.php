<?php
session_start();

 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<?php
if(isset($_GET['pro_id'])){
    $pro_id=$_GET['pro_id'];
    $get_products="select * from  products where product_id='$pro_id'";
    $run_products=mysqli_query($con,$get_products);
    $row_products=mysqli_fetch_array($run_products);
    $p_cat_id=$row_products['p_cat_id'];
    $pro_title=$row_products['product_title'];
    $pro_price=$row_products['product_price'];
    $pro_desc=$row_products['product_desc'];
    $pro_img1=$row_products['product_img1'];
    $pro_img2=$row_products['product_img2'];
    $pro_img3=$row_products['product_img3'];
   
    $get_p_cat="select * from product_categories where p_cat_id='$p_cat_id'";
    $run_get_p_cat=mysqli_query($con,$get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_get_p_cat);
    $p_cat_title=$row_p_cat['p_cat_title'];
    $p_cat_desc=$row_p_cat['p_cat_desc'];
    
  
    	
    	$pro_total_price=$row_products['total_price'];
    	
		
		$offer=$pro_total_price - $pro_price;
		$offer=$offer/$pro_total_price *100;
        $offer=ceil($offer);
		
		$rating_reviews="select * from pro_rating_reviews";
		$run_rating=mysqli_query($db,$rating_reviews);
		$num_rating=mysqli_num_rows($run_rating);
    
    
}

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
         <div class="container-fluid"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title;  ?></a></li>
                    <li><a href="ditails.php?pro_id=<?php echo  $pro_id ?>"><?php echo $pro_title; ?></a></li>
                    
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
			 		// cheaking get url pro id tuth;
			 if(isset($_GET['pro_id'])){
				 $check_pro_id=$_GET['pro_id'];
			 }
			elseif(isset($_GET['add_cart'])){
						 $check_pro_id=$_GET['add_cart'];
					 }
					 elseif(isset($_GET['add_wishlist'])){
						 $check_pro_id=$_GET['add_wishlist'];
					 }
							else{
								$check_pro_id=$_GET['buy'];
							}
			 
			 $get_pro_id_ditails="select * from products where product_id='$check_pro_id'";
			 $run_check_ditails=mysqli_query($con,$get_pro_id_ditails);
			 $num_rows_ditails=mysqli_num_rows($run_check_ditails);
			 if($num_rows_ditails>=1){
			 
			 ?>
                    <div class="col-sm-6" ><!--slider col-sm-6 start --->
                        <div id="mainimage" style="padding:0;margin:0">
                            <div id="mycarousel" class="carousel slide" data-ride="carousel" style="background-color:rgb(255, 255, 255);margin:0;"><!--mycarousel Start --->
                                <ol class="carousel-indicators">
                                    <li data-target="#mycarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#mycarousel" data-slide-to="1" ></li>
                                    <li data-target="#mycarousel" data-slide-to="2" ></li>
                                   
                                </ol>
                                <div class="carousel-inner" style="padding:0;margin:0" ><!---carousel-inner Start --->
                                    <div class="item active" >
                                        <center>
                                            <img style="min-width:auto;min-height:395px; max-height:410px;margin:0;padding:0" src="seller_ac/product_images/<?php echo $pro_img1; ?>" class="img-responsive hidden-xs">                                        
											<img style="min-width:100%; min-height:350px; max-height:350px;margin:0;padding:0" src="seller_ac/product_images/<?php echo $pro_img1; ?>" class="img-responsive visible-xs">
                                        </center>
                                    </div>
                                     <div class="item">
                                        <center>
                                           <img style="min-width:auto;min-height:395px; max-height:410px;margin:0;padding:0" src="seller_ac/product_images/<?php echo $pro_img2; ?>" class="img-responsive hidden-xs"> 
											<img style="min-width:100%; min-height:350px; max-height:350px;margin:0;padding:0" src="seller_ac/product_images/<?php echo $pro_img2; ?>" class="img-responsive visible-xs">
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                          <img style="min-width:auto;min-height:395px; max-height:410px;margin:0;padding:0" src="seller_ac/product_images/<?php echo $pro_img3; ?>" class="img-responsive hidden-xs">
											<img style="min-width:100%; min-height:350px; max-height:350px;margin:0;padding:0" src="seller_ac/product_images/<?php echo $pro_img3; ?>" class="img-responsive visible-xs">
                                        </center>
                                    </div>
                                </div><!---carousel-inner End --->
                                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                                    <span  class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Privious</span>
                                   
                                </a>
                                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                                    <span  class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Next  </span>
                                   
                                </a>
                                
                            </div><!--mycarousel End  --->
                        </div>
                     </div><!-- col-sm-6 End Slider img --->
                     <div class="col-sm-6"> <!-- col-sm-6 -->
                        <div class="box"><!---Box start--->
                            <h3 class="text-center" style="text-transform:uppercase;color:#040474;font-weight:bold">
                                <?php  echo $pro_title; ?> <hr>
                            </h3>
                           
                            <form  action="ditails.php?add_cart=<?php echo $pro_id; ?>" method="post" class="form-horizontal"> <!---Form Start--->
                                <div class="form-group"><!--form-group Start---->
                                    <label class="col-md-5 control-lable">Product Quantity</label>
                                    <div class="col-md-7 "> <!--Col-md-7 Start---->
                                        <select name="product_qty" class="form-control">
											
                                            <option >1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        
                                        </select>
                                    </div><!--Col-md-7 End  ---->
                                </div><!--form-group End---->
                                <div class="form-group">
                                    <label class="col-md-5 control-lable">Product Size</label>
                                    <div class="col-md-7">
                                        <select class="form-control" name="product_size">
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>Xl</option>
                                            <option>XLL</option>
                                        
                                        </select>
                                    </div>
                                </div><!--form-group End---->
                                <p class="price">INR <?php echo $pro_price; ?> <font style='color:rgba(242, 132, 166, 0.85);font-size:18px;font-weight:bold'> <del><?php echo" INR $pro_total_price"; ?> </del> </font>  <font style='color:#e8dee3;font-size:15px;font-weight:bold;background:#3aa808;padding:0 5px;border-radius:3px'> <?php echo" $offer% off ";?> </font> </p>
                                <p class="text-center buttons">
                                    <button class="btn btn-success" type="submit" name="add_to_cart">
                                        <i class="fa fa-shopping-cart"></i> Add To Cart
                                    </button>
									<a href="buy.php?buy=<?php echo $pro_id; ?>" class="btn btn-warning"  name="buy_now" value="Buy Now">
                                        <i class="fa fa-shopping-cart"></i> Buy Now
                                    
									</a>
                                </p>
                            
                            </form><!---Form End--->
                            <form  action="ditails.php?add_wishlist=<?php echo $pro_id; ?>" method="post" class="form-horizontal"> 
                                 <p class="text-center buttons">
                                <?php if(isset($_SESSION['customer_email'])){ ?>
                                    <button class="btn btn-default" type="submit" name="add_to_wishlist">
                                         🤍 Add To Wishlist 
                                    </button> <?php } ?>
                                </p>
                            </form>
							
							<!-- rating form 
							   
							<form  action="ditails.php?rating=<?php echo $pro_id; ?>" method="post" >
							 	<label>Give Rating</label> <br>  
							<button value="1" name="rating"><img width='25px' src='images/blanckrating.PNG' class='rating-pic img-responsive'></button>
							<button value="2" name="rating"><img width='25px' src='images/blanckrating.PNG' class='rating-pic img-responsive'></button>
							<button value="3" name="rating"><img width='25px' src='images/blanckrating.PNG' class='rating-pic img-responsive'></button>
							<button value="4" name="rating"><img width='25px' src='images/blanckrating.PNG' class='rating-pic img-responsive'></button>
							<button value="5" name="rating"><img width='25px' src='images/blanckrating.PNG' class='rating-pic img-responsive'></button>
							</form>
							-->
							
						 
						
							
                             <?php
                            if(isset($_POST['add_to_cart'])){  addCart(); }
                             if(isset($_POST['buy_now'])){
								buy_now();
                            }
                            if(isset($_POST['add_to_wishlist'])){ addToWishlist();
                            }
				 			if(isset($_POST['rating'])){
								if(isset($_SESSION['customer_id'])){
									$cust_ID=$_SESSION['customer_id'];
								
								if(isset($_GET['rating'])){
									$rating_value=$_GET['rating'];
								}
									else{
										$rating=4;
									}
									
								$insert_rating="insert into pro_rating_reviews('product_id','customer_id','rating','review') VALUES($check_pro_id,$cust_ID,$rating,'GOOD')";
									$run_rating=mysqli_query($con,$insert_rating);
									if($run_rating==TRUE){
										?><script>alert('Thank you for rating this product.','_self')</script> <?php
									}
								
                            }
							}
				 				
				 			
                            ?>
                         </div><!---Box end--->
                         <div class="col-xs-4"> <!--col-xs-4 start--->
                            <a href="#" class="thumb">
                                 <img style="min-width:150; min-height:100px; max-height:100px;" src="seller_ac/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                             </a>
                         </div><!--col-xs-4 End--->
                         <div class="col-xs-4"> <!--col-xs-4 start--->
                            <a href="#" class="thumb">
                                <img style="min-width:150; min-height:100px; max-height:100px;" src="seller_ac/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                             </a>
                         </div><!--col-xs-4 End--->
                         <div class="col-xs-4"> <!--col-xs-4 start--->
                            <a href="#" class="thumb">
                                <img style="min-width:150; min-height:100px; max-height:100px;" src="seller_ac/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                             </a>
                         </div><!--col-xs-4 End--->
                         
                     </div><!-- col-sm-6 -->
                 
                 </div><!-- product main end --->
                 
				 <!---Product Ditails BOX Start-->
				 <div class="ditails row" style="padding:0;margin:0"> <!---diatails--row--start -->
					 <div class="panel panel-default col-md-5" id="ditails" style="padding:0;margin:0"> <!--- BOX Start / Product Ditails Start-->
					 <div class="panel-heading" >
						 <b><h4 style="color:darkblue" > <button style="border:none;outline:none;background:none" type="button" data-toggle="collapse" data-target="#product_ditails_show1">Product Ditails : </button>
							 <button style="padding:2px;border:none;background:none;outline:none;color:blue" type="button" class="pull-right" data-toggle="collapse" data-target="#product_ditails_show1">
                   <span class="sr-only" >Toggle Navigation</span>
                    <i class="fa fa-chevron-down" style="color:#989696;" > </i>
                </button></h4></b>
						 
					 </div>
					 <div class="collapse panel-body" id="product_ditails_show1">
						 <p>
							<?php echo $pro_desc;?>
						 </p>
						 <h4>Size</h4>
						 <ul>
							<li>S</li>
							<li>M</li>
							<li>L</li>
							<li>XL</li>
							<li>XLL</li>
						 </ul>
						 
					 </div>
                     <br>
                     
                 </div> <!---Product Ditails BOX End End-->
				 <div class="col-md-1"></div>
				 <!---Seller Ditails BOX Start-->
				 
				  <div class="panel panel-default col-md-5" id="ditails" style="padding:0;margin:0"> <!--- BOX Start / Product Ditails Start-->
					 <div class="panel-heading">
						 <b><h4 style="color:darkblue"> <button style="border:none;outline:none;background:none" type="button" data-toggle="collapse" data-target="#seller_ditails_show1"> Seller Ditails : </button>
							 <button style="padding:2px;border:none;background:none;outline:none;color:blue" type="button" class="pull-right" data-toggle="collapse" data-target="#seller_ditails_show1">
                   <span class="sr-only" >Toggle Navigation</span>
                    <i class="fa fa-chevron-down" style="color:#989696;" > </i>
                </button></h4></b>
						 
					 </div>
					 <div class="collapse panel-body" id="seller_ditails_show1">
                     <p style="color:#7a70f2;font-weight:300">
                        <?php
				 		$get_seller_info="select * from products where product_id='$check_pro_id'";
				 		$run_seller_info=mysqli_query($con,$get_seller_info);
				 		$num_rows=mysqli_num_rows($run_seller_info);
				 		if($num_rows>0){
							$result=mysqli_fetch_array($run_seller_info);
							$seller_id=$result['customer_id'];
							
							$seller_info="select * from customers where customer_id='$seller_id'";
							$run_seller=mysqli_query($con,$seller_info);
							$rows_info=mysqli_num_rows($run_seller);
							if($rows_info>0){
								$info=mysqli_fetch_array($run_seller);
								$seller_name=$info['customer_name'];
								$seller_state=$info['customer_state'];
								
								echo "Seller Name: ".$seller_name;
								echo"<br>";
								echo"Seller Addresh:" .$seller_state;
								echo"<br>";
								echo"<br>";
								echo"Seller Rating: ??";
								echo"<br>";
								echo"Seller Profile: ??";
								echo"<br>";
								echo"<br>";
								echo"Give Seller Rating: ??";
								
								
								
							}
						}
				 ?>
						 
                     </p>
                    
					 </div>
                     <br>
                     
                 </div> <!---Product Ditails BOX End End-->
				  <!---Seller Ditails BOX End-->
				 </div><!---diatails--row--End --> <br><br>
                 
                 <div id="row same-height-row"> <!-- Feture Product Row Start--->
                    <div class="col-md-2 col-sm-6"> <!-- Col-md-3 col-sm-6 Start--->
                        <div class="box same-height headline"><!-- box smae height Start--->
                            <h3 class="text-center">You Also Like These Product</h3><br>
                             <center>
                            <p style="color:darkblue">
                                Your Searching Similar products . Buy Now 
                            </p>
                           
                             <h2><i  class='fa fa-arrow-circle-right hidden-xs'> </i>
                                 <i class='fa fa-arrow-circle-down visible-xs'></i> </h2>
                            </center>
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
                     
			 } //cheking valid pro_id  IF close
			
					 
					 else{
						 echo"<div class='box'><div class='box-heading'><h4 style='color:red'> ❎ ❎ Sorry, Wrong Product Id. You Don't Get Any Ditail of this ID.</h4> </div></div>";
					 }
					 
					 ?>
             
				 </div> <!-- same hight same row Feture Product Row End--->
                 
             </div><!-- col-md-9 End --->
			 
            
        </div><!----- container ---End-->
    <!----- Content ---End-->
    </div>
     <!--- footer start--->
  <?php include_once('includes/footer.php');?>
        <!--- footer End--->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>