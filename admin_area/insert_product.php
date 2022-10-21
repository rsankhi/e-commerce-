<?php
    include('includes/db_con.php');

?>
<!DOCTYPE html>
<html>
<head>
    <!-- tinycode editor --->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
    
    <!-- tinycode editor End --->
    <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script 
src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
</script>

    <!---- font awesome cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/style.css">
    <title> Insert Product</title>
    </head>
<body>
    <div class="row"> <!---start top row --->
        <div class="breadcrumb"><!--start bradcrumb page direction path ---->
            <li class="active">
                <i class="fa fa-dashboard"></i>
                Dashboard \ Insert Product
            </li>
        </div>    <!--End bradcrumb page direction path ---->
    </div><!---End top row --->
    
    <div class="row"><!---start row --->
        <div class="col-lg-3"></div>
        <div class="col-lg-6"> <!--- col-lg-12 start--->
            <div class="panel panel-deafualt"> <!-- start panel -->
                <div class="panel panel-heading"><!---panel -heading--start----->
                    <h3> <i clsss="fa fa-money fa-w"></i> Insert Product
                    </h3>
                </div><!----end panel haeading----->
                <div class="panel-body">
                    <form action="insert_product.php" method="post" enctype="multipart/form-data">
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
                                $run_p_cats=mysqli_query($con,$get_p_cats);
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
                                $run_cats=mysqli_query($con,$get_cats);
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
                            <label class="col-md-3 control-lable">Product price</label>
                            <input type="number" name="product_price" class="form-control" required>
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
                            <input type="reset" name="reset" class="btm btn-default form-control" Value="Reset Form Value"> <br>
                            <input type="submit" name="submit" class="btm btn-primary form-control" >
                        </center>
                      </div>
                    </form> 
                </div>
            </div> <!--end panel---->
        </div><!--- col-lg-12 end -0--->
             <div class="col-lg-3"></div>
    </div><!---End row --->
        
    </body>
</html>

<?php
if(isset($_POST['submit'])){
    $product_title=$_POST['product_title'];
    $product_cat=$_POST['product_cat'];
    $categories=$_POST['cat'];
    $product_price=$_POST['product_price'];
    $product_keyword=$_POST['product_keyword'];
    $product_desc=$_POST['product_desc'];
    
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];
    
    $temp_name1=$_FILES['product_img1']['tmp_name'];
    $temp_name2=$_FILES['product_img2']['tmp_name'];
    $temp_name3=$_FILES['product_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1, "product_images/$product_img1");
    move_uploaded_file($temp_name2, "product_images/$product_img2");
    move_uploaded_file($temp_name3, "product_images/$product_img3");
    
    $insert_product="INSERT INTO `products`(`p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keyward`) VALUES ('$product_cat','$categories',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword')";
    
    $run_product=mysqli_query($con,$insert_product);
    
    if($run_product==true){
        echo"<script>alert('product Insert Successfull') </script>";
        echo"<script> window.open('insert_product.php') </script>";
    }
    else{
         echo"<script>alert('product Insert Error') </script>";
        echo"<script> window.open('insert_product.php') </script>";
    }
}

?>