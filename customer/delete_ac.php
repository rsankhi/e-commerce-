<?php
include_once('includes/db_con.php');
 include_once('functions/functions.php');
if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
?>
<div  class="box">
    <center>
        <h4>Really You Want to Delete This Account. ?</h4>
    <hr>
    <form action="my_account.php?delete_ac" method="post">
        <input type="submit" name="yes" value="Yes, I want To delete " class="btn btn-danger">
        <input type="submit" name="No" value="No, I Don't want " class="btn btn-primary">
    </form>
    </center>
</div>
<?php
if(isset($_POST['yes'])){
$customer_email=$_SESSION['customer_email'];
$delete_ac="update customers set ac_status='close' where customer_email='$customer_email' "     ;
$run_delete=mysqli_query($con,$delete_ac);

if($run_delete==true){
    session_destroy();
    ?><script>alert('Your account has been successfully deleted. If you want to re-start your account,then contact to support team. ','_self'),window.open('../checkout.php', '_self')</script><?php
}
else{
    ?><script>alert('Sorry Something is Rong.. Try Again','_self'),window.open('my_account.php?my_order', '_self')</script><?php
}
}
if(isset($_POST['No'])){
   ?><script> window.open('my_account.php?my_order', '_self') </script><?php
}
?>
