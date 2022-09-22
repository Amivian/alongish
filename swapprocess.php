<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {

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
	
	
	validate('swap_name', 'string');
	validate('swap_item', 'string');
	validate('swap_description', 'string');
	validate('swap_need', 'string');
	validate('sneed_description', 'string');
	validate('address', 'string');
	validate('state', 'string');
	validate('city', 'string');


  $userid=$_SESSION['id'];
  $name = htmlentities(strip_tags($_POST['swap_name']));
  $title = htmlentities(strip_tags($_POST['swap_item']));
  $prodesc = htmlentities(strip_tags($_POST['swap_description']));
  $need = htmlentities(strip_tags($_POST['swap_need']));
  $swapdec = htmlentities(($_POST['sneed_description']));
  $address = htmlentities(strip_tags($_POST['address']));
  $images = $_FILES['images'];
  $state =  $_POST['state'];
  $city = $_POST['city'];
  if(isset($_POST['extra'])){
    $extra = $_POST['extra'];
  }
  else{
   $extra =array();
  }

  $property = new Property;
  $output= $property->createSwaps($userid,$name,$title,$prodesc,$need,$swapdec,$address,$state,$city, $images,$extra);
  if($output === TRUE) {    
    $_SESSION['message']= "Property added successfully";
    header("Location:my-swaps.php");
    exit();
  }
  else{
    $_SESSION['message']= "Failed to add Property, Try again";
    header("Location: swaps.php");
   exit();
  }

}

 ?>