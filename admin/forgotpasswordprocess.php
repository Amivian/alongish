<?php 
if(isset($_POST['forgot'])) {
    $email = strtolower(htmlspecialchars(strip_tags($_POST['email'])));    
    $user = new admin\Admin;
    $user->forgotPassword($email);
}
