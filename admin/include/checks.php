<?php
    session_start();

    if ($_SESSION['user_type'] != 'admin') {
        header('location:index.php');
    
        $_SESSION = [];
        exit();
    }

    require('admin.php'); 
    $obj = new admin\Admin;
    $k = $obj->getAdmin($_SESSION['id']);
    $agent_id=$_SESSION['id'];

    $pix= $k['a_pix'];
    if (empty($pix)) {
        $pix = 'avatar.png';
    }


?>