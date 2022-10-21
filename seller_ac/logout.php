<?php
session_start();
session_destroy();
echo"<script>alert('Logout Successfull.', '_self'),window.open('index.php?dashboard', '_self')</script>";
exit();


?>