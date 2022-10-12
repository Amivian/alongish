<?php 
if (isset($_POST['btn']))
{
  $userid=$_SESSION['id'];
  $title = htmlentities(strip_tags($_POST['title']));
  $prodesc = htmlentities(strip_tags($_POST['joint_description']));
  $address = htmlentities(strip_tags($_POST['address']));
  $offer = htmlentities(strip_tags($_POST['offer']));
  $joint = htmlentities(strip_tags($_POST['joint_t&c']));
  $images = $_FILES['images'];
  $state =  $_POST['state'];
  $city =$_POST['city'];
  $staff="";
  if(isset($_POST['extra'])){
    $extra = $_POST['extra'];
  }
// echo "<pre>";
// echo var_dump($_POST);
// echo "</pre>";
// exit();
  $user = new admin\Property;
  $output= $user->addJointVenture($userid,$staff,$title,$prodesc,$offer,$address,$joint,$state,$city,$extra,$images);

  if($output) {
    $_SESSION['message'] = "Property added successfully";
    header("Location: my-venture.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to add Property, Try again";
    header("Location: add-property.php");
    exit();
  }

}

 ?>