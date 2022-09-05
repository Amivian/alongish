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
require('property.php');
$prop = new Property;
$output= $prop->showAdminProperty();
$team = $prop->showTeamMembers();
?>

<?php 

if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));
$mail=$prop->newsLetter( $email);
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta name="description" content="Find your desired home here">
  <meta name="author" content="">
  <title>Sponsorship</title>
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
        <h1>Project Sponsorship</h1>
        <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Project Sponsorship</h2>
      </div>
    </div>
  </section>
  <!-- START SECTION WHY CHOOSE US -->
  <section class="how-it-works bg-white-2">
    <div class="container">
      <div class="sec-title">
        <h2><span>Project </span>Sponsorship</h2>
        <p>Project sponsorship is smart way to acquire land at rock botton price. This is how
          the big real estate companies in lagos and Abuja acquire large acres of land at a
          fraction of the price. They sponsor a land project such:
          <ul style="list-style:none; margin:0; padding:0">
            <li> 1 Land Clearing</li>
            <li> 2 Road
              Construction Sponsorship</li>
            <li> 3 Layout/Survey Documentation Sponsorship </li>
            <li> 4
              Land Reclaimation Sponsorship</li>
          </ul> In return , sponsors are offer plots of land as which is often %250 value of
          the total amount that you may have spent on the project. Depending on the
          contract agreement , sponsors can get as much as 1 plot per acre , 2 plots per acre.</p>
        <p><b>Note that Entry fee (owo iwoko) (₦1 million - ₦5 million): usually negotiable, is required to register
            your interest with the family.</b></p>
      </div>
      <div class="row service-1">
        <article class="col-lg-6 col-md-6 col-xs-12 serv pb-4" data-aos="fade-up">
          <div class="serv-flex">
            <div class="art-1 img-13">
              <img src="images/icons/icon-4.svg" alt="">
              <h3>CLEARING SPONSORSHIP</h3>
            </div>
            <div class="service-text-p">
              <p class="text-center">In this sponsorship you offer to clear the land for the family and they in turn
                would offer you plots of land as reward.<br><br><br></p>
            </div>
          </div>
        </article>
        <article class="col-lg-6 col-md-6 col-xs-12 serv" data-aos="fade-up">
          <div class="serv-flex">
            <div class="art-1 img-14">
              <img src="images/icons/icon-5.svg" alt="">
              <h3>ROAD CONSTRUCTION SPONSORSHIP</h3>
            </div>
            <div class="service-text-p">
              <p class="text-center">This sponsorship involves constructing an accessible road from the land to the
                nearest expressway through a particular path in the community. Also depending
                on the negotiation, they may offer you a plot for each acre or total volume of the
                said land in question.</p>
            </div>
          </div>
        </article>
        <article class="col-lg-6 col-md-6 col-xs-12 serv mb-0 pb-4" data-aos="fade-up">
          <div class="serv-flex arrow">
            <div class="art-1 img-15">
              <img src="images/icons/icon-6.svg" alt="">
              <h3>LAND RECLAIMATION SPONSORSHIP</h3>
            </div>
            <div class="service-text-p">
              <p class="text-center">For property seating on wetlands, swampy land, land close to the lagoon or
                atlantic, this sponsorship involves offering to sandfill or reclaim part of the land
                for the family and getting an offer based on the total volume of land.<br><br>
              </p>
            </div>
          </div>
        </article>
        <article class="col-lg-6 col-md-6 col-xs-12 serv mb-0 pb-4" data-aos="fade-up">
          <div class="serv-flex arrow">
            <div class="art-1 img-15">
              <img src="images/icons/icon-6.svg" alt="">
              <h3>Survey/Documentation Sponsorship</h3>
            </div>
            <div class="service-text-p">
              <p class="text-center">In this sponsorship, you offer to survey and register the survey plan for the
                family
                per the whole volume of land. After which you can help process/ratify and
                facilitate the land documentation at the registry. This is in the case that the land
                in undocumented or not properly documented.</p>
            </div>
          </div>
        </article>
      </div>      
      <div class="bg-all">
          <a href="joint-venture.php" class="btn btn-outline-light">View Projects</a>
        </div>
    </div>
  </section>
  <!-- END SECTION WHY CHOOSE US -->


  <?php include "include/foot.php"?>

  <?php
     
     require('include/footer.php');?>