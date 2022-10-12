<?php
    require 'include/active-user.php';

    
    $obj = new User;

    $props = new admin\Property;

    $team = $props->showTeamMembers();

    $partner = $props-> getPartnerImage();

    $admin = $props-> getAdmin();
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>About Us</title>
    <?php require('include/head.php');?>
</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <div id="header">
                <?php require('include/header002.php');?>
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
                        <p> <?php echo ucfirst($admin['about'])?></p> 
                    </div>
                    <div>
                        <h2 class="text-left mb-4">Our <span>Vision</span></h2>
                    </div>
                    <div class="pftext">
                        <p><?php echo ucfirst($admin['vision'])?></p>
                    </div>
                    <div>
                        <h2 class="text-left mb-4">Our <span>Mission</span></h2>
                    </div>
                    <div class="pftext">
                        <p><?php echo ucfirst($admin['mission'])?></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 h-100">
                    <div class="wprt-image-video w80">
                        <img alt="image" src="images/bg/bg-video.jpg">
                        <a class="icon-wrap popup-video popup-youtube"
                            href="https://www.youtube.com/watch?v=2xHQqYRcrx4">
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

    <!-- START SECTION AGENTS -->
    <section class="team mb-5">
        <div class="container">
            <div class="sec-title">
                <h2><span>Our </span>Team</h2>
                <p>We provide full service at every step.</p>
            </div>
            <div class="row team-all">

                <?php
                    foreach($team as $member){
                    $image = $props-> getTeamImage($member['team_id']);
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
                                                title="<?php echo  $member['t_fname']; ?> Mail"><i
                                                    class="fa fa-envelope" aria-hidden="true"
                                                    style="background:#FF385C"></i></a>
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

        <!--   START PARTNER  -->
    <div class="partners bg-white-2 mt-5">
        <div class="container">
            <div class="sec-title">
                <h2><span>Our </span>Partners</h2>
                <p>The Companies That Represent Us.</p>
            </div>
            <div class="owl-carousel style2">
            <?php  foreach($partner as $img){ ?>
               <div class="owl-item"> <img style="opacity:1" src="images/partner/<?php echo $img['image_url'] ?>"
                   ></div>
                <?php }?>
            </div>
        </div>
    </div>   
     <!-- END SECTION PARTNERS -->
    <?php include "include/foot.php"?>
    <?php require('include/footer.php');?>