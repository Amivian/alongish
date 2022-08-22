<?php
session_start();
session_destroy();
//Redirect with success message
$msg = 'msg';
header('location:index.php?msg=' . urlencode(base64_encode("You have been successfully logged out!")));
exit();
?>