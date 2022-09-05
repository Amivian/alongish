<?php
include('users.php');
session_start();
if(isset($_POST['regbtn'])) {
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$uname = htmlentities(strip_tags($_POST['uname']));
	$pwd = htmlentities(strip_tags($_POST['pwd']));
	$cpwd = htmlentities(strip_tags($_POST['cpwd']));
	$email = htmlentities(strip_tags($_POST['email']));
	$phone = htmlentities(strip_tags($_POST['phone']));
	$tstate = htmlentities($_POST['state']);
  $tcity = htmlentities($_POST['city']);
  $activationcode=$_POST['code'];
  $status=$_POST['status'];

$obj = new User;
$output=$obj->registerUser($fname,$lname,$uname,$pwd,$cpwd,$email,$phone,$tstate, $tcity,$activationcode,$status);
if($output) {
	$_SESSION['message']='Registration successful, please verify in the registered Email-Id';
	header("location:register.php");
}else{
	$_SESSION['message']="Confirm Password does not Match!";
	header("location:register.php");

}
}



 ?>
