<?php
if(isset($_POST['update'])) {

	function validate($field_name = '', $type= '', $min_length = 2, $max_length = 255) {
		global $form_errors;

		$field_value = trim($_POST[$field_name]);

		if ($field_value) {
			if ($type == 'int') {
				if (!is_int($field_value)) {
					$form_errors[$field_value] = 'Must be an integer';
				}
			}
			elseif ($type == 'string') {
				if (!is_string($field_value)) {
					$form_errors[$field_value] = 'Must be an string';
				}
			}
			elseif ($type == 'date') {
				$date_validation_regex = "/^[0-9]{1,2}\\/[0-9]{1,2}\\/[0-9]{4}$/"; 
				if (!preg_match($date_validation_regex, $field_value)) {
					$form_errors[$field_value] = 'Must be a valid date';
				}
			}
			elseif ($type == 'phone') {
				$phone_number_validation_regex = "/^\\+?[1-9][0-9]{7,14}$/"; 
				if (!preg_match($phone_number_validation_regex, $field_value)) {
					$form_errors[$field_value] = 'Must be a valid phone number';
				}
			}
			elseif ($type == 'email') {
				$email_validation_regex = '/^\\S+@\\S+\\.\\S+$/'; 
				if (!preg_match($email_validation_regex, $field_value)) {
					$form_errors[$field_value] = 'Must be a valid email address';
				}
			}
			elseif ($type == 'array') {
				if (!is_array($field_value)) {
					$form_errors[$field_value] = 'Must be an array';
				}
				else {
					if (!count($field_value)) {
						$form_errors[$field_value] = 'At least one option required';
					}
				}
			}

			if ($min_length) {
				if (mb_strlen($field_value) < $min_length) {
					$form_errors[$field_value] = 'Must be at least '.$min_length.' characters';
				}
				elseif (mb_strlen($field_value) > $max_length) {
					$form_errors[$field_value] = 'Cannot be more than '.$max_length.' characters';
				}
			}
		}
		else {
			$form_errors[$field_value] = 'Required';
		}
	}
	
	
	validate('fname', 'string');
	validate('lname', 'string');
	validate('phone', 'phone');
	validate('state', 'string');
	validate('city', 'string');
	validate('businessname', 'string');
	validate('about', 'string');
	
	$id = $_SESSION['id'];
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = htmlentities(strip_tags($_POST['lname']));
	$phone = htmlentities(strip_tags($_POST['phone']));
	$tstate = htmlentities($_POST['state']);
	$tcity = htmlentities($_POST['city']);
	$business = htmlentities(strip_tags($_POST['businessname']));
	$about = htmlentities(strip_tags($_POST['about']));
	$pix = $_FILES['pix'];
	$user = new User;
	$output=$user->updateAgent( $id,$fname,$lname,$phone,$tstate, $tcity, $business, $pix,$about);
	if($output){
		$_SESSION['message'] = "Profile Updated Successfully";
		header("Location:user-profile.php");	
	}else{
		$_SESSION['message'] ="OOps!! Update Failed, Try again";
		header("Location:details.php");
	}
}



 ?>
