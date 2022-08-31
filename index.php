<?php
session_start();
require('property.php');
$prop = new Property;
$featured = $prop->showFeaturedProperties();
$recent = $prop->showRecentProperties();


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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Alongish.com is the nation's first joint venture website. We are  a Nigerian website that lists house and other property for sale, rent, shortlet, and swap. With homes, houses, land, cars,and other commercial properties available for sale, rent, or swap in Nigeria, we are the go-to internet real estate destination. ">
    <meta name ="keywords" content="swap property in lagos, property for swap,joint venture property in lagos, joint venture property, property for sale in anthony village, property for sale in lagos, house for sale in surulere, house for sale in lekki, house for sale in ikeja, house for sale in yaba, real estate agent in lagos, house for sale in ikoyi, house for sale in ojota, house for sale shomolu, house for sale in ketu, house for sale in lagos, real estate in nigeria, flat for sale in lagos,property for sale in ogun, property for sale in osun, property for sale in ibadan,nigeria property listing website, duplex for rent in lagos, house for sale lagos, land for sale in lagos, duplex for sale in lagos, office space for sale in lagos, house for sale in berger, property for sale in ikeja, property for sale in lekki, property for sale in Ikorodu, property for sale in ikorodu, property for sale in lekki, property for sale in epe, property for sale in magodo, property for sale in Surulere,  real estate agents in lagos, house for sale in nigeria, house for rent in nigeria, shorlet apartments in nigeria, swap property in nigeria">
    <meta name="author" content="Alongish ">
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.alongish.com" />
    <meta property="og:site_name" content="alongish.com" />
    <title>Alongish - Find your desired home here</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/aos2.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/maps.css">
    <link rel="stylesheet" id="color" href="css/colors/pink.css">
</head>

<body class="homepage-9 hp-6 homepage-1">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container" class="header head-tr">
            <!-- Header -->
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.php"><img src="images/logo.jpg" data-sticky-logo="images/logo.jpg"
                                    alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1 head-tr" style="margin-left:10px">
                            <ul id="responsive">
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="services.php">Our Services</a></li>
                                <li><a href="projects.php">Our Projects</a></li>
                                <li><a href="request.php">Request</a></li>
                                <li><a href="sponsorship.php">Joint Venture</a></li>
                                <li><a href="affiliates.php">Affiliates</a></li>
                                <li><a href="swap-properties.php">Swaps</a></li>
                                <li><a href="contact-us.php">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>
                    <!-- Left Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <!-- Header Widget -->
                        <div class="header-widget">
                            <a href="add-property.php" class="button border">Add Listing<i
                                    class="fas fa-laptop-house ml-2"></i></a>
                        </div>
                        <!-- Header Widget / End -->
                    </div>
                    <!-- Right Side Content / End -->

                    <!-- Right Side Content / End -->
                    <div class="header-user-menu user-menu add">
                        <?php
  
  
  if(isset($_SESSION['id'])){
  
    echo"                        <div class='header-user-name'>";
                          echo"  <span><img src='images/users/". $pix . "'></span>Hi, ".  $_SESSION['fname'] . "
                        </div>";
        echo"           <ul>  <li><a href='dashboard.php'>Dashboard</a></li>
                                <li><a href='add-property.php'>Add Property</a></li>
                                <li><a href='swaps.php'>Swaps</a></li>
                                <li><a href='venture.php'>Joint Venture</a></li>
                            <li><a href='logout.php'>Log Out</a></li>
                      </ul>
                   </div>";
  }else{
    echo"   <!-- Right Side Content / End -->";

    echo"       <div class='right-side d-none d-none d-lg-none d-xl-flex sign ml-0 mt-2' style='border:none'>
                        <!-- Header Widget -->
                        <div class='header-widget sign-in d-flex' >
                        <div class='show-reg-form modal-open mr-2'><a href='login.php'>Login</a></div>
                            <div><a href='register.php'>Register</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>";
  }
  ?>
                    </div>
                </div>
                <!-- Header / End -->

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- STAR HEADER SEARCH -->
        <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1"
            data-stellar-background-ratio="0.5">
            <div class="hero-main">
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-inner">
                                <!-- Welcome Text -->
                                <div class="welcome-text">
                                    <?php
                            if(isset($_GET['msg'])) {
                                echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";
                            }?>
                                    <h1 class="h1">Find Your Dream
                                        <br class="d-md-none">
                                        <span class="typed border-bottom"></span>
                                    </h1>
                                    <p class="mt-4">We Have Over Million Properties For You.</p>
                                </div>
                                <!--/ End Welcome Text -->
                                <!-- Search Form -->


                                <div class="col-12">
                                    <div class="banner-search-wrap">
                                        <ul class="nav nav-tabs rld-banner-tab">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#tabs_1">Sale</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs_2">Rent</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#tabs_3"> Shortlet</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content mx-auto">

                                            <div class="tab-pane fade show active" id="tabs_1">
                                                <div class="rld-main-search">
                                                    <form action="property-for-sale.php" method="GET">
                                                        <div class="row">
                                                            <div class="rld-single-input" style="margin-left:50px">
                                                                <input type="text" placeholder="Enter Keyword..."
                                                                    name="search" value="">
                                                            </div>
                                                            <div class="rld-single-select ml-4"
                                                                style="margin-right:15px">                                                                                                                                   
                                                                <input name="status" type="hidden"
                                                                        class="form-control">
                                                                <input name="type" value="property_name" type="hidden"
                                                                    class="form-control">
                                                                <?php 
                                                                                $prop->getPropertytype();
                                                                                ?>

                                                            </div>
                                                            <div class="rld-single-select ml-4"
                                                                style="margin-right:15px">
                                                                <input name="city" value="city" type="hidden"
                                                                    class="form-control">
                                                                <?php 
                                                                                 $prop->city();
                                                                                ?>
                                                            </div>
                                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0 ml-4"
                                                                style="margin-right:15px">
                                                                <button class="btn btn-yellow" name="sale"
                                                                    type="submit">Search Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="tabs_2">
                                                <div class="rld-main-search">
                                                    <form action="property-for-rent.php" method="GET">
                                                        <div class="row">
                                                            <div class="rld-single-input" style="margin-left:50px">
                                                                <input type="text" placeholder="Enter Keyword..."
                                                                    name="search" value="">
                                                            </div>
                                                            <div class="rld-single-select ml-4"
                                                                style="margin-right:15px">
                                                                <input name="type" value="property_name" type="hidden"
                                                                    class="form-control">                                                                    
                                                                    <input name="status" type="hidden"
                                                                        class="form-control">
                                                                <?php 
                                                                                $prop->getPropertytype();
                                                                                ?>

                                                            </div>
                                                            <div class="rld-single-select ml-4"
                                                                style="margin-right:15px">
                                                                <input name="city" value="city" type="hidden"
                                                                    class="form-control">
                                                                <?php 
                                                                                $prop->city();
                                                                                ?>
                                                            </div>
                                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0 ml-4"
                                                                style="margin-right:15px">
                                                                <button class="btn btn-yellow" name="rent"
                                                                    type="submit">Search Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tabs_3">
                                                <div class="rld-main-search">
                                                    <form action="property-for-shortlet.php" method="GET">
                                                        <div class="row">
                                                            <div class="rld-single-input" style="margin-left:50px">
                                                                <input type="text" placeholder="Enter Keyword..."
                                                                    name="search" value="">
                                                            </div>
                                                            <div class="rld-single-select ml-4"
                                                                style="margin-right:15px">
                                                                <input name="type" value="property_name" type="hidden"
                                                                    class="form-control">
                                                                                                                                       
                                                                    <input name="status"  type="hidden"
                                                                        class="form-control">
                                                                <?php 
                                                                                $prop->getPropertytype();
                                                                                ?>

                                                            </div>
                                                            <div class="rld-single-select ml-4"
                                                                style="margin-right:15px">
                                                                <input name="city" value="city" type="hidden"
                                                                    class="form-control">
                                                                <?php 
                                                                                $prop->city();
                                                                                ?>
                                                            </div>
                                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0 ml-4"
                                                                style="margin-right:15px">
                                                                <button class="btn btn-yellow" name="shortlet"
                                                                    type="submit">Search Now</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!--/ End Search Form -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END HEADER SEARCH -->

        <!-- START SECTION POPULAR PLACES -->
        <section class="feature-categories bg-white rec-pro mt-5">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Popular </span>Places</h2>
                    <p>Properties In Most Popular Places.</p>
                </div>
                <div class="row">
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-1">
                                <a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=514&rent="><img src="images/popular-places/12.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=514&rent=">Lekki </a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-2">
                            <a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=520&sale="></a></h4><img src="images/popular-places/13.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title">
                                    <a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=520&sale=">Mainland</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-3">
                                <a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=516&sale="><img src="images/popular-places/14.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=516&sale=">Ikeja</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="450">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-3">
                                <a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=512&sale=">
                                    <img src="images/popular-places/9.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=512&sale=">Epe</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="150">
                        <div class="small-category-2 mob-mt">
                            <div class="small-category-2-thumb img-8">
                                <a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=&rent=">
                                    <img src="images/popular-places/15.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title">
                                <a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=&rent=">Eti Osa</a>
                               </h4>
                         
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="250">
                        <div class="small-category-2">
                            <div class="small-category-2-thumb img-10">
                                <a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=519&rent="><img src="images/popular-places/10.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=519&rent=">Ajah</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="350">
                        <div class="small-category-2 si-mt">
                            <div class="small-category-2-thumb img-11">
                                <a href="properties-full-grid-1.php"><img src="images/popular-places/5.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=509&rent=">Festac</a></h4>
                            </div>
                        </div>
                    </div>
                    <!-- Single category -->
                    <div class="col-xl-3 col-lg-6 col-sm-6" data-aos="fade-up" data-aos-delay="450">
                        <div class="small-category-2 no-mb si-mt">
                            <div class="small-category-2-thumb img-11">
                                <a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=511&sale="><img src="images/popular-places/6.jpg" alt=""></a>
                            </div>
                            <div class="sc-2-detail">
                                <h4 class="sc-jb-title"><a href="http://localhost/homes/property-for-sale.php?search=&status=&type=property_name&type=&city=city&city=511&sale=">Badagry</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

        <!-- START SECTION FEATURED PROPERTIES -->
        <section class="featured portfolio bg-white-2 rec-pro full-l">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Featured </span>Properties</h2>
                    <p>These are our featured properties</p>
                </div>
                <div class="row portfolio-items">
                    <?php
                                            foreach($featured as $property){
                                                        $img = $prop-> getSingleImage($property['property_id']);
                                                ?>
                    <div class="item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale">
                        <div class="project-single" data-aos="fade-right">
                            <div class="project-inner project-head">
                                <div class="homes">
                                    <!-- homes img -->
                                    <a href="property-details.php?id=<?php echo $property['property_id'] ?>"
                                        class="homes-img">
                                        <div class="homes-tag button alt featured"><?php echo $property['feature'] ?></div>
                                        <div class="homes-tag button alt sale"><?php echo $property['pstatus_name'] ?>
                                        </div>
                                        <img src="images//property/<?php echo  $img; ?>" alt="home-1"
                                            class="img-responsive">
                                    </a>
                                </div>
                                <div class="button-effect">
                                    <a href="property-details.php?id=<?php echo $property['property_id'] ?>"
                                        class="btn"><i class="fa fa-link"></i></a>
                                    <!-- <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                        class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a> -->
                                    <a href="property-details.php?id=<?php echo $property['property_id']; ?>"
                                        class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                </div>
                            </div>
                            <!-- homes content -->
                            <div class="homes-content">
                                <!-- homes address -->
                                <h3><a
                                        href="property-details.php?id=<?php echo $property['property_id'] ?>"><?php echo ucwords($property['property_title']) ?></a>
                                </h3>
                                <p class="homes-address mb-3">
                                    <a href="property-details.php?id=<?php echo $property['property_id'] ?>">
                                        <i class="fa fa-map-marker"></i><span><?php echo $property['property_address'] ?>
                                            , <?php echo $property['city_name'] ?> ,
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
                                        <span><?php echo $property['property_area'] ?>sq ft</span>
                                    </li>
                                </ul>
                                <div class="price-properties footer pt-3 pb-0">
                                    <h3 class="title mt-3">
                                        <a href="property-details.php?id=<?php echo $property['property_id'] ?>">₦
                                            <?php echo $property['property_price'] ?></a>
                                    </h3>
                                    <!-- <div class="compare">
                                        <a href="#" title="Compare">
                                            <i class="flaticon-compare"></i>
                                        </a>
                                        <a href="#" title="Share">
                                            <i class="flaticon-share"></i>
                                        </a>
                                        <a href="#" title="Favorites">
                                            <i class="flaticon-heart"></i>
                                        </a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
                <div class="bg-all">
                    <a href="properties.php" class="btn btn-outline-light">View More</a>
                </div>
            </div>
        </section>
        <!-- END SECTION FEATURED PROPERTIES -->

        <!-- START SECTION WHY CHOOSE US -->
        <section class="how-it-works bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Our </span>Services</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="row service-1">
                    <article class="col-lg-4 col-md-6 col-xs-12 serv pb-4" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-13">
                                <img src="images/icons/icon-4.svg" alt="">
                                <h3>Property Sales/Acquistion</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">Our highly experienced Investment Sales and Acquisition team
                                    provides
                                    acquisition and disposal advice to investors looking at investment opportunities
                                    anywhere.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv" data-aos="fade-up">
                        <div class="serv-flex">
                            <div class="art-1 img-14">
                                <img src="images/icons/icon-5.svg" alt="">
                                <h3>Property Valuation</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">Our dedicated
                                    team of valuation professionals provide impartial valuations for both single assets
                                    and portfolios across a wide range of real estate asset classes.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pb-4" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="images/icons/icon-6.svg" alt="">
                                <h3>Building Construction</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">We provide affordable, timely and professional client-focused
                                    construction
                                    solutions all through the lifecycle of your building projects.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pb-4" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="images/icons/icon-6.svg" alt="">
                                <h3>Architectural Design</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">We Present our clients with a seamlessly integrated process
                                    by offering custom residential,commercial architecture, interior
                                    design services.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pb-4" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="images/icons/icon-6.svg" alt="">
                                <h3>Land Survey/Documentation</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">We provide land Suvrey , landscaping and survey documentation for
                                    our clients.
                                    We register the survey and secure the Certificate of Occupancy for our clients.</p>
                            </div>
                        </div>
                    </article>
                    <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pb-4" data-aos="fade-up">
                        <div class="serv-flex arrow">
                            <div class="art-1 img-15">
                                <img src="images/icons/icon-6.svg" alt="">
                                <h3>Installation Services</h3>
                            </div>
                            <div class="service-text-p">
                                <p class="text-center">We also provide installation services suring your building
                                    construction such
                                    as electrical fittings, plumbing syaytems, carpentry and painting.</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <!-- END SECTION WHY CHOOSE US -->

        <!-- START SECTION ABOUT -->
        <section class="about-us bg-white-2 rec-pro p-5">
            <div class="container">
                <div class="sec-title">
                    <h2><span>Introducing </span>Swaps</h2>
                    <p>We provide Swap services for clients looking to trade lands, cars etc.</p>
                </div>
                <div class="row service-1 align-items-center" data-aos="fade-up">
                    <div class="col-lg-6 col-md-12">
                        <div class="pftext">
                            <p>We provide our clients looking for something different such as cars, lands in other areas
                                to acquire it with what the ones they have. We are bringing trade by barter to real
                                estate.</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-xs-12 justify-self-end">
                        <div class="bg-all ml-5">
                            <a href="swaps.php" class="btn btn-outline-light">Create Swap Item</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- END SECTION ABOUT -->

        <!-- START SECTION RECENTLY PROPERTIES -->
        <section class="featured portfolio rec-pro disc">
            <div class="container-fluid">
                <div class="sec-title discover">
                    <h2><span>Discover </span>Popular Properties</h2>
                    <p>We provide full service at every step.</p>
                </div>
                <div class="portfolio col-xl-12">
                    <div class="slick-lancers">
                        <?php
foreach ($recent as $new) {
    $img = $prop-> getSingleImage($new['property_id']);
 ?>

                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">
                                <div class="project-single">
                                    <div class="project-inner project-head">
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>"
                                                class="homes-img">                                                
                                               <?php 
                                                if($new['feature'] == 'featured'){
                                                    ?>
                                                    <div class="homes-tag button alt featured">                                             
                                                    <?php  echo $new['feature'] ?></div>
                                                    <?php }?>
                                                <div class="homes-tag button alt sale">
                                                    <?php echo $new['pstatus_name'] ?></div>
                                                <img src="images/property/<?php echo $img;?>" alt="home-1"
                                                    class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>"
                                                class="btn"><i class="fa fa-link"></i></a>
                                            <!-- <a href="https://www.youtube.com/watch?v=14semTlwyUY"
                                                class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a> -->
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>"
                                                class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="property-details.php?id=<?php echo $new['property_id'] ?>"><?php echo ucwords($new['property_title']) ?>
                                            </a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="property-details.php?id=<?php echo $new['property_id'] ?>">
                                                <i class="fa fa-map-marker"></i><span><?php echo ucwords($new['property_area']) ?>
                                                    , <?php echo $new['city_name'] ?> ,
                                                    <?php echo $new['states_name'] ?></span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span><?php echo $new['bathroom_no'] ?> Bedrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span><?php echo $new['bathroom_no'] ?> Bathrooms</span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span><?php echo $new['property_area'] ?>sq ft</span>
                                            </li>
                                        </ul>
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="property-details.php?id=<?php echo $new['property_id'] ?>">₦
                                                    <?php echo $new['property_price'] ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION PARTNERS -->
        <?php include "include/foot.php"?>


        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/typed.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <!-- <script src="js/search.js"></script> -->
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/map-style2.js"></script>
        <script src="js/range.js"></script>
        <script src="js/color-switcher.js"></script>
        <script>
            $(window).on('scroll load', function () {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });
        </script>

        <!-- Slider Revolution scripts -->
        <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script>
            var typed = new Typed('.typed', {
                strings: ["House ^2000", "Apartment ^2000", "Plaza ^4000"],
                smartBackspace: false,
                loop: true,
                showCursor: true,
                cursorChar: "|",
                typeSpeed: 50,
                backSpeed: 30,
                startDelay: 800
            });
        </script>

        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });
        </script>

        <script>
            $('.job_clientSlide').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplay: false,
                nav: true,
                smartSpeed: 1000,
                slideSpeed: 1000,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    991: {
                        items: 3
                    }
                }
            });
        </script>

        <script>
            $('.style2').owlCarousel({
                loop: true,
                margin: 0,
                dots: false,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    400: {
                        items: 2,
                        margin: 20
                    },
                    500: {
                        items: 3,
                        margin: 20
                    },
                    768: {
                        items: 4,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 20
                    },
                    1000: {
                        items: 7,
                        margin: 20
                    }
                }
            });
        </script>

        <script>
            $(".dropdown-filter").on('click', function () {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });
        </script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>