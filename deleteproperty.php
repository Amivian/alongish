<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteProperty($id);

  if ($output) {
            $msg= "Property deleted Successfully";
            header("location:my-listings.php?msg=".urlencode(base64_encode($msg)));
        }else{
            $msg= "Error deleting record, try again";
            header("location:my-listings.php?mssg=".urlencode(base64_encode($msg)));
        }

 ?>