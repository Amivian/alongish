<?php
    require "include/active-user.php";

    require "resetcodeprocess.php";

    $user = new User;
    
    $email = $_SESSION['a_email'];
    if($email == false){
    header('Location: login.php');
    }

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Code Verification</title>
    <?php require('include/head.php'); ?>
</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
        <div id="header">
            <?php require('include/header002.php'); ?>
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
                    <h1 class=" user-login__title mb-0 ">Code Verification</h1>
                    <?php
                        if(isset($_SESSION['info'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['info'] ."</h6>";
                            unset($_SESSION['info']);
                        }
                    ?>
                    
                    <?php
                        if(isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']);
                        }
                    ?>
                   <form action="" method="post">
                        <div class="form-group text-center mt-2">
                            <input type="number" class="form-control  form-control-lg"  name="code" placeholder="Enter Code" required value="">
                        </div>
                        <button id="login" class="btn_1 rounded full-width" name="reset">submit</button>
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

