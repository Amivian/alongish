<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
$userid=$_POST['a_id'];
$staff=$_POST['staff'];
$title = htmlentities(strip_tags($_POST['title']));
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
$city =$_POST['city'];
$bathrooms =$_POST['bath'];
 
if(isset($_POST['extra'])){
    $extra = $_POST['extra'];
    }else{
	$extra =array();
}

$obj = new Property;
$output= $obj->addProperty($userid,$staff,$title,$prodesc,$price,$area,$address,$status,$type,$bedrooms,$bathrooms,$furnished,$serviced,$shared,$state,$city,$extra, $images);

if($output) {
  $_SESSION['message'] = "Property added successfully";
      header("Location: my-listings.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to add Property, Try again";
      header("Location: add-property.php");
    exit();
  }

}

 ?>