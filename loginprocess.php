<?php
if (isset($_POST['login'])) {
    $email = strtolower(htmlspecialchars(strip_tags($_POST['email'])));
    $uname = strtolower(htmlspecialchars(strip_tags($_POST['email'])));
    $pwd = strtolower(htmlspecialchars(strip_tags($_POST['password'])));

    $user = new User;
    $output = $user->loginUser($email, $uname, $pwd);
    if ($output) {
        header("Location: dashboard.php");
        exit();
    } else {
        $_SESSION['message'] = 'Username or Password is Invalid';
    }
}
