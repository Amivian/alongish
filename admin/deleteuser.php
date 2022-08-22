<?php 
include('admin.php');
$obj1= new Admin;
$id = $_GET['id'];
$output = $obj1->deleteUser($id);
if (isset($_GET['delete'])) {
if ($output) {
    	$msg= "Record Deleted Successfully";
        header("location: regusers.php?m=".$msg);
exit();
    }
       $msg= "Error deleting record, try again";
        header("location: regusers.php?m=".$msg);
    
  exit();
}
   
// }

 ?>