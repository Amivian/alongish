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
  
$obj = new Property;
$partner = $obj-> getPartnerImage();

if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));
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
        <p>Our affiliates link will be for us to be able to sell other companies
          properties via affiliate link . Also to create affiliate link for marketers to sell our
          own bulleting</p>
      </div>
    </div>
  </section>
  <!-- END SECTION WHY CHOOSE US -->

 
  <!--   START PARTNER  -->
  <div class="partners bg-white-2">
    <div class="container">
      <div class="sec-title">
        <h2><span>Our </span>Partners</h2>
        <p>The Companies That Represent Us.</p>
      </div>
      <div class="owl-carousel style2">
        <?php  foreach($partner as $img){ ?>
        <div class="owl-item"> <img style="opacity:1" src="images/partner/<?php echo $img['image_url'] ?>"></div>
        <?php }?>
      </div>
    </div>
  </div>
  <!-- END SECTION PARTNERS -->
  <?php include "include/foot.php"?>
  <?php
  require('include/footer.php');
?>