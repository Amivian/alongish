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
$output = $prop->showAdminJointVentures();
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
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Our Joint Venture Listings</span></p>
                                </div>
                                <h3></h3>
                            </div>
                        </div>
                    </div>
                </section>
                <?php foreach($output as $list){ $img = $prop->getsponsorshipImage($list['jointventure_id']) ;
                                $type=$prop->getSponsorshipNeed($list['jointventure_id']);?>
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
                                                    style="width:720px !important; height:280px !important"
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
                                                    ?><?php echo $extras['joint_name']?><br><?php
                                                }

                                                ?></span></li>
                                    </ul>
                                    <!-- < !-- agent details -->
                                    <div class="footer">
                                        <!-- <a href="agent-details.php?id=<?php echo $list['agent_id'] ?>"><img
                                                src="images/users/<?php echo $list['a_pix'] ?>"
                                                alt="<?php echo $list['businessname'] ?>"
                                                class="mr-2"><?php echo $list['a_fname'] ?><?php echo $list['a_lname'] ?>
                                            </a> -->
                                                <span class="mb-2"><?php date_default_timezone_set("Africa/Lagos");
                                                    echo date('F j, Y', strtotime($list['date_posted']));
                                                    ?></span>
                                    </div>
                              
                            </div>
                        </div>
                    </div>
                    <?php } ?>


                <nav aria-label="..." class="pt-4">
                    <ul class="pagination lis-view">
                        <?php 
                         $get = $prop->pagination_adminjoint('showAdminJointVentures',$page);?>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- END SECTION PROPERTIES LISTING -->
        <?php include "include/foot.php"?>

        <?php
      require('include/footer.php');
      ?>