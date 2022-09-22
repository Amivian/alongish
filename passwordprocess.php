<?php
if(isset($_POST['update'])) {
    $id = $_SESSION['id'];
	$pwd = htmlentities(strip_tags($_POST['pwd']));
	$npwd = htmlentities(strip_tags($_POST['npwd']));

	$user = new User;
	$output= $user->changePassword( $id,$pwd,$npwd);
	if($output){
		session_destroy();
		session_start();
		$_SESSION['info'] = 'Password changed successfully, Kindly Login';
		header("Location:login.php");	
		exit();
	}
	else{
		$_SESSION['message'] ='Oops !! Change Password failed';
	}
}



 ?>
