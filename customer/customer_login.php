<style>
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}
		.box{
			
			
			padding-top: 5px;
		}
	
		.login-box{
			
			
			background:transparent;
			background-color: rgba(11, 11, 11, 0.43);
			padding:20px 30px 30px 30px;
			border-radius: 5px;
				
		}
		.login-box h1{
			margin-bottom: 30px;
			color: #ffffff;
			text-align: center;
			text-transform: capitalize;
			font-size: 26px;
		}
		.login-box .inputbox{
			position: relative;
		}
		.login-box .inputbox input{
			width: 100%;
			padding: 8px;
		 	color:aliceblue;
			letter-spacing: 1px;
			margin-bottom: 30px;
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			font-size: 12px;
			background-color: none;
			
			
		
			
		}
		.login-box .inputbox label{
			position: absolute;
			top:8px;
			left:0;
			letter-spacing: 1px;
			padding: 2px 5px;
			font-size: 12px;
			transition: all 0.5s;
			color: #ffffff;
			background: rgba(21, 21, 21, 0.66);
			
		}
		.login-box .inputbox input:focus ~ label ,.inputbox input:valid + label{ 
			top: -20px;
			left: 0; 
			color: #022e90;
			font-size: 12px;
			border: none;
			background:transparent;
			font-weight: bold;
		}
		.submit-btn{
			padding: 8px 16px;
			outline: none;
			background: transparent;
			border: none;
			background-color: #1175ea;
			color: aliceblue;
			border-radius: 1px;
		}
		
	hr{
		color:red;
	}
		</style>
<div class=" col-md-6">
	<div class="login-box">
    <div class="box-header">
        <center><h1>Customer Login</h1>
            <p>Already Our Customer </p>
        
        </center><hr>
    </div>
		<div class="panel-body">
    <form action="checkout.php" method="post">
			<div class="inputbox">
				<input type="text" name="c_email" autocomplete="on" required title="please enter registred moblie number OR Email. Thankyou ! "> 
				<label>Mobile/Email/username</label>
			</div>
			<div class="inputbox">
				<input type="password" name="c_password" autocomplete="off" required  title="please">
				<label>Password</label>
			</div>
				
			 <button name="login" value="login" class=" submit-btn"><i class="fa fa-sign-in"> </i> Log In</button>
		
    </form>
		</div>
    <center>
        <a href="customber_registration.php" style="background:rgba(0, 0, 0, 0.09);padding:5px;color:#4a0424;font-weight:bold">
          I don't have any accounts. Create New account. ?
        </a>
    </center>
</div>
</div><br>
<div class="col-md-1"> </div>
<div class="box col-md-5">
	<div class="box-header">
		<center>
		<h3>SingUp Process</h3>
			<p>I don't have any accounts on this website. </p>
			<p>More INFO You can<a href='../contact.php'> contact </a> to support team.</p>
			
		</center>
	</div>
	
	<p  style="color:#8e0248;font-weight:bold;">
    If you visit first time than create a account and manage online markes from home.
	</p>
	
    <center>
        <a href="customber_registration.php" class="btn btn-warning">
           Create New Account.
        </a><br> <br>
	
		<a href="#">SignIn / Login with</a>
	
		<div class="row">
			<i class="fa fa-facebook btn btn-default"> facebook</i>
			<i class="fa fa-instagram btn btn-default"> Instagram</i>
			<i class="fa fa-google btn btn-default"> Google</i>
		
		</div>
    </center>
</div>



<?php

    if(isset($_POST['login'])){
        $customer_email=$_POST['c_email'];
         $customer_mobile=$_POST['c_email'];
        $customer_pass=$_POST['c_password'];
        
        $select_customer="select * from customers where customer_email='$customer_email' OR customer_contact='$customer_mobile' and customer_pass='$customer_pass'";
        
        $run_customer=mysqli_query($con,$select_customer);
        $get_ip=getUserIP();
        $check_customer=mysqli_num_rows($run_customer);
        $customer_ditail_result=mysqli_fetch_array($run_customer);
        $customer_name=$customer_ditail_result['customer_name'];
        $customer_img=$customer_ditail_result['customer_img'];
        $customer_id=$customer_ditail_result['customer_id'];
        $customer_email_data=$customer_ditail_result['customer_email'];
        $ac_status=$customer_ditail_result['ac_status'];
        $select_cart="select * from cart where ip_add='$get_ip'";
        $run_cart=mysqli_query($con,$select_cart);
        $check_cart=mysqli_num_rows($run_cart);
        
        if($check_customer==0){
            echo"<script>alert('Username and Password is Miss Match !!') </script>";
            exit();
            
            
        } 
        $open='open';
        if($check_customer==1 AND $ac_status==$open){
            
        
        if($check_customer==1 AND $check_cart==0){
           $_SESSION['customer_email']=$customer_email_data;
           $_SESSION['customer_name']=$customer_name;
           $_SESSION['customer_img']=$customer_img;
           $_SESSION['customer_id']=$customer_id;
             echo"<script>alert('You are Logged In Sucssessfull')zg </script>";
            echo"<script>window.open('customer/my_account.php?my_order', '_self')</script>";
        }
        else{
           $_SESSION['customer_email']=$customer_email_data;
           $_SESSION['customer_name']=$customer_name;
           $_SESSION['customer_img']=$customer_img;
           $_SESSION['customer_id']=$customer_id;
             echo"<script>alert('You are Logged In Sucssessfull') </script>";
            echo"<script>window.open('checkout.php','_self')</script>";
        }
                                                                                     
    }
   else{
       echo"<script>alert('Your account has been temprally deleted, more info contact to tech support team.') </script>";
            echo"<script>window.open('contact.php','_self')</script>";
   }
    }






?>