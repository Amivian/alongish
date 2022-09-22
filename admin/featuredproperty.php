<?php
    if(isset($_POST['featurebtn'])) {
        $iddd = $_POST['idd'];
        $featured = $_POST['feature'];
        $featuredProperty = new admin\Property;
        $output= $featuredProperty->setFeaturedProperty($iddd,$featured);

        if ($output) {
            $_SESSION['message'] = " Property Featured changed " ;
            header("location:manage-properties.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Error adding record, try again";
            header("location:manage-properties.php");
            exit();
        }
    }
 ?> 