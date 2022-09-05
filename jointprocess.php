<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
$userid=$_POST['a_id'];
$title = htmlentities(strip_tags($_POST['title']));
$prodesc = htmlentities(strip_tags($_POST['joint_description']));
$address = htmlentities(strip_tags($_POST['address']));
$offer = htmlentities(strip_tags($_POST['offer']));
$joint = htmlentities(strip_tags($_POST['joint_t&c']));
$images = $_FILES['images'];
$state =  $_POST['state'];
$city =$_POST['city'];
 
if(isset($_POST['extra'])){
    $extra = $_POST['extra'];
    }
$obj = new Property;
$output= $obj->addJointVenture($userid,$title,$prodesc,$offer,$address,$joint,$state,$city,$extra,$images);

if($output) {
 $_SESSION['message'] = "Property added successfully";
      header("Location: my-venture.php");
    exit();
  }else{
   $_SESSION['message'] = "Failed to add Property, Try again";
      header("Location: add-property.php");
    exit();
  }

}

 ?>