<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deletesms($id);
if($output) {
    $msg = "Message deleted successfully";
      header("Location:my-contact-messages.php?msg=".$msg);
  exit();
  }else{
    $msg = "Failed to delete";
      header("Location:my-contact-messages.php?msg=".$mg);
      // echo $msg;
    exit();
  }
 ?>