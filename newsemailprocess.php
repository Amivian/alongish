<?php
session_start();
include('users.php');
if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));

$obj = new Property;
$output=$obj->newsLetter( $email);
if($output){
   echo 'Thanks for Subscribing to Our Newsletter';
}else{
	echo 'Subscription Failed';
}
}



 ?>
