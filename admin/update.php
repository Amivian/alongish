<?php
session_start();
include('admin.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$phone = htmlentities(strip_tags($_POST['phone']));
	$business = htmlentities(strip_tags($_POST['businessname']));
	$pix = $_FILES['pix'];
	$about = htmlentities(strip_tags($_POST['about']));
	$mission = htmlentities(strip_tags($_POST['mission']));
	// echo"<pre>";
	// echo var_dump($mission);
	// echo"</pre>";
	$vision = htmlentities(strip_tags($_POST['vision']));
	$state = htmlentities($_POST['state']);
  $city = htmlentities($_POST['city']);
$obj = new Admin;
$output=$obj->updateAgent( $id,$fname,$lname,$phone,$state,$city, $business, $about, $mission, $vision , $pix);
if($output){
$_SESSION['message'] = "Profile Updated Successfully";
	header("Location:user-profile.php");	
	exit();
}else{
	$_SESSION['message']="OOps!! Update Failed, Try again";
	header("Location:details.php");
	exit();
}
}


 ?>
