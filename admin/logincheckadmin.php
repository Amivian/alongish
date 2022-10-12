<?php
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['pass'];

    
    $admin = new admin\Admin;
    $output = $admin->login_admin($username, $password);
    if ($output) {
        header("Location: admindashboard.php");
        exit();
    } else {
        $_SESSION['message'] = "Invalid Username or Password";
    }
}
