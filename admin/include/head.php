<?php
session_start();
if (empty($_SESSION['uname'])) {
    header('location:index.php');
}
require('../users.php'); 
$obj = new User;
$k = $obj->getUser($_SESSION['id']);
$agent_id=$_SESSION['id'];

$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
}
require('../property.php');
$prop= new Property;
$property = $prop->getAgentProperties($agent_id);

require('admin.php');
$admin = new Admin;


?>