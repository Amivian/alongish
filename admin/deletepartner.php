<?php 
session_start();
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deletePartner($id);
if($output) {
  $_SESSION['message']= "Partner deleted successfully";
      header("Location:our-partner.php");
  exit();
  }else{
    $_SESSION['message'] = "Failed to delete Partner";
      header("Location:our-partner.php");
    exit();
  }
 ?>