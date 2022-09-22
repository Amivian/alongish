<?php
    require 'include/active-user.php';

    
    $obj = new User;

    $props = new \admin\Property;

    $email = $_SESSION['a_email'];

    if($email == false){

    header('Location: login.php');
}

    require "newpasswordprocess.php";
?> 

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Create New Password</title>
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

            <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div id="login"  class="mb-5">
                    <div  class="login" style="max-width:440px !important"> 
                    <h1 class=" user-login__title mb-0 ">Create New Password</h1>      
                    <?php
                        if(isset($_SESSION['info'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['info'] ."</h6>";
                            unset($_SESSION['info']);
                        }
                    ?>
                                 
                <form action="" method="post">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control  form-control-lg" name="pwd"  placeholder="Password" required value=""> 
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                        <input type="password" class="form-control  form-control-lg" name="cpwd"  placeholder="Confirm Password" value="" required>
                    </div>
                    <button id="login" class="btn_1 rounded full-width" name="new-password">submit</button>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
                        </div>
        <!-- END SECTION LOGIN -->
        <?php include "include/foot.php"?>
     
       <?php require('include/footer.php'); ?>

