<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deletejointVenture($id);

  if ($output) {
            $msg= "Listing deleted Successfully";
            header("location:my-Venture.php?msg=".$msg);
        }else{
            $mssg= "Error deleting record, try again";
            header("location:my-Venture.php?mssg=".$mssg);
        }

 ?>