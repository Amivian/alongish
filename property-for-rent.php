<?php
session_start();
require('property.php');

$prop = new Property;

if (empty($_POST) && empty($_GET)) {
    header("Location: index.php");

    exit;
}
// $obj = $prop->showProperties();

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
if(isset($_GET['btn'])) {
	$email = htmlentities(strip_tags($_GET['email']));
$output=$prop->newsLetter( $email);
}
?>


<?php
    if(isset($_GET)){
        if (isset($_GET['city'])) {
          $city = htmlspecialchars(strip_tags($_GET['city']));
      } else {
          $_GET['city'] = '';
          $city = '';
      
      }
      if (isset($_GET['type'])) {
        $type=htmlspecialchars(strip_tags($_GET['type']));
      }else {
        $_GET['type'] = '';
        $type = '';
      
      } 
    
      if (isset($_GET['status'])) {
        $status=htmlspecialchars(strip_tags($_GET['status']));
      }else {
        $_GET['status'] = '';
        $status = '';
      
      }
    
      if (isset($_GET['search'])) {
        $search=htmlspecialchars(strip_tags($_GET['search']));
      }else {
        $_GET['search'] = '';
        $search = '';
      
      }
  $obj1 = $prop->rentProperties($search,$type,$status,$city);
  if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
  }
  

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Property for Rent Search</title>
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

        <section class="properties-list full featured portfolio blog">
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span> <a
                                                href="http://localhost/homes/property-for-rent.php?search=&type=property_name&status=&type=&city=city&city=&rent=">
                                                Rent</a></span></p>
                                </div>
                                <h3 class="search-title">For Rent Property Listings</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->

                <?php
                    if(!empty($obj1)){
                    foreach($obj1 as $data){ 
                    $img = $prop-> getSingleImage($data['property_id']);
                    $p_id=$data['property_id']; 
                ?>

                <div class="row featured portfolio-items">
                    <div class="my-3 row">
                        <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 ft aos-init aos-animate"
                            data-aos="fade-up">
                            <div class="project-single mb-0 bb-0">
                                <div class="project-inner project-head">
                                    <div class="home">
                                        <!-- homes img -->
                                        <a href="property-details.php?id=<?php echo $p_id ?>" class="homes-img">
                                            <?php 
                                                if($data['feature'] == 'featured'){
                                                    ?>
                                            <div class="homes-tag button alt featured">
                                                <?php  echo $data['feature'] ?></div>
                                            <?php }?>
                                            <div class="homes-tag button alt sale">
                                                <?php echo $data['pstatus_name'] ?></div>
                                            <div class="homes-price">₦<?php echo $data['property_price'] ?></div>
                                            <img src="images/property/<?php echo  $img; ?>"
                                                alt="<?php echo $data['property_title'] ?>" class="img-responsive"
                                                style="width:720px ! important;height:280px!important">
                                        </a>
                                    </div>
                                    <div class="button-effect">
                                        <a href="property-details.php?id=<?php echo $p_id?>" class="btn"><i
                                                class="fa fa-link"></i></a>
                                        <a href="property-details.php?id=<?php echo $p_id?>" class="img-poppu btn"><i
                                                class="fa fa-photo"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- homes content -->
                        <div class="col-lg-8 col-md-12 homes-content pb-0 mb-44 aos-init aos-animate"
                            data-aos="fade-up">
                            <!-- homes address -->
                            <h3><a
                                    href="property-details.php?id=<?php echo $p_id?>"><?php echo $data['property_title'] ?></a>
                            </h3>
                            <p class="homes-address mb-3">
                                <a href="property-details.php?id=<?php echo $p_id?>">
                                    <i class="fa fa-map-marker"></i><span><?php echo $data['property_address'] ?>,
                                        <?php echo $data['city_name'] ?>,
                                        <?php echo $data['states_name'] ?></span>
                                </a>
                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix pb-3">
                                <li class="the-icons">
                                    <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                    <span><?php echo $data['bedroom_no'] ?> Bedrooms</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                    <span><?php echo $data['bathroom_no'] ?> Bathrooms</span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                    <span><?php echo $data['property_area'] ?></span>
                                </li>
                            </ul>
                            <div class="footer">
                                <a href="agent-details.php?id=<?php echo $data['agent_id'] ?>">
                                    <img src="images/users/<?php echo $data['a_pix'] ?>" alt="" class="mr-2">
                                    <?php echo $data['a_fname'] ?> <?php echo $data['a_lname'] ?>
                                </a>
                                <span> <?php date_default_timezone_set("Africa/Lagos"); 
                                             echo date('F j, Y', strtotime($data['date_posted'])); ?>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <?php } 
                }
    else{
        ?>
                <h4 class="text-danger text-center">We're sorry, but no property matched your search. </h4>
                <?php   }       
            ?>
                <nav aria-label="..." class="pt-4">
                    <ul class="pagination lis-view">
                        <?php 
                 $get = $prop->pagination_rent('property-for-rent.php',$page);?>
                    </ul>
                </nav>

            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php include "include/foot.php"?>

        <?php
      require('include/footer.php');
      ?>