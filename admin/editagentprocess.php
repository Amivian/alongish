<?php
session_start();
include('admin.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$phone = htmlentities(strip_tags($_POST['phone']));
  $business = htmlentities(strip_tags($_POST['businessname']));
  $about = htmlentities(strip_tags($_POST['about']));
  $pix = $_FILES['pix'];
$obj = new Admin;
// $output=$obj->updateAgent( $id,$fname,$lname,$phone,$tstate, $tcity, $business, $pix );
$output=$obj->updateAgent( $id,$fname,$lname,$phone, $business, $about, $pix );
if($output){
	$_SESSION['message'] = "Profile Updated Successfully";
	header("Location:reguser.php");	
	exit();
}else{
	$_SESSION['message'] ="OOps!! Update Failed, Try again";
	header("Location:edit-agent.php");
	exit();
}
}



 ?>