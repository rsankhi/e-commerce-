
 <?php

 include_once('includes/db_con.php');
 include_once('functions/functions.php');

if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
else{
    $customer_email=$_SESSION['customer_email'];
    $get_cust_ditail="select * from customers where customer_email='$customer_email'";
    $run_cust=mysqli_query($con,$get_cust_ditail);
    $row_cust=mysqli_fetch_array($run_cust);
    $cust_id=$row_cust['customer_id'];
        $cust_name=$row_cust['customer_name'];
        $cust_email=$row_cust['customer_email'];
        $cust_country=$row_cust['customer_country'];
        $cust_state=$row_cust['customer_state'];
        $cust_city=$row_cust['customer_city'];
        $cust_mobile=$row_cust['customer_contact'];
        $cust_add=$row_cust['customer_address'];
        $cust_img=$row_cust['customer_img'];
        $cust_ip=$row_cust['customer_ip'];
      
    
    if(isset($_POST['update']))
    {
                $update_cname=$_POST['c_name'];
                $update_cemail=$_POST['c_email'];
                $update_ccountry=$_POST['c_country'];
                $update_cstate=$_POST['c_state'];
                $update_ccity=$_POST['c_city'];
                $update_cmobile=$_POST['c_mobile'];
                $update_cadd=$_POST['c_add'];
                $img=$_FILES['c_img'];
                $update_img=$img['name'];
        
                //delete old img file 
        
        if($update_img==NULL){
            $update_img=$cust_img;
        }
        else{
                $delete_img="customer_images/".$cust_img;
                if(!isset($cust_img)==NULL){
                if(file_exists($delete_img)){ unlink($delete_img);}
                }
                // get new img  ditails and , update with new name by customer name 

                $update_tmp_img=$img['tmp_name'];
                $update_img="$update_cname+$update_img";

                move_uploaded_file($update_tmp_img,"customer_images/$update_img");  }
        
                $update="update customers set customer_name='$update_cname', customer_email='$update_cemail', customer_country='$update_ccountry', customer_state='$update_cstate', customer_city='$update_ccity', customer_contact='$update_cmobile', customer_address='$update_cadd', customer_img='$update_img' where customer_id='$cust_id'";

                $run_update=mysqli_query($con,$update);
        
        if($run_update==true){
            session_destroy();
            echo"<script>alert('logout successfull , Session Time Out' );window.open('../checkout.php','_self'); </script>";  }
        
        
    }
    
?>
<div class="box">
<center>
    <h2>Edit Account Info </h2>
    <p> [ Your Account list is here , Manage your Account ] <a href="../contact.php">contact us, our customer service center is working for you 27/7.</a></p>
</center><hr>
    <form action="my_account.php?edit_account" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Customer Name :</label>
                            <input type="text" name="c_name" required class="form-control" value="<?php echo $cust_name; ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Email</label>
                            <input type="email" name="c_email" required class="form-control" placeholder="user@gmail.com"  value="<?php echo $cust_email; ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Mobile</label>
                            <input type="number" name="c_mobile" required class="form-control" placeholder="user@gmail.com"  value="<?php echo $cust_mobile; ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer Country</label>
                            <input type="text" name="c_country" class="form-control" required  value="<?php echo $cust_country; ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer State</label>
                            <input type="text" name="c_state" class="form-control" required  value="<?php echo $cust_state; ?>">
                        </div>
                        <div class="form-group">
                            <label>Customer City</label>
                            <input type="text" name="c_city" class="form-control" required  value="<?php echo $cust_city; ?>">
                        </div>
                        
                        
                        <div class="form-group">
                            <label>Customer Address :</label>
                            <textarea type="text" name="c_add" required class="form-control" ><?php echo $cust_add; ?> </textarea>
                        </div>
                        
                        <div class="form-group">
                            <label>Customer Image :</label>
                            <input type="file" name="c_img"   class="form-control"><br>
                            <img style="min-width:20%;min-height:50%;max-width:25%;max-height:50%;" src="customer_images/<?php echo $cust_img; ?>" class="pull-left img-responsive"  width="50px">
                        </div>
                        <div class="text-center">
                           
                            <button type="submit" name="update" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Update Now
                            </button>
                        </div>
                    </form>
</div>

<?php } ?>