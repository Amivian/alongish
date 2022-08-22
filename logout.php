<?php
session_start();
session_destroy();
//Redirect with success message
$mg = 'mg';
header('location:login.php?mg=' . urlencode(base64_encode("You have been successfully logged out!")));
exit();
?>