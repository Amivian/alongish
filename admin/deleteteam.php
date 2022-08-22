<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteTeam($id);
if ($output) {
    $msg= "Member deleted Successfully";
    header("location:my-team.php?msg=".$msg);
}else{
    $mssg= "Error deleting record, try again";
    header("location:my-team.php?mssg=".$mssg);
}


 ?> 