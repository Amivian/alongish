<?php
session_start();
include('users.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$phone = htmlentities(strip_tags($_POST['phone']));
	$tstate = htmlentities($_POST['state']);
  $tcity = htmlentities($_POST['city']);
  $business = htmlentities(strip_tags($_POST['businessname']));
  $about = htmlentities(strip_tags($_POST['about']));
  $pix = $_FILES['pix'];
$obj = new User;
$output=$obj->updateAgent( $id,$fname,$lname,$phone,$tstate, $tcity, $business, $pix,$about);
if($output){
	$_SESSION['message'] = "Profile Updated Successfully";
	header("Location:user-profile.php");	
}else{
	$_SESSION['message'] ="OOps!! Update Failed, Try again";
	header("Location:details.php");
}
}



 ?>
