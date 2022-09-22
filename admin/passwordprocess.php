<?php
	if(isset($_POST['update'])) {
		$id = $_POST['a_id'];
		$pwd = htmlentities(strip_tags($_POST['pwd']));
		$npwd = htmlentities(strip_tags($_POST['npwd']));
		$cpwd = htmlentities(strip_tags($_POST['cpwd']));

		$obj = new admin\Admin;
		$output=$obj->changePassword( $id,$pwd,$npwd);
		if($output){
			session_destroy();
			$_SESSION['change'] = 'Password changed successfully, Login Again';
			header("Location:index.php");	
			exit();
		}else{
			$_SESSION['change']="OOps!! Password Failed, Try again";
		}
	}
?>