<?php
error_reporting(0);
if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
else{
?>
<div class="box hidden-xs"  style="margin:0;padding:0">
<center>
    <h2>My Order </h2>
    <p> [ Your Ordel list is here , Manage your orders ]</p>
    <p>you have any question, please feel free to <a href="../contact.php">contact us, our customer service center is working for you 27/7.</a></p>
</center><hr>
	<!---order list for --larg-screen--->
    <div class="table-responsive ">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Sr.No</th>            
                    <th>Order ID</th>            
                    <th>Due Ammount</th>            
                             
                    <th>Quantity</th>            
                    <th>Size</th>            
                    <th>Order Date</th>            
                    <th>Paid/Unpaid</th>            
                    <th>Status</th>       
                    <th>Track Order</th>       
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_SESSION['customer_id'])){
                $customer_id= $_SESSION['customer_id'];
                $customer_email= $_SESSION['customer_email'];
                }
                else{
                             $customer_email= $_SESSION['customer_email'];
                    $get_c_id="select * from customers where customer_email='$customer_email'";
                        $run_c_id=mysqli_query($con,$get_c_id);
                    $row_c_id=mysqli_fetch_array($run_c_id);
                    $customer_id=$row_c_id['customer_id'];
                    $_SESSION['customer_id']=$customer_id;
                }
                $get_order="select * from customer_order where customer_id='$customer_id' order by 1 DESC ";
                $run_order=mysqli_query($con,$get_order);
                
                $sr_no=0;
                $num_rows=mysqli_num_rows($run_order);
                if($num_rows>0){
                while($row_customer=mysqli_fetch_array($run_order)){
                    $order_id=$row_customer['order_id'];
                    $product_id=$row_customer['product_id'];
                    $due_amount=$row_customer['due_amount'];
                  
                    $qty=$row_customer['qty'];
                    $size=$row_customer['size'];
                    $order_date=substr($row_customer['order_date'], 0,11);
                    $order_status=$row_customer['order_status'];
                    $sr_no++;
                    
                    if($order_status=='pending'){ $order_status="UnPaid"; }
                    elseif($order_status=='Processing'){$order_status="Pay In Processing"; }
                    elseif($order_status=='UnPaid COD'){ $order_status="UnPaid COD";}
                    else{ $order_status="Paid"; }
                ?>
                <tr>
                    <td><?php echo $sr_no ; ?></td>
                    <td><?php echo $order_id ; ?></td>
                    <td><?php echo $due_amount ; ?></td>
                   
                    <td><?php echo $qty ; ?></td>
                    <td><?php echo $size ; ?></td>
                    <td><?php echo $order_date ; ?></td>
                    <td><?php echo $order_status ; ?></td>
                    <?php
                    /* order pay stuts */
                    if($order_status=='UnPaid'){ ?>
                    <td><a href="confirm.php?order_id=<?php echo  $order_id;?>" target="_blank" class="btn btn-warning">Confirm if Paid</a></td> <?php }
                    elseif($order_status=='UnPaid COD'){ ?>
                    <td><a href="#"  class="btn btn-danger">Pay Later(COD)</a></td> <?php }
                    elseif($order_status=='Paid'){ ?><fieldset disabled>
                    <td><a href="#" class="btn btn-success">Pay Successfull </a></td></fieldset> <?php   }
                    else{ ?> <fieldset disabled>
                    <td><a href="#" class="btn btn-default">Wait 24Hours</a></td></fieldset><?php  }
                    /* order pay status end */
                    ?>
                    
                    <!--- track order --->
                    
                    <?php
                   if($order_status=='UnPaid'){ ?>  <td><a href="confirm.php?order_id=<?php echo  $order_id;?>" target="_blank"  class="btn btn-danger">After Payment</a></td><?php }
                    
                    elseif($order_status=='Paid'){ ?>
                    <td><a href="track-order.php?order_id=<?php echo  $order_id ; ?>" class="btn btn-info">Track Order</a></td><?php }
                    elseif($order_status=='UnPaid COD'){ ?>
                    <td><a href="track-order.php?order_id=<?php echo  $order_id ; ?>" class="btn btn-info">Track Order</a></td><?php }
                    else{ ?>
                    <td><a href="track-order.php?order_id=<?php echo  $order_id ; ?>" class="btn btn-info">Track Order</a></td><?php }
                    ?>
                    <!--- track order End --->
                   
                </tr>
               <?php } }
                else{
                    ?> <h4 style="color:red;font-weight:bold">Record Not Found. !!</h4> <?php
                }
                
                ?>
            </tbody>
        </table>
    </div>
		<!---order list for --larg-screen END--->
</div>



<div class="box visible-xs"  style="margin:0;padding:0">
		<!---order list for --Small-screen START--->
	 <div class="panel panel-default" >
        <div class="panel-heading">
			<h4>My Orders
			<button style="padding:2px;border:none;background:none;outline:none;color:blue" type="button" class="pull-right" data-toggle="collapse" data-target="#show_my_orders">
                   <span class="sr-only" >Toggle Navigation</span>
                    <i class="fa fa-chevron-down" style="color:#989696;" > </i>
            </button>
				</h4>
		 </div>
           
            <div class=" collapse panel-body " id="show_my_orders">
                <?php
                if(isset($_SESSION['customer_id'])){
                $customer_id= $_SESSION['customer_id'];
                $customer_email= $_SESSION['customer_email'];
                }
                else{
                    $customer_email= $_SESSION['customer_email'];
                    $get_c_id="select * from customers where customer_email='$customer_email'";
                        $run_c_id=mysqli_query($con,$get_c_id);
                    $row_c_id=mysqli_fetch_array($run_c_id);
                    $customer_id=$row_c_id['customer_id'];
                    $_SESSION['customer_id']=$customer_id;
                }
                $get_order="select * from customer_order where customer_id='$customer_id' order by 1 DESC ";
                $run_order=mysqli_query($con,$get_order);
                
                $sr_no=0;
                $num_rows=mysqli_num_rows($run_order);
                if($num_rows>0){
                while($row_customer=mysqli_fetch_array($run_order)){
                    $order_id=$row_customer['order_id'];
                    $product_id=$row_customer['product_id'];
                    $due_amount=$row_customer['due_amount'];
                   
                    $qty=$row_customer['qty'];
                    $size=$row_customer['size'];
                    $order_date=substr($row_customer['order_date'], 0,11);
                    $order_status=$row_customer['order_status'];
                    $sr_no++;
                    
                    if($order_status=='pending'){ $order_status="UnPaid"; }
                    elseif($order_status=='Processing'){$order_status="Pay In Processing"; }
                    elseif($order_status=='UnPaid COD'){ $order_status="COD (UnPaid)";}
                    else{ $order_status="Paid"; }
					
					/* order pay stuts verify*/
                    if($order_status=='UnPaid'){ 
						$pay_configration="<a href='confirm.php?order_id=$order_id target='_blank'>Confirm if Paid</a> ";
					}
					
                    elseif($order_status=='COD (UnPaid)'){ 
                    	$pay_configration="<a href='#' target='_blank'>Pay Later(COD)</a>";
				 	}
					
                    elseif($order_status=='Paid'){ 
						$pay_configration="<a href='confirm.php?order_id=$order_id' target='_blank'>Pay Successfull </a> ";  
					}
                    else{  
                    $pay_configration="<a href='confirm.php?order_id=$order_id' target='_blank'>Wait 24Hours</a>";
					}
                    /* order pay status verify end */
                    
					/* Order Tracking */
					if($order_status=='UnPaid'){
						$track_order_link="<a href='confirm.php?order_id=$order_id' target='_blank'>After Payment Track</a>";
						$track_order="After Pay.";
						
					}
                    
                    elseif($order_status=='Paid'){ 
                  		$track_order_link="<a href='track-order.php?order_id=$order_id' target='_blank'>Track Order</a>";
						$track_order="Yes";
					}
                    elseif($order_status=='UnPaid COD'){  
                  		$track_order_link="<a href='track-order.php?order_id=$order_id' target='_blank'>Track Order</a>";
						$track_order="Yes";
					}
                    else{  
                  		$track_order_link="<a href='track-order.php?order_id=$order_id'>Track Order</a>";
						$track_order="Yes";
					}
                                   
               				
					
               echo"
               		<div class='col-xs-3'>
						SR.NO. $sr_no
					</div>  ";
                    
                   echo"<div class='col-xs-9' style='border-left:1px solid #f7b4db'>
				   <b>
				   		 Order Id: $order_id <br>
						 Product Id: $product_id <br>
						 Due Amount: INR $due_amount<br>
						
						 Product Qty: $qty<br>
						 Product Size: $size<br>
						 Order Date: $order_date<br>
						 Payment Status: $order_status <br>
						 >> >> $pay_configration <br>
						 Track Order : $track_order <br>
						 >> >> $track_order_link
						 
						 
						 
				   </b><hr>
				   </div> " ;
                    
                  
               } //while loop end
				
				}//cheking row id end 
					/* Order Tracking */

                else{
                    ?> <h4 style="color:red;font-weight:bold">Record Not Found. !!</h4> <?php
				}
}// session velidation end
	
                ?>
            </div>
        
    </div>
</div>
<br>