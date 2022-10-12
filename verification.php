<?php
session_start();
include 'users.php';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$obj = new User;
$output=$obj->emailVerification($code);
if($output) {
	$_SESSION['message']="Your account is activated ";
	header ("Location:login.php");
	exit();
}
elseif($output == 1)
{
$_SESSION['message']="Your account is already active, no need to activate again";
header ("Location: login.php");
exit();
}
else
{
$_SESSION['message'] ="Wrong activation code.";
header ("Location: login.php");
exit();
}

}