<?php 
session_start();
require('property.php');

if (isset($_POST['pstatus'])) {
    $iddd = $_POST['idd'];
    $staty = $_POST['staty'];
$obj = new Property;
$output= $obj->statusProperty($iddd,$staty);

if($output) {
  $_SESSION['message'] = "Property Status Changed Successfully";
      header("Location:manage-properties.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to Approve Property, Try again";
      header("Location: manage-properties.php");
    exit();
  }

}

 ?>