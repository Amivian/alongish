<?php 
session_start();
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->delete($id);
if($output) {
  $_SESSION['message']= "Sponsorship Message deleted successfully";
      header("Location:my-messages.php");
  exit();
  }else{
    $_SESSION['message'] = "Failed to delete";
      header("Location:my-messages.php");
    exit();
  }
 ?>