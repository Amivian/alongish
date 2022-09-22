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
		validate('title', 'string');
		validate('joint_description', 'string');
		validate('offer', 'string');
		validate('address', 'string');
		validate('state', 'string');
		validate('city', 'string');
		validate('joint_t&c', 'string');
		// echo '<pre>'; var_dump($form_errors, $_POST); echo '</pre>'; exit();

		if (empty($form_errors)) {
        
      $userid = $_SESSION['id'];
      $staff=$_POST['staff'];
      $title = htmlentities(strip_tags($_POST['title']));
      $prodesc = htmlentities(strip_tags($_POST['joint_description']));
      $address = htmlentities(strip_tags($_POST['address']));
      $offer = htmlentities(strip_tags($_POST['offer']));
      $joint = htmlentities(strip_tags($_POST['joint_t&c']));
      $images = $_FILES['images'];
      $state =  $_POST['state'];
      $city =$_POST['city'];
      
      if(isset($_POST['extra'])){
          $extra = $_POST['extra'];
      }

      $jointventure = new admin\Property;
      $output= $jointventure->addJointVenture($userid,$staff,$title,$prodesc,$offer,$address,$joint,$state,$city,$extra,$images);

      if($output) {
          $_SESSION['message']= "Property added successfully";
          header("Location: my-venture.php");
          exit();
      }
      else{
        $_SESSION['message']= "Failed to add Property, Try again";
            header("Location:venture.php");
          exit();
        }
   }
  }

 ?>
 