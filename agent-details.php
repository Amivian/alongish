<?php
    require 'include/active-user.php';

    require "contact-agent.php";

    $obj = new User;

    $props = new admin\Property;

    $id = $_GET['id'];

    $prop = new admin\Property;

    $property = $prop->showAgentDetails($id);

    $count = $prop->agentPropertyCount($id);

    $listing = $prop->showAgentProperties($id);

    if(isset($_GET['id'])? $id =$_GET['id']:$id=' property.agent_id ');

    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Agent Details</title>
<?php require('include/head.php');?>
</head>

<body class="inner-pages hd-white about">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
        <div id="header">
            <?php require('include/header002.php');?>
         </div>
            

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
                </div>
            </div>
            <!-- Header / End -->

        <!-- START SECTION AGENTS DETAILS -->
        <section class="blog blog-section portfolio single-proper details mb-0">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 col-xs-12">
                        <div class="row">
                            <div class="col-md-12 col-xs-12">
                                <section class="headings-2 pt-0 hee">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <div class="text-heading text-left">
                                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span><?php echo $property['a_fname'] ?> <?php echo $property['a_lname'] ?></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="news-item news-item-sm">
                                    <a href="#agent" class="news-img-link">
                                        <div class="news-item-img homes">
                                            <div class="homes-tag button alt featured"> <small style="font-color:white;font-weight:bold"><?php echo $count;?> Listings</small>
                                           </div>
                                            <img class="resp-img" src="images/users/<?php echo $property['a_pix'] ?>" alt="<?php echo ucwords($property['a_fname']) ?> <?php echo ucwords($property['a_lname']) ?>">
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a href="agent-details.php"><h3><?php echo ucwords($property['a_fname']) ?> <?php echo ucwords($property['a_lname']) ?></h3></a>
                                        <div class="the-agents">
                                        <p class="my-0"><i class="fa fa-map-marker x2" aria-hidden="true" style="color: #ff385c;"></i>  <?php  echo $property['city_name'] ;?> , <?php  echo $property['states_name'] ;?></p>
                                        <p><i class="fa fa-phone" aria-hidden="true" style="color: #ff385c;"></i>  <a href="tel:<?php  echo $property['a_phone'] ;?> " style="color:#666666"> &nbsp; <?php  echo $property['a_phone'] ;?> &nbsp; <br> <i class="fa fa-envelope" aria-hidden="true" style="color: #ff385c;"></i> &nbsp; <a href="mailto:<?php  echo $property['a_email'] ;?>" style="color:#666666">  &nbsp;<?php  echo $property['a_email'] ;?></a></p>
                                        <small class="mt-1">Registered  <?php  echo date('F  j , Y', strtotime($property['datereg'])) ;?></small>
                                       
                                        </div>
                                        <div class="news-item-bottom">
                                            <a href="#properties" class="news-link">View My Listings</a>
                                            <div class="admin">
                                                <p><?php  echo $property['businessname'] ;?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="blog-pots py-3">
                            <div class="blog-info details mb-30">
                                <h5 class="mb-4">Description</h5>
                                <p class="mb-3"><?php echo $property['about']?></p>
                            </div>
                        </div>
                    </div>
                    <aside class="col-lg-4 col-md-12 car">
                        <div class="single widget">
                            <!-- end author-verified-badge -->
                            <div class="sidebar">
                                <div class="widget-boxed mt-33 mt-5">
                                    <div class="sidebar-widget author-widget2">
                                        <div class="agent-contact-form-sidebar border-0 pt-0">
                                            <h4>Contact <?php echo $property['a_fname']?> <?php echo $property['a_lname']?></h4>
                                            <form name="contact_form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                <input type="hidden" name="a_id" value="<?php echo $aid ?>">
                                                <input type="text" name="fullname" placeholder="Enter Your Name"
                                                            required value="<?php echo $set_name;?>">
                                                        <input type="number" name="phone" placeholder="+23412345678"
                                                            required value="<?php echo $set_phone;?>">
                                                        <input type="email" name="email"
                                                            placeholder="Enter Your Email Address" required value="<?php echo $set_email;?>">
                                                        <textarea placeholder="Enter Your Message" name="msg"
                                                            required><?php echo $set_msg;?></textarea>
                                                <button type="submit" name="contact" class="btn sponsor submit"
                                                            style="color: #fff;background: #ff385c;" value="">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        
                            <!-- START SIMILAR PROPERTIES -->
                            <section class="similar-property featured portfolio bshd p-3 bg-white" id="agent">
                                <div class="container" id="properties">
                                    <h5>Listing by <?php echo $property['businessname']?></h5>
                                    <div class="row">
                                        <?php 
                                         foreach($listing as $list) {
                                            $img = $prop-> getSingleImage($list['property_id']);
                                            ?>
                                        <div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
                                            <div class="project-single">
                                                <div class="project-inner project-head">
                                                    <div class="homes">
                                                        <!-- homes img -->
                                                        <a href="property-details.php?id=<?php echo $list['property_id'] ?>" class="homes-img">
                                                             <?php if($list['feature'] == 'featured'){ ?>
                                                              <div class="homes-tag button alt featured"><b><small><?php  echo $list['feature'] ?></small></b></div>
                                                                <?php }?>
                                                            <div class="homes-tag button alt sale"><b><small><?php echo $list['pstatus_name'] ?></small></b></div>
                                                            <div class="homes-price">₦<?php echo $list['property_price'] ?></div>
                                                            <img src="images/property/<?php echo $img?>" alt="<?php echo $list['property_title'] ?>" class="img-responsive">
                                                        </a>
                                                    </div>
                                                    <div class="button-effect">
                                                    <a href="property-details.php?id=<?php echo $list['property_id'] ?>" class="btn"><i class="fa fa-link"></i></a>                                                        
                                                    <a href="property-details.php?id=<?php echo $list['property_id'] ?>" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                                    </div>
                                                </div>
                                                <!-- homes content -->
                                                <div class="homes-content">
                                                    <!-- homes address -->
                                                    <h3> <a href="property-details.php?id=<?php echo $list['property_id'] ?>"> <?php echo $list['property_title'] ?> </a></h3>
                                                    <p class="homes-address mb-3">
                                                    <a href="property-details.php?id=<?php echo $list['property_id'] ?>">
                                                            <i class="fa fa-map-marker"></i><span> <?php echo $list['property_address'] ?>  ,  <?php echo $list['city_name'] ?>  , <?php echo $list['states_name'] ?>  </span>
                                                        </a>
                                                    </p>
                                                    <!-- homes List -->
                                                    <ul class="homes-list clearfix">
                                                        <li class="the-icons">
                                                        <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                            <span><?php echo $list['bedroom_no'] ?> Beds</span>
                                                        </li>
                                                        <li class="the-icons">                                                         
                                                             <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                            <span><?php echo $list['bathroom_no'] ?>  Baths</span>
                                                        </li>
                                                        <li class="the-icons">
                                                             <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                            <span><?php echo $list['property_area'] ?> sq ft</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <?php }?>
                                    </div>
                                </div>
                            </section>
                            <!-- END SIMILAR PROPERTIES -->
                    </div>
                </div>
                
                <nav aria-label="..." class="pt-4">
                <ul class="pagination lis-view">
                <?php  $prop->pagination_agentproperties('agent-details.php', $page, $id);?>
            </ul>
                </nav>
            </div>
        </section>
        <!-- END SECTION AGENTS DETAILS -->
        <?php include "include/foot.php"?>
        <?php   require('include/footer.php');?>