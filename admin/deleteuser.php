<?php
session_start();
include 'admin.php';
$obj1 = new admin\Admin;
$id = $_GET['id'];
$output = $obj1->deleteUser($id);
 if ($output) {
        $_SESSION['message'] = "User Deleted Successfully";
        header("location: reguser.php");
        exit();
    }else{
    $_SESSION['message']= "Error deleting record, try again";
    header("location: reguser.php");
    exit();
}
