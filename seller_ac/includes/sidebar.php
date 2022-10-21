<?php

if(isset($_SESSION['seller_email'])==true){
   
    $admin_email=$_SESSION['seller_email'];
    $get_ditails="select * from admin where email='$admin_email' and job='seller'";
    $run_ditails=mysqli_query($con,$get_ditails);
    $result_ditails=mysqli_fetch_array($run_ditails);
    $admin_name=$result_ditails['name'];
    $admin_job=$result_ditails['job'];
	$customer_id=$result_ditails['customer_id'];
	$customer_ac=$result_ditails['ac_status'];
	$_SESSION['seller_id']=$customer_id;
	/* select all product */
	
	$get_all_pro="select * from products where customer_id='$customer_id' order by 1 DESC";
	$run_all_pro=mysqli_query($con,$get_all_pro);
	$count_pro=mysqli_num_rows($run_all_pro);
	
	/* select all Customers */
	
	$get_all_cust="select * from customers order by 1 DESC";
	$run_all_cust=mysqli_query($con,$get_all_cust);
	$count_cust=mysqli_num_rows($run_all_cust);
	
	/* select all product */
	
	$get_all_pro_cat="select * from product_categories order by 1 DESC";
	$run_all_pro_cat=mysqli_query($con,$get_all_pro_cat);
	$count_pro_cat=mysqli_num_rows($run_all_pro_cat);
	
	


?>
<nav class="navbar navbar-inverse navbar-fixed-top" style="background:#01030d">
    <div class="navbar-header" style="padding:0">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="index.php?dashboard" class="navbar-brand" style='letter-spacing:1px;color:#ded8d8'>  <i class="fa fa-bandcamp"> </i>  SELLER PANEL</a>
    </div>
    <!-- nav bar right start -->
    <ul class="nav navbar-right top-nav">
        <li style="width:50px">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell"></i>
            </a>
              <ul class="dropdown-menu">
        <li>
            <a href="index.php?notification">
                <i class="fa fa-no"> </i> No notification 
            </a>
        </li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="text-transform:uppercase;letter-spacing:.5px;">
                <i class="fa fa-user"> </i> <?php  echo $admin_job; echo" : "; echo $admin_name;  ?> <i class="fa fa-caret-down"></i>
            </a>    
    <ul class="dropdown-menu">
        <li>
            <a href="index.php?user_profile">
                <i class="fa fa-user"> </i> Profile
            </a>
        </li>
        <li>
            <a href="index.php?view_product" >
                <i class="fa fa-envelope"> </i> Products
				<span class="badge"><?php echo $count_pro; ?></span>
            </a>
        </li>
        <li>
            <a href="index.php?view_customer" >
                <i class="fa fa-users"> </i> Customers
				<span class="badge"><?php echo $count_cust; ?></span>
            </a>
        </li>
        <li>
            <a href="index.php?view_product_cat" >
                <i class="fa fa-gear"> </i>Product Categories 
				<span class="badge"><?php echo $count_pro_cat; ?></span>
            </a>
        </li>
        <li class="divider"></li>
        <li>
            <a href="logout.php" >
                <i class="fa fa-signin"> </i>Logout  <i class="fa fa-power-off"> </i>    
            </a>
        </li>
    
    </ul>
     </li>
        </ul>
    
     <!-- nav bar right start -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav sidebar-nav">
            <li>
            <a href="index.php?dashboard">
                <i class="fa fa-dashboard"></i> Dashbord
            
            </a>
            </li>
            <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#products">
              <i class="fa fa-table"></i>  Products <i class="fa fa-caret-down"></i> 
            
            </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product"><i class="fa fa-upload"></i> Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_product"><i class="fa fa-eye"></i>   View Product</a>
                    </li>
                    
                </ul>
                
            </li><!--End here--> 
            <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#productsCategories">
              <i class="fa fa-list"></i>  Product Categories <i class="fa fa-caret-down"></i> 
            
            </a>
                <ul id="productsCategories" class="collapse">
                    <li>
                        <a href="index.php?insert_product_cat"><i class="fa fa-upload"></i> Insert Product Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_product_cat"><i class="fa fa-eye"></i>   View Product Categories</a>
                    </li>
                    
                </ul>
                
            </li><!--End here--> 
            
            <li><!--start here-->
            <a href="#" data-toggle="collapse" data-target="#Categories">
              <i class="fa fa-male"></i> / <i class="fa fa-female"></i> Categories <i class="fa fa-caret-down"></i> 
            
            </a>
                <ul id="Categories" class="collapse">
                    <li>
                        <a href="index.php?insert_cat"><i class="fa fa-upload"></i> Insert Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_cat"><i class="fa fa-eye"></i>   View Categories</a>
                    </li>
                    
                </ul>
                
            </li><!--End here-->
		
           
             
			
           
			 <li>
            <a href="index.php?view_customer">
                <i class="fa fa-users"></i> View Customers
            
            </a>
            </li> 
            <li>
            <a href="index.php?user_profile">
                <i class="fa fa-pencil"></i> Edit Profile
            
            </a>
            </li> 
            <li>
            <a href="logout.php">
                <i class="fa fa-power-off"></i> Logout
            
            </a>
            </li> 
        </ul>
    </div>
    
    
</nav>
<?php } ?>
