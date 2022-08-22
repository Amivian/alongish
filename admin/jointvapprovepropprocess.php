<?php 
session_start();
require('property.php');

if (isset($_POST['jstatus'])) {
    $iddd = $_POST['idd'];
    $staty = $_POST['staty'];
$obj = new Property;
$output= $obj->statusJointVenture($iddd,$staty);

if($output) {
  $msg = "Property Status Changed Successfully";
      header("Location:manage-ventures.php?msg=".$msg);
    exit();
  }else{
    $msg = "Failed to Approve Property, Try again";
      header("Location: manage-ventures.php?msg=".$msg);
    exit();
  }

}

 ?>