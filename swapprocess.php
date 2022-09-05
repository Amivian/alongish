<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
$userid=$_POST['a_id'];
$name = htmlentities(strip_tags($_POST['swap_name']));
$title = htmlentities(strip_tags($_POST['swap_item']));
$prodesc = htmlentities(strip_tags($_POST['swap_description']));
$need = htmlentities(strip_tags($_POST['swap_need']));
$swapdec = htmlentities(($_POST['sneed_description']));
$address = htmlentities(strip_tags($_POST['address']));
$images = $_FILES['images'];
$state =  $_POST['state'];
$city = $_POST['city'];
if(isset($_POST['extra'])){
  $extra = $_POST['extra'];
  }else{
$extra =array();
}

$obj = new Property;
$output= $obj->createSwaps($userid,$name,$title,$prodesc,$need,$swapdec,$address,$state,$city, $images,$extra);
if($output === TRUE) {    
  $_SESSION['message']= "Property added successfully";
      header("Location:my-swaps.php");
    exit();
  }
  else{
    $_SESSION['message']= "Failed to add Property, Try again";
      header("Location: swaps.php");
    exit();
  }

}

 ?>