<?php
require("admin.php");
session_start();
$obj=new Admin;
if(isset($_POST['submit'])){
	$username = $_POST['email'];
	$password = $_POST['pass'];

$output=$obj->add_admin($username,$password);
	if($output){
        header('location:admindashboard.php');
        return true;

        }else{
            $msg="Invalid Username or Password";

                header('location:index.php?msg='. urlencode(base64_encode("Invalid Username or Password")));
        }

    }



?>