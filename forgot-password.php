<?php
    require 'include/active-user.php';

    require 'forgotpasswordprocess.php';

    $user= new User;
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here"> 
    <meta name="author" content="">
    <title>Reset Password</title>
    <?php require('include/head.php');?>
</head>

<body class="inner-pages hd-white about">
    <div id="wrapper">
        <header id="header-container">
            <div id="header">
               <?php require('include/header002.php');?>
            </div>
        </header>
        <div class="clearfix"></div>
         </div>
            </div>
            <!-- Header / End -->

            <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div id="login"  class="mb-5">
                    <div  class="login" style="max-width:440px !important">
                    <h1 class=" user-login__title mb-0 ">Recovery Your Password</h1>
                    <?php
                        if(isset($_SESSION['message'])) {
                            echo "<p class='alert alert-danger text-center'>". $_SESSION['message'] ."</p>";
                            unset($_SESSION['message']);
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group text-center">
                            <label>Enter Your Email</label>
                            <input type="email" class="form-control  form-control-lg" 
                            name="email" placeholder="name@example.com" required value="">
                       </div>
                       <button id="login" class="btn_1 rounded full-width" name="forgot">Reset</button>
                  </form>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>
<?php include "include/foot.php"?>     
<?php require('include/footer.php'); ?>

