<?php 
session_start();
require('property.php');

if (isset($_POST['jmstatus'])) {
    $iddd = $_POST['idd'];
    $staty = $_POST['staty'];
$obj = new Property;
$output= $obj->statusVentureM($iddd,$staty);

if($output) {
  $_SESSION['message'] = "Property Status Changed Successfully";
      header("Location:managejointmessages.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to Approve Property, Try again";
      header("Location: managejointmessages.php");
    exit();
  }

}

 ?>