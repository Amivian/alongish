<?php
session_start();
require "contactus.php";
if(isset($_SESSION['id'])){
    
    require('users.php');
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
    <title>Contact Us</title>
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

    <section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Contact Us</h1>
                <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Contact Us</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION CONTACT US -->
    <section class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <h3 class="mb-4">Contact Us</h3>
                    <p class="text-success text-center"><?php echo $contact_us; ?></p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <div class="form-group">
                            <input type="text" required class="form-control input-custom input-full" name="fullname"
                                placeholder="Full Name" value="<?php echo $set_name;?>">
                            <p class="err-msg">
                                <?php if($nameErr!=1){ echo $nameErr; } ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control input-custom input-full" name="email"
                                placeholder="Email" value="<?php echo $set_email;?>">
                            <p class="err-msg">
                                <?php if($emailErr!=1){ echo $emailErr; } ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <input type="number" required class="form-control input-custom input-full" name="phone"
                                placeholder="Phone : +234" value="<?php echo $set_phone;?>">
                            <p class="err-msg">
                                <?php if($phoneErr!=1){ echo $phoneErr; } ?>
                            </p>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control textarea-custom input-full"  name="msg" required
                                rows="8" placeholder="Message" style="height:auto ! important"> <?php echo $set_msg;?>
                            </textarea>
                            <p class="err-msg">
                                <?php if($msgErr!=1){ echo $msgErr; } ?>
                            </p>
                        </div>
                        <button type="submit" id="submit-contact" class="btn btn-primary btn-lg" name="contact"
                        >Submit</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-12 bgc">
                    <div class="call-info">
                        <h3>Contact Details</h3>
                        <p class="mb-5">Please find below contact details and contact us today!</p>
                        <ul>
                            <li>
                                <div class="info">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <p class="in-p"> <a href="" style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;"> Federal Complex, Phase 1, Annex II</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <p class="in-p"><a href="tel:+2340908646633" style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">+2340908646633</a> </p>
                                </div>
                            </li>
                            <li>
                                <div class="info">
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <p class="in-p ti"><a href="mailto:support@alongish.com" style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">support@alongish.com</a> </p>
                                </div>
                            </li>
                            <li>
                                <div class="info cll">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    <p class="in-p ti"> <a href="" style="color: #fff; margin: 0px;margin-left: 1.5rem;font-weight: 300;">8:00 a.m - 9:00 p.m</a> </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION CONTACT US -->
    <?php include "include/foot.php"?>
    <?php require('include/footer.php')?>