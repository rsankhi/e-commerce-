<?php
session_start();
 include_once('includes/db_con.php');
if(isset($_SESSION['admin_email'])==true){
   header('location:index.php?dashboard');
    exit();
}
else{
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login | My E-com</title>
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
<link rel="stylesheet" href="style/login.css">

    </head>
    <body><div class="blur"></div>
        <div class="container">
           <form class="form-login"  action="admin_login.php" method="post"><!-- login form start -->
                <h2 class="form-login-heading">Admin login</h2>
               <input  type="text" class="form-control" name="admin_email" placeholder="Enter Email" required>
               <input  type="password" class="form-control" name="admin_pass" placeholder="Enter Password" required>
               <button class="btn btn-lg btn-primary" type="submit" name="admin_login">Log In</button>
               <h4 class="forgot-password"> 
                   <a href="forgot_password.php">
                        Lost your password? Forgot Password.
                   </a>
               </h4>
        </form>
        </div>
        <?php
        
    
            if(isset($_POST['admin_login'])){
                $admin_email=mysqli_real_escape_string($con,$_POST['admin_email']);
                $admin_pass=mysqli_real_escape_string($con,$_POST['admin_pass']);
                
                $match_query="select * from admin where email='$admin_email' and password='$admin_pass' and ac_status='open'";
                $run_query=mysqli_query($con,$match_query);
                $row=mysqli_num_rows($run_query);
				$result=mysqli_fetch_array($run_query);
				$admin_job=$result['job'];
                
                if($row>0){
                    $_SESSION['admin_email']=$admin_email;
                    $_SESSION['admin_job']=$admin_job;
        ?> <script>alert('welcome to admin panel. ', '_self'), window.open('index.php?dashboard', '_self'); </script> <?php
                }
            else{
                ?> <script>alert('Alert !! Username and password Not Match  ', '_self') </script> <?php
            }
            }
        
        
        
        ?>
        
    </body> 
</html>
<?php } ?>