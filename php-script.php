<?php
include("users.php");
$con  = new mysqli('localhost', 'root', '', 'homes');
 
if(!empty(isset($_POST['emailId'])) && isset($_POST['emailId'])){

   $emailInput= $_POST['emailId'];
   checkEmail($con, $emailInput);
  
}


function checkEmail($con, $emailInput){

  $query = "SELECT a_email FROM agents WHERE a_email='$emailInput'";
  $result = $con->query($query);
  if ($result->num_rows > 0) {
    echo "<span style='color:red'>This Email already exists </span>";
  }
}