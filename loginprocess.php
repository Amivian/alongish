<?php
session_start();
include('users.php');

if(isset($_POST['login'])) {
$email = strtolower(htmlspecialchars(strip_tags($_POST['email'])));
$uname = strtolower(htmlspecialchars(strip_tags($_POST['email'])));
$pwd =strtolower(htmlspecialchars(strip_tags($_POST['password'])));

$objlog = new User;
$output = $objlog->loginUser($email,$uname,$pwd);
if ($output) {
	header("Location: dashboard.php");

}else{
    $mg = 'Username or Password is Invalid';
    header('location:login.php?mg='. urlencode(base64_encode($mg)));
}
}




 ?>
