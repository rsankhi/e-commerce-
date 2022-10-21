    <!-- nav bar menu start -->
     <div class="nav navbar-default" id="navbar">
         <div class="container-fluid">
			  <div class="col-md-4">
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
			 </div>
			
             <div class="navbar-collapse collapse" id="navigation"><!---navbar-collapse collapse start // Menu bar  ---->
                 <div class="padding-nav"><!-- padding nav start // menu bar --->
                    <ul class="nav navbar-nav navbar-left">
                        <li><a href="../index.php"> Home</a></li>
                        <li><a href="../shop.php"> Shop</a></li>
                        <li> <?php
                        if(!isset($_SESSION['customer_email'])){
                                    echo"<a href='../checkout.php'>My Account</a>"  ;
                        }
                        else{ 
                            echo"<a href='my_account.php?my_order'>My Account</a>" ;
                           
                        }
                        ?></li>
                        <li><a href="../cart.php">Shoping Cart </a></li>
                        <li><a href="../about.php">About Us </a></li>
                        <li><a href="../services.php"> Services</a></li>
                        <li><a href="../contact.php"> Contact Us</a></li>
                     </ul>
                 </div><!-- padding nav End // menu bar --->
                 
                 <!---menu cart btn --->
                 <a href="cart.php" class="btn btn-primary navbar-btn right">
                     <i class="fa fa-shopping-cart"></i>
                     <span><?php cart_item(); ?> item in cart</span>
                                     
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