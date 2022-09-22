<?php 
session_start();
require('property.php');
$id = $_GET['id'];
$obj = new admin\Property;
$output = $obj->delete($id);
if($output) {
    $_SESSION['message']= "Sponsorship Message deleted successfully";
      header("Location:managejointmessages.php");
  exit();
  }else{
    $_SESSION['message']= "Failed to delete";
      header("Location:managejointmessages.php");
    exit();
  }
 ?>