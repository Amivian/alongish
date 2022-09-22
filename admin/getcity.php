<?php 
require('property.php');
$property= new \admin\Property;
$state_id = isset($_GET['states_id']) ? $_GET['states_id'] : 0;
$city_id = isset($_GET['city']) ? $_GET['city'] : 0;
$get=$property ->get_city($state_id, $city_id);

