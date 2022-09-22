<?php 
if (isset($_POST['btn'])) {
  if(isset($_POST['name'])){
    $name = htmlentities(strip_tags($_POST['name']));
  }
  if(isset($_POST['position'])){
    $position = htmlentities(strip_tags($_POST['position']));
  }
  if(isset($_POST['email'])){
    $email = htmlentities(strip_tags($_POST['email']));
  }
  $image= $_FILES['image'];

$tid =$_POST['t_id'];

$team = new admin\Property;
$output= $team->editTeam($name,$position,$email,$tid,$image);

if($output) {
  $_SESSION['message']= "Team Member Edited successfully";
      header("Location: my-team.php");
    exit();
  }else{
    $_SESSION['message']= "Failed to edit Team Member, Try again";
      header("Location: editteam.php");
    exit();
  }

}

 ?>