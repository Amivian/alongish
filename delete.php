<?php 
session_start();
require('admin/property.php');
$id = $_GET['id'];
$obj = new admin\Property;
$output = $obj->delete($id);

if($output) {
  $_SESSION['message'] = "Deleted Successfully";
    header("Location:dashboard.php");
exit();
}else{
  $_SESSION['message'] = "Failed to delete";
    header("Location:dashboard.php");
    // echo $msg;
  exit();
}

 ?>