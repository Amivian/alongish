<?php 
session_start();
require('admin.php');
$id = $_GET['id'];
$obj = new Admin;
$output = $obj->deleteRequest($id);
if($output){
    $_SESSION['message']= "Record deleted successfully";
    header("location: request-listing.php");
    exit();
}else{
    $_SESSION['message'] ="Record Not Deleted, Try Again";
    header("location: request-listing.php");
    exit();
}


 ?> 