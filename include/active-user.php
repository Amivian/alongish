<?php
session_start();
require 'users.php';
if (isset($_SESSION['id'])) {
    $obj = new User;
    $k = $obj->getUser($_SESSION['id']);
    $agent_id = $_SESSION['id'];
    $pix = $k['a_pix'];
    if (empty($pix)) {
        $pix = 'avatar.png';
    }

} else {

}
require('admin/property.php');
$properties = new admin\Property;

if(isset($_POST['btn'])) {
    $email = htmlentities(strip_tags($_POST['email']));
    $output=$properties->newsLetter( $email);
}