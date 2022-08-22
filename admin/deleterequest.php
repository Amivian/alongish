<?php 
require('admin.php');
$id = $_GET['id'];
$obj = new Admin;
$output = $obj->deleteRequest($id);
if($output){
    $msg= "Record deleted successfully";
    header("location: request-listing.php?msg=".$msg);
}else{
    $mssg ="Record Not Deleted, Try Again";
    header("location: request-listing.php?mssg=".$mssg);
}


 ?> 