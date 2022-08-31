 <?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
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
$obj = new Property;
$output= $obj->editProperty($title,$prodesc,$price,$area,$address,$status, $type,$bedrooms, $furnished,$serviced, $shared ,$bathrooms,$state, $city,$extra,$images,$pid);

if($output) {
  $_SESSION['message'] = "Property Edited successfully";
      header("Location: my-listings.php");
    exit();
  }else{
    $_SESSION['message'] = "Failed to edit Property, Try again";
      header("Location: editlisting.php");
    exit();
  }

}

 ?>