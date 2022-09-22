<?php
require('admin.php');
    if(isset($_POST['reset']))
    {
        $code = htmlspecialchars(strip_tags($_POST['code']));
        
        $user = new admin\Admin;
        $output = $user->resetCode($code);
        if($output){
            $_SESSION['message']='Please create a new password';
            header('location: new-password.php');
            exit();   
        }else{
            $errors['otp-error'] = "You've entered an incorrect code!";
        }   
    } 
            
?>