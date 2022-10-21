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
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?>
     <!--End nav bar menu start -->
    <?php
		if(!isset($_SESSION['customer_email'])){
		
	?>
    <!-- Page Diraction path --->
        <div id="content"><!----- Content ---start-->
         <div class="container"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>Customer-Registration</li>
                </ul>
            </div><!-- col-md-12- End--->
             <div class="col-md-3"><!--sidebar col-md-3 start ---->
                <?php include_once("includes/sidebar.php"); ?>
             </div><!--sidebar col-md-3 end ---->
             
             <div class="col-md-9"><!---col-md-9 start--->
                <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                        <div class="row">
                       <h2 class="col-md-8">Customber Registration:</h2> 
                            <p class="col-md-4">
                           Support Help Desk : <br>
                                +918502926163,+918209538083<br>
                                +919413772885,+918000839163<br>
                                infohelp@myecom.com
                            </p>
                        </div>
                    </div><!---Box header End--->
                    <form action="customber_registration.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Customer Name :</label>
                            <input type="text" name="c_name" required placeholder="Enter Your Name .." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="email" name="c_email" required class="form-control" placeholder="user@gmail.com">
                        </div>
                        <div class="form-group">
                            <label>Customer Passward :</label>
                            <input type="text" name="c_passward" required  placeholder="***********" class="form-control" 
								   pattern="[a-z]{6-12}"
								   title="minimum onle letter A-Z, Minimum one latter a-z and one special charector and 0-9 numbers.">
                        </div>
                         <div class="form-group">
                            <label>Customer Mobile No.(10 digit mobile number)</label>
                            <input type="text" name="c_mobile" required class="form-control" placeholder="850XXXXX63 10 digit mobile number"   title="please enter 10 digit mobile number" pattern="[0-9]{10}">
							                         </div>
                        <div class="form-group">
                            <label>Customer Country</label>
                            <input type="text" name="c_country" class="form-control" required placeholder="INDIA" >
                        </div><div class="form-group">
                            <label>Customer State</label>
                            <input type="text" name="c_state" class="form-control" required placeholder="RAJXXXXX" >
                        </div>
                        <div class="form-group">
                            <label>Customer City</label>
                            <input type="text" name="c_city" class="form-control" required placeholder="JOXXXX" >
                        </div>
                        <div class="form-group">
                            <label>Customer Address :</label>
                            <input type="text" name="c_address" required placeholder="RAJ. XXXXXXXXXXXXX" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label>Customer Photo :</label>
                            <input type="file" name="c_img" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-delete"></i> Reset Data
                            </button>
                            <button type="submit" name="register" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Registor 
                            </button>
                        </div>
                    </form>
                    
                 </div><!--- Box End--->
             </div><!---col-md-9 End--->
             
              </div><!----- container ---End-->
    <!----- Content ---End-->
    </div>
     <!--- footer start--->
  <?php include_once('includes/footer.php');?>
        <!--- footer End--->
  
    </body>
</html>

<?php
    
if(isset($_POST['register'])){
    $ac_status="open";
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_mobile=$_POST['c_mobile'];
    $c_country=$_POST['c_country'];
    $c_state=$_POST['c_state'];
    $c_city=$_POST['c_city'];
    $c_passward=$_POST['c_passward'];
    $c_address=$_POST['c_address'];
    $file=$_FILES['c_img'];
    $c_img=$file['name'];
    $c_tmp_img=$file['tmp_name'];
    $c_ip=getUserIP();
    $c_img="$c_name+$c_img";
	
	//cheking dublicate value 
	
	$select_data="select * from customers where customer_email='$c_email' and customer_contact='$c_mobile'";
	$run_data=mysqli_query($con,$select_data);
	if($run_data==TRUE){
	$num_data=mysqli_num_rows($run_data);
	

if($num_data<1){

    
    move_uploaded_file($c_tmp_img,"customer/customer_images/$c_img");
    
    $c_insert="insert into customers(ac_status,customer_name,customer_email,customer_pass,customer_country,customer_state,customer_city,customer_contact,customer_address,customer_img,customer_ip) values('$ac_status','$c_name','$c_email','$c_passward','$c_country','$c_state','$c_city','$c_mobile','$c_address','$c_img','$c_ip')";
    
    $run_insert=mysqli_query($con,$c_insert);
    if($run_insert==true){
        
        
        $get_cart_pro="select * from cart where ip_add='$c_ip'";
        $get_cart_run=mysqli_query($con,$get_cart_pro);
        
        if(mysqli_num_rows($get_cart_run)>0){
           $_SESSION['customer_email']=$c_email;
           
           $_SESSION['customer_name']=$c_name;
           $_SESSION['customer_img']=$c_img;
        ?>
        <script>
            alert('Your Registration has been Complate sucessfull , Go To Login and Manage Our Dashbord');
            window.open('checkout.php','_self');
</script>
<?php
        }
        else{
             $_SESSION['customer_email']=$c_email;
 
           $_SESSION['customer_name']=$c_name;
           $_SESSION['customer_img']=$c_img;
            ?>
        <script>
            alert('Your Registration has been Complate sucessfull , Go To Login and Manage Our Dashbord');
            window.open('index.php','_self');
</script>
<?php
        }
    }
    else{
        ?>
        <script>
            alert('Sorry !! Registration UnSucsessfull !!', '_self');
            ;
</script>
<?php
    }
    
}
	else{
		echo"<script>
            alert('Email/Mobile number is alredy exist. Login To Continue Shopping','_self');
            window.open('checkout.php','_self');
</script>";
	}
	
    
   
}
	else{
		echo"<script>
            alert('Soryy, Internal Error Script Not Redy, After some time please try again.');
           
</script>";
	}
}
		
		}
			
		
	

?>