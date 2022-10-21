<div class="panel panel-default sidebar-menu"><!-- Side meenu Panel start------>
    <div class="panel-heading"> <!-- panel heading bar Start-->
        <center><img style="min-width:220px;min-height:200px;max-height:270px;border-radius:5px;" src="customer_images/<?php if(isset($_SESSION['customer_img'])){echo $_SESSION['customer_img'];
}else{} ?>" class="img-responsive"></center>
         <h4 align="center" style="text-transform:uppercase;font-weight:bold;color:#02026d" class="panel-heading"><?php if(isset($_SESSION['customer_name'])){
    echo $_SESSION['customer_name'];
} ?></h4>
		<h5 class="panel-heading visible-xs">
			<i class="fa fa-dashboard"></i> Dashboard 
		<button style="padding:2px;border:none;background:none;outline:none;color:blue" type="button" class="pull-right" data-toggle="collapse" data-target="#customer_dash_show">
                   <span class="sr-only" >Toggle Navigation</span>
                    <i class="fa fa-chevron-down" style="color:#989696;" > </i>
                </button>
			</h5>
        <!--panel heading End-->
        </div><!-- panel heading bar End-->
    <!--panel body bar for small screen-->
        <div class="panel-body visible-xs"><!--panel Body start --->
            <ul class=" collapse nav nav-pills nav-stacked cetegory-menu " id="customer_dash_show">
                <li class="<?php if(isset($_GET['my_order'])) {echo "active";}  ?>"><a href="my_account.php?my_order"><i class="fa fa-list"></i> My Orders</a></li>
                
                <li class="<?php if(isset($_GET['pay_offline'])) {echo "active";}  ?>">
                    <a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
                </li>
                
                <li class="<?php if(isset($_GET['my_address'])) {echo "active";}  ?>">
                    <a href="my_account.php?my_address"><i class="fa fa-address-card"></i> MY Address</a>
                </li>
                
                <li class="<?php if(isset($_GET['edit_account'])) {echo "active";}  ?>">
                    <a href="my_account.php?edit_account"><i class="fa fa-pencil"></i> Edit Account Info</a>
                </li>
                
                <li class="<?php if(isset($_GET['change_pass'])) {echo "active";}  ?>">
                    <a href="my_account.php?change_pass"><i class="fa fa-eye"></i> Change Passward</a>
                </li>
                
                <li class="<?php if(isset($_GET['my_wishlist'])) {echo "active";}  ?>">
                    <a href="my_account.php?my_wishlist"><i class="fa fa-heart"></i> My Wishlist</a>
                </li>
                
                <li class="<?php if(isset($_GET['delete_ac'])) {echo "active";}  ?>">
                    <a href="my_account.php?delete_ac"><i class="fa fa-trash"></i> Delete Account</a>
                </li>
				
				<li class="<?php if(isset($_GET['seller_ac'])) {echo "active";}  ?>">
                    <a href="my_account.php?seller_ac"><i class="fa fa-arrow-circle-right"></i> Seller On My E-com</a>
                </li>
                
                <li class="<?php if(isset($_GET['log_out'])) {echo "active";}  ?>">
                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
            
       </div><!--panel Body End --->
	<!--panel body bar for small screen-->
	
	<!--panel body bar for Larg screen-->
        <div class="panel-body hidden-xs"><!--panel Body start --->
            <ul class="nav nav-pills nav-stacked cetegory-menu " id="customer_dash_show">
                <li class="<?php if(isset($_GET['my_order'])) {echo "active";}  ?>"><a href="my_account.php?my_order"><i class="fa fa-list"></i> My Orders</a></li>
                
                <li class="<?php if(isset($_GET['pay_offline'])) {echo "active";}  ?>">
                    <a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Pay Offline</a>
                </li>
                
                <li class="<?php if(isset($_GET['my_address'])) {echo "active";}  ?>">
                    <a href="my_account.php?my_address"><i class="fa fa-address-card"></i> MY Address</a>
                </li>
                
                <li class="<?php if(isset($_GET['edit_account'])) {echo "active";}  ?>">
                    <a href="my_account.php?edit_account"><i class="fa fa-pencil"></i> Edit Account Info</a>
                </li>
                
                <li class="<?php if(isset($_GET['change_pass'])) {echo "active";}  ?>">
                    <a href="my_account.php?change_pass"><i class="fa fa-eye"></i> Change Passward</a>
                </li>
                
                <li class="<?php if(isset($_GET['my_wishlist'])) {echo "active";}  ?>">
                    <a href="my_account.php?my_wishlist"><i class="fa fa-heart"></i> My Wishlist</a>
                </li>
                
                <li class="<?php if(isset($_GET['delete_ac'])) {echo "active";}  ?>">
                    <a href="my_account.php?delete_ac"><i class="fa fa-trash"></i> Delete Account</a>
                </li>
				
				<li class="<?php if(isset($_GET['seller_ac'])) {echo "active";}  ?>">
                    <a href="my_account.php?seller_ac"><i class="fa fa-arrow-circle-right"></i> Seller On My E-com</a>
                </li>
                
                <li class="<?php if(isset($_GET['log_out'])) {echo "active";}  ?>">
                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                </li>
            </ul>
            
       </div><!--panel Body End --->
	<!--panel body bar for Larg screen-->
	
    </div><!-- Side meenu Panel End------>
    
