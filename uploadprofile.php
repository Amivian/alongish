<?php 
session_start();
include('users.php');
if(isset($_FILES['pix']))
{
$pix = $_FILES['pix'];

$obj = new User;
$output=$obj->uploadpix($_FILES['pix']);
if ($output) {
	 $_SESSION['message'] = "Logo uploaded successfully";
    header("Location:user-profile.php");
	exit();
}else{
	$_SESSION['message']='Logo Upload Failed';
	header('location:user-profile.php');
	exit();
}
}