<?php
session_start();
include('admin/property.php');
if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));

	$property = new admin\Property;
	$output= $property->newsLetter( $email);
	if($output){
	echo 'Thanks for Subscribing to Our Newsletter';
	}else{
		echo 'Subscription Failed';
	}
}



 ?>
