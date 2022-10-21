<?php

if(isset($_SESSION['admin_email'])==true){
  

?>

        <h1 class="page-header">Dashboard</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard /
            </li>
        </ol>
        
    <!-- main div col-lg-10 start-->
        
        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
            <div class="panel panel-primary"><!--panel panel-primary start -->
                <div class="panel-heading"><!--panel-heading start-->
                    <div class="row"><!-- inside panel-heading row start-->
                        <div class="col-xs-3"><!--col-xs-3 Start -->
                            <i class="fa fa-tasks fa-5x"></i>
                        </div><!--col-xs-3 End -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 Start-->
                            <div class="huge">12</div>
                            <div>Products</div>
                        </div><!--col-xs- 9 End -->
                        
                    </div><!-- inside panel-heading row End--><!-- -->
                </div><!--panel-heading End -->
                <a href="index.php?view_product" ><!-- Page link start -->
                    <div class="panel-footer"><!--panel-footer Start -->
                        <span class="pull-left">View Ditails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div><!--panel-footer End -->
                </a><!--page link End -->
            
            </div><!--panel panel-primary End-->
        
        </div><!--col-lg-3 col-md-6 end -->
        
        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
            <div class="panel panel-green"><!--panel panel-primary start -->
                <div class="panel-heading"><!--panel-heading start-->
                    <div class="row"><!-- inside panel-heading row start-->
                        <div class="col-xs-3"><!--col-xs-3 Start -->
                            <i class="fa fa-comments fa-5x"></i>
                        </div><!--col-xs-3 End -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 Start-->
                            <div class="huge">9</div>
                            <div>Customres</div>
                        </div><!--col-xs- 9 End -->
                        
                    </div><!-- inside panel-heading row End--><!-- -->
                </div><!--panel-heading End -->
                <a href="index.php?view_customer" ><!-- Page link start -->
                    <div class="panel-footer"><!--panel-footer Start -->
                        <span class="pull-left">View Ditails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div><!--panel-footer End -->
                </a><!--page link End -->
            
            </div><!--panel panel-primary End-->
        
        </div><!--col-lg-3 col-md-6 end -->
        
        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
            <div class="panel panel-yellow"><!--panel panel-primary start -->
                <div class="panel-heading"><!--panel-heading start-->
                    <div class="row"><!-- inside panel-heading row start-->
                        <div class="col-xs-3"><!--col-xs-3 Start -->
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div><!--col-xs-3 End -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 Start-->
                            <div class="huge">12</div>
                            <div>Product Categories</div>
                        </div><!--col-xs- 9 End -->
                        
                    </div><!-- inside panel-heading row End--><!-- -->
                </div><!--panel-heading End -->
                <a href="index.php?view_product_cat" ><!-- Page link start -->
                    <div class="panel-footer"><!--panel-footer Start -->
                        <span class="pull-left">View Ditails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div><!--panel-footer End -->
                </a><!--page link End -->
            
            </div><!--panel panel-primary End-->
        
        </div><!--col-lg-3 col-md-6 end -->
        
        <div class="col-lg-3 col-md-6"><!-- col-lg-3 col-md-6 start -->
            <div class="panel panel-red"><!--panel panel-primary start -->
                <div class="panel-heading"><!--panel-heading start-->
                    <div class="row"><!-- inside panel-heading row start-->
                        <div class="col-xs-3"><!--col-xs-3 Start -->
                            <i class="fa fa-support fa-5x"></i>
                        </div><!--col-xs-3 End -->
                        <div class="col-xs-9 text-right"><!-- col-xs-9 Start-->
                            <div class="huge">5</div>
                            <div>Orders</div>
                        </div><!--col-xs- 9 End -->
                        
                    </div><!-- inside panel-heading row End--><!-- -->
                </div><!--panel-heading End -->
                <a href="index.php?view_order" ><!-- Page link start -->
                    <div class="panel-footer"><!--panel-footer Start -->
                        <span class="pull-left">View Ditails</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div><!--panel-footer End -->
                </a><!--page link End -->
            
            </div><!--panel panel-primary End-->
        
        </div><!--col-lg-3 col-md-6 end -->
    
<hr>
<?php } ?>
