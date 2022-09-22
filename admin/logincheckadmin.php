<?php
require "admin.php";
$admin = new admin\Admin;
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['pass'];

    $output = $admin->login_admin($username, $password);
    if ($output) {
        header('location:admindashboard.php');
    } else {
        $_SESSION['message'] = "Invalid Username or Password";
        header('location:index.php');
    }
}
