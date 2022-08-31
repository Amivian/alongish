<?php 
session_start();
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deletesms($id);
if($output) {
    $_SESSION['message'] = "Message deleted successfully";
      header("Location:my-contact-messages.php");
  exit();
  }else{
    $_SESSION['message'] = "Failed to delete";
      header("Location:my-contact-messages.php");
      // echo $msg;
    exit();
  }
 ?>