<?php
session_start();
require 'property.php';
$id = $_GET['id'];
$obj = new Property;
$output = $obj->deletejointVenture($id);

if ($output) {
    $_SESSION['message']= "Listing deleted Successfully";
    header("location:my-venture.php");
    exit();
} else {
    $_SESSION['message'] = "Error deleting record, try again";
    header("location:my-venture.php");
    exit();
}
