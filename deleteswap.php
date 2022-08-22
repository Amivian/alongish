<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteSwap($id);
if($output){                
    $msg= "Swap deleted Successfully";
    header("location:my-swaps.php?msg=".$msg);
    }
else{
    $mssg= "Error deleting record, try again";
    header("location:my-swaps.php?mssg=".$mssg);
}

 ?> 