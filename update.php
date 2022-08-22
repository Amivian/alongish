<?php
session_start();
include('users.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	// $pwd = htmlentities(strip_tags($_POST['pwd']));
	// $cpwd = htmlentities(strip_tags($_POST['cpwd']));

	$phone = htmlentities(strip_tags($_POST['phone']));
// 	$tstate = htmlentities($_POST['state']);
//   $tcity = htmlentities($_POST['city']);
  $business = htmlentities(strip_tags($_POST['businessname']));
  $about = htmlentities(strip_tags($_POST['about']));
  $pix = $_FILES['pix'];
$obj = new User;
// $output=$obj->updateAgent( $id,$fname,$lname,$phone,$tstate, $tcity, $business, $pix );
$output=$obj->updateAgent( $id,$fname,$lname,$phone, $business, $about, $pix );
if($output){
	$msg = "Profile Updated Successfully";
	header("Location:user-profile.php?msg=". $msg);	
}else{
	$msg ="OOps!! Update Failed, Try again";
	header("Location:details.php?msg=". $msg);
}
}



 ?>
