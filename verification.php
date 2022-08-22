<?php
include 'users.php';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code=$_GET['code'];
$obj = new User;
$output=$obj->emailVerification($code);
if($output) {
	header ("Location: login.php?success=". urlencode(base64_encode('Your account is activated ')));
}
elseif($output == 1)
{
$msg ="Your account is already active, no need to activate again";
header ("Location: login.php?msg=" .urlencode(base64_encode($msg)));
}
else
{
$msg ="Wrong activation code.";
header ("Location: login.php?msg=" .urlencode(base64_encode($msg)));
}

}
?>