<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
$agent_id=$_POST['a_id'];
$staff=$_POST['staff'];
$fname = htmlentities(strip_tags($_POST['name']));
$position = htmlentities(strip_tags($_POST['position']));
$email = htmlentities(strip_tags($_POST['email']));
$image = $_FILES['image'];

$obj = new Property;
$output= $obj->addTeam($agent_id,$staff, $fname, $position,$email, $image);

if($output) {
  $_SESSION['message'] = "Team Member added successfully";
      header("Location: my-team.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to add Team Member, Try again";
      header("Location: team.php");
    exit();
  }

}

 ?>