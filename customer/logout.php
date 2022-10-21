<?php
session_start();

session_destroy();
echo"<script>alert('logout successfull , Session Time Out' );window.open('../index.php','_self'); </script>";

?>