
<?php
    require('include/active-user.php');
    
    $prop = new admin\Property;

    if (empty($_POST) && empty($_GET)) {
        header("Location: index.php");
        exit;
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
      if (isset($_GET['sponsorship'])) {
        $sponsorship=htmlspecialchars(strip_tags($_GET['sponsorship']));
      }else {
        $_GET['sponsorship'] = '';
        $sponsorship = '';
      
      } 
    
      if (isset($_GET['search'])) {
        $search=htmlspecialchars(strip_tags($_GET['search']));
      }else {
        $_GET['search'] = '';
        $search = '';
      
      }
  $obj1 = $prop->sponsorshipProperties($sponsorship,$city);
  if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
  }
  

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Property for Rent Search</title>
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
              <?php require('include/header002.php');?>
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
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span> <a herf = "http://localhost/homes/joint-venture-search.php?sponsorship=&city=city&city="> Joint Venture</a></span></p>
                                </div>                             
                                <?php if(isset($_SESSION['message'])) {
                                    echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
                                    unset($_SESSION['message']);
                                      }
                                ?>      
                                <h3 class="search-title">Joint Venture Listing</h3>
                                <div class="bg-white p-3"><p  style="line-height: 20px;">In return , sponsors are offer plots of land as which is often %250 value of the total amount that you may have spent on the project. Depending on the contract agreement , sponsors can get as much as 1 plot per acre , 2 plots per acre. <br>  <b>Note that Entry fee (owo iwoko) (₦1 million - ₦5 million): usually negotiable, is required to register your interest with the family.</b>    </p></div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                
                <?php
                if(!empty($obj1)){
                    foreach($obj1 as $list) {
                        $img=$prop->getsponsorshipImage($list['jointventure_id']);
                        $type=$prop->getSponsorshipNeed($list['jointventure_id']);
                        ?>
            <div class="row featured portfolio-items">
                <div class="my-3 row">
                    <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr-0 pb-0 ft aos-init aos-animate"
                        data-aos="fade-up">
                        <div class="project-single mb-0 bb-0">
                            <div class="project-inner project-head">
                                <div class="home">
                                    <!-- < !-- homes img -->
                                    <a href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"
                                        class="homes-img"><img src="images/sponsor/<?php echo $img?>"
                                            alt="<?php echo $list['joint_title'] ?>"
                                            style="width:720px ! important;height:280px!important"
                                            class="img-responsive"></a>
                                </div>
                                <div class="button-effect"><a
                                        href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"
                                        class="btn"><i class="fa fa-link"></i></a><a
                                        href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"
                                        class="img-poppu btn"><i class="fa fa-photo"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- < !-- homes content -->
                    <div class="col-lg-8 col-md-12 homes-content pb-0 mb-44 aos-init aos-animate"
                        data-aos="fade-up">
                        <div class="homes-content">
                            <!-- < !-- homes address -->
                            <h3><a
                                    href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"><?php echo $list['joint_title'] ?></a>
                            </h3>
                            <p class="homes-address mb-3"><a
                                    href="sponsorship-details.php?id=<?php echo $list['jointventure_id'] ?>"><i
                                        class="fa fa-map-marker"></i><span><?php echo ucwords($list['address'] )?>,
                                        <?php echo $list['city_name'] ?>,
                                        <?php echo $list['states_name'] ?></span></a></p>
                            <!-- < !-- property description -->
                            <p class="homes-address mb-3">
                                <?php echo $list['joint_description'] ?></p>
                            <!-- < !-- Sponsorship need -->
                            <ul class="homes-list clearfix pb-3">
                                <li class="the-icons"><span><b>Sponsorship: </b><?php foreach($type as $extras) {
                                            ?><?php echo $extras['joint_name']?><br><?php } ?></span></li>
                            </ul>
                            <!-- < !-- agent details -->
                            <div class="footer">
                                <!-- <a href="agent-details.php?id=<?php echo $list['agent_id'] ?>"><img
                                        src="images/users/<?php echo $list['a_pix'] ?>"
                                        alt="<?php echo $list['businessname'] ?>"
                                        class="mr-2"><?php echo $list['a_fname'] ?><?php echo $list['a_lname'] ?>
                                    </a> -->
                                        <span><?php date_default_timezone_set("Africa/Lagos");
                                            echo date('F j, Y', strtotime($list['date_posted']));
                                            ?></span></div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } } else{?>
        <h4 class="text-danger text-center">We're sorry, but no property matched your search.  </h4>
        <?php   } ?>
        <nav aria-label="..." class="pt-4">
            <ul class="pagination lis-view">
                <?php $prop->pagination_sponsor('joint-venture-search.php',$page);?>
            </ul>
        </nav>

            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php include "include/foot.php"?>

    <?php require('include/footer.php'); ?>
