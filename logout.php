<?php
session_start();
session_destroy();
session_start();
//Redirect with success message
$_SESSION['message'] = 'Logged out successfully';
header('location:login.php');
exit();
?>