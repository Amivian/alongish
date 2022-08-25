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
$output = $prop->property();
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);

// do your query results


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
    <title>Property Listings</title>
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
                <?php
require('include/header002.php');
?>
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
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                                </div>
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                <!-- <div class="col-12 px-0 parallax-searchs">
                    <div class="banner-search-wrap">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <form action="property-search.php">
                                    <div class="row">
                                        <div class="rld-single-input">
                                            <input type="text" placeholder="Enter Keyword..." name="sale">
                                        </div>
                                        <div class="rld-single-select ml-4" style="margin-right:15px">
                                                                <input name="type" value="property_name" type="hidden"
                                                                    class="form-control">
                                                                <?php 
                                                                                $prop->getPropertytype();
                                                                                ?>

                                                            </div>
                                        <div class="rld-single-select ml-4" style="margin-right:15px">
                                                                <input name="state" value="state" type="hidden"
                                                                    class="form-control">
                                                                <?php 
                                                                                $prop->city();;
                                                                                ?>
                                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                            <button class="btn btn-yellow" type="submit">Search Now</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
                        <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center">
                            <!-- <div class="input-group border rounded input-group-lg w-auto mr-4">
                                <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01"><i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                    <option selected>Top Selling</option>
                                    <option value="1">Most Viewed</option>
                                    <option value="2">Price(low to high)</option>
                                    <option value="3">Price(high to low)</option>
                                </select>
                            </div> -->

                        </div>
                    </div>
                </section>



                <?php
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
                                            <?php 
                                                if($property['feature'] == 'featured'){
                                                    ?>
                                                    <div class="homes-tag button alt featured">                                             
                                                    <?php  echo $property['feature'] ?></div>
                                           <?php }?>
                                            <div class="homes-tag button alt sale">
                                                <?php echo $property['pstatus_name'] ?></div>
                                            <div class="homes-price">₦<?php echo $property['property_price'] ?></div>
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
                                    <i class="flaticon-bed mr" aria-hidden="true"></i>
                                    <span><?php echo $property['bedroom_no'] ?> Bedrooms</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-bathtub mr-" aria-hidden="true"></i>
                                    <span><?php echo $property['bathroom_no'] ?> Bathrooms</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-square mr-" aria-hidden="true"></i>
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
                         $get = $prop->pagination_one('properties.php',$page);?>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php include "include/foot.php"?>

        <?php
      require('include/footer.php');
      ?>