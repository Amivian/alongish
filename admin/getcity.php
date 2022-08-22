<?php 
require('property.php');
$obj= new Property;
$m = $_GET['states_id'];
$obj ->get_city($m);
 ?>