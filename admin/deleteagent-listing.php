<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteAgentProperty($id);
if ($output) {
        $msg= "Listing deleted Successfully";
        header("location:manage-properties.php?msg=".$msg);
    }else{
        $mssg= "Error deleting record, try again";
        header("location:manage-properties.php?mssg=".$mssg);
    }

 ?> 