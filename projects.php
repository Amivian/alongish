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
        <h2><span>Our </span>Projects</h2>
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
              <a href="property-details.php?id=<?php echo $property['property_id'] ?>" class="btn"><i class="fa fa-link"></i></a>
              <a href="property-details.php?id=<?php echo $property['property_id'] ?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
              </div>
            </div>
            <!-- homes content -->
            <div class="homes-content">
              <!-- homes address -->
              <h3><a href="property-details.php?id=<?php echo $property['property_id'] ?>"><?php echo $property['property_title'] ?></a></h3>
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
                <a href="property-details.php?id=<?php echo $property['property_id'] ?>">₦ <?php echo $property['property_price'] ?></a>
                </h3>
                <div class="compare">
                <a href="agent-details.php">
               <img style=" height: 40px; border-radius: 50%;"src="images/users/<?php echo $property['a_pix'] ?>" alt="Alongish" class="mr-2"><?php echo ucfirst($property['a_username'])?>
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
          <a href="alongish-properties.php" class="btn btn-outline-light">View More</a>
        </div>
    </div>
  </section>
  <!-- END OF FEATURED PROJECTS -->

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

  <!-- START SECTION AGENTS -->
  <section class="team">
    <div class="container">
      <div class="sec-title">
        <h2><span>Our </span>Team</h2>
        <p>We provide full service at every step.</p>
      </div>
      <div class="row team-all">
        
      <?php
         foreach($team as $member){
        $image = $prop-> getTeamImage($member['team_id']);
      ?>
        <div class="col-lg-3 col-md-6 team-pro">
          <div class="team-wrap">
            <div class="team-img">
              <img src="images/team/<?php echo  $image; ?>" alt="<?php echo  $member['t_fname']; ?>" />
            </div>
            <div class="team-content">
              <div class="team-info">
                <h3><?php echo  $member['t_fname']; ?></h3>
                <p><?php echo  $member['position_held']; ?></p>
                 <div class="team-socials">
                    <ul>
                      <li>
                      <a href="mailto:<?php echo  $member['email']; ?>" title="<?php echo  $member['t_fname']; ?> Mail"><i class="fa fa-envelope" aria-hidden="true" style="background:#FF385C"></i></a>
                    <!-- <a href="#" title="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" title="instagran"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->
                      </li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
  <!-- END SECTION AGENTS -->

  <!-- START SECTION TESTIMONIALS -->
  <!-- <section class="testimonials home18 bg-white">
    <div class="container">
      <div class="sec-title">
        <h2><span>Clients </span>Testimonials</h2>
        <p>We collect reviews from our customers.</p>
      </div>
      <div class="owl-carousel style1">
        <div class="test-1 pb-0 pt-0">
          <img src="images/testimonials/ts-1.jpg" alt="">
          <h3 class="mt-3 mb-0">Lisa Smith</h3>
          <h6 class="mt-1">New York</h6>
          <ul class="starts text-center mb-2">
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit
            tortor et sapien donec.</p>
        </div>
        <div class="test-1 pb-0 pt-0">
          <img src="images/testimonials/ts-2.jpg" alt="">
          <h3 class="mt-3 mb-0">Jhon Morris</h3>
          <h6 class="mt-1">Los Angeles</h6>
          <ul class="starts text-center mb-2">
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star-o"></i>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit
            tortor et sapien donec.</p>
        </div>
        <div class="test-1 pt-0">
          <img src="images/testimonials/ts-3.jpg" alt="">
          <h3 class="mt-3 mb-0">Mary Deshaw</h3>
          <h6 class="mt-1">Chicago</h6>
          <ul class="starts text-center mb-2">
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit
            tortor et sapien donec.</p>
        </div>
        <div class="test-1 pt-0">
          <img src="images/testimonials/ts-4.jpg" alt="">
          <h3 class="mt-3 mb-0">Gary Steven</h3>
          <h6 class="mt-1">Philadelphia</h6>
          <ul class="starts text-center mb-2">
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star-o"></i>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit
            tortor et sapien donec.</p>
        </div>
        <div class="test-1 pt-0">
          <img src="images/testimonials/ts-5.jpg" alt="">
          <h3 class="mt-3 mb-0">Cristy Mayer</h3>
          <h6 class="mt-1">San Francisco</h6>
          <ul class="starts text-center mb-2">
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit
            tortor et sapien donec.</p>
        </div>
        <div class="test-1 pt-0">
          <img src="images/testimonials/ts-6.jpg" alt="">
          <h3 class="mt-3 mb-0">Ichiro Tasaka</h3>
          <h6 class="mt-1">Houston</h6>
          <ul class="starts text-center mb-2">
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star"></i>
            </li>
            <li><i class="fa fa-star-o"></i>
            </li>
          </ul>
          <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit
            tortor et sapien donec.</p>
        </div>
      </div>
    </div>
  </section> -->
  <!-- END SECTION TESTIMONIALS -->

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