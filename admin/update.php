<?php
if(isset($_POST['update'])) {
	$form_errors = [];

	function validate($field_name = '', $type= '', $min_length = 2, $max_length = 255) {
		global $form_errors;

		$exists = isset($_POST[$field_name]) ? true : false;

		if ($exists) {
			if (!is_array($_POST[$field_name])) {
				$field_value = trim($_POST[$field_name]);
			}
			else {
				$field_value = $_POST[$field_name];
			}
		}

		if (isset($field_value)) {
			if ($type == 'int') {
				if (!is_numeric($field_value)) {
					$form_errors[$field_name] = 'Must be an integer';
				}
			}
			elseif ($type == 'string') {
				if (!is_string($field_value)) {
					$form_errors[$field_name] = 'Must be an string';
				}
			}
			elseif ($type == 'date') {
				$date_validation_regex = "/^[0-9]{1,2}\\/[0-9]{1,2}\\/[0-9]{4}$/"; 
				if (!preg_match($date_validation_regex, $field_value)) {
					$form_errors[$field_name] = 'Must be a valid date';
				}
			}
			elseif ($type == 'phone') {
				$phone_number_validation_regex = "/^\\+?[1-9][0-9]{7,14}$/"; 
				if (!preg_match($phone_number_validation_regex, $field_value)) {
					$form_errors[$field_name] = 'Must be a valid phone number';
				}
			}
			elseif ($type == 'email') {
				$email_validation_regex = '/^\\S+@\\S+\\.\\S+$/'; 
				if (!preg_match($email_validation_regex, $field_value)) {
					$form_errors[$field_name] = 'Must be a valid email address';
				}
			}
			elseif ($type == 'array') {
				if (!is_array($field_value)) {
					$form_errors[$field_name] = 'Must be an array';
				}
				else {
					if (!count($field_value)) {
						$form_errors[$field_name] = 'At least one option required';
					}
				}
			}
			elseif ($type == 'file') {
				if (!$_FILES[$field_name]['tmp_name']) {
					$form_errors[$field_name] = 'Must be an array';
				}
			}

			if ($min_length || $max_length) {
				if (!is_array($field_value)) {
					if (mb_strlen($field_value) < $min_length) {
						$form_errors[$field_name] = 'Must be at least '.$min_length.' characters';
					}
					elseif (mb_strlen($field_value) > $max_length) {
						$form_errors[$field_name] = 'Cannot be more than '.$max_length.' characters';
					}
				}
			}
		}
		else {
			$form_errors[$field_name] = 'Required';
		}
	}
	
	validate('fname', 'string');
	validate('lname', 'string');
	validate('phone', 'phone');
	validate('businessname', 'string');
	validate('about', 'string');
	validate('mission', 'string');
	validate('vision', 'string');
	validate('state', 'string');
	validate('city', 'string');

	if (empty($form_errors)) {
		$id = $_SESSION['id'];
		$fname = htmlentities(strip_tags($_POST['fname']));
		$lname = htmlentities(strip_tags($_POST['lname']));
		$phone = htmlentities(strip_tags($_POST['phone']));
		$business = htmlentities(strip_tags($_POST['businessname']));
		$pix = $_FILES['pix'];
		$about = htmlentities(strip_tags($_POST['about']));
		$mission = htmlentities(strip_tags($_POST['mission']));
		$vision = htmlentities(strip_tags($_POST['vision']));
		$state = htmlentities($_POST['state']);
		$city = htmlentities($_POST['city']);

		$admin = new Admin;
		$output=$admin->updateAgent( $id,$fname,$lname,$phone,$state,$city, $business, $about, $mission, $vision , $pix);
		if($output){
		$_SESSION['message'] = "Profile Updated Successfully";
			header("Location:user-profile.php");	
			exit();
		}else{
			$_SESSION['message']="OOps!! Update Failed, Try again";
			header("Location:details.php");
			exit();
		}
	}
}


 ?>
