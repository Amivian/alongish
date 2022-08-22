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
                      <a href="mailto:<?php echo  $member['email']; ?>"
                        title="<?php echo  $member['t_fname']; ?> Mail"><i class="fa fa-envelope" aria-hidden="true"
                          style="background:#FF385C"></i></a>
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
     
     require('include/footer.php');?>