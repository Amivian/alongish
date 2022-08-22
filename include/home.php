<?php
session_start();
require('users.php');
 
 $obj = new User;

 if (empty($_SESSION['uname'])) {
 	header('location:login.php');
 }

 $k = $obj->getUser($_SESSION['id']);
 $agent_id = $_SESSION['id'];
 
$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
} 
require('property.php');
 
$obj1 = new Property;
?>