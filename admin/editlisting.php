 <?php 
  if (isset($_POST['btn'])) {
    $form_errors = [];

    function validate($field_name = '', $type= '', $min_length = 1, $max_length = 255) {
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
            $form_errors[$field_name] = 'Must be an string';
          }
        }
        elseif ($type == 'email') {
          $email_validation_regex = '/^\\S+@\\S+\\.\\S+$/'; 
          if (!preg_match($email_validation_regex, $field_value)) {
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

      validate('title', 'string');
      validate('pro-desc', 'string');
      validate('price', 'string');
      validate('area', 'string');
      validate('address', 'string');
      validate('status', 'string');
      validate('type', 'string');
      validate('bed', 'string');
      validate('furnish', 'string');
      validate('service', 'string');
      validate('share', 'string');
      validate('state', 'string');
      validate('city', 'string');
      validate('bath', 'string');

      echo '<pre>'; var_dump($form_errors, $_POST); echo '</pre>'; exit();
      if (empty($form_errors)) {
        $title = htmlentities(strip_tags($_POST['title']));
        $prodesc = htmlentities(strip_tags($_POST['pro-desc']));
        $price = htmlentities(strip_tags($_POST['price']));
        $area = htmlentities(($_POST['area']));
        $address = htmlentities(strip_tags($_POST['address']));
        $status = $_POST['status']; 
        $type = $_POST['type']; 
        $bedrooms = $_POST['bed'];
        $furnished = $_POST['furnish'];
        $serviced = $_POST['service'];
        $shared = $_POST['share'];
        $state =  $_POST['state'];
        $city = $_POST['city'];
        $bathrooms =$_POST['bath'];
        $images = $_FILES['images'];

        if (isset($_POST['extra'])) {
          $extra = $_POST['extra'];
        }
        else{
          $extra =array();
        }
        

      $pid =$_POST['p_id'];
      $property = new \admin\Property;
      $output= $property->editProperty($title,$prodesc,$price,$area,$address,$status, $type,$bedrooms, $furnished,$serviced, $shared ,$bathrooms,$state, $city,$extra,$images,$pid);

      if($output) {
        $_SESSION['message'] = "Property Edited successfully";
        header("Location: my-listings.php");
        exit();
      }
      else{
        $_SESSION['message'] = "Failed to edit Property, Try again";
        header("Location: editlisting.php");
        exit();
      }

    }
  }
?>