<?php 
  if (isset($_POST['btn'])) {
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
				if ($type == 'string') {
					if (!is_string($field_value)) {
						$form_errors[$field_name] = 'Must be an string';
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
		
		validate('staff', 'string');
		validate('swap_name', 'string');
		validate('swap_item', 'string');
		validate('swap_description', 'string');
		validate('swap_need', 'string');
		validate('sneed_description', 'string');
		validate('address', 'string');
		validate('state', 'string');
		validate('city', 'string');
		validate('extra', 'array');
		// echo '<pre>'; var_dump($form_errors, $_POST); echo '</pre>'; exit();

		if (empty($form_errors)) {  
      $userid=$_SESSION['id'];
      $staff=$_POST['staff'];
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
       $extra = array();
      }


      $swap = new \admin\Property;;
      $output= $swap->createSwaps($userid,$staff,$name,$title,$prodesc,$need,$swapdec,$address,$state,$city,$extra,$images);
      if($output) {    
        $_SESSION['message'] = "Property added successfully";
        header("Location:my-swaps.php");
        exit();
      }
      else{
        $_SESSION['message'] = "Failed to add Property, Try again";
        header("Location: swaps.php");
        exit();
      }
    }

  }

 ?>