<?php
session_start(); 
require('property.php');
if(isset($_POST['featurebtn'])) {
    $iddd = $_POST['idd'];
    $featured = $_POST['feature'];
$obj = new Property;
$output= $obj->setFeaturedProperty($iddd,$featured);

if ($output) {
    $_SESSION['message'] = " Property Featured changed " ;
        header("location:manage-properties.php");
        exit();
    }else{
     $_SESSION['message'] = "Error adding record, try again";
        header("location:manage-properties.php");
        exit();
    }
}
 ?> 