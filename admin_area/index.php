<?php
 session_start();
include('includes/db_con.php');
include('functions/functions.php');
    if(!isset($_SESSION['admin_email'])){
        ?><script>window.open('admin_login.php','_self') </script><?php
        
    }
else{
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
<body>
    <div id="wrapper">
        <?php include('includes/sidebar.php');?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row"> <!--first row-->
                        <div class="col-lg-2"></div>
                        <div class="col-lg-10">
                <?php
                if(isset($_GET['dashboard'])){
                    include('dashboard.php');   
                }
                    if(isset($_GET['user_profile'])){
                        get_profile();
                }
                    if(isset($_GET['insert_product'])){
                        insert_products();
                }
                    if(isset($_GET['view_product']) OR isset($_GET['view_pro_page'])){
                        get_products();
                } 
	 				if(isset($_GET['insert_product_cat'])){
                        insert_pro_cat();
                }
                    if(isset($_GET['view_product_cat'])){
                        view_pro_cat();
                }    
	 				if(isset($_GET['insert_cat'])){
                        insert_cat();
                }
                    if(isset($_GET['view_cat'])){
                        view_cat();
                }                    
	 				if(isset($_GET['insert_slider'])){
                        insert_slider();
                }
                    if(isset($_GET['view_slider'])){
                        view_slider();
                }
	 				if(isset($_GET['insert_user'])){
                        insert_user();
                }
                    if(isset($_GET['view_user'])){
                        view_user();
                }
     				
                    if(isset($_GET['view_customer'])){
                        view_customer();
                }
     
                    if(isset($_GET['edit_profile'])){
                        edit_profile();
                } 
	 				if(isset($_GET['view_order'])){
                        get_orders();
                }
                ?>
            </div>
            </div>
            </div>
        </div>
    </div>
    
            
           
      
    
    </body>
</html>
<?php } ?>


