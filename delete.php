<?php 
require('property.php');
$id = $_GET['id'];
$obj = new Property;
$output = $obj->delete($id);

$mg='';
if(isset($_GET['delete'])) {
if($output) {
  $mg = "Deleted Successfully";
    header("Location:dashboard.php?m=".$mg);
exit();
}else{
  $mg = "Failed to delete";
    header("Location:dashboard.php?m=".$mg);
    // echo $msg;
  exit();
}
}

 ?>