<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
  if(isset($_POST['title'])){
    $title = htmlentities(strip_tags($_POST['title']));
  }
  $prodesc = htmlentities(strip_tags($_POST['pro-desc']));
  $price = htmlentities(strip_tags($_POST['price']));
  $area = htmlentities(($_POST['area']));
  $address = htmlentities(strip_tags($_POST['address']));
  $images = $_FILES['images'];
  $status = $_POST['status']; 
  $type = $_POST['type']; 
  $bedrooms = $_POST['bed'];
  $furnished = $_POST['furnish'];
  $serviced = $_POST['service'];
  $shared = $_POST['share'];
  $state =  $_POST['state'];
  $city = $_POST['city'];
  $bathrooms =$_POST['bath'];
   
  if(isset($_POST['extra'])){
      $extra = $_POST['extra'];
      }else{
    $extra =array();
  }
  

$pid =$_POST['p_id'];
$obj = new Property;
$output= $obj->editProperty($title,$prodesc,$price,$area,$address,$status, $type,$bedrooms, $furnished,$serviced, $shared ,$bathrooms,$state, $city,$extra,$images,$pid);

if($output) {
  $msg = "Property Edited successfully";
      header("Location: my-listings.php?msg=".$msg);
    exit();
  }else{
    $msg = "Failed to edit Property, Try again";
      header("Location: editlisting.php?msg=".$msg);
    exit();
  }

}

 ?>