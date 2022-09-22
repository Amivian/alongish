<?php 
session_start();
require('property.php');
$id = $_GET['id'];
$obj = new admin\Property;
$output = $obj->deleteTeam($id);
if ($output) {
    $_SESSION['message']= "Member deleted Successfully";
    header("location:my-team.php");
    exit();
}else{
    $_SESSION['message']= "Error deleting record, try again";
    header("location:my-team.php");
    exit();
}


 ?> 