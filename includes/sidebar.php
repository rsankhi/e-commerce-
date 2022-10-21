<?php
 include_once('includes/db_con.php');
 include_once('functions/functions.php');
?>
<!---visible xs --- code--->

<div class="panel panel-default sidebar-menu visible-xs"><!-- Side meenu Panel start------>
    <div class="panel-heading"> <!-- panel heading bar Start-->
        <h3 class="panel-title"> <!--panel heading Start-->
            Product Categories
			<button style="padding:2px;border:none;background:none;outline:none;color:blue" type="button" class="pull-right" data-toggle="collapse" data-target="#pro_cat_show">
                   <span class="sr-only" >Toggle Navigation</span>
                    <i class="fa fa-chevron-down" style="color:#989696;" > </i>
                </button>
        </h3>
		
		<!--panel heading End-->
        </div><!-- panel heading bar End-->
        <div class="panel-body"> <!--panel Body start --->
            <ul class="collapse nav nav-pills nav-stacked cetegory-menu " id="pro_cat_show">
                <?php
                    getPCats();
                ?>
            </ul>
            
        </div><!--panel Body End --->
</div><!-- Side meenu Panel End------>

<div class="panel panel-default sidebar-menu visible-xs"><!-- Side Gender delection Panel start------>
    <div class="panel-heading"> <!-- panel heading bar Start-->
        <h3 class="panel-title"> <!--panel heading Start-->
            Gender Categories
			<button style="padding:2px;border:none;background:none;outline:none;color:blue" type="button" class="pull-right" data-toggle="collapse" data-target="#show_cat_list">
                   <span class="sr-only" >Toggle Navigation</span>
                   <i class="fa fa-chevron-down" style="color:#989696;" > </i>
                </button>
        </h3><!--panel heading End-->
    </div><!-- panel heading bar End-->
        <div class="panel-body"><!--panel Body start --->
            <ul class="collapse nav nav-pills nav-stacked cetegory-menu " id="show_cat_list">
                <?php
                    getCat();
                ?>
            </ul>
            
       </div><!--panel Body End --->
    
</div><!-- Side meenu Panel End------>

<!---visible xs --- code--->

<!--hedden-xs---code-->

<div class="panel panel-default sidebar-menu hidden-xs"><!-- Side meenu Panel start------>
    <div class="panel-heading"> <!-- panel heading bar Start-->
        <h3 class="panel-title"> <!--panel heading Start-->
            Product Categories
			
        </h3>
		
		<!--panel heading End-->
        </div><!-- panel heading bar End-->
        <div class="panel-body"> <!--panel Body start --->
            <ul class="nav nav-pills nav-stacked cetegory-menu " id="pro_cat_show">
                <?php
                    getPCats();
                ?>
            </ul>
            
        </div><!--panel Body End --->
</div><!-- Side meenu Panel End------>

<div class="panel panel-default sidebar-menu hidden-xs"><!-- Side Gender delection Panel start------>
    <div class="panel-heading"> <!-- panel heading bar Start-->
        <h3 class="panel-title"> <!--panel heading Start-->
            Gender Categories
			
        </h3><!--panel heading End-->
    </div><!-- panel heading bar End-->
        <div class="panel-body"><!--panel Body start --->
            <ul class="nav nav-pills nav-stacked cetegory-menu " id="show_cat_list">
                <?php
                    getCat();
                ?>
            </ul>
            
       </div><!--panel Body End --->
    
</div><!-- Side meenu Panel End------>

<!--hedden-xs---code-->