<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
$other = htmlentities(strip_tags($_POST['other']));
$address = htmlentities(strip_tags($_POST['address']));
$status = $_POST['status']; 
$type = $_POST['type']; 
$bed= $_POST['bed'];
$furnished = $_POST['furnish'];
$serviced = $_POST['service'];
$shared = $_POST['share'];
$state =  $_POST['state'];
$city =$_POST['city'];
$fname = htmlentities(strip_tags($_POST['fname']));
$phone = htmlentities(strip_tags($_POST['phone']));
$email = htmlentities(strip_tags($_POST['email']));
 
$obj = new Property;
$output= $obj->propertyRequest($other,$address,$status,$type,$bed,$furnished,$serviced,$shared,$state,$city,$fname, $phone,$email);

if($output) {
  $msg = "Request sent successfully, we will get back to you.";
      header("Location: request.php?msg=".$msg);
    exit();
  }else{
    $msg = "Request failed, Try again";
      header("Location: request.php?msg=".$msg);
    exit();
  }

}

 ?>