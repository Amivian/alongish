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

  if ($output) {
            $msg= "Listing deleted Successfully";
            header("?msg=".$msg);
        }else{
            $mssg= "Error deleting record, try again";
            header("location:my-venture.php?mssg=".$mssg);
        }

 ?>