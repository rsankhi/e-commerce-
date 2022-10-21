<?php
include('includes/db_con.php');
include('functions/functions.php');
session_start();
if(!isset($_SESSION['customer_email'])){
?><script>window.open('checkout.php','_self') </script><?php
}
else{

if(isset($_GET['buy'])){
	$pro_id=$_GET['buy'];
	$get_ditails="select * from products where product_id='$pro_id'";
	$run_ditails=mysqli_query($con,$get_ditails);
	$num=mysqli_num_rows($run_ditails);
	if($num>0){
		$result=mysqli_fetch_array($run_ditails);
		$pro_title=$result['product_title'];
		$pro_price=$result['product_price'];
		
	
		
		//fech user order addresh
		$cust_id=$_SESSION['customer_id'];
		$get_uadd="select * from cust_order_add where customer_id='$cust_id'";
		$run_add=mysqli_query($con,$get_uadd);
		
	?>

  
<html>
<head>
    <title>Place Order</title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
<body>
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?>
     <!--End nav bar menu start -->
    
    <!-- Page Diraction path --->
        <div id="content" class="main-page"><!----- Content ---start-->
        <div class="container-fluid"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>Place Order</li>
                </ul>
            </div><!-- col-md-12- End--->
            <!-- Side menu--> 
            <div class="col-md-3 hidden-xs">
                <?php include_once('includes/sidebar.php'); ?>
            </div>
            <!-- Side menu End -->
            <div class="col-md-9 box"> <!-- Col-md -9 -- start--->
				<div class="box-header">
					<h4 style="color:#eb2196"><b>Step 1️⃣ [ Confirm Product ] (1/2)</b></h4>
				<a href="ditails.php?pro_id=<?php echo $_GET['buy'];  ?>"> &laquo; Go Back </a>
				</div>
				<div class="box-body">
					 <div id='pro-li'><?php echo $pro_title; ?> </div>
					 <br>
					 <form class='col-md-12' action="buy.php?order_step=2" method="post" class="form-horizontal"> <!---Form Start--->
						<input type='hidden' name="pro_name" value="<?php echo $pro_title; ?>">
						<input type='hidden' name="pro_id" value="<?php echo $pro_id; ?>">
						 <div class="form-group col-md-12"><!--form-group Start---->
                                    <label class="col-md-3 control-lable">Product Quantity</label>
                                    <div class="col-md-5 "> <!--Col-md-7 Start---->
                                        <select name="pro_qty" class="form-control">
											
                                            <option >1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10</option>
                                        
                                        </select>
										<p style="color:red">( select minimum 1 product )</p>
                                    </div><!--Col-md-7 End  ---->
                                </div><!--form-group End----><br><br>
                         <div class="form-group col-md-12">
                                    <label class="col-md-3 control-lable">Product Size</label>
                                    <div class="col-md-5">
                                        <select class="form-control" name="pro_size">
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>Xl</option>
                                            <option>XLL</option>
                                        
                                        </select>
										<p style="color:red">( size important for cloths )</p>
                                    </div>
                                </div><!--form-group End---->
						 <input type="hidden" name="pro_price" value="<?php echo $pro_price; ?>">
						 
						 <div class=" col-md-12 form-group ">
							 <label class="col-md-3">Select Address</label>
							 <div class='col-md-7'>
							 
						 	<?php
							if(mysqli_num_rows($run_add)>0){
								$add_no=1;
								while($add_result=mysqli_fetch_array($run_add))
								{
									$u_name=$add_result['name'];
									$u_fname=$add_result['fname'];
									$u_addline_one=$add_result['addline_one'];
									$u_addline_two=$add_result['addline_two'];
									$u_country=$add_result['country'];
									$u_state=$add_result['state'];
									$u_disc=$add_result['disc'];
									$u_teh=$add_result['teh'];
									$u_block=$add_result['block'];
									$u_village=$add_result['villlage'];
									$u_pincode=$add_result['pincode'];
									$u_landmark=$add_result['landmark'];
									$u_mobileno=$add_result['mobileno'];
									$u_altmobileno=$add_result['altmobileno'];
									
									
									
									echo"
									
									<div class='col-md-6 panel panel-success'>
									
											<div class='panel-header panel-heading' >
												My Address($add_no)
											</div>
											
											<div class='panel-body' style='width:310px;padding:0;font-size:12px'>
											<p>
											   <b>$u_name s/o $u_fname </b><br>
											   $u_addline_one <br>
											   $u_addline_two<br>
											   $u_landmark<br>
												$u_country<br>
												<b>
												$u_state Disc. $u_disc Teh. $u_teh<br>
												Block.$u_block V/Gali $u_village<br>
												$u_pincode . $u_landmark<br>
												$u_mobileno $u_altmobileno<br>
												</b>
												</p>
											</div>
											<div class='panel-footer'>"
											?>
								 			
											<?php
											$add_value="<p>
											   <b>$u_name s/o $u_fname </b><br>
											   $u_addline_one <br>
											   $u_addline_two<br>
											   $u_landmark<br>
												$u_country<br>
												<b>
												$u_state Disc. $u_disc Teh. $u_teh<br>
												Block.$u_block V/Gali $u_village<br>
												$u_pincode . $u_landmark<br>
												$u_mobileno $u_altmobileno<br>
												</b>
												</p>";
											echo"<input type='radio' name='add' value='$add_value' checked > select address
											</div>
											
									
									
									</div>";
									
								}
									
								
							}					
							?>
							 </div>
						 </div>
                               
						 <br><br><a href='buy.php?order_step=2'><button style="min-width:150px" class="pull-left btn btn-primary" type="submit" value="next">Next Step &raquo;</button></a>
				 </form>
				</div>
			</div>
				
		</div>
	
		<?php include('includes/footer.php'); ?>
	</div>
	</body>
</html>



<?php }
	else{
		echo"<script>alert('Sorry, Product Not Found !!'); window.open('shop.php', '_self') </script>";
	}  }

if(isset($_GET['order_step']))
   {
?>	
<html>
<head>
    <title>Place Order</title>
    <?php include_once('includes/header_link.html'); ?>
    </head>
<body>
    <!--- Welcome-top-bar ---> 
    <?php include_once('includes/welcome_topbar.php'); ?>
     <!-- nav bar menu start -->
     <?php include_once('includes/menubar.php'); ?>
     <!--End nav bar menu start -->
    
    <!-- Page Diraction path --->
        <div id="content" class="main-page"><!----- Content ---start-->
        <div class="container-fluid"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>Place Order</li>
                </ul>
            </div><!-- col-md-12- End--->
            <!-- Side menu--> 
            <div class="col-md-3 hidden-xs">
                <?php include_once('includes/sidebar.php'); ?>
            </div>
            <!-- Side menu End -->
            <div class="col-md-9 box"> <!-- Col-md -9 -- start--->
				<div class="box-header">
					<h4 style="color:#eb2196"><b>Step 2️⃣ [ Confirm Payment ] (2/3)</b></h4>
				<a href="#"> &laquo; Don't Press Back Button &raquo;</a>
				</div>
				<div class="box-body"> 
<?php
	$pro_name=$_POST['pro_name'] ;
	$pro_price=$_POST['pro_price']	;
	$pro_qty=$_POST['pro_qty']	;
	$pro_size=$_POST['pro_size']	;
	$pro_id=$_POST['pro_id']	;
	$order_add=$_POST['add']	;
	$_SESSION['buy_pro_id'] =$pro_id; 
	$_SESSION['buy_pro_qty']=$pro_qty;
	$_SESSION['buy_pro_size']=$pro_size;
	$_SESSION['buyer_order_add']=$order_add;
	//total main price;
	
	$total=0;
	$pro_price *= $pro_qty;
    $total += $pro_price;
	// total ship charge
	$ship_charge=36;
	$shipcharge= 0;
	
         if($pro_qty>=2){
             $shipcharge= $ship_charge / 1.44  ;
             $shipcharge *= $pro_qty;
             $shipcharge += 10;
             
         }
         else{
             $shipcharge =$ship_charge;
         }
         
         
	// TAX Price
		if($total==0)
		{
		$local_tax= $total;
		$local_tax = 0 ;


		}

		elseif($total<=199)
		{
		$local_tax= $total;
		$local_tax = 0 ;


		}elseif($total<=1000)
		{
		$local_tax= $total;
		$local_tax = 10.22 ;


		}
		elseif($total<=2000)
		{
		$local_tax= $total;
		$local_tax = 25.38;


		}
		elseif($total<=4000)
		{
		$local_tax= $total;
		$local_tax = 35.11;


		}
		elseif($total<=5000)
		{
		$local_tax= $total;
		$local_tax = 55.56;


		}
		elseif($total<=10000)
		{
		$local_tax= $total;
		$local_tax = 70.88;


		}
		else{
		$local_tax= $total;
		$local_tax = 102.96;


		}
   // GST 
	$gst=0;
	//$gst= $total *18 /100;
    
	$payble_payment=0;
	$payble_payment +=$gst;
	$payble_payment +=$local_tax;
	$payble_payment +=$total;
	$payble_payment +=$shipcharge;
	
	
	?>
	<div class="row">
			<div class="table-responsive col-md-5">
        		<table class="table table-bordered table-hover ">
						<thead>
							<tr>
								<th>Title</th>
								<th>Ditails</th>
								
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Product Qty</td>
								<td><?php echo $pro_qty; ?></td>
							</tr>
							<tr>
								<td>Product Size</td>
								<td><?php echo $pro_size; ?></td>
							</tr>
							<tr>
								<td>Product Price</td>
								<td><?php echo $total; ?></td>
							</tr>
							<tr>
								<td>ShipCharge</td>
								<td><?php echo $shipcharge; ?></td>
							</tr>
							<tr>
								<td>GST</td>
								<td><?php echo $gst; ?></td>
								
							</tr>
							<tr>
								<td>TAX</td>
								<td><?php echo $local_tax; ?></td>
								
							</tr>
							<tr>
								<th>Total Pay</th>
								<th><?php echo $payble_payment; ?></th>
								
							</tr>

						</tbody>
						
				</table>
			</div>
					</div>
					<?php
	$order_id= "ORDS" . rand(10000,99999999);
	echo"<div class='row'>";
	
	echo"<button class='col-md-4 btn ' style='color:red;font-weight:bold'>ORDER_ID : $order_id </button>  </div>";

	 
	?><br><br>  <div class="row">
		<form width="100%" method="post" action="paytm/PaytmKit/pgRedirect.php">
					
		
					<input type='hidden' id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo $order_id;?>">
					
					<input type='hidden' id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php echo $_SESSION['customer_id']; ?>">
				
					<input type='hidden' id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
					
					<input type='hidden' id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					
					<input title="TXN_AMOUNT" tabindex="10"
						type='hidden' name="TXN_AMOUNT"
						value="<?php echo $payble_payment; ?>" required>
				<div class="form-group col-md-3">
					<label>Mobile NO. : *</label>
					<input  class="form-control " title="MSISDN" tabindex="10"
						type="text" name="MSISDN"
						placeholder="+91 1234567890" required>
			</div>
			<div class="form-group col-md-3">
					<label>Email : *</label>
					<input class="form-control" title="EMAIL" tabindex="10"
						type="email" name="EMAIL"
						placeholder="example@gmail.com" required> 
			</div><br>
			<div class="form-group col-md-3">
				<input class="form-control btn btn-primary" value="Pay Online &raquo;&raquo;" type="submit"	onclick=""> 
					</div>
			
	</form>
					
					<!-- cod system cheking-->
	<?php
		$get_cod_info="select * from products where product_id='$pro_id'";
		$get_cod_run=mysqli_query($con,$get_cod_info);
		
		$cod_result=mysqli_fetch_assoc($get_cod_run);
	 	$cod_value=$cod_result['COD'];
		$no='no';
		if($cod_value==$no){
			?>	<fieldset disabled><div class="visible-xs"><br></div>
					<form style="margin-top:-15px;margin-left:15px" action="buy.php?order_step=2" method="post">
					<div class="form-group">
					<input type="submit" class="btn btn-info" value='Pay COD'>
					</div>
				</form>
					</fieldset>
					<?php
		}
	else{
		?><div class="visible-xs"><br></div>
		<form style="margin-top:-15px;margin-left:15px" action="buy.php?order_success=<?php echo $pro_id;?> " method="post">
					<div class="form-group">
					<input type="submit" class="btn btn-info" value='Pay COD'>
					</div>
				</form>
					<?php
	}
		
	?>
					
				
					</div>
					<font color="red">* - Mandatory Fields <br> <br>
						<p style='color:blue'>✔ अगर किसी टेक्निकल प्रॉब्लेम की वजह से आप का प्रोडक्ट  ऑर्डर नहीं होता है और आप के खाते या वॉलेट से  पेमेंट  हो जाता है तो ,उस स्थिति में आप से इस मेल या मोबाईल नंबर पर संपर्क कर के आप का पेमेंट 24 घंटे के अंदर - अंदर उसी खाते मे  रिफन्ड किया जाएगा ।  </p>
						<p style="color:black"><b>HelpLine: +91 8000839163, +91 9413772885 </b></p>
						
			</font>
			
	<?php
	?>
					<style>
						.btn-pay{
							padding: 10px 25px;
							border: none;
							border-radius: 25px;
							background: rgba(234, 39, 144, 0.63);
							font-weight: bold;
							color: aliceblue;
							transition: 0.5s;
							outline: none;
							font-size: 16px;
							font-family:sans-serif;
							
						}
						.btn-pay:hover{
							transition: 0.5s;
							padding: 15px 30px;
							border: none;
							border-radius: 25px;
							background: rgba(61, 83, 250, 0.63);
							font-weight: bold;
							color: aliceblue;
							outline: none;
							
						}
					</style>
	</div>
				</div>
                      			 
			</div>
		
	
		<?php include('includes/footer.php'); ?>
	</div>
	
	</body>
</html>
<?php } }


?>