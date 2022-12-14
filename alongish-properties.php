<?php
    require 'include/active-user.php';
    
    $obj = new User;

    $prop = new \admin\Property;

    $output= $prop->showAdminProperties();

    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Alongish Listings</title>
    <?php require('include/head.php'); ?>
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
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span> <a href="">Our Listings</a></span></p>
                                </div>                               
                                <h3 class="search-title">Our Verified Property Listings</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                <div class="col-12 px-0 parallax-searchs">
                    <div class="banner-search-wrap">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <form action="property-search.php">
                                    <div class="row">
                                        <div class="rld-single-input">
                                            <input type="text" placeholder="Enter Keyword..." name="search">
                                        </div>
                                        <div class="rld-single-select ml-4" style="margin-right:15px">
                                            <input name="type" value="property_name" type="hidden"
                                                class="form-control">
                                            <?php $prop->getPropertytype();?>

                                        </div>
                                        <div class="rld-single-select ml-4" style="margin-right:15px">
                                            <input name="state" value="state" type="hidden"
                                                class="form-control">
                                            <?php $prop->city();?>
                                        </div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                            <button name="" class="btn btn-yellow" type="submit">Search Now</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Search Form -->
                <section class="headings-2 pt-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="font-weight-bold mb-0 mt-3"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php if(!empty($output)){
                    foreach($output as $property){
                      $img = $prop-> getSingleImage($property['property_id']);
                ?>
                <div class="row featured portfolio-items">
                    <div class="my-3 row">
                        <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 ft aos-init aos-animate"
                            data-aos="fade-up">
                            <div class="project-single mb-0 bb-0">
                                <div class="project-inner project-head">
                                    <div class="home">
                                        <!-- homes img -->
                                        <a href="property-details.php?id=<?php echo $property['property_id'] ?>"
                                            class="homes-img">
                                            <div class="homes-tag button alt featured">
                                            <?php 
                                                if($property['feature'] == 'featured'){
                                                    ?>
                                                    <div class="homes-tag button alt featured">                                             
                                                    <?php  echo $property['feature'] ?></div>
                                                    <?php }?>
                                            </div>
                                            <div class="homes-tag button alt sale">
                                                <?php echo $property['pstatus_name'] ?></div>
                                            <div class="homes-price">???<?php echo $property['property_price'] ?></div>
                                            <img src="images/property/<?php echo  $img; ?>" alt="<?php echo $property['property_title'] ?>"
                                            class="img-responsive" style="width:720px ! important;height:280px!important" >
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="property-details.php?id=<?php echo $property['property_id'] ?>" class="btn"><i class="fa fa-link"></i></a>
                                        <a href="property-details.php?id=<?php echo $property['property_id'] ?>"
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
                                    href="property-details.php?id=<?php echo $property['property_id'] ?>"><?php echo $property['property_title'] ?></a>
                            </h3>
                            <p class="homes-address mb-3">
                                <a href="property-details.php?id=<?php echo $property['property_id'] ?>">
                                    <i class="fa fa-map-marker"></i><span><?php echo $property['property_address'] ?>,
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
                                    <span><?php echo $property['property_area'] ?></span>
                                </li>
                            </ul>
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
                <?php 
                 $get = $prop->pagination_alongishListing('alongish-properties.php',$page);?>
            </ul>
                </nav>
                <?php }else{ ?>
                <div>  <h4 class="text-danger text-center">No Record Avaliable </h4>  </div>
            <?php }?>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php include "include/foot.php"?>
        <?php require('include/footer.php'); ?>