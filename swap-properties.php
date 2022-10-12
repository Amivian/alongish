<?php

    require 'include/active-user.php';
        
    $obj = new User;

    $prop = new admin\Property;

    $output = $prop->showAllswaps();

    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Our Swaps Listings</title>
    <?php
require('include/head.php');
?>
</head>

<body class="inner-pages homepage-4 agents list hp-6 full hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <?php require('include/header002.php'); ?>
            </div>


        </header>
        <div class="clearfix"></div>
        <!-- Header ends -->

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="properties-list full featured portfolio blog">
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Our Swaps Listings</span></p>
                                </div>
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </section>
                <?php foreach($output as $property){ $img = $prop->getSwapImage($property['swap_id']);?>
                <div class="row featured portfolio-items">
                    <div class="my-3 row">
                        <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 ft aos-init aos-animate"
                            data-aos="fade-up">
                            <div class="project-single mb-0 bb-0">
                                <div class="project-inner project-head">
                                    <div class="home">
                                        <!-- homes img -->
                                        <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>"
                                            class="homes-img"> 
                                            <div class="homes-tag button alt sale"><?php echo $property['swap_item'] ?></div>
                                            <img src="images/swaps/<?php echo  $img; ?>" alt="<?php echo $property['swap_name'] ?>"
                                                class="img-responsive" style="width:720px ! important;height:280px!important" >
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>" class="btn"><i class="fa fa-link"></i></a>
                                        <a href="swap-details.php?id=<?php echo $property['swap_id'] ?>"
                                            class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- homes content -->
                        <div class="col-lg-8 col-md-12 homes-content pb-0 mb-44 aos-init aos-animate"
                            data-aos="fade-up">
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
                            
                            <p class="homes-address mb-3"><span style="font-weight:bold">Swap Need</span>  <?php echo $property['swap_need'] ?></p>
                            
                            <div class="footer">

                                <a href="agent-details.php?id=<?php echo $property['agent_id'] ?>">
                                    <img src="images/users/<?php echo $property['a_pix'] ?>" alt="" class="mr-2">
                                    <?php echo $property['a_fname'] ?> <?php echo $property['a_lname'] ?>
                                </a>
                                <span>
                                    <i class="fa fa-calendar" style="color: #696969"></i> <?php date_default_timezone_set("Africa/Lagos"); 
                                             echo date('F j, Y', strtotime($property['date_posted'])); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>

                <?php }?>


                <nav aria-label="..." class="pt-4">
                    <ul class="pagination lis-view">
                        <?php $prop->pagination_allswap('swap-properties.php',$page);?>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php include "include/foot.php"?>

        <?php require('include/footer.php'); ?>