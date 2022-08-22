<?php
session_start();
require "sponsorshipform.php";
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
$id = $_GET['id'];
$prop = new Property;
$property = $prop-> showVentureDetails($id);
$extra = $prop->getSponsorshipNeed($id);
$images = $prop-> getSponsorshipImages($id);
$recent = $prop->showRecentJoint();
$swap = $prop->showSwaps();


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
                                                <h3><?php echo $property['joint_title'] ?><span
                                                        class="mrg-l-5 category-tag" style="top:-15px">Joint
                                                        Venture</span>
                                                </h3>
                                                <div class="mt-0">
                                                    <a href="#listing-location" class="listing-address">
                                                        <i
                                                            class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i><?php echo ucwords($property['address']) ?>
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
                                                    <h4><?php echo $property['offer'] ?></h4>

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
                                        <?php
                                                                        foreach($images as $img){
                                                                            // $count = 0;
                                                                                    
                                                                            ?>
                                        <img class="mySlides" src="images/sponsor/<?php echo $img['image_url'] ?>"
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
                                            <img src="images/sponsor/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="<?php echo $img['joint_title'] ?>">
                                        </div>

                                        <?php
                                        foreach($images as $img){
                                            // $count = 0;
                                                    
                                            ?>

                                        <div class="item carousel-item" data-slide-number="1">
                                            <img src="images/sponsor/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="<?php echo $img['joint_title'] ?>">
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
                                    <h5 class="mb-4">Description</h5>
                                    <p class="mb-3"><?php echo $property['joint_description'] ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mt-2">Sponsorship Need</h5>
                            <!--List -->
                            <ul class="homes-list clearfix">
                                <?php
                                
                                foreach($extra as $extras){
                                
                                            
                                    ?>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span><?php echo $extras['joint_name'];?></span>
                                </li>
                                <?php
                            }?>
                            </ul>
                        </div>

                        <div class="single homes-content details mb-30">
                            <!-- title -->
                            <h5 class="mt-1">Offer</h5>
                            <!-- Offer List -->
                            <p>
                                <i class="fa fa-check-square" aria-hidden="true"></i>
                                <span> &nbsp; <?php echo $property['offer'];?> </span>
                            </p>
                        </div>

                        <!-- terms and conditions of sponsorship -->
                        <div class="single homes-content details mb-30" id="t&c">
                            <!-- title -->
                            <h5 class="mt-1">Terms and Conditions</h5>
                            <!-- Offer List -->
                            <p>
                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                <span> &nbsp; <?php echo $property['joint_tc'];?> </span>
                            </p>
                        </div>


                        <!-- Disclaimer -->

                        <div class="single homes-content details mb-30">
                            <h5 class="mb-4">Disclaimer</h5>
                            <b><?php echo ucfirst($property['businessname']) ?></b> own this Property. Alongish will
                            under no circumstances take liability for their inaccuracy; it simply acts as a channel for
                            the advertisement of this property and is only communicating this property in good faith.
                            Alongish.com does not guarantee the availability of any properties or deals advertised on
                            the website, nor does it make any such statements.
                            Property particulars should be accessible directly from the agent marketing the property on
                            Alongish.com; they are not included in the real estate advertisements and listings on our
                            website. Prospective buyers and tenants must ascertain for themselves whether any property
                            descriptions published are accurate, and agents must guarantee the integrity and accuracy of
                            any property descriptions provided on our website.
                        </div>

                        <!-- End Add Review -->
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- start author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33 mt-5">
                                <p class="text-success text-center"><?php echo $contact_us; ?></p>
                                    <div class="widget-boxed-header" style="margin-bottom: 0px; padding-bottom: 0px">
                                        <h4 style="margin-bottom: 0px; padding-bottom: 25px">Sponsor This Project</h4>
                                    </div>
                                    <div class="widget-boxed-body">
                                        <div class="sidebar-widget author-widget2">
                                            <div class="author-box clearfix">
                                                <p class="author__meta">I am interested in this Project</p>
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn text-center sponsor"
                                                    style="color: #fff;background: #ff385c;" data-toggle="modal"
                                                    data-target="#exampleModalCenter">
                                                    Sponsor Project
                                                </button>
                                            </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-boxed mt-5">
                                    <div class="widget-boxed-header" style="margin-bottom: 0px; padding-bottom: 0px">
                                    <div class="agent-contact-form-sidebar">
                                                <h5>Terms and Conditions</h5>
                                                <p>
                                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                    <span> &nbsp; <?php echo $property['joint_tc'];?> </span>
                                                </p>
                                            </div>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Sponsor Project</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="agent-contact-form-sidebar">
                                                    <h4>Request Inquiry</h4>
                                                    <form name="contact_form" method="POST"
                                                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                        <input type="hidden" name="a_id"
                                                            value="<?php echo $property['agent_id'] ?>">
                                                        <input type="text" name="fullname" placeholder="Enter Your Name"
                                                            required value="<?php echo $set_name;?>">
                                                        <input type="number" name="phone" placeholder="+23412345678"
                                                            required value="<?php echo $set_phone;?>">
                                                        <input type="email" name="email"
                                                            placeholder="Enter Your Email Address" required value="<?php echo $set_email;?>">
                                                        <textarea placeholder="Enter Your Message" name="msg"
                                                            required><?php echo $set_msg;?></textarea>
                                                         <!-- <div class="row">
                                                            <div class="col-md-12">
                                                                <ul class="pro-feature-add pl-0">
                                                                    <li class="fl-wrap filter-tags clearfix">
                                                                        <div class="checkboxes float-left">
                                                                            <div class="filter-tags-wrap">
                                                                                <input id="check-a" type="checkbox"
                                                                                    name="extra[]"
                                                                                    value="Land Clearing">
                                                                                <label for="check-a">Land
                                                                                    Clearing</label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="fl-wrap filter-tags clearfix">
                                                                        <div class="checkboxes float-left">
                                                                            <div class="filter-tags-wrap">
                                                                                <input id="check-b" type="checkbox"
                                                                                    name="extra[]"
                                                                                    value="Road Construction">
                                                                                <label for="check-b">Road
                                                                                    Construction</label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="fl-wrap filter-tags clearfix">
                                                                        <div class="checkboxes float-left">
                                                                            <div class="filter-tags-wrap">
                                                                                <input id="check-c" type="checkbox"
                                                                                    name="extra[]"
                                                                                    value="Layout/Survey Documentation">
                                                                                <label for="check-c">Layout/Survey
                                                                                    Documentation</label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                    <li class="fl-wrap filter-tags clearfix">
                                                                        <div class="checkboxes float-left">
                                                                            <div class="filter-tags-wrap">
                                                                                <input id="check-d" type="checkbox"
                                                                                    name="extra[]"
                                                                                    value="Land Reclaimation">
                                                                                <label for="check-d">Land
                                                                                    Reclaimation</label>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div> -->
                                                        <div class="row mt-2">
                                                          <ul class="pro-feature-add pl-4">
                                                                    <li class="fl-wrap filter-tags clearfix">
                                                                        <div class="checkboxes float-left">
                                                                            <div class="filter-tags-wrap">
                                                                                <small>
                                                                                <input id="checkt" type="checkbox"
                                                                                    class="tc" name="contact">
                                                                                <label for="checkt"><a href=""> I agree to the Terms and Conditions</a></label>
                                                                                </small>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                           </div>                                                        
                                                         <button type="submit" class="btn sponsor submit"
                                                            style="color: #fff;background: #ff385c;" disabled>Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <h6 class="mb-0"><?php echo $swaps['swap_name']?></h6>
                                                    </a>
                                                    <figure class="mb-1"><small> <i class="fa fa-map-marker"></i><span>
                                                                <?php echo ucwords($swaps['swap_address'])?> ,
                                                                <?php echo $swaps['city_name']?> ,
                                                                <?php echo $swaps['states_name']?></small>
                                                    </figure>
                                                    <figure><small> <b>Swap Item :</b> <?php echo $swaps['swap_item']?>
                                                            <br>
                                                            <b> Swap Need : </b><?php echo $swaps['swap_need']?></small>
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
                                $image = $prop->getsponsorshipImage($new['jointventure_id']);
                            ?>
                            <div class="item col-lg-4 col-md-6 col-xs-12 landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">

                                            <!-- homes img -->
                                            <a href="sponsorship-details.php?id=<?php echo $new['jointventure_id'] ?>"
                                                class="homes-img">
                                                <img src="images/sponsor/<?php echo $image ;?>"
                                                    alt="<?php echo $new ['joint_title'];?>" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="sponsorship-details.php?id=<?php echo $new['jointventure_id'] ?>"
                                                class="btn"><i class="fa fa-link"></i></a>
                                            <a href="sponsorship-details.php?id=<?php echo $new['jointventure_id'] ?>"
                                                class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="sponsorship-details.php?id=<?php echo $new['jointventure_id'] ?>">
                                                <?php echo ucwords($new['joint_title']); ?></a>
                                        </h3>
                                        <p class="homes-address mb-3">
                                            <a href="sponsorship-details.php?id=<?php echo $new['jointventure_id'] ?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo ucwords($new['address'])?>
                                                    ,
                                                    <?php echo $new['city_name'] ?>,
                                                    <?php echo $new['states_name'] ?></span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <span><?php echo  substr($new['joint_description'], 0,-10) ?>...<a
                                                        href="sponsorship-details.php?id=<?php echo $new['jointventure_id'] ?>">Read
                                                        more</a></span>
                                            </li>

                                        </ul>
                                        <div class="footer">
                                            <!-- <a href="agent-details.php?id=<?php echo $new['agent_id'] ?>">
                                                <img style=" height: 40px; border-radius: 50%;"
                                                    src="images/users/<?php echo $new['a_pix'] ?>" alt=""
                                                    class="mr-2"><?php echo ucfirst($new['a_username'])?>
                                            </a> -->
                                            <span class=""> <?php date_default_timezone_set("Africa/Lagos"); 
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
        <?php 
        include "include/foot.php"
        ?>

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

             $(function() {
            $(".tc").click(function(){
                $('.submit').attr('disabled', !this.checked);
            });
        });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>