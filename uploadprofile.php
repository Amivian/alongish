<?php 
session_start();
include('users.php');
$msg='';
if(isset($_FILES['pix']))
{
$pix = $_FILES['pix'];

$obj = new User;
$output=$obj->uploadpix($_FILES['pix']);
if ($output) {
	 $msg = "Logo uploaded successfully";
    header("Location:user-profile.php?result=".$msg);
}else{
	header('location:user-profile.php');
}
}
?>