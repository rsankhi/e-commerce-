<?php
session_start();
error_reporting(0);
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
        <div class="container-fluid"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>SHOP</li>
                </ul>
            </div><!-- col-md-12- End--->
            <!-- Side menu-->
            <div class="col-md-3">
                <?php include_once('includes/sidebar.php'); ?>
            </div>
            <!-- Side menu End -->
            <div class="col-md-9"> <!-- Col-md -9 -- start--->
                <?php
                if(!isset($_GET['p_cat_page'])){
                if(!isset($_GET['cat_page'])){
					
                if(!isset($_GET['p_cat'])){
                    if(!isset($_GET['cat_id'])){
					
                    echo"<div class='box'><!-- box start-->
                    <h2 style='color:#5b77c3;font-weight:300'><i class='fa fa-shopping-cart'></i> Continue Shopping</h2>
                    <p style='color:#2a4386'>This theme is created by Rameshwar sankhi. Please Select Your Product and checkout Now . Today's Big Deal Get 50% Discount in next 1hours products. </p>
                </div><!-- box End--->";
               
                ?>
                
                
                <div class="row"><!--product Row start-->
                    <?php
                    
                        /* jab p_cat= producat  cat_id category or category dono url me set nhi ho to yeh kare */
                        
                    $per_page=6;
                    if(isset($_GET['page'])){
                        /*yha $page ham pagination me set url se le rhe hai */
                    $page=$_GET['page'];
                    
                    }
                    else{
                    $page=1;
                    
                    }
                        /* yha ham select query ko short kar rhe hai ki jab koi pagination btn 4par click kare tb $page ki value=4, tb pichale 3 pages me jitne bhi product dikhaye gye hai un ke aage se products show honge,es liye $pare_page se * kar rhe hai */
                    $start_from=($page-1) * $per_page;
                    $get_product="select * from products order by 1 DESC LIMIT $start_from,$per_page";/*limit me ham pahle atribute me id lete hai ki hame khase produc show karne hai or dusre attribute me ham batate hai ki hame kitne poroduct show karwane hai,*/
                        $run_pro= mysqli_query($con,$get_product);
                        while($row=mysqli_fetch_array($run_pro)){
                            $pro_id=$row['product_id'];
                            $pro_title=$row['product_title'];
                            $pro_img1=$row['product_img1'];
                            $pro_price=$row['product_price'];
                            $pro_total_price=$row['total_price'];
							$offer=$pro_total_price - $pro_price;
							$offer=$offer/$pro_total_price *100;
							$offer=ceil($offer);
                            
                            echo"<div class='col-md-4 col-sm-6 center-responsive'>
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
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-default'>View Details </a>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-primary'><i class='fa fa-shopping-cart'></i> Add To Cart </a>
                                    </p>
                                
                                </div>
                            </div>
                            </div>
                                
                            
                            ";
                           
                        }
                    
                    ?>
                </div><!--- product row end -->
                <!-- page nav / pagination start-->
                <center>
                <ul class="pagination">
                   
                     <?php
                    $query="select * from products";
                        $result=mysqli_query($con,$query);
                        $total_record=mysqli_num_rows($result);
                        $total_pages=ceil($total_record / $per_page);
						
						
                        echo"
                            <li><a href='shop.php?page=1'>".'First Page'." </a> </li>
                        ";
                       
                        
                        for($i=1; $i<=$total_pages;$i++){
							
							if(isset($_GET['page']))
							{
								$live_page=$_GET['page'];
							}
							else{
								$live_page=1;
							}
							if($i==$live_page){
								$active="active";
							}
							else{
								$active="unactive";
							}
                             echo"
                            <li class='$active'><a href='shop.php?page=".$i."'>".$i."</a> </li>
                        ";
                        }
                        for($x=$page;$x<=$total_pages;$x++)
                        {
                         
                        }
                        
                        echo"
                            <li><a href='shop.php?page=$total_pages'>".'Last Page'." </a> </li>
                        ";
                        
                    
                    ?>
                    
                </ul>
                    </center>
              
                <!-- page nav end-->
                <?php 
                        }}
				}
				}
                 getPcatPro();
                getCatPro();
				
                ?>
				
            </div><!-- Col-md -9 -- End--->
            
        </div><!-- Container End--->
    
    </div><!-- Content End--->
    
     <!--- footer start--->
  <?php include_once('includes/footer.php');?>
        <!--- footer End--->
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>