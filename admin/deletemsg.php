<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->delete($id);
if($output) {
    $msg = "Sponsorship Message deleted successfully";
      header("Location:my-messages.php?msg=".$msg);
  exit();
  }else{
    $msg = "Failed to delete";
      header("Location:my-messages.php?msg=".$mg);
      // echo $msg;
    exit();
  }
 ?>