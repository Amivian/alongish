<?php 
session_start();
require('property.php');
$id = $_GET['id'];
$obj = new admin\Property;
$output = $obj->deleteAgentSwap($id);
if ($output) {
    $_SESSION['message']= "Swap deleted Successfully";
    header("location:manageswaps.php");
    exit();
}else{
    $_SESSION['message']= "Error deleting record, try again";
    header("location:manageswaps.php");
    exit();
}


 ?> 