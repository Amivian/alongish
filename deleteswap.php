<?php 
session_start();
require('admin/property.php');
$id = $_GET['id'];
$obj = new admin\Property;
$output = $obj->deleteSwap($id);
if($output){                
    $_SESSION['message']= "Swap deleted Successfully";
    header("location:my-swaps.php");
    exit();
    }
else{
    $_SESSION['message']= "Error deleting record, try again";
    header("location:my-swaps.php");
    exit();
}

 ?> 