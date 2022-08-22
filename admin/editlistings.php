<?php 
session_start();
require('property.php');

if (isset($_POST['btn'])) {
  if(isset($_POST['title'])){
    $title = htmlentities(strip_tags($_POST['title']));
  }
  if(isset($_POST['featured'])){
    $featured = $_POST['featured'];
    }
  if(isset($_POST['pro-desc'])){
  $prodesc = htmlentities(strip_tags($_POST['pro-desc']));
  }
  if(isset($_POST['price'])){    
  $price = htmlentities(strip_tags($_POST['price']));
  }
  if(isset($_POST['area'])){    
  $area = htmlentities(strip_tags($_POST['area']));
  }
  if(isset($_POST['address'])){    
    $address = htmlentities(strip_tags($_POST['address']));
  }
  if(isset($_POST['images'])){
    $images = $_FILES['images'];  
  }
  if(isset($_POST['status'])){    
    $status = $_POST['status']; 
  }
  if(isset($_POST['type'])){    
    $type = $_POST['type']; 
  }
  if(isset($_POST['bed'])){    
    $bedrooms = $_POST['bed'];
  }
  if(isset($_POST['bath'])){    
    $bathrooms = $_POST['bath'];
  }
  if(isset($_POST['furnish'])){    
    $furnished = $_POST['furnish'];
  }
  if(isset($_POST['service'])){    
    $serviced = $_POST['service'];
  }
  if(isset($_POST['state'])){    
    $state = $_POST['state'];
  }
  if(isset($_POST['city'])){    
    $city = $_POST['city'];
  }
  if(isset($_POST['share'])){    
    $shared = $_POST['share'];
  }
   
  if(isset($_POST['extra'])){
      $extra = $_POST['extra'];
      }else{
    $extra =array();
  }
  

$pid =$_POST['p_id'];
$obj = new Property;
$output= $obj->editAgentProperty($title,$prodesc,$price,$area,$address,$status, $type,$bedrooms, $furnished,$serviced, $shared ,$bathrooms,$state, $city,$extra,$featured,$images,$pid);

if($output) {
  $msg = "Property Edited successfully";
      header("Location: manage-properties.php?msg=".$msg);
    exit();
  }else{
    $msg = "Failed to edit Property, Try again";
      header("Location: edit-agent-listing.php?msg=".$msg);
    exit();
  }

}

 ?>