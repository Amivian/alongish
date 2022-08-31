<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deletejointVenture($id);

if($output) {
    $_SESSION['message'] = "Property Deleted successfully";
        header("location:my-venture.php");
      exit();
    }else{
      $_SESSION['message'] = "Failed to Delete Property, Try again";
        header("location:my-venture.php");
      exit();
    }

 ?>