<?php
session_start();
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
    <title>Affiliate</title>
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
          <h1>Affiliate Program</h1>
          <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Affiliate Program</h2>
        </div>
      </div>
    </section>

    <!-- START SECTION WHY CHOOSE US -->
    <section class="how-it-works bg-white-2">
      <div class="container">
        <div class="sec-title">
          <h2><span>Affiliate </span>Program</h2>
          <p>Our affiliates link will be for us to be able to sell  other companies
          properties via affiliate link . Also to create affiliate link for marketers to sell our
          own bulleting</p>
        </div>
      </div>
    </section>
    <!-- END SECTION WHY CHOOSE US -->

    <!-- START SECTION COUNTER UP -->
    <!-- <section class="counterup">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="countr">
              <i class="fa fa-home" aria-hidden="true"></i>
              <div class="count-me">
                <p class="counter text-left">300</p>
                <h3>Sold Houses</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="countr">
              <i class="fa fa-list" aria-hidden="true"></i>
              <div class="count-me">
                <p class="counter text-left">400</p>
                <h3>Daily Listings</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="countr mb-0">
              <i class="fa fa-users" aria-hidden="true"></i>
              <div class="count-me">
                <p class="counter text-left">250</p>
                <h3>Expert Agents</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="countr mb-0 last">
              <i class="fa fa-trophy" aria-hidden="true"></i>
              <div class="count-me">
                <p class="counter text-left">200</p>
                <h3>Won Awards</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- END SECTION COUNTER UP -->

  

    <!-- STAR SECTION PARTNERS -->
    <div class="partners bg-white-2">
      <div class="container">
        <div class="sec-title">
          <h2><span>Our </span>Partners</h2>
          <p>The Companies That Represent Us.</p>
        </div>
        <div class="owl-carousel style2">
          <div class="owl-item"><img src="images/partners/11.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/12.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/13.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/14.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/15.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/16.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/17.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/11.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/12.jpg" alt=""></div>
          <div class="owl-item"><img src="images/partners/13.jpg" alt=""></div>
        </div>
      </div>
    </div>
    <!-- END SECTION PARTNERS -->
    <?php include "include/foot.php"?>
    <?php
  require('include/footer.php');
?>