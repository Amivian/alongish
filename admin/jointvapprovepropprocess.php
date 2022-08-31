<?php 
session_start();
require('property.php');

if (isset($_POST['jstatus'])) {
    $iddd = $_POST['idd'];
    $staty = $_POST['staty'];
$obj = new Property;
$output= $obj->statusJointVenture($iddd,$staty);

if($output) {
 $_SESSION['message'] = "Property Status Changed Successfully";
      header("Location:manage-ventures.php");
    exit();
  }else{
   $_SESSION['message'] = "Failed to Approve Property, Try again";
      header("Location: manage-ventures.php");
    exit();
  }

}

 ?>