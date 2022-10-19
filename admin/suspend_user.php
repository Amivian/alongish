<?php
    if(isset($_POST['featurebtn'])) {
        $id = $_POST['idd'];
        $featured = $_POST['handle'];
        $featuredProperty = new admin\Admin;
        $output= $featuredProperty-> setSuspendedUser($id,$featured);

        if ($output) {
            $_SESSION['message'] = " User Status Changed" ;
            header("location:reguser.php");
            exit();
        }
        else{
            $_SESSION['message'] = "Error adding record, try again";
            header("location:reguser.php");
            exit();
        }
    }
 