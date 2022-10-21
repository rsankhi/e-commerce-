<?php
session_start();
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
	<div class="main-page">
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?>
     <!--End nav bar menu start -->
    
    <!---slider sart -->
    <div class="container" id="slider">
        <div class="col-md-12">
            <div class="carousel slide" id="mycarousel" data-ride="carousel"><!---="carousel slide start --->
                <!-- slider indicators -->
                <ol class="carousel-indicators">
					<?php 
					$get_num_slider="select * from slider";
					$run_num=mysqli_query($con,$get_num_slider);
					$num_row=mysqli_num_rows($run_num);
					
					$num=0;
					if($num==0){
						$active='active';
						
					}
					else{
						$active='unactive';
					}
					while(mysqli_fetch_array($run_num)){
						echo"<li  data-target='#mycarousel' data-slide-to='$num' class='$active'></li>";
						$num++;
					}
					?>
                 
                </ol>
            
            <div class="carousel-inner"><!--carousel-inner start-->
                <!---1st slider ---->
                <?php
                 $get_slider= "select * from slider LIMIT 0,1";
                 $run_slider=mysqli_query($con,$get_slider);
                 while($row=mysqli_fetch_array($run_slider)){
                    $slider_name=$row['slider_name'];
                    $slider_image=$row['slider_image'];
                     echo"<div class='item active'><img class='img-responsive' src='slider_image/$slider_image' alt='Product Banner'></div>";
                }
                ?>
                <!---2nd slider ---->
                <?php
                 $get_slider= "select * from slider LIMIT 1,8";
                 $run_slider=mysqli_query($con,$get_slider);
                 while($row=mysqli_fetch_array($run_slider)){
                    $slider_name=$row['slider_name'];
                    $slider_image=$row['slider_image'];
                     echo"<div class='item'><img  class='img-responsive' src='slider_image/$slider_image'></div>";
                }
                ?>
            </div><!--carousel-inner End-->
                <a href="#mycarousel" class="left carousel-control" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a href="#mycarousel" class="right carousel-control" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
        </div> <!---="carousel slide End --->
    </div><!---Col-md-12 End-->        
    </div><!-- Slider End -->
    <!--- servises tree div start--->
    <div id="advantage"><!-- ADVANTAGE START--->
        <div class="container"><!-- Container START--->
            <div class="same-height-row"><!-- Fist same height Start--->
                <div class="col-sm-4"><!-- Col sm 4 start--->
                    <div class="box same-height"><!-- Seccond same height Start--->
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3> <a href="#">BEST PRICES</a></h3>
                        <p>you can chek on all othes site about the prise and than compare with us.</p>
                    </div><!-- Seccond same height Stop--->
                </div><!-- Col-sm 4 End--->
                
                <div class="col-sm-4"><!-- Col sm 4 start--->
                    <div class="box same-height"><!-- Seccond same height Start--->
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3> <a href="#">100% Pure Quility </a></h3>
                        <p>you can chek on all othes site Product the test and than compare with us.</p>
                    </div><!-- Seccond same height Stop--->
                </div><!-- Col-sm 4 End--->
                
                <div class="col-sm-4"><!-- Col sm 4 start--->
                    <div class="box same-height"><!-- Seccond same height Start--->
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3> <a href="#">Home Delevray</a></h3>
                        <p>50 rupess ,Extera chargess on every Two buldels</p>
                    </div><!-- Seccond same height Stop--->
                </div><!-- Col-sm 4 End--->
                
            </div><!-- Fist same height stop--->
        </div><!-- Container End--->
    </div><!-- ADVANTAGE Stop--->
    
    <div id="hotbox"> <!---hotbox heading box  start--->
        <div class="box"><!---Box start--->
            <div class="container"><!---Container start--->
                <div class="col-md-12">
                    <a href="#"><h2>Letest This Week</h2></a>
                </div>
            </div><!---Container End--->
        </div><!---Box End--->
    </div><!---hotbox End--->
    <!--- Start Content Container ---->
    <div id="content" class="container-fluid">
        <div class="row"><!--- Start Row ---->
			<center>
          <?php
            getPro();
            
            ?>
			</center>
                
            </div><!--- End Row ---->
    </div><!--- End Content Container ---->
        <!--- footer start--->
  <?php include_once('includes/footer.php')?>
      <!--- footer End--->
     
	</div>
    </body>


</html>