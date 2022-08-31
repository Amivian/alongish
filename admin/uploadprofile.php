<?php 
session_start();
include('admin.php');
$msg='';
if(isset($_FILES['pix']))
{
$pix = $_FILES['pix'];

$obj = new Admin;
$output=$obj->uploadpix($_FILES['pix']);
if ($output) {
	 $_SESSION['message'] = "Logo uploaded successfully";
    header("Location:user-profile.php");
}else{
	$_SESSION['message'] = "failed to uploaded Logo";
	header('location:user-profile.php');
}
}
?>