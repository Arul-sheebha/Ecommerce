<!--admin_logout.php-->
<?php
session_start();
session_destroy();
session_unset();
echo "<script>alert('admin successfully logged out')</script>";
echo "<script>window.open('admin_login.php','_self')</script>";
?>