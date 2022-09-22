<?php 
if(isset($_POST['btn'])) {
$fname = htmlentities(strip_tags($_POST['name']));
$pic_array = $_FILES['image'];
$pid = $_POST['p_id'];

$obj = new \admin\Property;
$output= $obj->editPartner($fname,$pic_array,$pid);
if($output) {
  $_SESSION['message'] = "Partner Edited successfully";
      header("Location: our-partner.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to edit Partner, Try again";
      header("Location:our-partner.php");
    exit();
  }

}

 ?>