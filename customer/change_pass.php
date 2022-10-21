<?php
include_once('includes/db_con.php');
 include_once('functions/functions.php');

if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
else{ 
    $customer_email=$_SESSION['customer_email'];
    if(isset($_POST['update'])){
    $old_pass=$_POST['old_passward'];
    $new_pass_1=$_POST['new_passward1'];
    $new_pass_2=$_POST['new_passward2'];
        
        $get_old_pass="select * from customers where customer_email='$customer_email' AND customer_pass='$old_pass'";
        $run_old_pass=mysqli_query($con,$get_old_pass);
    $num_rows=mysqli_num_rows($run_old_pass);
        if($num_rows==0){
            ?><script>alert('Current Passward Is Not Match !! Try again.', '_self'),window.open('my_account.php?change_pass', '_self')</script> <?php
            exit();
        }
       if($new_pass_1!==$new_pass_2){
           ?><script>alert("New Passward don't Match with New Passward !! Try again."),window.open('my_account.php?change_pass', '_self')</script> <?php
           exit();
       }
        else{
            $update_pass="update customers set customer_pass='$new_pass_2' where customer_email='$customer_email' AND customer_pass='$old_pass'";
            $run_update_pass=mysqli_query($con,$update_pass);
            ?><script>alert("Passward Changes Successfull.", "_self"),window.open('my_account.php?my_order', '_self')</script> <?php
        }
    }
?>
<div class="box">
    <center><h3>Change Your Passward :</h3></center>
    <form action="my_account.php?change_pass" method="post">
        <div class="from-group">
            <label>Enter Current Passward</label>
            <input type="password" name="old_passward" class="form-control" required>
        </div>
        <div class="from-group">
            <label>Enter New Passward</label>
            <input type="password" name="new_passward1" class="form-control" required>
        </div>
        <div class="from-group">
            <label>Re-Enter New Passward</label>
            <input type="password" name="new_passward2" class="form-control" required>
        </div>
        <div class="from-group">
            <br>
            <button type="submit" class="btn btn-primary " name="update">Change Passward</button>
            
        </div>
    </form>
</div>
<?php } ?>