<?php 
    require 'include/active-user.php';
    
    $obj = new User;

    $prop = new admin\Property;

    $id = $_GET['id'];

    $property = $prop->showPropertyDetails($id);

    $extra = $prop->getPropertyAmenities($id);

    $images = $prop->getAllImages($id);

    $recent = $prop->showRecentProperties();

    $swap = $prop->showSwaps();


?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Property Details</title>
    <?php require('include/head.php'); ?>
</head>

<body class="inner-pages sin-1 ">
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
        <section class="single-proper blog details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper" style="justify-content: space-between;">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3><?php echo $property['property_title'] ?>
                                                <?php if(!empty ($property['pstatus_name']))
                                                { echo "<span class='mrg-l-5 category-tag' style='top:-15px'> " . $property['pstatus_name']. "</span>";
                                                }?>
                                                </h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i
                                                            class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo ucwords($property['property_address']) ?>
                                                        ,
                                                        <?php echo $property['city_name'] ?> ,
                                                        <?php echo $property['states_name'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="detail-wrapper-body">
                                                <div class="listing-title-bar">
                                                    <h4>₦<?php echo $property['property_price'] ?></h4>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- main slider carousel items -->
                                <!-- main slider carousel items -->
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="w3-content w3-display-container" style="max-width:800px">
                                        <?php  foreach($images as $img){ ?>

                                        <img class="mySlides" src="images/property/<?php echo $img['image_url'] ?>"
                                            style="width:100%" width="683px" height="455px">

                                        <?php }?>

                                        <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle"
                                            style="width:100%">
                                            <div class="d-none w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">
                                                &#10094;</div>
                                            <div class="d-none w3-right w3-hover-text-khaki" onclick="plusDivs(1)">
                                                &#10095;</div>
                                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                                                onclick="currentDiv(1)"></span>
                                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                                                onclick="currentDiv(2)"></span>
                                            <span class="w3-badge demo w3-border w3-transparent w3-hover-white"
                                                onclick="currentDiv(3)"></span>
                                        </div>
                                    </div>  
                                    <div class="carousel-inner"> 
                                        <div class="active item carousel-item" data-slide-number="0">
                                            <img src="images/property/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="slider-listing" width="683px" height="455px">
                                        </div>

                                        <?php foreach($images as $img){  ?>

                                        <div class="item carousel-item" data-slide-number="1">
                                            <img src="images/property/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="slider-listing" width="683px" height="455px">
                                        </div>

                                        <a class="carousel-control left" href="#listingDetailsSlider"
                                            data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider"
                                            data-slide="next"><i class="fa fa-angle-right"></i></a>
                                        <?php }?>

                                    </div>


                                    <!-- main slider carousel items -->
                                </div>
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    <p class="mb-3"><?php echo $property['property_description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mb-4">Property Details</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <span class="font-weight-bold mr-1">Property Type:</span>
                                    <span class="det"><?php echo $property['ptype_name']?> </span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property status:</span>
                                    <span class="det"><?php echo $property['pstatus_name']?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Property Price:</span>
                                    <span class="det">₦<?php echo $property['property_price']?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bedrooms:</span>
                                    <span class="det"><?php echo $property['bedroom_no']?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Bathrooms:</span>
                                    <span class="det"><?php echo $property['bathroom_no']?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Furnished:</span>
                                    <span class="det"><?php echo $property['furnished']?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Serviced:</span>
                                    <span class="det"><?php echo $property['serviced']?></span>
                                </li>
                                <li>
                                    <span class="font-weight-bold mr-1">Shared:</span>
                                    <span class="det"><?php echo $property['shared']?></span>
                                </li>
                            </ul>

                            <!-- title -->
                            <h5 class="mt-5">Amenities</h5>
                            <!-- cars List -->
                            <ul class="homes-list clearfix">
                                <?php foreach($extra as $extras){ ?>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span><?php echo $extras['pfeature_name'];?></span>
                                </li>
                                <?php  }?>
                            </ul>
                        </div>
                         
                        <!-- Disclaimer -->
                        <?php if($property['businessname'] != 'Behomes'){ ?>
                        <div class="single homes-content details mb-30">
                            <h5 class="mb-4">Disclaimer</h5> The information displayed about this property consist a property advertisement. ALONGISH makes no warranty as to the accuracy or completeness of the advertisement or any linked or associated information, and ALONGISH has no control over the content. This property listing does not constitute property particulars. ALONGISH shall not in any way be held liable for the actions of any agent and/or property owner/landlord on or off this website.
                        </div>
                            <?php }?>
                        <!-- End Add Review -->
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- start author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33 mt-5">
                                    <div class="widget-boxed-header" style="margin-bottom: 0px; padding-bottom: 0px">
                                        <h4 style="margin-bottom: 0px; padding-bottom: 25px">Agent Information</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="sidebar-widget author-widget2">
                                            <div class="author-box clearfix">
                                                <img src="images/users/<?php echo $property['a_pix'] ?>"
                                                    alt="agent-image" class="author__img">
                                                <h4 class="author__title"><?php echo ucfirst($property['a_fname']) ?>
                                                    <?php echo ucfirst($property['a_lname'] )?></h4>
                                                <p class="author__meta">Agent of Property</p>
                                            </div>
                                            <ul class="author__contact">
                                                <li><span class="la la-phone"><i class="fa fa-phone"
                                                            aria-hidden="true"></i><a
                                                            href="tel:<?php echo substr($property['a_phone'], 0,-6)?>***"
                                                            id="phone1"
                                                            style="display:inline"><?php echo substr($property['a_phone'], 0,-6)?>***</a>
                                                        <a href="tel:<?php echo $property['a_phone'] ?>" id="phone"
                                                            style="display:none; margin-left:3px">
                                                            <?php echo $property['a_phone'] ?> </a></span>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary ml-3"
                                                        data-toggle="modal" data-target="#exampleModalCenter"
                                                        onclick="toogle()">
                                                        View
                                                    </button>
                                                </li>

                                                <li><span class="la la-envelope-o"><i class="fa fa-envelope"
                                                            aria-hidden="true"></i><a
                                                            href="mailto:<?php echo  substr($property['a_email'], 0, -18)?>***"
                                                            id="email1"
                                                            style="display:inline"><?php echo  substr($property['a_email'],0,-18) ?>***</a>
                                                        <a href="mailto:<?php echo $property['a_email']?>" id="email"
                                                            style="display:none"><?php echo $property['a_email'] ?></a></span>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        data-toggle="modal" data-target="#exampleModalCenter"
                                                        onclick="toggle()">
                                                        View
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <?php if($property['businessname'] != 'Behomes'){ ?>
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Disclaimer</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            The information displayed about this property consist a property advertisement. ALONGISH makes no warranty as to the accuracy or completeness of the advertisement or any linked or associated information, and ALONGISH has no control over the content. This property listing does not constitute property particulars. ALONGISH shall not in any way be held liable for the actions of any agent and/or property owner/landlord on or off this website.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    style="border:none">Agree</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="widget-boxed mt-5">
                                    <div class="widget-boxed-header" style="margin-bottom: 0px; padding-bottom: 0px">
                                        <h4 style="margin-bottom: 0px; padding-bottom: 25px">Swap Properties</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="recent-post">

                                            <?php
                                                foreach ($swap as $swaps) {
                                                    $pix = $prop-> getSwapImage($swaps['swap_id']);
                                            ?>
                                            <div class="recent-main my-2">
                                                <div class="recent-img mx-2">
                                                    <a href="swap-details.php?id=<?php echo $swaps['swap_id']?>"><img
                                                            src="images/swaps/<?php echo $pix?>"
                                                            alt="<?php echo $swaps['swap_name']?>"></a>
                                                </div>
                                                <div class="info-img">
                                                    <a href="swap-details.php?id=<?php echo $swaps['swap_id']?>">
                                                        <h6><?php echo $swaps['swap_name']?></h6>
                                                    </a>
                                                    <figure><small>Swap Item : <?php echo $swaps['swap_item']?> <br>
                                                            Swap Need : <?php echo $swaps['swap_need']?></small>
                                                    </figure>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </aside>
                </div>
                <!-- START SIMILAR PROPERTIES -->
                <section class="similar-property featured portfolio p-0 bg-white-inner">
                    <div class="container">
                        <h5>Similar Properties</h5>
                        <div class="row portfolio-items">
                                                        <?php
                            foreach ($recent as $new) {
                                $img = $prop-> getSingleImage($new['property_id']);
                            ?>
                            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">

                                            <!-- homes img -->
                                            <a href="property-details.php" class="homes-img">

                                               
                                            <?php 
                                                if($new['feature'] == 'featured'){
                                                    ?>
                                                    <div class="homes-tag button alt featured">                                             
                                                    <?php  echo $new['feature'] ?></div>
                                           <?php }?>
                                                <div class="homes-tag button alt sale">
                                                    <?php echo $new['pstatus_name'] ?></div>
                                                <div class="homes-price">₦<?php echo $new['property_price'] ?></div>
                                                <img src="images/property/<?php echo $img;?>" alt="home-1"
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>"
                                                class="btn"><i class="fa fa-link"></i></a>
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>"
                                                class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a
                                                href="property-details.php?id=<?php echo $new['property_id'] ?>"><?php echo ucwords($new['property_title']); ?></a>
                                        </h3>
                                        <p class="homes-address mb-3">
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo ucwords($new['property_address'])?>
                                                    , <?php echo $new['city_name'] ?>,
                                                    <?php echo $new['states_name'] ?></span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span><?php echo $new['bedroom_no'] ?> Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span><?php echo $new['bathroom_no'] ?>Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span><?php echo $new['property_area'] ?></span>
                                            </li>
                                        </ul>
                                        <div class="footer">
                                            <a href="agent-details.php?id=<?php echo $new['agent_id'] ?>">
                                                <img style=" height: 40px; border-radius: 50%;"
                                                    src="images/users/<?php echo $new['a_pix'] ?>" alt=""
                                                    class="mr-2"><?php echo ucfirst($new['a_username'])?>
                                            </a>
                                            <span style="padding-top: 10px;"> <?php date_default_timezone_set("Africa/Lagos"); 
                                             echo date('F j, Y', strtotime($property['date_posted'])); ?></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </section>
                <!-- END SIMILAR PROPERTIES -->
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php  include "include/foot.php" ?>

        <!-- START FOOTER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/ajax-script.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/counterup.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>
        <script type="text/javascript"></script>

        <script>
            $('.slick-carousel').each(function () {
                var slider = $(this);
                $(this).slick({
                    infinite: true,
                    dots: false,
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0'
                });

                $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function () {
                    slider.slick('slickPrev');
                });
                $(this).closest('.slick-slider-area').find('.slick-next').on("click", function () {
                    slider.slick('slickNext');
                });
            });


            function toogle() {
                var x = document.getElementById('phone1');
                var y = document.getElementById('phone');

                if (x.style.display === 'inline' && y.style.display === 'none') {
                    x.style.display = 'none';
                    y.style.display = 'inline';
                } else {
                    x.style.display = 'inline';
                    y.style.display = 'none';
                }

            }

            function toggle() {
                var e = document.getElementById('email1');
                var m = document.getElementById('email');

                if (e.style.display === 'inline' && m.style.display === 'none') {
                    e.style.display = 'none';
                    m.style.display = 'inline';
                } else {
                    e.style.display = 'inline';
                    m.style.display = 'none';
                }
            }
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>