<?php 
session_start();
require "users.php";
if(isset($_POST['forgot'])) {
    $email = strtolower(htmlspecialchars(strip_tags($_POST['email'])));
    
    $user = new User;
    $output = $user->forgotPassword($email);
 }
?>