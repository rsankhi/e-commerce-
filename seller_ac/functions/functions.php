<?php
$db=mysqli_connect('sql307.byethost.com','ltm_26044722','hrbajar.com','ltm_26044722_ecom');
  function getUserIP(){
    switch (true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) :return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) :  return $_SERVER['HTTP_X_FORWARDED_FOR'] ;
        default :return $_SERVER['REMOTE_ADDR'];
    }
}
function insert_products(){
        global $db;
        $admin_email=$_SESSION['seller_email'];
        $admin_job='seller';
	$get_cust_id="select * from customers where customer_email='$admin_email'";
	$run_cust=mysqli_query($db,$get_cust_id);
	$custid=mysqli_fetch_array($run_cust);
	
	$cust_id=$custid['customer_id'];
		if(isset($_POST['submit'])){
    
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $categories=$_POST['cat'];
    $product_price=$_POST['product_price'];
        $product_s_price=$_POST['product_s_price'];
         $cod=$_POST['cod']; 
    $product_keyword=$_POST['product_keyword'];
    $product_desc=$_POST['product_desc'];
     
            
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];
       $filename1="pic_nkqYEP-Lp-053-";
	   $filename1=str_shuffle($filename1);
       $product_img1='product-'.substr($filename1,0,10).'.png';
			
	   $filename2="pic_YPERqYEP-05553-";
	   $filename2=str_shuffle($filename2);	
       $product_img2='product-'.substr($filename2,0,10).'.png';
			
			$filename3="p82Wc_YPEqTGqYEP-0RE3-";
	   $filename3=str_shuffle($filename3);	
       $product_img3='product-'.substr($filename3,0,10).'.png';	
    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");
    
    $insert_product="INSERT INTO `products`(`customer_id`, `posted_by`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `total_price`, `product_desc`, `product_keyward`, `COD`) VALUES('$cust_id','$admin_job','$product_cat','$categories',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_s_price','$product_price','$product_desc','$product_keyword','$cod')";
    
    $run_product=mysqli_query($db,$insert_product);
    
    if($run_product==true){
        echo"<script>alert('product Insert Successfull') </script>";
        echo"<script>window.open('index.php?insert_product', '_self') </script>";
	}
    else{
         echo"<script>alert('product Insert Error') </script>";
		 echo"<script>window.open('index.php?insert_product', '_self') </script>";
	}
}
       
        
        ?> 
        <!--- col-lg-12 start--->
            <div class="panel panel-default"> <!-- start panel -->
                <div class="panel panel-heading"><!---panel -heading--start----->
                   <i clsss="fa fa-plus-circle"></i><h3>  Insert Product :
                    </h3>
                </div><!----end panel haeading----->
                <div class="panel-body">
                    <form action="index.php?insert_product" method="post" enctype="multipart/form-data">
                       
						<div class="form-group">
                            <label class="col-md-3 control-lable">Product Title</label>
                            <input type="text" name="product_title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Category</label>
                            <select class="form-control" name="product_cat">
                                <option>Select a product category</option>
                                <?php
                                $get_p_cats="select * from product_categories";
                                $run_p_cats=mysqli_query($db,$get_p_cats);
                                while($row=mysqli_fetch_array($run_p_cats)){
                                    $id=$row['p_cat_id'];
                                    $p_cat_title=$row['p_cat_title'];
                                    echo"<option value='$id'>$p_cat_title</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Categories</label>
                            <select name="cat" class="form-control">
                                <option>Select categories</option>    
                                <?php
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($db,$get_cats);
                                while($row=mysqli_fetch_array($run_cats)){
                                    $id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    echo"<option value='$id'>$cat_title</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Image 1</label>
                            <input type="file" name="product_img1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Image 2</label>
                            <input type="file" name="product_img2" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Image3</label>
                            <input type="file" name="product_img3" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Total price</label>
                            <input type="number" name="product_price" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Selling price</label>
                            <input type="number" name="product_s_price" class="form-control" required>
                        </div>
                         <div class="form-group">
                            <label class="col-md-3 control-lable">Accept COD Pay</label>
                            <select name="cod" class="form-control">
                                <option>no</option>   
                                 <option>yes</option>  
                                </select>
                            </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Keyword</label>
                            <input type="text" name="product_keyword" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Description :</label>
                            <textarea  name="product_desc" class="form-control" rows="6"  required> </textarea>
                        </div> 
                        <div class="form-group">
                            <center>
                            <input type="reset" name="reset" class="btn btn-default " Value="Reset Form Value"> 
                            <input type="submit" name="submit" class="btn btn-primary " >
                        </center>
                      </div>
                    </form> 
                </div>
            </div> <!--end panel---->
        
     <?php
           }
function get_products(){
	global $db; 
	if(!isset($_GET['view_pro_page'])){
                   
				$per_page=8;
                    if(isset($_GET['view_pro_page'])){
                        /*yha $page ham pagination me set url se le rhe hai */
                    $page=$_GET['view_pro_page'];
                    if($page==0){
						$page=1;
					}
                    }
                    else{
                    $page=1;
                    
                    }
                        /* yha ham select query ko short kar rhe hai ki jab koi pagination btn 4par click kare tb $page ki value=4, tb pichale 3 pages me jitne bhi product dikhaye gye hai un ke aage se products show honge,es liye $pare_page se * kar rhe hai */
                    $start_from=($page-1) * $per_page;
					$seller_id=$_SESSION['seller_id'];
                    $get_pro="select * from products where customer_id='$seller_id' order by 1 DESC LIMIT $start_from,$per_page";
			$run_pro=mysqli_query($db,$get_pro);
		?> 
				<div class='box'><!-- box start-->
                    <h2 style='color:#5b77c3;font-weight:300'><i class='fa fa-list'></i> Your Products</h2>
                    <p style='color:#2a4386'>Manage your products list in only on one click by admin panel.If you fase any error or problem than go to contact page.</p>
                </div><!-- box End--->
<!--filter row -->
			<div class="row">
				<div class="col-md-12">
				<h4>Apply Filter :</h4>
				<div class="form-group col-md-3">
                            <label class="col-md-12 control-lable">Customer Id</label>
                            <input type="number" name="cust_id" class="form-control" required>
                        </div>
					<div class="form-group col-md-3">
                            <label class="col-md-12 control-lable">Customer Id</label>
                            <input type="number" name="cust_id" class="form-control" required>
                        </div>
					<div class="form-group col-md-3">
                            <label class="col-md-12 control-lable">Customer Id</label>
                            <input type="number" name="cust_id" class="form-control" required>
                        </div><br> 	
					<button type="submit" class="btn btn-primary"> Apply 	</button>
				</div>
</div>
<div class="row">
<!--filter row-end-->
<?php
	while($result_pro=mysqli_fetch_array($run_pro)){
		$pro_id=$result_pro['product_id'];
    	$pro_title=$result_pro['product_title'];
    	$pro_price=$result_pro['product_price'];
    	$pro_img1=$result_pro['product_img1'];
	echo"
<div class='col-md-3 col-sm-6 center-responsive'>
                            <div class='product'><br>
                                <a href='ditails.php?pro_id=$pro_id'>
                                    <img src='product_images/$pro_img1' class='img-responsive'>
                                </a>
                                <div class='text'>
                                    <h4><a href='ditails.php?pro_id=$pro_id'>$pro_title </a></h4>
                                    <p class='price'>INR $pro_price .</p>
                                    <p class='buttons'>
                                        <a href='index.php?p_edit=$pro_id' class='btn btn-default'>Edit </a>
                                        <a href='index.php?p_delete=$pro_id' class='btn btn-default'><i class='fa fa-trush'></i> Delete </a>
                                    </p>
                                
                                </div>
                            </div>
                            </div>
							";
	}
?>
</div>
<div class="row"><center>
                <ul class="pagination">
                   
                     <?php
                  $seller_id=$_SESSION['seller_id'];
                    $get_pro="select * from products where customer_id='$seller_id'";
                        $result=mysqli_query($db,$get_pro);
                        $total_record=mysqli_num_rows($result);
                        $total_pages=ceil($total_record / $per_page);
                        if($total_pages>0){
                        echo"
                            <li><a href='index.php?view_pro_page=1'>".'First Page'." </a> </li>
                        ";
                       
                        
                        for($i=2; $i<=$total_pages;$i++){
                             echo"
                            <li><a href='index.php?view_pro_page=".$i."'>".$i."</a> </li>
                        ";
                        }
                        for($x=$page;$x<=$total_pages;$x++)
                        {
                         
                        }
                        
                        echo"
                            <li><a href='index.php?view_pro_page=$total_pages'>".'Last Page'." </a> </li>
                        ";
						}
				else{
					echo"Sorry, NO Product Found !";
				}
                    
                    ?>
                    
                </ul>
	</center>	</div><?php
}
	else{
				$per_page=8;
                    if(isset($_GET['view_pro_page'])){
                        /*yha $page ham pagination me set url se le rhe hai */
                    $page=$_GET['view_pro_page'];
				 	if($page==0){
						$page=1;
					}
                    
                    }
                    else{
                    $page=1;
                    
                    }
                        /* yha ham select query ko short kar rhe hai ki jab koi pagination btn 4par click kare tb $page ki value=4, tb pichale 3 pages me jitne bhi product dikhaye gye hai un ke aage se products show honge,es liye $pare_page se * kar rhe hai */
                    $start_from=($page-1) * $per_page;
                    $seller_id=$_SESSION['seller_id'];
                    $get_pro="select * from products where customer_id='$seller_id' order by 1 DESC LIMIT $start_from,$per_page";
			$run_pro=mysqli_query($db,$get_pro);
		?> 
				<div class='box'><!-- box start-->
                    <h2 style='color:#5b77c3;font-weight:300'><i class='fa fa-list'></i> Your Products</h2>
                    <p style='color:#2a4386'>Manage your products list in only on one click by admin panel.If you fase any error or problem than go to contact page.</p>
                </div><!-- box End--->
<!--filter row -->
			<div class="row">
				<div class="col-md-12">
				<h4>Apply Filter :</h4>
				<div class="form-group col-md-3">
                            <label class="col-md-12 control-lable">Customer Id</label>
                            <input type="number" name="cust_id" class="form-control" required>
                        </div>
					<div class="form-group col-md-3">
                            <label class="col-md-12 control-lable">Customer Id</label>
                            <input type="number" name="cust_id" class="form-control" required>
                        </div>
					<div class="form-group col-md-3">
                            <label class="col-md-12 control-lable">Customer Id</label>
                            <input type="number" name="cust_id" class="form-control" required>
                        </div><br> 	
					<button type="submit" class="btn btn-primary"> Apply</button>
				</div>
</div>
<!--filter row-end-->
<?php
	while($result_pro=mysqli_fetch_array($run_pro)){
		$pro_id=$result_pro['product_id'];
    	$pro_title=$result_pro['product_title'];
    	$pro_price=$result_pro['product_price'];
    	$pro_img1=$result_pro['product_img1'];
	echo"
<div class='col-md-3 col-sm-6 center-responsive'>
                            <div class='product'><br>
                                <a href='ditails.php?pro_id=$pro_id'>
                                    <img src='product_images/$pro_img1' class='img-responsive'>
                                </a>
                                <div class='text'>
                                    <h4><a href='ditails.php?pro_id=$pro_id'>$pro_title </a></h4>
                                    <p class='price'>INR $pro_price .</p>
                                    <p class='buttons'>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-default'>Edit </a>
                                        <a href='ditails.php?pro_id=$pro_id' class='btn btn-default'><i class='fa fa-trush'></i> Delete </a>
                                    </p>
                                
                                </div>
                            </div>
                            </div>
							";
	}
?><div class="row"><center>
                <ul class="pagination">
                   
                     <?php
		            
                    $get_pro="select * from products where customer_id='$seller_id'";
                        $result=mysqli_query($db,$get_pro);
                        $total_record=mysqli_num_rows($result);
                        $total_pages=ceil($total_record / $per_page);
                        if($total_pages>0){
                        echo"
                            <li><a href='index.php?view_pro_page=1'>".'First Page'." </a> </li>
                        ";
                       
                        
                        for($i=2; $i<=$total_pages;$i++){
                             echo"
                            <li><a href='index.php?view_pro_page=".$i."'>".$i."</a> </li>
                        ";
                        }
                        for($x=$page;$x<=$total_pages;$x++)
                        {
                         
                        }
                        
                        echo"
                            <li><a href='index.php?view_pro_page=$total_pages'>".'Last Page'." </a> </li>
                        ";
						}
					else{
						echo"Sorry, No Products Found !!";
					}
                    ?>
                    
                </ul>
	</center></div>	<?php
}
	}
function pedit(){
	global $db;
	
	if(isset($_GET['p_edit'])){
		$edit_id=$_GET['p_edit'];
		$select_data="select * from  products where product_id='$edit_id'";
		$run_data=mysqli_query($db,$select_data);
		if(mysqli_num_rows($run_data)>0){
			 $result=mysqli_fetch_array($run_data);
			 $p_name =$result['product_title'];
			 $p_cat_id =$result['p_cat_id'];
				 $select_pcat="select * from product_categories where p_cat_id='$p_cat_id'";
					$run_pcat=mysqli_query($db,$select_pcat);
					$pcat_result=mysqli_fetch_array($run_pcat);
					$p_cat=$pcat_result['p_cat_title'];
			$cat_id =$result['cat_id'];
				$select_cat="select * from categories where cat_id='$cat_id'";
					$run_cat=mysqli_query($db,$select_cat);
					$cat_result=mysqli_fetch_array($run_cat);
					$cat=$cat_result['cat_title'];
			
			 $s_price =$result['product_price'];
			 $t_price =$result['total_price'];
			 $p_img1 =$result['product_img1'];
			 $p_img2 =$result['product_img2'];
			 $p_img3 =$result['product_img3'];
			 $p_desc =$result['product_desc'];
			 $p_keyward =$result['product_keyward'];
			 $p_cod =$result['COD'];
			 $admin_email=$_SESSION['seller_email'];
			
			//cheking login user 
   
	$get_cust_id="select * from customers where customer_email='$admin_email'";
	$run_cust=mysqli_query($db,$get_cust_id);
	$custid=mysqli_fetch_array($run_cust);
	$cust_id=$custid['customer_id'];
			// update data
		if(isset($_POST['update'])){
    
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $categories=$_POST['cat'];
    $product_price=$_POST['product_price'];
        $product_s_price=$_POST['product_s_price'];
         $cod=$_POST['cod']; 
    $product_keyword=$_POST['product_keyword'];
    $product_desc=$_POST['product_desc'];
     
            
    $product_img1=$_FILES['product_img1']['name'];
			if( $product_img1==NULL){
				$product_img1=$p_img1;
			}
			else{
				 $delete_img="product_images/".$p_img1;
                if(!isset($p_img1)==NULL){
                if(file_exists($delete_img)){ unlink($delete_img);}
                }
				
			$filename1="pic_nkqYEP-Lp-053-";
   			$filename1=str_shuffle($filename1);
			$product_img1='product-'.substr($filename1,0,10).'.png';
			 $temp_name1=$_FILES['product_img1']['tmp_name'];
			move_uploaded_file($temp_name1, "product_images/$product_img1");
			}
			
			
    $product_img2=$_FILES['product_img2']['name'];
			if($product_img2==NULL){
				$product_img2=$p_img2;
			}
			else{
				$delete_img="product_images/".$p_img2;
                if(!isset($p_img2)==NULL){
                if(file_exists($delete_img)){ unlink($delete_img);}
                }
			$filename2="pic_YPERqYEP-05553-";
			$filename2=str_shuffle($filename2);	
       		$product_img2='product-'.substr($filename2,0,10).'.png';	
		 	move_uploaded_file($temp_name2, "product_images/$product_img2");
			}
			
    $product_img3=$_FILES['product_img3']['name'];
			if($product_img3==NULL){
				$product_img3=$p_img3;
			}
			else{
				$delete_img="product_images/".$p_img3;
                if(!isset($p_img3)==NULL){
                if(file_exists($delete_img)){ unlink($delete_img);}
                }
		$filename3="p82Wc_YPEqTGqYEP-0RE3-";
	   	$filename3=str_shuffle($filename3);	
		$temp_name2=$_FILES['product_img2']['tmp_name'];
        $product_img3='product-'.substr($filename3,0,10).'.png';	
		$temp_name3=$_FILES['product_img3']['tmp_name'];	
	    move_uploaded_file($temp_name3, "product_images/$product_img3");
			}
    
    $insert_product="UPDATE `products` SET `customer_id`='$cust_id', `p_cat_id`='$product_cat', `cat_id`='$categories', `product_title`='$product_title', `product_img1`='$product_img1', `product_img2`='$product_img2', `product_img3`='$product_img3', `product_price`='$product_s_price', `total_price`='$product_price', `product_desc`='$product_desc', `product_keyward`='$product_keyword', `COD`='$cod' WHERE `product_id`='$edit_id' AND `customer_id`='$cust_id'";
    
    $run_product=mysqli_query($db,$insert_product);
    
    if($run_product==true){
        echo"<script>alert('Congratulation, Product Update Successfull.') </script>";
        echo"<script>window.open('index.php?view_product', '_self') </script>";
	}
    else{
         echo"<script>alert('Sorry, Product Update UnSuccess.') </script>";
		 echo"<script>window.open('index.php?view_product', '_self') </script>";
	}
}
       
        
        ?> 
        <!--- col-lg-12 start--->
            <div class="panel panel-default"> <!-- start panel -->
                <div class="panel panel-heading"><!---panel -heading--start----->
                   <i clsss="fa fa-plus-circle"></i><h3> Update Product :
                    </h3>
                </div><!----end panel haeading----->
                <div class="panel-body">
                    <form action="index.php?p_edit=<?php echo $edit_id; ?>" method="post" enctype="multipart/form-data">
                       
						<div class="form-group">
                            <label class="col-md-3 control-lable">Product Title</label>
                            <input type="text" name="product_title" class="form-control" required value="<?php echo $p_name; ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Category</label>
                            <select class="form-control" name="product_cat">
                                <option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat; ?></option>
                                <option value="<?php echo $p_cat_id; ?>"><?php echo $p_cat; ?></option>
                                <?php
                                $get_p_cats="select * from product_categories";
                                $run_p_cats=mysqli_query($db,$get_p_cats);
                                while($row=mysqli_fetch_array($run_p_cats)){
                                    $id=$row['p_cat_id'];
                                    $p_cat_title=$row['p_cat_title'];
                                    echo"<option value='$id'>$p_cat_title</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Categories</label>
                            <select name="cat" class="form-control">
                                <option value='<?php echo $cat_id; ?>'><?php echo $cat; ?></option>
                                <?php
                                $get_cats="select * from categories";
                                $run_cats=mysqli_query($db,$get_cats);
                                while($row=mysqli_fetch_array($run_cats)){
                                    $id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    echo"<option value='$id'>$cat_title</option>";
                                }
                                
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Image 1</label>
                            <input type="file" name="product_img1" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Image 2</label>
                            <input type="file" name="product_img2" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Image3</label>
                            <input type="file" name="product_img3" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Total price</label>
                            <input type="number" name="product_price" class="form-control" required value="<?php echo $t_price; ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Selling price</label>
                            <input type="number" name="product_s_price" class="form-control" required value="<?php echo $s_price; ?>">
                        </div>
                         <div class="form-group">
                            <label class="col-md-3 control-lable">Accept COD Pay</label>
                            <select name="cod" class="form-control">
								
                                <option><?php echo $p_cod; ?></option>   
                                <option>no</option>   
                                 <option>yes</option>  
                                </select>
                            </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Keyword</label>
                            <input type="text" name="product_keyword" class="form-control" required value="<?php echo $p_keyward; ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-lable">Product Description :</label>
                            <textarea  name="product_desc" class="form-control" rows="6"  required><?php echo $p_desc; ?> </textarea>
                        </div> 
                        <div class="form-group">
                            <center>
                            <input type="reset" name="reset" class="btn btn-default " Value="Reset Update value"> 
                            <input type="submit" name="update" class="btn btn-primary " value="Update Data" >
                        </center>
                      </div>
                    </form> 
                </div>
            </div> <!--end panel---->
        
     <?php
			
		}
		else{
			echo"product not found";
		}
		
		
	}
}
function pdelete(){
	global $db;
	
	if(isset($_GET['p_edit'])){
		$edit_id=$_GET['p_edit'];
	}
}


function insert_pro_cat(){
	global $db;
	
	if(isset($_POST['submit'])){
		$pro_cat_name=$_POST['pro_cat_name'];
		$pro_cat_desc=$_POST['pro_cat_desc'];
		$pro_cat_insert="insert into product_categories(`p_cat_title`, `p_cat_desc`) values('$pro_cat_name','$pro_cat_desc')";
		$pro_cat_run=mysqli_query($db,$pro_cat_insert);
		if($pro_cat_run==true){
			echo"<script>alert('Product Categories Added Successful' ), window.open('index.php?insert_product_cat', '_self')</script>";
		}
		
	}
	 ?>
            <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                            <h2>Insert Products Categories:</h2>
                    </div><!---Box header End---><br>
                    <form action="index.php?insert_product_cat" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Product Category Name :</label>
                            <input type="text" name="pro_cat_name" required placeholder="Enter Categories .." class="form-control">
                        </div>
						<div class="form-group">
                            <label>Product Category Name :</label>
							<textarea  name="pro_cat_desc" required placeholder="Enter Product Categories Description .." class="form-control"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-delete"></i> Reset Data
                            </button>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Submit
                            </button>
                        </div>
                    </form>
                 </div><!--- Box End--->
        <?php
}
function view_pro_cat(){
	global $db;
	$get_pro_cat="select * from product_categories";
		$run_pro_cat=mysqli_query($db,$get_pro_cat);
	
			?>
            <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                            <h2>View Product Categories:</h2>
                    </div><!---Box header End---><br>
                 
                        <div class="form-group">
                            <label>Categories :</label>
                            <select name="name" class="form-control">
								<?php while($result=mysqli_fetch_array($run_pro_cat)){
									$pro_cat=$result['p_cat_title'];
									
								echo"
								<option>$pro_cat</option>
								
								";
								}?>
							</select>
                        </div>

                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-pencil"></i> Edit Data
                            </button>
                            <button type="submit" name="send_message" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Go Back
                            </button>
                        </div>
                   
                 </div><!--- Box End--->
	<?php
}

function insert_cat(){
	global $db;
	
	if(isset($_POST['submit'])){
		$cat_name=$_POST['cat_name'];
		$cat_desc=$_POST['cat_desc'];
		$cat_insert="insert into categories(`cat_title`, `cat_desc`) values('$cat_name','$cat_desc')";
		$cat_run=mysqli_query($db,$cat_insert);
		if($cat_run==true){
			echo"<script>alert('Product Categories Added Successful' ), window.open('index.php?insert_cat', '_self')</script>";
		}
		
	}
	 ?>
            <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                            <h2>Insert Categories:</h2>
                    </div><!---Box header End---><br>
                    <form action="index.php?insert_cat" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Category Name :</label>
                            <input type="text" name="cat_name" required placeholder="Enter Categories .." class="form-control">
                        </div>
						<div class="form-group">
                            <label> Category Description :</label>
							<textarea  name="cat_desc" required placeholder="Enter Product Categories Description .." class="form-control"></textarea>
                        </div>

                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-delete"></i> Reset Data
                            </button>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Submit
                            </button>
                        </div>
                    </form>
                 </div><!--- Box End--->
        <?php
}
function view_cat(){
	global $db;
	$get_cat="select * from categories";
		$run_cat=mysqli_query($db,$get_cat);
	
			?>
            <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                            <h2>View  Categories:</h2>
                    </div><!---Box header End---><br>
                 
                        <div class="form-group">
                            <label>Categories :</label>
                            <select name="name" class="form-control">
								<?php while($result=mysqli_fetch_array($run_cat)){
									$cat_title=$result['cat_title'];
									
								echo"
								<option>$cat_title</option>
								
								";
								}?>
							</select>
                        </div>

                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-pencil"></i> Edit Data
                            </button>
                            <button type="submit" name="send_message" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Go Back
                            </button>
                        </div>
                   
                 </div><!--- Box End--->
	<?php
}

function insert_slider(){
	global $db;
	if(isset($_POST['submit'])){
	$slider_name=$_POST['slider_name'];
	$slider_img=$_FILES['slider_img']['name'];
    
    $slider_temp=$_FILES['slider_img']['tmp_name'];
	 move_uploaded_file($slider_temp, "../slider_image/$slider_img");
	
	$insert_slider="insert into slider(`slider_name`, `slider_image`) values('$slider_name','$slider_img')";
	$run_slider=mysqli_query($db,$insert_slider);
	if($run_slider==true){
		echo"<script>alert('New Slider Insert Successful')</script>";
	}
	else{
		echo"<script>alert('New Slider Insert Error !!!')</script>";
	}
	}
	?>
 <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                            <h2>Insert Slider:</h2>
                    </div><!---Box header End---><br>
                    <form action="index.php?insert_slider" method="post" enctype="multipart/form-data">
						<div class="form-group">
                            <label class="col-md-3 control-lable">Slider Name </label>
                            <input type="text" name="slider_name" class="form-control" required>
                        </div>
						<div class="form-group">
                            <label class="col-md-3 control-lable">Slider Image </label>
                            <input type="file" name="slider_img" class="form-control" required>
                        </div>
                       

                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-delete"></i> Reset Data
                            </button>
                            <button type="submit" name="submit" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Submit
                            </button>
                        </div>
                    </form>
                 </div><!--- Box End--->
        <?php
}
function view_slider(){
	global $db;
	$get_slider="select * from slider";
	$run_slider=mysqli_query($db,$get_slider);
	?>
<div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                            <h2>View Site Banner Slider:</h2>
	</div><!---Box header End---><br></div>

	<?php $x=1; while($slider=mysqli_fetch_array($run_slider)){
		 $slider_name=$slider['slider_name'];
		 $slider_img=$slider['slider_image'];
		echo"
<div class='col-lg-3 col-md-6'><!-- col-lg-3 col-md-6 start -->
            <div class='panel panel-success'><!--panel panel-primary start -->
                <div class='panel-heading'><!--panel-heading start-->
                    <div class='row'><!-- inside panel-heading row start-->
                       <!--col-xs-3 End -->
                        <div class='col-xs-12 text-left'><!-- col-xs-9 Start-->
                           
                            <div>$slider_name <span class='badge pull-right'>$x </span></div>
                        </div><!--col-xs- 9 End -->
                        
                    </div><!-- inside panel-heading row End--><!-- -->
                </div><!--panel-heading End -->
                <a href='index.php?edit_slider' ><!-- Page link start -->
				<div class='panel-body'>
				<span class='pull-left'><img style='border-radius:3px' src='../slider_image/$slider_img' class='img-responsive'></span>
				</div>
                    <div class='panel-footer'><!--panel-footer Start -->
                        
						<span class='pull-left'>View Ditails</span>
                        <span class='pull-right'><i class='fa fa-arrow-circle-right'></i></span>
						<div class='clearfix'></div>
                    </div><!--panel-footer End -->
                </a><!--page link End -->
            
            </div><!--panel panel-primary End-->
        
        </div><!--col-lg-3 col-md-6 end -->";

         
$x++;

}
}

function insert_user(){
	global $db;
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
    
    move_uploaded_file($c_tmp_img,"../customer/customer_images/$c_img");
    
    $c_insert="insert into customers(ac_status,customer_name,customer_email,customer_pass,customer_country,customer_state,customer_city,customer_contact,customer_address,customer_img,customer_ip) values('$ac_status','$c_name','$c_email','$c_passward','$c_country','$c_state','$c_city','$c_mobile','$c_address','$c_img','$c_ip')";
    
    $run_insert=mysqli_query($db,$c_insert);
    if($run_insert==true){
        ?>
        <script>
            alert('Your Registration has been Complate sucessfull , Go To Login and Manage Our Dashbord'),
            window.open('index.php?insert_user','_Self');
</script>
<?php
        }
       
    else{
        ?>
        <script>
            alert('Sorry !! Registration UnSucsessfull !!', '_self'), window.open('index.php?insert_user','_Self');
            
</script>
<?php
    }
    
    
   
}
	?> 
	<div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                        <div class="row">
                       <h2 class="col-md-8">Customber Registration:</h2> 
                            <p class="col-md-4">
                           Support Help Desk : <br>
                                +918502926163,+918209538083<br>
                                +919413772885,+918000839163<br>
                                info.help@myecom.com
                            </p>
                        </div>
                    </div><!---Box header End---> <br>
                    <form action="index.php?insert_user" method="post" enctype="multipart/form-data">
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
                            <input type="text" name="c_passward" required placeholder="***********" class="form-control">
                        </div>
                         <div class="form-group">
                            <label>Customer Mobile No.</label>
                            <input type="number" name="c_mobile" required class="form-control" placeholder="850XXXXX3">
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
                            <input type="file" name="c_img" required  class="form-control">
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
<?php

}
function view_user(){
	global $db;
	?> 
	<div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                        <div class="row">
                       <h2 class="col-md-8">View Users(Sellers):</h2> <br>
							<div class="col-md-4">
						<a href="index.php?dashboard" ><button type="button" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Go Back</button></a>
						<a href="index.php?v-a-u-d" ><button type="button" class="btn btn-warning"> More Ditails <i class="fa fa-arrow-circle-right"></i></button></a>
							</div>
                            
                        </div>
                    </div><!---Box header End---> 
		<div class="table-responsive">
        <table class="table table-bordered table-hover">
			<thead>
				<tr>
				<th>Sr.No</th>
			  <th>Customer/Seller Id</th>
			  <th>Customer/Seller Name</th>
			  <th>Customer/Seller Join</th>
			  <th>Customer/Seller AC Status</th>
			  <th>Customer/Seller Email</th>
			  <th>Customer/Seller Orders</th>
			  <th>Customer/Seller Cancled Orders</th>
				</tr>
			 
			
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>16</td>
					<td>Rameshwar sankhi</td>
					<td>17/10/20</td>
					<td>Open</td>
					<td>Admin@gmail.com</td>
					<td>15</td>
					<td>10</td>
				</tr><tr>
					<td>1</td>
					<td>16</td>
					<td>Rameshwar sankhi</td>
					<td>17/10/20</td>
					<td>Open</td>
					<td>Admin@gmail.com</td>
					<td>15</td>
					<td>10</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
		
		<?php
}

function view_customer(){
	global $db;
	?> 
	<div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                        <div class="row">
                       <h2 class="col-md-8">View Customers:</h2> <br>
							<div class="col-md-4">
						<a href="index.php?dashboard" ><button type="button" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Go Back</button></a>
						<a href="index.php?v-a-u-d" ><button type="button" class="btn btn-warning"> More Ditails <i class="fa fa-arrow-circle-right"></i></button></a>
							</div>
                            
                        </div>
                    </div><!---Box header End---> 
		<div class="table-responsive">
        <table class="table table-bordered table-hover">
			<thead>
				<tr>
				<th>Sr.No</th>
			  <th>Customer Id</th>
			  <th>Customer Name</th>
			  <th>Customer Join</th>
			  <th>Customer AC Status</th>
			  <th>Customer Email</th>
			  <th>Customer Orders</th>
			  <th>Customer Cancled Orders</th>
				</tr>
			 
			
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>16</td>
					<td>Rameshwar sankhi</td>
					<td>17/10/20</td>
					<td>Open</td>
					<td>Admin@gmail.com</td>
					<td>15</td>
					<td>10</td>
				</tr><tr>
					<td>1</td>
					<td>16</td>
					<td>Rameshwar sankhi</td>
					<td>17/10/20</td>
					<td>Open</td>
					<td>Admin@gmail.com</td>
					<td>15</td>
					<td>10</td>
				</tr>
			</tbody>
		</table>
		</div>
	</div>
		
		<?php
}

function edit_profile(){
    global $db;
    ?>
        <h1 class="page-header">User Profile</h1>
        <ol class="breadcrumb">
    <li class="active">
        <i class="fa fa-dashboard"></i> Dashboard / User Profile
    </li>
</ol>
        <form action="index.php?edit_profile" method="post" enctype="multipart/form-data">
<div class="row"><!-- show ditails first row start-->
    <div class="col-md-5 col-lg-3 hidden-xs"><br><img src="#" alt="admin-picture"></div>
    <center>
    <div class="col-md-5 col-lg-3 visible-xs"><br><img src="#" alt="admin-picture"><br><br></div></center>
     <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
         <div class="row"> 
             <div class="row">
                <div class="col-md-5 col-lg-6 form-group">

                    <input class="form-control" name="message" value="Rameshwar Sankhi">
                 </div>
                 <div class="col-md-5 col-lg-6 form-group">
                    <input class="form-control" name="message" value="Join Date: 17/10/2001">
                 </div>
             </div>
             <div class="row">

                 <div class="col-md-5 col-lg-6 form-group">
                     <label>Aadhar NO.</label>
                    <input class="form-control" name="message" value="A/No. 616742563094">
                 </div>
             <div class="col-md-5 col-lg-6 form-group">
                 <label>PAN NO.</label>
                    <input class="form-control" name="message" value="PAN: MLXTYOU1222">
                 </div>
             </div>

        </div>
    </div><!--col-lg-7 End-->
</div><!-- show ditails first  row End--> <br>
<div class="row"><!-- show ditails first row start-->
        <div class="col-md-5 col-lg-3"><label class="hidden-xs">Address :</label></div>
         <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
             <div class="row"> 
                 <div class="row">
                 <div class="col-md-5 col-lg-6 form-group">
                     <label>Parmanent Address:</label>
                    <input class="form-control" name="message" value="Belwa Khatriya balesar Raj. (342023)">
                   </div>
                 <div class="col-md-5 col-lg-6 form-group">
                     <label>Current Address:</label>
                        <input class="form-control" name="message" value="Belwa Rawalgard  balesar Raj. (342023)">
                     </div>
                </div>
             </div>
        </div><!--col-lg-7 End-->
 </div><!-- show ditails first  row End-->
<div class="row"><!-- show ditails first row start-->
    <div class="col-md-5 col-lg-3"><br><label class="hidden-xs">Contact :</label></div>
         <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
             <div class="row">
                 <div class="row">
                 <div class="col-md- 5  col-lg-6 form-group">
                     <label>Phone No.</label>
                        <input class="form-control" name="message" value="02929 15220">
                    </div>
                 <div class="col-md-5 col-lg-6 form-group">
                      <label>Mobile No.</label>
                        <input class="form-control" name="message" value="+918502926163">
                </div>
                 </div>
            </div>
        </div><!--col-lg-7 End-->
 </div><!-- show ditails first  row End--><br>
 <div class="row"><!-- show ditails first row start-->
    <div class="col-md-5 col-lg-3"><label class="hidden-xs">Account Status:</label></div>
         <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
             <div class="row">
                 <div class="row">
                 <div class="col-md- 5  col-lg-6 form-group">
                     <label>Ac/Status :</label>
                        <input class="form-control" name="message" value="Pending">
                    </div>

                 </div>
            </div>
        </div><!--col-lg-7 End-->
 </div><!-- show ditails first  row End-->
<br>
<div class="row">
    <center>
         <a href="index.php?dashboard"><button type="button" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Go Back</button></a>
        <a href="index.php?edit_profile"><button type="submit" name="update" class="btn btn-danger">Update Profile <i class="fa fa-refresh"></i></button></a>
       </center>
</div>
   </form>
    <?php
}
function get_profile(){
    global $db;
    ?>
                                    <h1 class="page-header">User Profile</h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-dashboard"></i> Dashboard / User Profile
                                </li>
                            </ol>
                            <fieldset disabled>
                            <div class="row"><!-- show ditails first row start-->
                                <div class="col-md-5 col-lg-3 hidden-xs"><br><img src="#" alt="admin-picture"></div>
                                <center>
                                <div class="col-md-5 col-lg-3 visible-xs"><br><img src="#" alt="admin-picture"><br><br></div></center>
                                 <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
                                     <div class="row"> 
                                         <div class="row">
                                            <div class="col-md-5 col-lg-6 form-group">
                                                
                                                <input class="form-control" name="message" value="Rameshwar Sankhi">
                                             </div>
                                             <div class="col-md-5 col-lg-6 form-group">
                                                <input class="form-control" name="message" value="Join Date: 17/10/2001">
                                             </div>
                                         </div>
                                         <div class="row">
                                             
                                             <div class="col-md-5 col-lg-6 form-group">
                                                 <label>Aadhar NO.</label>
                                                <input class="form-control" name="message" value="A/No. 616742563094">
                                             </div>
                                         <div class="col-md-5 col-lg-6 form-group">
                                             <label>PAN NO.</label>
                                                <input class="form-control" name="message" value="PAN: MLXTYOU1222">
                                             </div>
                                         </div>

                                    </div>
                                </div><!--col-lg-7 End-->
                         </div><!-- show ditails first  row End--> <br>
                            <div class="row"><!-- show ditails first row start-->
                                    <div class="col-md-5 col-lg-3"><label class="hidden-xs">Address :</label></div>
                                     <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
                                         <div class="row"> 
                                             <div class="row">
                                             <div class="col-md-5 col-lg-6 form-group">
                                                 <label>Parmanent Address:</label>
                                                <input class="form-control" name="message" value="Belwa Khatriya balesar Raj. (342023)">
                                               </div>
                                             <div class="col-md-5 col-lg-6 form-group">
                                                 <label>Current Address:</label>
                                                    <input class="form-control" name="message" value="Belwa Rawalgard  balesar Raj. (342023)">
                                                 </div>
                                            </div>
                                         </div>
                                    </div><!--col-lg-7 End-->
                             </div><!-- show ditails first  row End-->
                            <div class="row"><!-- show ditails first row start-->
                                <div class="col-md-5 col-lg-3"><br><label class="hidden-xs">Contact :</label></div>
                                     <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
                                         <div class="row">
                                             <div class="row">
                                             <div class="col-md- 5  col-lg-6 form-group">
                                                 <label>Phone No.</label>
                                                    <input class="form-control" name="message" value="02929 15220">
                                                </div>
                                             <div class="col-md-5 col-lg-6 form-group">
                                                  <label>Mobile No.</label>
                                                    <input class="form-control" name="message" value="+918502926163">
                                            </div>
                                             </div>
                                        </div>
                                    </div><!--col-lg-7 End-->
                             </div><!-- show ditails first  row End--><br>
                             <div class="row"><!-- show ditails first row start-->
                                <div class="col-md-5 col-lg-3"><label class="hidden-xs">Account Status:</label></div>
                                     <div class="col-md-5 col-lg-7"><!--col-lg-7 start-->
                                         <div class="row">
                                             <div class="row">
                                             <div class="col-md- 5  col-lg-6 form-group">
                                                 <label>Ac/Status :</label>
                                                    <input class="form-control" name="message" value="Pending">
                                                </div>
                                            
                                             </div>
                                        </div>
                                    </div><!--col-lg-7 End-->
                             </div><!-- show ditails first  row End-->
                            </fieldset> <br>
                            <div class="row">
                                <center>
                                     <a href="index.php?dashboard"><button type="button" class="btn btn-success"><i class="fa fa-arrow-circle-left"></i> Go Back</button></a>
                                    <a href="index.php?edit_profile"><button type="submit" class="btn btn-danger">Edit Profile <i class="fa fa-arrow-circle-right"></i></button></a>
                                   </center>
                            </div>
    <?php
}

function get_orders(){};








?>