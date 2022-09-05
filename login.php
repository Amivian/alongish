<?php
session_start();
require('users.php');
if(isset($_SESSION['id'])){
    $obj = new User;
    
    $k = $obj->getUser($_SESSION['id']);
    $agent_id = $_SESSION['id'];    
    $pix= $k['a_pix'];
    if (empty($pix)) {
        $pix = 'avatar.png';
    } 

}else{

}
?>

<?php 
require('property.php');
if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));

$obj = new Property;
$output=$obj->newsLetter( $email);
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Login</title>
<?php
require('include/head.php');
?>
</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
        <div id="header">
            <?php
require('include/header002.php');
?>
            </div>
            

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
                </div>
            </div>
            <!-- Header / End -->

        <!-- START SECTION LOGIN -->
        <div class="container mt-3">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <div id="login"  class="mb-5">
                    <div  class="login" style="max-width:440px !important">
                    <h1 class=" user-login__title ">Sign in to Your Account</h1>
                    <div class=" user-login__info mb-3">Don't have an account? <a
                            class=" user-login__info-link"
                            href="register.php">Create
                            one</a>.</div>
                   <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center text-dark'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
                <form id="user-form" action="loginprocess.php" method="post">
                    <div class="alert text-center">
                        <font color="#FF0000">
                        <?php
                            if(isset($_SESSION['action1'])) {
                                echo "<h6 class='alert alert-success text-center'>". $_SESSION['action1'] ."</h6>";
                                unset($_SESSION['action1']);
                            }
                        ?></font></div>
                    <div class="form-group">
                        <label>Email or Username</label>
                        <input type="text" class="form-control  form-control-lg" name="email" id="email" placeholder="name@example.com or username" required value="">
                        <i class="icon_mail_alt"></i>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control  form-control-lg" name="password" id="pwd" value="" required>
                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                    </div>
                        <div class="float-right mt-1"><a id="forgot" href="forgot-password.php">Forgot Password?</a></div>
                    </div>  
                    <button id="login" class="btn_1 rounded" style="width:70%" name="login" type="submit">Login</button>
                    <div class="text-center add_top_10 mb-5">New to Alongish? <strong><a href="register.php">Sign up!</a></strong></div>
                </form>
            </div>
        </div>
        </div>
        </div>
        </div>
                        </div>
        <!-- END SECTION LOGIN -->
        <?php include "include/foot.php"?>
     
<?php
require('include/footer.php');
?>

