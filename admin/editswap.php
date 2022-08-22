<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
$name = htmlentities(strip_tags($_POST['swap_name']));
$title = htmlentities(strip_tags($_POST['swap_item']));
$prodesc = htmlentities(strip_tags($_POST['swap_description']));
$need = htmlentities(strip_tags($_POST['swap_need']));
$swapdec = htmlentities(($_POST['sneed_description']));
$address = htmlentities(strip_tags($_POST['address']));
$images = $_FILES['images'];
$state =  $_POST['state'];
$city = $_POST['city'];
$id = $_POST['edit_id'];
if(isset($_POST['extra'])){
  $extra = $_POST['extra'];
  }else{
$extra =array();
}

$obj = new Property;
$output= $obj->editSwaps($name,$title,$prodesc,$need,$swapdec,$address,$state,$city, $images,$extra,$id);
if($output === TRUE) {    
  $msg = "Swap Item edited Successfully";
      header("Location: my-swaps.php?msg=".$msg);
    exit();
  }
  else{
    $msg = "Failed to add Property, Try again";
      header("Location:manage-swap.php?msg=".$msg);
    exit();
  }

}

 ?>