<?php

if(!isset($_SESSION['customer_email'])){
?><script>window.open('../checkout.php','_self') </script><?php
}
?>
<div class="box">
    <center>
        <h2>Pay Offline Using below Method </h2>
        <p>you have any question, please feel free to <a href="../contact.php">contact us, our customer service center is working for you 27/7.</a></p>
    
    </center>
    <hr>
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Bank Account Sitails</th>
                    <th>Paypal ID </th>
                    <th>Paytm Number </th>
                    <th>Goodle Pay/ UPI </th>
                    <th>phone Pe / UPI </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>122232111060XX</td>
                    <td>xxxxxx</td> 
                    <td>82095380XX</td>
                    <td>82095380XX</td>
                    <td>82095380XX@ulb</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>