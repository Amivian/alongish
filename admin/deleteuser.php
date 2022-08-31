<?php
session_start();
include 'admin.php';
$obj1 = new Admin;
$id = $_GET['id'];
$output = $obj1->deleteUser($id);
if (isset($_GET['delete'])) {
    if ($output) {
        $_SESSION['message'] = "Record Deleted Successfully";
        header("location: regusers.php");
        exit();
    }
    $_SESSION['message']= "Error deleting record, try again";
    header("location: regusers.php");
    exit();
}
