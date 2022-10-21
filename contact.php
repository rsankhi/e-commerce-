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
    
    <!-- Page Diraction path --->
        <div id="content"><!----- Content ---start-->
         <div class="container"><!----- container ---start-->
            <div class="col-md-12"><!-- col-md-12- start--->
                <ul class="breadcrumb">
                    <li><a href="index.php">&laquo; HOME</a></li>
                    <li>Cart</li>
                </ul>
            </div><!-- col-md-12- End--->
             <div class="col-md-3"><!--sidebar col-md-3 start ---->
                <?php include_once("includes/sidebar.php"); ?>
             </div><!--sidebar col-md-3 end ---->
             
             <div class="col-md-9"><!---col-md-9 start--->
                <div class="box"><!---Box start--->
                    <div class="box-header"><!---Box Header start--->
                        <div class="row">
                       <h2 class="col-md-8">Contact Us :<p style="font-size:12px;margin-top:5px">Send Mail To admin and Explain Your Query</p><p style="font-size:12px;margin-bottom:-15px">Admin : My E-Com</p></h2>
                            <p class="col-md-4">
                           Support Help Desk : <br>
                                +918502926163,+918209538083<br>
                                +919413772885,+919461646954<br>
                                infohelp@myecom.com
                            </p>
                        </div>
                    </div><!---Box header End--->
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label> Name :</label>
                            <input type="text" name="name" required placeholder="Enter Your Name .." class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required class="form-control" placeholder="user@gmail.com" >
                        </div>
                          <div class="form-group">
                            <label>Mobile No.</label>
                             
                            <input type="number" name="mobile_number" class="form-control" required placeholder="856349XXX86" >
                        </div>
                        <div class="form-group">
                            <label>Subject</label>
                            <input type="text" name="subject" class="form-control" required placeholder="@help" >
                        </div>
                        <div class="form-group">
                            <label>Message :</label>
                            <textarea class="form-control" name="message" placeholder="write your message or question ................."></textarea>
                        </div>
                        <div class="text-center">
                            <button type="reset" name="reset" class="btn btn-default">
                                <i class="fa fa-delete"></i> Reset Data
                            </button>
                            <button type="submit" name="send_message" class="btn btn-primary">
                                <i class="fa fa-user-md"></i> Send Message
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
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </body>
</html>
<?php
    if(isset($_POST['send_message'])){
        /*Send Message customer  To admin */
       
        $to_mail="sankhirameshwa85029@gmail.com";
        $from_email=$_POST['email'];
        $sender_email="From: ".$from_email;
        $sender_name=$_POST['name'];$sender_mobileNumber=$_POST['mobile_number'];$sender_subject=$_POST['subject'];
        $sender_message=$_POST['message'];
        $send_message="[".$sender_name."][".$sender_mobileNumber."][".$sender_message."]";
        mail($to_email,$sender_subject,$send_message,$from_email);
        
    //admin to  Coustomer mail
        if(mail==true){
        $to_email= $_POST['email'];
        $from="From: sankhirameshwa85029@gmail.com";
        $subject="Welcome To Our Website";
        $msg="I shall get you soon, thanks for sending message";
        
        mail($to_email,$subject,$msg,$from);
        
    
        ?>
<script>alert('Your Mail has been send secsessfull ', '_Self')</script>
<?php
    }
    }



?>


