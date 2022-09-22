<?php
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$phone = htmlentities(strip_tags($_POST['phone']));
  $business = htmlentities(strip_tags($_POST['businessname']));
  $about = htmlentities(strip_tags($_POST['about']));
  $mission =  htmlentities(strip_tags($_POST['mission']));
  $vision =  htmlentities(strip_tags($_POST['vision']));
  $state=$_POST['state'];
  $city = $_POST['city'];
  $pix = $_FILES['pix'];
$obj = new admin\Admin;
$output=$obj->updateAgent( $id,$fname,$lname,$phone,$state, $city, $business, $pix,$mission, $vision,$about );
if($output){
	$_SESSION['message'] = "Profile Updated Successfully";
	header("Location:reguser.php");	
	exit();
}else{
	$_SESSION['message'] ="Opps!! Update Failed, Try again";
	header("Location:edit-agent.php");
	exit();
}
}



 ?>