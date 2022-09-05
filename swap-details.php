<?php
session_start();
require('property.php');
$id = $_GET['id'];
$prop = new Property;
$property = $prop->showSwapsDetails($id);
$images = $prop->getSwapImages($id);
$swap = $prop->showSwaps();
$extra = $prop->getAllDocuments($id);
// $swap = $prop->showSwaps();
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
if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));
$output=$prop->newsLetter( $email);
}
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Property Details</title>
    <?php
require('include/head.php');
?>

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
                <?php
            require('include/header002.php');
            ?>
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
                                                <h3><?php echo $property['swap_name'] ?><span
                                                        class="mrg-l-5 category-tag" style="top:-15px">Swap</span>
                                                </h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i
                                                            class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo ucwords($property['swap_address']) ?>
                                                        ,
                                                        <?php echo $property['city_name'] ?> ,
                                                        <?php echo $property['states_name'] ?>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <!-- main slider carousel items -->
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="w3-content w3-display-container" style="max-width:800px">
                                        <?php
                                                                        foreach($images as $img){
                                                                            // $count = 0;
                                                                                    
                                                                            ?>
                                        <img class="mySlides" src="images/swaps/<?php echo $img['image_url'] ?>"
                                            style="width:100%">

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
                                            <img src="images/swaps/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="<?php echo $property['swap_name'] ?>">
                                        </div>

                                        <?php
                                        foreach($images as $img){
                                            // $count = 0;
                                                    
                                            ?>

                                        <div class="item carousel-item" data-slide-number="1">
                                            <img src="images/swaps/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="<?php echo $property['swap_name'] ?>">
                                        </div>

                                        <a class="carousel-control left" href="#listingDetailsSlider"
                                            data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider"
                                            data-slide="next"><i class="fa fa-angle-right"></i></a>
                                        <?php
                                        }?>

                                    </div>


                                    <!-- main slider carousel items -->
                                </div>
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Swap Description</h5>
                                    <p class="mb-3"><?php echo $property['swap_description'] ?></p>
                                </div>
                                <div class="single homes-content details mb-30">
                                    <h5 class="mb-4">Swap Documents</h5>
                                    <ul class="homes-list clearfix">
                                        <?php foreach($extra as $extras){ ?>
                                        <li style="list-style-type:none">
                                            <i class="fa fa-check-square" style="color:red" aria-hidden="true"></i>
                                            &nbsp;
                                            <span> <?php echo $extras['document_name'];?> </span>
                                        </li>
                                        <?php
                                            }?>
                                    </ul>
                                </div>

                                <div class="single homes-content details mb-30">
                                    <!-- title -->
                                    <h5 class="mb-4">Swap Need (Looking For) </h5>
                                    <ul class="homes-list clearfix">
                                        <li>
                                            <span class="font-weight-bold mr-1">Swap Need:</span>
                                            <span class="det"><?php echo $property['swap_need']?> </span>
                                        </li>
                                    </ul>
                                    <p>
                                            <span class="font-weight-bold mr-1">Swap Need Description:</span>
                                            <span class="det"><?php echo $property['sitem_description']?></span>
                                    
                                    </p>

                                    <!-- title -->
                                </div>


                                <!-- Disclaimer -->

                                <div class="single homes-content details mb-30">
                                    <h5 class="mb-4">Disclaimer</h5>
                                    <b><?php echo ucfirst($property['businessname']) ?></b> own this Property. Alongish
                                    will under no circumstances take liability for their inaccuracy; it simply acts as a
                                    channel for the advertisement of this property and is only communicating this
                                    property in good faith. Alongish.com does not guarantee the availability of any
                                    properties or deals advertised on the website, nor does it make any such statements.
                                    Property particulars should be accessible directly from the agent marketing the
                                    property on Alongish.com; they are not included in the real estate advertisements
                                    and listings on our website. Prospective buyers and tenants must ascertain for
                                    themselves whether any property descriptions published are accurate, and agents must
                                    guarantee the integrity and accuracy of any property descriptions provided on our
                                    website.
                                </div>

                                <!-- End Add Review -->
                            </div>
                        </div>
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
                                                <h4 class="author__title">
                                                    <?php echo ucfirst($property['a_fname']) ?>
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
                                                            href="mailto:<?php echo  substr($property['a_email'], 0, -18)?>XXX"
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
                                                <b><?php echo ucfirst($property['businessname']) ?></b> own this
                                                Property. Alongish will under no circumstances take liability for
                                                their inaccuracy; it simply acts as a channel for the advertisement
                                                of this property and is only communicating this property in good
                                                faith. Alongish.com does not guarantee the availability of any
                                                properties or deals advertised on the website, nor does it make any
                                                such statements.
                                                Property particulars should be accessible directly from the agent
                                                marketing the property on Alongish.com; they are not included in the
                                                real estate advertisements and listings on our website. Prospective
                                                buyers and tenants must ascertain for themselves whether any
                                                property descriptions published are accurate, and agents must
                                                guarantee the integrity and accuracy of any property descriptions
                                                provided on our website.
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                                    style="border:none">Agree</button>
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
                            <?php foreach ($swap as $new) { $img = $prop->getSwapImage($new['swap_id']); ?>
                            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="swap-details.php?id=<?php echo $new['swap_id'] ?>"
                                                class="homes-img">

                                                <div class="homes-tag button alt featured">Swap</div>
                                                <div class="homes-tag button alt sale">
                                                    <?php echo $new['swap_item'] ?></div>
                                                <img src="images/swaps/<?php echo $img;?>" alt="home-1"
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="swap-details.php?id=<?php echo $new['swap_id'] ?>" class="btn"><i
                                                    class="fa fa-link"></i></a>
                                            <a href="swap-details.php?id=<?php echo $new['swap_id'] ?>"
                                                class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- swap content -->
                                    <div class="homes-content">
                                        <!-- swap address -->
                                        <h3><a
                                                href="swap-details.php?id=<?php echo $new['swap_id'] ?>"><?php echo ucwords($new['swap_name']); ?></a>
                                        </h3>
                                        <p class="homes-address mb-3">
                                            <a href="swap-details.php?id=<?php echo $new['swap_id'] ?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo ucwords($new['swap_address'])?>
                                                    , <?php echo $new['city_name'] ?>,
                                                    <?php echo $new['states_name'] ?></span>
                                            </a>
                                        </p>
                                        <!-- swap description List -->
                                        <p class="homes-address mb-3">
                                            <span><?php echo $new['swap_description'] ?></span><br>
                                            <span> <b>Swap Need</b> : <?php echo $new['swap_need'] ?></span>
                                        </p>

                                        <div class="footer">
                                            <a href="agent-details.html">
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

        <!-- START FOOTER -->
        <?php 
include "include/foot.php"
?>


        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/range-slider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick4.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/timedropper.js"></script>
        <script src="js/datedropper.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/leaflet-gesture-handling.min.js"></script>
        <script src="js/leaflet-providers.js"></script>
        <script src="js/leaflet.markercluster.js"></script>
        <script src="js/map-single.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

        <!-- Date Dropper Script-->
        <script>
            $('#reservation-date').dateDropper();
        </script>
        <!-- Time Dropper Script-->
        <script>
            this.$('#reservation-time').timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: '15'
            });
        </script>

        <script>
            $(document).ready(function () {
                $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
                    disableOn: 700,
                    type: 'iframe',
                    mainClass: 'mfp-fade',
                    removalDelay: 160,
                    preloader: false,
                    fixedContentPos: false
                });
            });
        </script>

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

            // var slideIndex = 1;
            // showDivs(slideIndex);

            // function plusDivs(n) {
            //   showDivs(slideIndex += n);
            // }

            // function currentDiv(n) {
            //   showDivs(slideIndex = n);
            // }

            // function showDivs(n) {
            //   var i;
            //   var x = document.getElementsByClassName("mySlides");
            //   var dots = document.getElementsByClassName("demo");
            //   if (n > x.length) {slideIndex = 1}
            //   if (n < 1) {slideIndex = x.length}
            //   for (i = 0; i < x.length; i++) {
            //     x[i].style.display = "none";  
            //   }
            //   for (i = 0; i < dots.length; i++) {
            //     dots[i].className = dots[i].className.replace(" w3-white", "");
            //   }
            //   x[slideIndex-1].style.display = "block";  
            //   dots[slideIndex-1].className += " w3-white";
            // }
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>