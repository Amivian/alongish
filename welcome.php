<?php
    require 'include/active-user.php';

    
    $obj = new User;

    $props = new admin\Property;

    $email = $_SESSION['a_email'];

    if($email == false){

    header('Location: register.php');
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Welcome to Alongish</title>
    <?php require('include/head.php');?>
</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <div id="header">
                <?php require('include/header002.php');?>
            </div>
        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
    </div>
    </div>
    <!-- Header / End -->

    </header>
    <div class="clearfix"></div>
    <!-- Header Container / End -->
    <div class="container" style="margin:30px">
    <section class="m-5">
        <div class="text-heading text-center">
            <div class="container">
                <h3 class="mb-2">Welcome to Alongish</h3>      
                <div class="my-5">                
                    <?php
                        if(isset($_SESSION['message'])) {
                        echo '<h3 class="alert alert-success text-center">' . $_SESSION['message'] . '</h3>';
                        unset($_SESSION['info']);
                        }
                    ?>
                </div>

            </div>
        </div>
    </section>
    </div>
    
    <!-- END SECTION HEADINGS -->

    <?php include "include/foot.php"?>
    <?php require('include/footer.php');?>