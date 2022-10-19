<?php
if (isset($_POST['regbtn'])) {

    function validate($field_name = '', $type = '', $min_length = 1, $max_length = 255)
    {
        global $form_errors;

        $field_value = trim($_POST[$field_name]);

        if ($field_value) {
            if ($type == 'int') {
                if (!is_int($field_value)) {
                    $form_errors[$field_value] = 'Must be an integer';
                }
            } elseif ($type == 'string') {
                if (!is_string($field_value)) {
                    $form_errors[$field_value] = 'Must be an string';
                }
            } elseif ($type == 'date') {
                $date_validation_regex = "/^[0-9]{1,2}\\/[0-9]{1,2}\\/[0-9]{4}$/";
                if (!preg_match($date_validation_regex, $field_value)) {
                    $form_errors[$field_value] = 'Must be a valid date';
                }
            } elseif ($type == 'phone') {
                $phone_number_validation_regex = "/^\\+?[1-9][0-9]{7,14}$/";
                if (!preg_match($phone_number_validation_regex, $field_value)) {
                    $form_errors[$field_value] = 'Must be a valid phone number';
                }
            } elseif ($type == 'email') {
                $email_validation_regex = '/^\\S+@\\S+\\.\\S+$/';
                if (!preg_match($email_validation_regex, $field_value)) {
                    $form_errors[$field_value] = 'Must be a valid email address';
                }
            } elseif ($type == 'array') {
                if (!is_array($field_value)) {
                    $form_errors[$field_value] = 'Must be an array';
                } else {
                    if (!count($field_value)) {
                        $form_errors[$field_value] = 'At least one option required';
                    }
                }
            }

            if ($min_length) {
                if (mb_strlen($field_value) < $min_length) {
                    $form_errors[$field_value] = 'Must be at least ' . $min_length . ' characters';
                } elseif (mb_strlen($field_value) > $max_length) {
                    $form_errors[$field_value] = 'Cannot be more than ' . $max_length . ' characters';
                }
            }
        } else {
            $form_errors[$field_value] = 'Required';
        }
    }

    validate('fname', 'string');
    validate('lname', 'string');
    validate('uname', 'string');
    validate('pwd', 'string');
    validate('cpwd', 'string');
    validate('email', 'email');
    validate('phone', 'phone');
    validate('state', 'string');
    validate('city', 'int');
    validate('code', 'string');
    validate('status', 'string');

    $fname = htmlentities(strip_tags($_POST['fname']));
    $lname = htmlentities(strip_tags($_POST['lname']));
    $uname = htmlentities(strip_tags($_POST['uname']));
    $pwd = htmlentities(strip_tags($_POST['pwd']));
    $cpwd = htmlentities(strip_tags($_POST['cpwd']));
    $email = htmlentities(strip_tags($_POST['email']));
    $phone = htmlentities(strip_tags($_POST['phone']));
    $tstate = htmlentities($_POST['state']);
    $tcity = htmlentities($_POST['city']);
    $activationcode = $_POST['code'];
    $status = $_POST['status'];

    $user = new User;
    $output = $user->registerUser($fname, $lname, $uname, $pwd, $cpwd, $email, $phone, $tstate, $tcity, $activationcode, $status);
    if ($output) {
        $_SESSION['message'] = 'Registration successful, kindly verify using the link sent to your email - ' . $email;
        header("location:welcome.php");
        exit();
    } else if($output) {
        $_SESSION['message'] = "Confirm Password does not Match!";
        header("location:register.php");
        exit();
    } else {
        $_SESSION['message'] = "Registration failed try again later!";
        header("location:register.php");
        exit();
    }

}
