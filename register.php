<?php 
    require 'include/active-user.php';

    require "registerprocess.php";
    
    $obj = new User;
    
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Register</title><?php require('include/head.php');
?>
</head>

<body class="inner-pages hd-white about">
    <!-- < !-- Wrapper -->
    <div id="wrapper">
        <header id="header-container">
            <div id="header">
              <?php require('include/header002.php')?>
            </div>
        </header>
        <div class="clearfix"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div id="login" class="mb-5" style="border:0px">
                        <div class="login" style="border:2px solid grey">
                            <h3 style="font-weight:lighter" class="mb-4">Register</h3>
                              <?php
                               if(isset($_GET['msg'])) {
                                  echo '<div class="alert alert-info text-center">' .base64_decode(urldecode($_GET['msg'])) . '</div>';
                               }?>
                            <?php 
                                if(isset($_GET['verify'])) {
                                echo '<div class="alert alert-info text-center">' .base64_decode(urldecode($_GET['verify'])) . '</div>';
                                }  ?>
                            <?php
                             if(isset($_SESSION['message'])) {
                             echo '<div class="alert alert-success text-center">' . $_SESSION['message'] . '</div>';
                             unset($_SESSION['info']);
                              }?>
                            <form action="" method="POST" id="user_form">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>First Name</label>
                                        <input class="form-control form-control-lg" type="text" placeholder="First Name" id="fname" name="fname" required value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>">
                                    </div> 
                                    <span class="text-danger"><?php echo isset($form_errors['fname']) ? $form_errors['fname'] : '' ?></span>
                                   
                                    <div class="form-group col-md-6">
                                        <label>Last Name</label>
                                        <input class="form-control form-control-lg" type="text" placeholder=" Last Name" id="lname" name="lname" required value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>"></div>
                                </div>
                                    <span class="text-danger"><?php echo isset($form_errors['lname']) ? $form_errors['lname'] : '' ?></span>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Username</label>
                                        <input class="form-control form-control-lg" type="text"
                                            placeholder="" id="uname" name="uname" required value="<?php echo isset($_POST['uname']) ? $_POST['uname'] : '' ?>">
                                    </div>
                                    <span class="text-danger"><?php echo isset($form_errors['uname']) ? $form_errors['uname'] : '' ?></span>
                                    <div class="form-group col-md-6"><label>Email</label><input
                                            class="form-control form-control-lg" type="email"
                                            placeholder="Ex:example@domain.com" id="email" name="email" required
                                            value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                                        <div id="emailStatus"></div> 
                                    </div> <span class="text-danger"><?php echo isset($form_errors['email']) ? $form_errors['email'] : '' ?></span>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Password</label>
                                        <input class="form-control form-control-lg"
                                            type="password" name="pwd" id="pwd" placeholder="Password" required
                                            value="<?php echo isset($_POST['pwd']) ? $_POST['pwd'] : '' ?>">
                                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                                    </div> <span class="text-danger"><?php echo isset($form_errors['pwd']) ? $form_errors['pwd'] : '' ?></span>
                                    <div class="form-group col-md-4">
                                        <label>Confirm Password</label>
                                        <input class="form-control form-control-lg" type="password"
                                            name="cpwd" id="cpwd" placeholder="Confirm Password" required value="<?php echo isset($_POST['cpwd']) ? $_POST['cpwd'] : '' ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="input-lg">Phone Number</label>
                                        <input class="form-control form-control-lg input-lg"
                                            type="number" placeholder="+234" id="number" name="phone" required
                                            value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                                            <input type="hidden" name="code" value="">
                                            <input type="hidden" name="status" value="">
                                    </div> <span class="text-danger"><?php echo isset($form_errors['phone']) ? $form_errors['phone'] : '' ?></span>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6 form-group "><label for="state">States</label><span
                                            class="important">*</span><?php $obj->get_state();?></div>
                                    <div class="col-md-6  form-group ">
                                        <label for="city">City</label>
                                        <div type="text" name="city" id="citi"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div>
                                            <label for="agree">
                                                <input type="checkbox" name="agree" id="agree"
                                                    value="yes" />I
                                                agree with the <a href="#" title="term of services">term of
                                                    services</a></label></div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <button class="btn_1 rounded add_top_30 mt-3" style="width:60%" type="submit"
                                        id="regbtn" name="regbtn">Register</button>
                                </div>
                                <div class="text-center add_top_10">Already have an acccount?
                                    <strong><a href="login.php">Sign In</a></strong></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "include/foot.php"?>
        <!-- < !-- END SECTION register -->
        <?php require('include/footer.php');?>