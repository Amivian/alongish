<?php 
    require "admin.php";
    if(isset($_POST['forgot'])) 
    { 
        $form_errors = [];

        function validate($field_name = '', $type= '') 
        {
            if (isset($field_value)) {
                if ($type == 'email') 
                {
                    $email_validation_regex = '/^\\S+@\\S+\\.\\S+$/'; 
                    if (!preg_match($email_validation_regex, $field_value)) {
                        $form_errors[$field_name] = 'Must be a valid email';
                   } 
               }
               else
               {
				  $form_errors[$field_name] = 'Required';
			   }
            }

        }
        validate('email', 'email');
		// echo '<pre>'; var_dump($_POST); echo '</pre>'; exit();

		if (empty($form_errors)) 
        {
            $email = strtolower(htmlspecialchars(strip_tags($_POST['email'])));    
            $user = new admin\Admin;
            $output = $user->forgotPassword($email);
        }
    }
?>