<?php
session_start();
require 'property.php';
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deleteProperty($id);

if ($output) {
  $_SESSION['message'] = "Property deleted Successfully";
    header("location:my-listings.php");
    exit();
} else {
  $_SESSION['message'] = "Error deleting record, try again";
    header("location:my-listings.php");
    exit();
}
