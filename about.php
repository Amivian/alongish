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
$team = $obj->showTeamMembers();

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
    <title>About Us</title>
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

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>About Our Company</h1>
                    <h2><a href="index.php">Home </a> &nbsp;/&nbsp; About Us</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION ABOUT -->
        <section class="about-us fh">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 who-1">
                        <div>
                            <h2 class="text-left mb-4">About <span>Alongish</span></h2>
                        </div>
                        <div class="pftext">
                            <p>We provide our clients with A-Z of building and construction of private and
                            commercial buldings. From land aquisition, to buiding, to roofing, and final finishes to
                            homes and commercial buildings. We offer integrated expertise across all property
                            sectors, including: office, retail, hotel, industrial, logistics, prime domestic,
                            international and residential.</p>

                            <p>As a full-service real estate business, our clients can
                            seamlessly access definitive commercial and residential property advice, driving
                            meaningful value and ensuring a cohesive approach, as they seek to effectively
                            manage their local and overseas property interests.</p>
                        </div>
                        <div>
                            <h2 class="text-left mb-4">Our <span>Vision</span></h2>
                        </div>
                        <div class="pftext">
                            <p>Our Vision is to be the leading real estate service provider in the real estate
                                economy . We consistently strive to develop collaborative partnerships, based on
                                transparency and mutual trust, which serve to build enduring client relationships.
                                As we expand, we’re committed to these principles, which have served our
                                company and clients through the years.</p>
                        </div>
                        <div>
                            <h2 class="text-left mb-4">Our <span>Mission</span></h2>
                        </div>
                        <div class="pftext">
                            <p>We’re dedicated to achieving our vision by creating an energetic, positive, results driven work environment
                                focused on
                                the investment and development of long term relationships. We measure our success by the results delivered to
                                clients.
                                Our ethics are built on our commitment to offer superior customer service,
                                combining an entrepreneurial flair and bespoke service of a fast-growing
                                organisation.</p>
                        </div>
                        <!-- <div class="box bg-2">
                            <a href="about.php" class="text-center button button--moema button--text-thick button--text-upper button--size-s">read More</a>
                            <img src="images/signature.png" class="ml-5" alt="">
                        </div> -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12 h-100">
                        <div class="wprt-image-video w80">
                            <img alt="image" src="images/bg/bg-video.jpg">
                            <a class="icon-wrap popup-video popup-youtube" href="https://www.youtube.com/watch?v=2xHQqYRcrx4">
                                <i class="fa fa-play"></i>
                            </a>
                            <div class="iq-waves">
                                <div class="waves wave-1"></div>
                                <div class="waves wave-2"></div>
                                <div class="waves wave-3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </section>
        <!-- END SECTION ABOUT -->

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
        $image = $obj-> getTeamImage($member['team_id']);
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