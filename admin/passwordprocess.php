<?php
session_start();
include('admin.php');
if(isset($_POST['update'])) {
    $id = $_POST['a_id'];
	$pwd = htmlentities(strip_tags($_POST['pwd']));
	$npwd = htmlentities(strip_tags($_POST['npwd']));
    $cpwd = htmlentities(strip_tags($_POST['cpwd']));

$obj = new Admin;
$output=$obj->changePassword( $id,$pwd,$npwd);
if($output){
    session_destroy();
    $res = 'res';
	header("Location:index.php?res=" . urlencode(base64_encode("Password changed successfully, Login Again")));	
}else{
	$res ='res';
	header("Location:change-password.php?res=". urlencode(base64_encode("OOps!! Password Failed, Try again")));
}
}



 ?>