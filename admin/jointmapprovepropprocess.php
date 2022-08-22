<?php 
session_start();
require('property.php');

if (isset($_POST['jmstatus'])) {
    $iddd = $_POST['idd'];
    $staty = $_POST['staty'];
$obj = new Property;
$output= $obj->statusVentureM($iddd,$staty);

if($output) {
  $msg = "Property Status Changed Successfully";
      header("Location:managejointmessages.php?msg=".$msg);
    exit();
  }else{
    $msg = "Failed to Approve Property, Try again";
      header("Location: managejointmessages.php?msg=".$msg);
    exit();
  }

}

 ?>