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
$swaps=$prop->showAdminswaps();
$joint=$prop->showAdminJointventure();
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
  <title>Projects</title>
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
        <h1>Explore Our Projects</h1>
        <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Our Projects</h2>
      </div>
    </div>
  </section>
  <!-- END SECTION HEADINGS -->

  <!-- START OF FEATURED PROJECTS -->
  <section class="featured portfolio bg-white-2 rec-pro full-l">
    <div class="container">
      <div class="sec-title">
        <h2><span>Our </span>Property Listings</h2>
        <p>Explore our extensive list of both ongoing and completed projects</p>
      </div>

      <div class="row portfolio-items">
        <?php
          foreach($output as $property){
          $img = $prop-> getSingleImage($property['property_id']);
        ?>
        <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
          <div class="project-single" data-aos="fade-right">
            <div class="project-inner project-head">
              <div class="homes">
                <!-- homes img -->
                <a href="property-details.php?id=<?php echo $property['property_id'] ?>" class="homes-img">
                  <?php 
                                                if($property['feature'] == 'featured'){
                                                    ?>
                  <div class="homes-tag button alt featured">
                    <?php  echo $property['feature'] ?></div>
                  <?php }?>
                  <div class="homes-tag button alt sale"><?php echo $property['pstatus_name'] ?></div>
                  <!-- <div class="homes-price">₦<?php echo $property['property_price'] ?></div> -->
                  <img src="images/property/<?php echo  $img; ?>" alt="<?php echo $property['property_title'] ?>"
                    class="img-fluid" data-size="">
                </a>
              </div>
              <div class="button-effect">
                <a href="property-details.php?id=<?php echo $property['property_id'] ?>" class="btn"><i
                    class="fa fa-link"></i></a>
                <a href="property-details.php?id=<?php echo $property['property_id'] ?>" class="img-poppu btn"><i
                    class="fa fa-photo"></i></a>
              </div>
            </div>
            <!-- homes content -->
            <div class="homes-content">
              <!-- homes address -->
              <h3><a
                  href="property-details.php?id=<?php echo $property['property_id'] ?>"><?php echo $property['property_title'] ?></a>
              </h3>
              <p class="homes-address mb-3">
                <a href="property-details.php?id=<?php echo $property['property_id'] ?>">
                  <i class="fa fa-map-marker"></i><span>
                    <?php echo $property['property_address'] ?>,
                    <?php echo $property['city_name'] ?>,
                    <?php echo $property['states_name'] ?></span>
                </a>
              </p>
              <!-- homes List -->
              <ul class="homes-list clearfix pb-3">
                <li class="the-icons">
                  <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                  <span><?php echo $property['bedroom_no'] ?> Bedrooms</span>
                </li>
                <li class="the-icons">
                  <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                  <span><?php echo $property['bathroom_no'] ?> Bathrooms</span>
                </li>
                <li class="the-icons">
                  <i class="flaticon-square mr-2" aria-hidden="true"></i>
                  <span><?php echo $property['property_area'] ?> sqf</span>
                </li>
              </ul>
              <div class="price-properties footer pt-3 pb-0">
                <h3 class="title mt-3">
                  <a href="property-details.php?id=<?php echo $property['property_id'] ?>">₦
                    <?php echo $property['property_price'] ?></a>
                </h3>
                <div class="compare">
                  <a href="agent-details.php">
                    <img style=" height: 40px; border-radius: 50%;" src="images/users/<?php echo $property['a_pix'] ?>"
                      alt="Alongish" class="mr-2"><?php echo ucfirst($property['a_username'])?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        }
        ?>
      </div>
      <div class="bg-all">
        <a href="alongish-properties.php" class="btn btn-outline-light">View Property Listings</a>
      </div>
    </div>
  </section>
  <!-- END OF FEATURED PROJECTS -->


  <!--Swap Properties  -->

  <section class="featured portfolio bg-white-2 rec-pro full-l">
    <div class="container">
      <div class="sec-title">
        <h2><span>Our </span>Swaps</h2>
      </div>

      <div class="row portfolio-items">
        <?php
          foreach($swaps as $property){
          $img = $prop->getSwapImage($property['swap_id']);
        ?>
        <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
          <div class="project-single" data-aos="fade-right">
            <div class="project-inner project-head">
              <div class="homes">
                <!-- homes img -->
                <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>" class="homes-img">
                  <div class="homes-tag button alt sale"><?php echo $property['swap_item'] ?></div>
                  <img src="images/swaps/<?php echo  $img; ?>" alt="<?php echo $property['swap_name'] ?>"
                    class="img-fluid">
                </a>
              </div>
              <div class="button-effect">
                <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>" class="btn"><i
                    class="fa fa-link"></i></a>
                <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>" class="img-poppu btn"><i
                    class="fa fa-photo"></i></a>
              </div>
            </div>
            <!-- homes content -->
            <div class="homes-content">
              <!-- homes address -->
              <h3><a
                  href="swap-details.php?id=<?php echo $property['swap_id'] ?>"><?php echo $property['swap_name'] ?></a>
              </h3>
              <p class="homes-address mb-3">
                <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>">
                  <i class="fa fa-map-marker"></i><span><?php echo $property['swap_address'] ?>,
                    <?php echo $property['city_name'] ?>,
                    <?php echo $property['states_name'] ?></span>
                </a>
              </p>
              <!-- homes List -->
              <p class="homes-address mb-3"><?php echo $property['swap_description'] ?></p>

              <p class="homes-address mb-3"><span style="font-weight:bold">Swap Need</span>
                <?php echo $property['swap_need'] ?></p>

              <!-- homes List -->
              <div class="price-properties footer pt-3 pb-0">
                <h3 class="title mt-3"></h3>
                  <div class="compare">
                    <a href="agent-details.php">
                      <img style=" height: 40px; border-radius: 50%;"
                        src="images/users/<?php echo $property['a_pix'] ?>" alt="Alongish"
                        class="mr-2"><?php echo ucfirst($property['a_username'])?>
                    </a>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        }
        ?>
      </div>
      <div class="bg-all">
        <a href="alongish-swaps.php" class="btn btn-outline-light">View Swap Properties</a>
      </div>
    </div>
  </section>

  <!--/Swap Properties  -->


  <!-- JOINT VENTURE PROPERTIES -->


  <section class="featured portfolio bg-white-2 rec-pro full-l">
    <div class="container">
      <div class="sec-title">
        <h2><span>Our </span>Joint Ventures</h2>
      </div>

      <div class="row portfolio-items">
        <?php
          foreach($joint as $list){
          $img = $prop-> getsponsorshipImage($list['jointventure_id']);
          $type=$prop->getSponsorshipNeed($list['jointventure_id']);
        ?>
        <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
          <div class="project-single" data-aos="fade-right">
            <div class="project-inner project-head">
              <div class="homes">
                <!-- homes img -->
                <a href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>" class="homes-img"><img
                    src="images/sponsor/<?php echo $img?>" alt="<?php echo $list['joint_title'] ?>"
                    style="width:720px !important; height:280px !important" class="img-responsive"></a>
              </div>
              <div class="button-effect"><a href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"
                  class="btn"><i class="fa fa-link"></i></a><a
                  href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>" class="img-poppu btn"><i
                    class="fa fa-photo"></i></a></div>
            </div>
            <!-- homes content -->
            <div class="homes-content">
              <!-- homes address -->
              <h3><a
                  href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"><?php echo $list['joint_title'] ?></a>
              </h3>
              <p class="homes-address mb-3"><a
                  href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"><i
                    class="fa fa-map-marker"></i><span><?php echo ucwords($list['address'] )?>,
                    <?php echo $list['city_name'] ?>,
                    <?php echo $list['states_name'] ?></span></a></p>
              <!-- < !-- property description -->
              <p class="homes-address mb-3">
                <?php echo $list['joint_description'] ?></p>
              <!-- < !-- Sponsorship need -->
              <ul class="homes-list clearfix pb-3">
                <li class="the-icons"><span><b>Sponsorship: </b><?php foreach($type as $extras) {
                   ?><?php echo $extras['joint_name']?><br><?php } ?></span></li>
              </ul>
              <div class="price-properties footer pt-3 pb-0">
                <h3></h3>
                <div class="compare">
                  <a href="agent-details.php">
                    <img style=" height: 40px; border-radius: 50%;" src="images/users/<?php echo $property['a_pix'] ?>"
                      alt="Alongish" class="mr-2"><?php echo ucfirst($property['a_username'])?>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        }
        ?>
      </div>
      <div class="bg-all">
        <a href="alongish-joint-ventures.php" class="btn btn-outline-light">View Joint Venture Properties</a>
      </div>
    </div>
  </section>

  <!-- JOINT VENTURE PROPERTIES -->

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

  <?php include "include/foot.php"?>
  <?php
  require('include/footer.php');
?>