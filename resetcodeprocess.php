<?php
if(isset($_POST['reset'])) {
    $code = htmlspecialchars(strip_tags($_POST['code']));
    
    $user = new User;
    $output = $user->resetCode($code);
    if($output){
        $_SESSION['message']='Please create a new password';
        header('location: new-password.php');
        exit();   
    }else{
        $_SESSION['error'] = "You've entered incorrect code!";
      header('location: reset-code.php');   
      exit(); 
    } 
}           
?>