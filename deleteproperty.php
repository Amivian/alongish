<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteProperty($id);

  if ($output) {
            $msg= "Listing deleted Successfully";
            header("location:my-listings.php?msg=".$msg);
        }else{
            $mssg= "Error deleting record, try again";
            header("location:my-listings.php?mssg=".$mssg);
        }

 ?>