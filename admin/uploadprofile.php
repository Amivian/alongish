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
	 $msg = "Logo uploaded successfully";
    header("Location:user-profile.php?result=".$msg);
}else{
	header('location:user-profile.php');
}
}
?>