<?php
session_start();
include('admin.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$phone = htmlentities(strip_tags($_POST['phone']));
	$state = htmlentities($_POST['state']);
  $city = htmlentities($_POST['city']);
  $business = htmlentities(strip_tags($_POST['businessname']));
  $pix = $_FILES['pix'];
$obj = new Admin;
$output=$obj->updateAgent( $id,$fname,$lname,$phone,$state,$city, $business, $pix );
if($output){
	$msg = "Profile Updated Successfully";
	header("Location:user-profile.php?msg=". $msg);	
}else{
	$msg ="OOps!! Update Failed, Try again";
	header("Location:details.php?msg=". $msg);
}
}



 ?>
