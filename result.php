<?php
session_start();
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>My E-com | Search Result    </title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
	
<body>

    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?> 
     <!--End nav bar menu start -->
	<div class="container-fluid">
		 	<div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME </a>  &raquo; Search Results </li>
                    
                </ul>
            </div><!-- col-md-12- End--->
			<div class="row" id="content">
				
				<div class="box">
					<center><h4 style="color:blue">&raquo;&raquo; Search Result is Here. &raquo;&raquo;</h4></center>
					<h3 class="hidden-xs" style="color:#ff00a7" ><b>&ldquo; PRODUCTS RESULTS:  &rdquo;</b> <i class='fa fa-arrow-circle-right hidden-xs'></i></h3> 
					<h3 class="visible-xs" style="color:#ff00a7"><center><b>&ldquo; Your RESULT : &rdquo; </b> <br><i class='fa fa-arrow-circle-down visible-xs'></i></center></h3>
					
				</div>
			
				<div class="box" bgcolor="white">
					<div class="row">
						<div class="col-md-3">
						<?php include_once('includes/sidebar.php'); ?> 
						</div>
						
						<div class="col-md-9">
							<?php 
							$search_text=$_GET['user_query'];
							$get_pro="SELECT * FROM `products` WHERE `product_keyward` like '%$search_text%' OR `product_title` like '%$search_text%'";
							$run_pro=mysqli_query($con,$get_pro);
							$num_rows=mysqli_num_rows($run_pro);
							?>
							<div class="row">
								<div class="col-md-12">
									<p style="color:blue">Total Search Results: <?php echo $num_rows; ?></p>
								</div> </div> <br> <?php
							if($num_rows>0){
								while($result_pro=mysqli_fetch_array($run_pro)){
									 $pro_id=$result_pro['product_id'];
										$pro_title=$result_pro['product_title'];
										$pro_price=$result_pro['product_price'];
										$pro_img1=$result_pro['product_img1'];

										echo"<div class='col-md-3 col-sm-6 same-height' >
											<div class='product'><br>
											<a href='ditails.php?pro_id=$pro_id'>
												<img src='seller_ac/product_images/$pro_img1' class='img-responsive'>
											</a>
											<div class='text'>
											<h3><a href='ditails.php?pro_id=$pro_id'>$pro_title </a></h3>
											<p class='price'>INR $pro_price </p>
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
							else{
								 echo " <p style='color:red'><u style='color:blue'><i> ' $search_text '</i></u> No Products Found !!</p>";

							}



							?>
				</div>
					</div>
				</div>
			</div>
		
	</div>
	<?php include_once('includes/footer.php'); ?>
</body>
</html>

