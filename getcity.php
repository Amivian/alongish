<?php 
    require('users.php');
    $obj= new User;
    $state_id = isset($_GET['states_id']) ? $_GET['states_id'] : 0;
    $city_id = isset($_GET['city']) ? $_GET['city'] : 0;
    $obj ->get_city($state_id, $city_id);
    