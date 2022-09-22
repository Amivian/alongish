<?php
if(isset($_POST['new-password'])) 
{
    $pwd = strtolower(htmlspecialchars(strip_tags($_POST['pwd'])));
    $cpwd = strtolower(htmlspecialchars(strip_tags($_POST['cpwd'])));

    $user = new User;
    $output = $user->createNewPassword($pwd,$cpwd);
    if($output){
        $_SESSION['info']="Password changed Successfully. Kindly proceed to login with the new password.";    
        header('Location: password-changed.php');
        exit();
    }else if ($output){
        $_SESSION['info']= "Failed to change your password!";
        header('Location: new-password.php');
        exit();
    }else{
        $_SESSION['info']="Confirm password not matched!";    
        header('Location: new-password.php');
        exit();
    }
}
?>
