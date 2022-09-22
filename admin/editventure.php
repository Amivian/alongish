<?php

if (isset($_POST['btn'])) 
  {
    $title = htmlentities(strip_tags($_POST['title']));
    $prodesc = htmlentities(strip_tags($_POST['joint_description']));
    $address = htmlentities(strip_tags($_POST['address']));
    $offer = htmlentities(strip_tags($_POST['offer']));
    $joint = htmlentities(strip_tags($_POST['joint_t&c']));
    $images = $_FILES['images'];
    $state = $_POST['state'];
    $city = $_POST['city'];

    if (isset($_POST['jointtype'])) {
        $extra = $_POST['jointtype'];
    }else{      
    $extra =array();
    }
    $pid = $_POST['p_id'];

    $obj = new admin\Property;
    $output = $obj->editJointVenture($title, $prodesc, $offer, $address, $joint, $state, $city, $extra, $images, $pid);
    if ($output) {
       $_SESSION['message']= "Property Edited successfully";
        header("Location: my-venture.php");
        exit();
    } else {
       $_SESSION['message']= "Failed to edit Property, Try again";
    }

  }
