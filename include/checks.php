<?php
session_start();
if (empty($_SESSION['id'])) {
    header('location:login.php');

    $_SESSION = [];
    exit();
} else {
    require 'users.php';
    $obj = new User;
    $k = $obj->getUser($_SESSION['id']);

    $agent_id = $_SESSION['id'];

    $pix = $k['a_pix'];
    if (empty($pix)) {
        $pix = 'avatar.png';
    }
}
