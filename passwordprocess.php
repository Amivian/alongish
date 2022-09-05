<?php
session_start();
include('users.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$pwd = htmlentities(strip_tags($_POST['pwd']));
	$npwd = htmlentities(strip_tags($_POST['npwd']));
    // $cpwd = htmlentities(strip_tags($_POST['cpwd']));

$obj = new User;
$output=$obj->changePassword( $id,$pwd,$npwd);
if($output){
    session_destroy();
    $_SESSION['message'] = 'Password changed successfully, Kindly Login';
	header("Location:login.php");	
}else{
	$_SESSION['message'] ='Oops !! Change Password failed';
	header("Location:change-password.php");
}
}



 ?>
