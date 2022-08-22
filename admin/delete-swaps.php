<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteAgentSwap($id);
if ($output) {
    $msg= "Swap deleted Successfully";
    header("location:manageswaps.php?msg=".$msg);
}else{
    $mssg= "Error deleting record, try again";
    header("location:manageswaps.php?mssg=".$mssg);
}


 ?> 