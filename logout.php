<?php 
 session_start();
 $_SESSION['emailUser'];
 unset($_SESSION['emailUser']);

 session_unset();
 session_destroy();
 header("location:login.php");
?>