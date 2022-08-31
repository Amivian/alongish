<?php 
session_start();
require('property.php');

if(isset($_POST['btn'])) {
$fname = htmlentities(strip_tags($_POST['name']));
$pic_array = $_FILES['image'];

$obj = new Property;
$output= $obj->addPartner($fname,$pic_array);
if($output) {
  $_SESSION['message'] = "Partner added successfully";
      header("Location: our-partner.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to add Partner, Try again";
      header("Location:our-partner.php");
    exit();
  }

}

 ?>