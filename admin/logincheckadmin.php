<?php
if (isset($_POST['submit'])) {
    $username = $_POST['email'];
    $password = $_POST['pass'];

    
    $admin = new admin\Admin;
    $admin->login_admin($username, $password);
}
