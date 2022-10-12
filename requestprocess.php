<?php 
	if (isset($_POST['btn']))
	{
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
			
			validate('other', 'string');
			validate('address', 'string');
			validate('status', 'string');
			validate('type', 'string');
			validate('bed', 'string');
			validate('furnish', 'string');
			validate('service', 'string');
			validate('state', 'string');
			validate('city', 'string');
			validate('share', 'string');
			validate('fname', 'string');
			validate('phone', 'phone');
			validate('email', 'email');


		$other = htmlentities(strip_tags($_POST['other']));
		$address = htmlentities(strip_tags($_POST['address']));
		$status = $_POST['status']; 
		$type = $_POST['type']; 
		$bed= $_POST['bed'];
		$furnished = $_POST['furnish'];
		$serviced = $_POST['service'];
		$shared = $_POST['share'];
		$state =  $_POST['state'];
		$city =$_POST['city'];
		$fname = htmlentities(strip_tags($_POST['fname']));
		$phone = htmlentities(strip_tags($_POST['phone']));
		$email = htmlentities(strip_tags($_POST['email']));
		
		$property = new admin\Property;
		$output= $property->propertyRequest($other,$address,$status,$type,$bed,$furnished,$serviced,$shared,$state,$city,$fname, $phone,$email);

		if($output)
		{
			$_SESSION['message'] = "Request sent successfully, we will get back to you.";
				header("Location: request.php");
			exit();
		} 
		else 
		{
			$_SESSION['message']  = "Request failed, Try again";
				header("Location: request.php");
			exit();
		}

	}

 ?>