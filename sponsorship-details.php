<?php
    require 'include/active-user.php';

    require "sponsorship-form.php";
    
    $obj = new User;

    $prop = new \admin\Property;

    $id = $_GET['id'];

    $property = $prop-> showVentureDetails($id);

    $extra = $prop->getSponsorshipNeed($id);

    $images = $prop-> getSponsorshipImages($id);

    $recent = $prop->showRecentJoint();

    $swap = $prop->showSwaps();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Property Details</title>
    <?php  require('include/head.php');  ?>
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
                <?php  require('include/header002.php');  ?>
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
                                        <?php foreach($images as $img){ ?>
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
                                                alt="<?php echo $property['joint_title'] ?>">
                                        </div>

                                        <?php   foreach($images as $img){  ?>
                                        <div class="item carousel-item" data-slide-number="1">
                                            <img src="images/sponsor/<?php echo $img['image_url'] ?>" class="img-fluid"
                                                alt="<?php echo $property['joint_title'] ?>">
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
                                                          </ul>
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
        <!-- terms and conditions modals --> 
          <!-- Modal -->
          <div class="modal fade hide Mymodal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
             <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Terms of Use</h3>
                    <button type="button" class="close" data-dismiss="" aria-label="">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div style="float:left; width:100%">
                        <ol type="1" style="padding:10px">
                            <li >
                                <div>
                               <h6><b>TERMS & CONDITIONS</b></h6>
                               <p>This Agreement governs the provision of Services by ALONGISH  to you. The terms “you” and “your” refer to the person that obtains, uses or otherwise accesses the Services. The agreements covers and not limited to the followings</p>
                                </div>
                                <div>                                    
                               <ol type="a">
                                <li>the electronic application form for the Services available on the online agent portal (Application Form);</li>
                                <li>these terms and conditions can be changed with prior notice</li>
                                <li>any other document provided to you by ALONGISH expressed to form part of this Agreement.</li>
                               </ol>
                                </div>
                                <div>                                    
                               <p>If there is an inconsistency in a provision in the parts of this Agreement, then the provision in the part that is listed shall prevails to the extent of the inconsistency, unless otherwise indicated in this Agreement.</p>
                                </div>
                            </li>
                            <li> 
                              <div><b>SERVICES</b></div>
                              <div>
                                <ul style="list-style-type:none">
                                    <li>
                                        <div class="mb-2">
                                        2.1. The Services provide you with the functionality and platform to enable you to list your properties for sale or lease on the website located at www.alongish.com Please note that the features and functionality that may be available as part of the Services or that are available on the Website may be different depending on the device or application used to access the Services or the Website (eg desktop vs mobile).
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mb-2">
                                        2.2.  You may apply for a Service through the Application Form. Alongish may, at its sole discretion, accept or reject any Application Form submitted for a Service. A separate Agreement is created between ALONGISH and you for each Application Form that is accepted by ALONGISH
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mb-2">
                                        2.3. You acknowledge that your real estate listings software provider may take all action necessary for your listings to be transferred to ALONGISH and uploaded to the Website.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mb-2">
                                        2.4. If ALONGISH decides, or is required, to modify or exit a Service (or part thereof), then ALONGISH may, on reasonable notice to you: (a) transfer you to the modified service or an alternative service; or (b) cancel the Service. If the service to which ALONGISH proposes to transfer you to is materially detrimental to you, then you may cancel the service, but you will not be entitled to any refunds or reimbursements of any Fees and charges paid for or in connection with that service.
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mb-2">
                                            2.5. A Service does not include:
                                            <div>
                                                <ol type="a">
                                                    <li>Back up services.</li>
                                                    <li>Customisation.</li>
                                                    <li>Training</li>
                                                    <li>Attendance at your premises</li>
                                                    <li>Correction of errors or defects including those caused by:
                                                        <ol type="i">
                                                            <li>Faulty equipment or hardware provided by you; or</li>
                                                            <li>Your negligent acts or omissions and any events beyond ALONGISH’ reasonable control.</li>
                                                        </ol>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>   
                                    </li>
                                </ul>
                              </div>
                            </li>
                            <li>
                                <div>
                                    <b>ALONGISH’ COMMITMENT TO YOU</b>
                                </div>
                                <div>
                                    <ul style="list-style-type:none" >
                                        <li> 
                                            <div class="mb-2">
                                                3.1.  ALONGISH will:
                                                <div>
                                                <ol type=""a>
                                                    <li>provide the Services with due care and skill, but does not guarantee that they will be continuous or fault free; and </li>
                                                    <li>use suitably qualified personnel to provide the Services.</li>
                                                </ol>
                                                </div>
                                            </div>
                                         </li>
                                        <li>
                                            <div class="mb-2">
                                            3.2.  ALONGISH does not guarantee, represent or warrant that:
                                            </div>
                                            <div>
                                                <ol type="i">
                                                    <li>you or users of the Website will have continuous access to the Website;</li>
                                                    <li>the Services will be complete or free from all viruses, defects or errors. You acknowledge and agree that the existence of any defects or errors in a Service does not constitute a breach of any agreement between you and ALONGISH; and</li>
                                                    <li>any information supplied or accessed using a Service is correct and complete or sufficient for your intended use.</li>
                                                </ol>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            ALONGISH will not be liable in the event that the Website is unavailable for any reason, including but not limited to computer downtime attributable to malfunctions, upgrades, preventative or remedial maintenance activities or interruption in telecommunication supplies.

                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>YOUR COMMITMENT TO ALONGISH</b></div>
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                              4.1. You are solely responsible for:
                                                <div>
                                                    <ol type="i">
                                                        <li>obtaining any telecommunication services and infrastructures (including Internet access) required to access and use the Services; and</li>
                                                        <li>ensuring that any communications through the Internet (including emails) is appropriately secured in transit and during delivery of such communications. ALONGISH may use industry available encryption technology that is designed to encrypt communications to the Website, but you agree that ALONGISH is not liable in any way for the security or otherwise of any such communication.</li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                               4.2. In using the Service, you must:
                                               <div>
                                                <ol type="i">
                                                    <li>
                                                        <div>
                                                        To  ensure the Submitted Materials are provided in the form required by ALONGISH from time to time and contain the correct property and do not contain any information which you would not otherwise be permitted to publish through ALONGISH;
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To only submit material to ALONGISH by a method pre-approved by ALONGISH (such as via an authorised XML provider);
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To comply with all policies specified or otherwise notified by ALONGISH to you from time to time, including all policies set out in the Website;
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        Provide ALONGISH with such assistance as is reasonably necessary to provide you with the Service;
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To notify ALONGISH in writing if you change any information required by ALONGISH to provide a Service;
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To provide and update from time to time all hardware and software necessary to use a Service;
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To train your personnel in relation to the use of a Service and ensure your personnel comply with this Agreement;
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To pay any telecommunication charges incurred by you; and
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                        To assess the accuracy, reliability and completeness of any information obtained through a Service.
                                                        </div>
                                                    </li>
                                                </ol>
                                               </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            4.3. YOU MUST NOT :
                                            <div>
                                                <ol type="i">
                                                    <li><div> use a Service for any purpose other than those purposes outlined in this Agreement;</div> </li>
                                                    <li><div>do anything which impairs the lawful use of a Service by any person;</div></li>
                                                    <li><div>use or provide any materials or information provided by ALONGISH to you in connection with a Service to any other person without ALONGISH’ prior written consent (which may be given or withheld at its discretion);</div></li>
                                                    <li><div>distribute, rent, lease, sell or re-sell, charge, sub-license, assign, transfer or otherwise deal with the Service;</div></li>
                                                    <li> <div>insert any tag, code, cookie or other data tracking or collection device in an advertisement for the purpose of re-targeting ALONGISH users on a third party site, network or exchange;</div> </li>
                                                    <li><div>link, pool, correlate, resell, transfer, disclose or make available any advertising statistics the result of displaying the creative on ALONGISH for the purposes of behavioral targeting or other type of re-targeting off the ALONGISH network without ALONGISH’ express written permission;</div></li>
                                                    <li><div>introduce or use any device, software or routine that interferes or attempts to interfere with the operation of a Service including but not limited to any device intended to copy any information published by ALONGISH including any listing;</div></li>
                                                    <li><div>create or otherwise produce either directly or indirectly or wholly or partly any database which is substantially comprised of any information published by ALONGISH; or</div></li>
                                                    <li><div>intentionally withdraw and relist listings with a view of influencing the search results available on the Website.</div></li>
                                                </ol>
                                            </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                                 4.4. You warrant to ALONGISH that:
                                                 <div>
                                                    <ol type="i">
                                                        <li> <div>you have obtained and will maintain all licences, permits, approvals and consents necessary to enable you to operate as a real estate agent, property developer or builder and that are otherwise required for your business and its operations;</div> </li>
                                                        <li><div>all Submitted Material, whether for the purposes of publication or not:</div></li>
                                                        <li><div>is accurate and complies with all relevant laws;</div></li>
                                                        <li><div> does not infringe any person’s rights (including intellectual property rights), and that the use of all Submitted Material does not and will not infringe any person’s rights (including intellectual property rights);</div></li>
                                                        <li><div>is not misleading or deceptive or likely to mislead or deceive; or</div></li>
                                                        <li><div> not comprised of anything which may adversely reflect in the Website or any website on which the information is published; and</div></li>
                                                        <li><div>you will comply with all applicable laws in relation to your use of the Service, including all laws in relation to handling and use of personal information.</div></li>
                                                    </ol>
                                                 </div>
                                             </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            4.5. You are solely responsible for ensuring that ALONGISH has your correct contact details to enable ALONGISH to provide you with the Services. You agree that ALONGISH may use personal information provided by you or otherwise collected by us, directly or indirectly, from you in accordance with ALONGISH’ Privacy Policy.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            
                            </li>
                            <li>
                                <div><b>SPECIFIC TERMS RELATING TO LISTINGS</b></div>
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                                 5.1. In using the Service, you must:
                                                <div>
                                                    <ol type="i">
                                                        <li> <div>only list real property for sale or lease;</div> </li>
                                                        <li><div>only list properties which are presently available for sale or lease and which you have been authorised to market for sale or lease;</div></li>
                                                        <li><div>not include any promotional web addresses or other promotional material that is not directly related to your listing and your services to lease and sale the property that is the subject of that listing;</div></li>
                                                        <li><div>not include any information that relates to a business or service that directly or indirectly competes with ALONGISH and its related bodies corporate;</div></li>
                                                        <li><div>ensure that any Submitted Material in respect of a property, accurately represents the property in question and is free from borders, watermarks (unless otherwise allowed as an exception by ALONGISH), agent location or contact details;</div></li>
                                                        <li><div>accurately indicate the location of the property being listed;</div></li>
                                                        <li><div> immediately remove any properties which are no longer for sale or lease (for example properties which have been sold, leased or withdrawn from the market);</div></li>
                                                        <li><div>only list each property for sale or lease once on the Service;</div></li>
                                                        <li><div>provide to ALONGISH in respect of each property at least the minimum required fields for publication, as set out in clause 6 of this Agreement and/or the Website;</div></li>
                                                        <li><div>ensure that you only list sale and rental listings for which you have been appointed by a vendor or lessor to sell and rent the relevant property; and</div></li>
                                                        <li><div>only list one listing per property lot address.</div></li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li><div class="mb-2">5.2. ALONGISH will not to the full extent permitted by law, be liable for error, misplacement, amendment, omission or failure to publish any listing.</div></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>MINIMUM INFORMATION</b></div>
                                <div>
                                <ul style="list-style-type:none">
                                    <li>
                                        <div class="mb-2">
                                            6.1. The following information is the minimum information which you must submit to ALONGISH in respect of each listing for publication on the Website:
                                            <div>
                                              <ol type="i" >
                                                    <li><div>street address;</div></li>
                                                    <li><div> property type (e.g. house, apartment);</div></li>
                                                    <li><div>title;</div></li>
                                                    <li><div>description;</div></li>
                                                    <li><div>number of bedrooms (except for vacant land);</div></li>
                                                    <li><div>number of bathrooms (except for vacant land);</div></li>
                                                    <li><div>number of car spaces (except for vacant land);</div></li>
                                                    <li><div>images (minimum of 1);</div></li>
                                                    <li><div>display price (may be numeric value or text, eg POA); and</div></li>
                                                    <li><div>status (e.g. current, sold, leased, withdrawn).</div></li>
                                              </ol>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="mb-2">               
                                            6.2. Where you do not provide, or authorise ALONGISH to publish, all of the above information set out above in a listing, ALONGISH may not publish the listing on the Website.
                                        </div>
                                    </li>
                                  <li>
                                    <div class="mb-2">
                                        6.3. ALONGISH reserves the right to update the minimum required information that must be provided in respect of each listing for publication on the Website by either updating this Agreement or updating the field requirements on the Website.

                                    </div>
                                </li>
                                </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>PROPERTY LISTING GUIDELINES</b></div>
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                                7.1. ALONGISH may, from time to time, set guidelines for how property listings will be returned in searches on the Websites.
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                              7.2. As at the date of this Agreement, information that ALONGISH uses to determine the search results includes:
                                                <div>
                                                    <ol type="i">
                                                        <li>
                                                            <div>
                                                                the provided values, property type, property attributions and relevant third party data and sources; and
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                              for determining search results around price or price refinement, the search values that are provided within the XML feed or within the ALONGISH agent dashboard separate to the advertised price.
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                             7.3. ALONGISH reserves the right to update these guidelines from time to time by either updating this Agreement or making available the updated guidelines on the Website.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>SPECIFIC TERMS RELATING TO LEADS</b></div>
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                             8.1. You acknowledge and agree that:
                                              <div>
                                                <ol type="i">
                                                    <li><div>ALONGISH provides no warranties in relation to the number of leads (that is, enquiries for further information submitted by users of the Website) you may receive; and</div></li>
                                                    <li><div>ALONGISH has no control over authenticity, accuracy or otherwise of any such leads.</div></li>
                                                </ol>
                                              </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                                8.2. You must:
                                                <div>
                                                    <ol type="i">
                                                        <li><div>provide a valid email address and a valid phone number in respect of each listing to which leads should be sent by ALONGISH (or any third party with whom you have an agreement);</div></li>
                                                        <li><div>ensure that all leads are handled by a suitably trained person in a professional and expeditious manner; and</div></li>
                                                        <li><div>not sell, assign or otherwise provide whether electronically or otherwise any lead (or information derived from a lead) to any person.</div></li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            8.3. You acknowledge that:
                                              <div>
                                                <ol type="i">
                                                    <li><div>ALONGISH will use its best endeavours to deliver all leads to the nominated email address, or where this is not available, an alternate email address;</div></li>
                                                    <li><div>ALONGISH will not be liable for any delay or failure to deliver leads to you which is caused by any technical or technological fault or failure or where any delay or failure to deliver a lead is due to any third party (such as a third party website which displays listings; and</div></li>
                                                    <li><div>in order to accurately record the number of leads delivered for each listing, ALONGISH retains sole control over the contact details provided by you, and you will not attempt to include any unauthorised contact details in any listing.</div></li>
                                                </ol>
                                              </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>SUBMITTED MATERIALS AND MONITORING OF CONTENT</b></div>
                                <div>
                                    <ul style="list-style-type:none">
                                                <li>
                                                    <div class="mb-2">
                                                      9.1. By uploading Submitted Materials you automatically grant (or warrant that the owner of such material expressly grants) to ALONGISH a world-wide, non-exclusive, perpetual, royalty-free, irrevocable, transferable and sub-licensable licence to use, reproduce, adapt, modify, communicate, display, perform, store and distribute those Submitted Materials for the purposes of:

                                                        <div>
                                                            <ol type="i">
                                                                <li>
                                                                    <div>
                                                                    performing its obligations pursuant to this Agreement;
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    publishing the Submitted Materials and any information included in a listing on the Website (including any websites owned or operated by ALONGISH, or on any website owned or operated by a third party with whom ALONGISH has an agreement to provide, share or distribute listings, information or materials) and any related services, including search engines, or any other online or print based media;
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    creating statistics, databases and compilations for use by ALONGISH and third parties, provided that ALONGISH will not disclose your information in any matter that identifies your information as yours; and
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    sub-licensing your subscription information to a third party with whom ALONGISH has a license agreement limited to the use of your subscription information as part of a real estate related application service. Such license shall apply with respect to any form, media or technology now known or later developed.
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                     9.2. Without limiting the foregoing, you agree that Submitted Materials may be used by ALONGISH for purposes including marketing, research and development of goods and services.
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                     9.3. You warrant that:
                                                        <div>
                                                        <ol type="i">
                                                            <li>
                                                                <div>ALONGISH’ use of any Submitted Material contributed by you will not infringe the intellectual property rights (including the moral rights) of any third party or breach any obligations of confidence or any other law or regulation relating to the Submitted Materials; and

                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div>
                                                                in relation to moral rights, you have obtained all necessary consents which will allow ALONGISH to perform all or any acts or omissions which, but for the consent, would be considered an infringement of the author’s moral rights under the Copyright law
                                                                </div>
                                                            </li>
                                                        </ol>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                        9.4. ALONGISH reserves the right to amend, edit, block or immediately remove Submitted Material without notice to you that it considers is or may be, in its sole discretion where you have breached a warranty or term set out above.
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">  
                                                        9.5. Despite any other provision to the contrary, ALONGISH reserves the right in its absolute discretion, and without any liability to you or any other person, to:
                                                        <div>
                                                            <ol type="i">
                                                                <li>
                                                                    <div>
                                                                    publish and/or communicate to the public any materials (including Submitted Materials), including where you have breached this Agreement;
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    determine the timing of publication of the Submitted Materials;
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    take and exercise sole editorial control (including placement of watermarks) in relation to all Submitted Materials (including listings) to be published on the Website or otherwise in connection with the Services; and

                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    take down, remove or otherwise cease publishing and communicating to the public any materials (including Submitted Materials).
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                      9.6. Notwithstanding clause 9.A, ALONGISH is under no obligation to monitor Submitted Material to ensure it complies with any law, guideline or requirements or that it is generally suitable for publication.
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                        9.7. You waive any moral rights you may have in relation to the Submitted Material. You agree to any act or omission by ALONGISH or on its behalf where such act or omission would, but for your waiver and consent in this clause, constitute a breach of your moral rights in relation to the Submitted Material.
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                        9.8. You acknowledge and agree that ALONGISH:
                                                        <div>
                                                            <ol type=""i>
                                                                <li>
                                                                    <div>
                                                                    is not responsible for any aspect of your or any third party’s website(s), including the currency, accuracy or otherwise of any information or data on those websites; and
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <div>
                                                                    ALONGISH does not guarantee or warrant that:
                                                                    <div>
                                                                        <ol type="i">
                                                                           <li><div>the Website will be continuously available or available at all;</div></li>
                                                                           <li><div>you or your listing as part of the Service will receive any impressions, click throughs or like metrics; or</div></li>
                                                                           <li><div>there will be any traffic levels (including hits and exposures) to the Website.</div></li> 
                                                                        </ol>
                                                                    </div>
                                                                    </div>
                                                                </li>
                                                            </ol>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="mb-2">
                                                    9.9. While ALONGISH will use its best endeavours to store your information in its database, it provides no warranty as to such storage and will not, subject to clause 11, be liable in the event that there is a corruption, deletion or failure to store any information which relates to you including any listing or any inability to access such information. Accordingly, ALONGISH strongly recommends that you keep a permanent record of all information and data which relates to you.
                                                    </div>
                                                </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b> CONFIDENTIALITY AND PRIVACY</b></div>
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div 
                                            class="mb-2">
                                                10.1. Each party acknowledges and agrees that ALONGISH’ Confidential Information includes:
                                                <div>
                                                    <ol type="a">
                                                        <li>
                                                            <div>
                                                              the provisions of this Agreement; and
                                                            </div>                                                            
                                                        </li>
                                                        <li>
                                                            <div>
                                                            all information provided by ALONGISH to you under this Agreement, including ALONGISH’ technical, operational, and commercial information in relation to the supply of Services.
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                             10.2. A party must not disclose the other party's Confidential Information to any person except:
                                                <div>
                                                    <ol type="i">
                                                        <li><div>to its professional advisers and its personnel on a “need to know” basis, but only if those persons have agreed to keep the Confidential Information confidential in accordance with the terms of this Agreement;</div></li>
                                                        <li><div>with the other party's prior written consent, but only to the extent that such consent is given;</div></li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">                                                
                                                10.3. You acknowledge and agree that:
                                                <div>
                                                    <ol type="i">
                                                        <li><div>you must ensure that you do not, and do not allow any other person (including your users) to access or use the Services in a manner contrary to the requirements of any laws;</div></li>
                                                        <li><div>you are solely responsible for obtaining all necessary consent with respect to the collection, use, access, disclosure and storage of personal information (including sensitive information) in relation to your access or use of the Services; and</div></li>
                                                        <li><div>you will ensure that any person whose information is disclosed to ALONGISH in the course of accessing or using the Services, or otherwise in connection with this Agreement, acknowledges that ALONGISH handles personal information (as that term is defined in the Privacy Act 1988 (Cth)) according to ALONGISH’ Privacy Policy, as amended by ALONGISH from time to time.</div></li>
                                                    </ol>
                                                </div>

                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                             10.4. You agree that ALONGISH’ Confidential Information includes all ALONGISH account information, including user identification details and password information. You agree: 
                                                <div>
                                                    <ol type="a">
                                                        <li><div>to immediately change any account information if the security of the account has been compromised in any way; and </div></li>
                                                        <li><div> that you are responsible for all transactions entered under your account, including all use of your user identification details or passwords.</div></li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            10.5. You acknowledge and agree that we may collect and use personal information as described in ALONGISH’ privacy policy available at https://www.ALONGISH.com/about/privacy-policy/ (as amended by ALONGISH from time to time).
                                            </div>
                                        </li>
                                </ul>
                                </div>
                            </li>
                            <li>
                                <div><b> ALONGISH’ LIABILITY TO YOU</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li><div class="mb-2">11.1. Other than as set out in this Agreement, and to the full extent permitted by law, ALONGISH excludes all warranties, liabilities, rights, remedies, conditions and guarantees arising under or in respect of this Agreement and the Services, whether in contract, tort (including negligence), statute or any other cause of action.</div></li>
                                        <li><div class="mb-2">11.2. You indemnify ALONGISH, its officers, agents and contractors against all actions, claims and demands (including the cost of defending or setting any actions, claims and demands) arising out of any deliberate, unlawful or negligent act or omission by you.</div></li>
                                        <li><div class="mb-2">11.3. This clause 11 survives the expiry and termination (for any reason) of this Agreement.</div></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>SUSPENSION OF THE SERVICE</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">12.1. ALONGISH may limit, suspend or cancel the provision of a Service at any time:
                                               <div>
                                               <ol type="a">
                                                <li> without notice to you:
                                                    <div>
                                                        <ol type="i">
                                                            <li><div> in the event of an emergency;</div></li>
                                                            <li><div> if the supply or use of a Service is, or is likely to become, unlawful; or</div></li>
                                                            <li><div>if, in ALONGISH’ reasonable opinion, the provision of a Service is likely to cause death, personal injury or damage to property; and</div></li>
                                                        </ol>
                                                    </div>
                                                </li>
                                                <li>
                                                by notice to you:
                                                    <div>
                                                        <ol type="i">
                                                            <li><div>if you do not pay any amounts due for that Service on time;</div></li>
                                                            <li><div>if your use of a Service interferes (or may interfere) with the Website, and you fail to rectify the situation; or</div></li>
                                                            <li><div>if an administrator, receiver, liquidator or provisional liquidator is appointed to you, or you resolve to enter into any settlement, moratorium or similar arrangement for the benefit of your creditors, or you are otherwise unable to pay your debts when they are due.</div></li>
                                                        </ol>
                                                    </div>
                                                </li>
                                               </ol>
                                               </div>
                                            </div>
                                        </li>
                                        <li><div class="mb-2">12.2. Where provision of a Service has been suspended or cancelled under clause 12.1, ALONGISH may require you to pay additional charges to resume the provision of the Services.</div></li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>TERMINATION OF THIS AGREEMENT</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                                 13.1. ALONGISH may immediately terminate this Agreement for cause on notice to you if you:
                                                <div>
                                                    <ol type="i">
                                                        <li><div>fail to pay the Fees or any other fees or charges under this Agreement by the due date for payment;</div></li>
                                                        <li><div> breach any provision of this Agreement that is not capable of remedy;</div></li>
                                                        <li><div>breach any provision of this Agreement that is capable of remedy and you fail to remedy such breach with 14 days’ of ALONGISH’ notice to do so;</div></li>
                                                        <li><div> assign or purport to assign this Agreement; or</div></li>
                                                        <li>
                                                            <div>are or become insolvent.</div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                             13.2. ALONGISH may immediately terminate this Agreement on notice to you and without any liability if:
                                                <div>
                                                    <ol type="i">
                                                        <li>
                                                            <div>
                                                            in relation to international listing syndication, any agreement between ALONGISH and a third party to provide, share or distribute listings terminates or expires; or
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div>
                                                               ALONGISH ceases to operate the relevant Service for any reason.
                                                            </div>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                             13.3. You may cancel a Service or terminate this Agreement on 10 days’ written notice to ALONGISH or as otherwise provided on the Website for that Service, but you agree that you are not entitled to any refund or reimbursement of any Fees.

                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            13.4. On the termination of this Agreement:
                                            <div>
                                                <ol type="i">
                                                    <li><div>you must pay all outstanding fees to ALONGISH;</div></li>
                                                    <li><div>you must return or destroy (at ALONGISH’ option) all ALONGISH intellectual property in your possession or control including but not limited to any application files; and</div></li>
                                                    <li><div>both ALONGISH and you will continue to comply with all obligations expressed herein to continue to apply after the expiration or termination of this Agreement or that otherwise by their nature continue to apply after the expiration or termination of this Agreement.</div></li>
                                                </ol>
                                            </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            13.5. Termination of this Agreement will not prejudice any accrued rights or liabilities of a party.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>INTELLECTUAL PROPERTY RIGHTS</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                          <li class="mb-2"><div>
                                            14.1. Nothing in this Agreement transfers ownership in, or otherwise grants any rights in, any intellectual property rights of ALONGISH, except any rights expressly granted to you under this Agreement.</div></li>
                                          <li class="mb-2"><div>
                                            14.2. All intellectual property rights in a Service and all information generated, compiled, arranged, stored or otherwise developed by ALONGISH, including any listing, belong to ALONGISH.</div></li>
                                      
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>AMENDMENTS TO AGREEMENT</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li class="mb-">15.1. ALONGISH may amend this Agreement from time to time, with or without notice to you. However, ALONGISH will endeavor to provide a notice of any such amendments on the Website.</li>
                                        <li class="mb-">
                                            15.2. If you continue to use the Service, on or after the date of any amendments to this Agreement, then you are taken to have agreed to these amendments. If you do not agree with these amendments and these amendments have a material detrimental impact on you, then you may terminate this Agreement on notice to ALONGISH without payment of any early termination fees.</li>
                                </ul>
                                </div>
                            </li>
                            <li>
                                <div><b> FEES</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                            16.1. You must pay the Fees in monthly installments, payable in advance and commencing at the time that you register as a user of the online agent portal.

                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            16.2. ALONGISH may vary the Fees payable for any ALONGISH Services (including by imposing Fees on ALONGISH Services which were previously not subject to Fees) at any time by providing 30 days’ written notice to you.
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            16.3. If you fail to pay any Fees by the required time, ALONGISH may:
                                            <div>
                                                <ol type="i">
                                                    <li>
                                                        <div>limit or cease your access and use of the Services;</div>
                                                    </li>
                                                    <li>
                                                        <div>charge you interest at 10% (per annum) calculated on the daily amount outstanding; and/or</div>
                                                    </li>
                                                    <li>
                                                        <div>engage a third party collection agency to recover the outstanding fees, and charge you any expense (including legal fees) incurred by ALONGISH in recovering the outstanding fees from you.</div>
                                                    </li>
                                                </ol>
                                            </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            16.4.  you must pay all taxes in connection with the Services.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                                <div><b>FORCE MAJEURE</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">17.1. Neither party will be liable for any delay or failure to perform its obligations pursuant to this Agreement (except your obligation to pay Fees and other amounts under this Agreement) if such delay is due to Force Majeure.</div>
                                        </li>
                                        <li>
                                            <div class="mb-2">17.2. If the delay or failure by a party to perform its obligations due to Force Majeure exceeds 60 days, either party may immediately terminate the Agreement on providing a notice in writing to the other party.</div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                            <div><b>FURTHER REQUIREMENTS</b></div> 
                                <div>
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">18.1. Each party agrees to do all things that may be necessary or desirable to give full effect to every part of this Agreement if asked in writing by another party to do so.</div>
                                        </li>
                                        <li>
                                            <div class="mb-2">18.2. You must not assign, transfer, subcontract or otherwise dispose of, in whole or in part, your rights or obligations under this Agreement, without the prior written consent of ALONGISH. ALONGISH may at any time novate, transfer or otherwise assign the whole or any part of this Agreement to any person. If so, you consent to such novation, transfer or assignment.</div>
                                        </li>
                                        <li>
                                            <div class="mb-2">18.3. If any provision of this Agreement is invalid, illegal or unenforceable in any respect, the validity, legality and enforceability of the remaining provisions will not be affected and such invalid, illegal or unenforceable provision is to be read down or severed from this Agreement.</div>
                                        </li>
                                        <li>
                                            <div class="mb-2">18.4. Failure by any party to exercise, or delay in exercising, any right, power or remedy under this Agreement does not prevent its exercise. To be effective, a waiver must be in writing signed by the party giving the waiver.</div>
                                        </li>
                                        <li>
                                            <div class="mb-2">18.5. Where, in this Agreement, ALONGISH is required to give notice in writing, ALONGISH may give the same by:<br>
                                               &nbsp; (i) posting the notice on the ALONGISH Website;</div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            18.6. This Agreement is governed by and is to be construed in accordance with the laws applicable in lagos State, Nigeria. The parties irrevocably submit to the exclusive jurisdiction of the courts in that State and Federal replublic of Nigeria and the courts of appeal above them, in respect of all matters arising out of or relating to this Agreement, its performance and subject matter.
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li>
                            <div><b>DEFINITIONS</b> <br>Capitalised terms used in this Agreement have the meaning given to them in this Agreement, including this clause 19. In this Agreement: <br>
                            </div> 
                                <div>
                                   <b>“Confidential Information”</b> means:
                                    <ul style="list-style-type:none">
                                        <li>
                                            <div class="mb-2">
                                            all confidential, non-public or proprietary information, regardless of how the information is stored or delivered, exchanged between the parties or their representatives (or in our case, provided by ALONGISH, its related bodies corporate, its affiliates, and any entity owned by ALONGISH) before, on or after the date of this Agreement relating to the business, technology or other affairs of the discloser of the information; and
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            in ALONGISH’ case, all information disclosed by a third party which ALONGISH is required to keep confidential,<br> but does not include information:
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            that is or becomes part of the public domain other than through breach of this Agreement or an obligation of confidence owed to the discloser;
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">
                                            which the recipient can prove by contemporaneous written documentation was: 
                                            <div>
                                                <ol type="i">
                                                    <li>
                                                        <div> already known to it at the time of disclosure by the discloser (unless such knowledge arose from disclosure of information in breach of an obligation of confidentiality); or </div>
                                                    </li>
                                                    <li>
                                                        <div> independently developed by the recipient without reference to the Confidential Information of the discloser; or</div>
                                                    </li>
                                                </ol>
                                            </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="mb-2">which the recipient acquires from a source other than the discloser or any of its representatives where such source is entitled to disclose it on a non-confidential basis.</div>
                                        </li>
                                    </ul>
                                </div>
                                <div><b>“Fee”</b> means the fees and charges payable for the Services under this Agreement.
                                </div>
                                <div>
                                <b>“Force Majeure”</b> means an event or circumstance beyond the reasonable control of a party (without fault or negligence of that party) including:
                                    <ol type="a">
                                        <li> acts of God, lightning strikes, earthquakes, floods, storms, explosions, fires and natural disasters; .</li>
                                        <li> acts of war, acts of public enemies, terrorism, riots, civil commotion, malicious damage, sabotage and revolution; strikes and industrial disputes; Internet outage, power, water, telecommunications or other utility shortage; and </li>
                                        <li>valid laws, rules, regulations, orders or decrees of the Federal republic of Nigeria or State Government or of any local government or of any statutory authority</li>
                                    </ol>
                                </div>
                            </li>
                        </ol">

                    </div>
                    <div class="row mt-2">
                        <ul class="pro-feature-add pl-4">
                                <li class="fl-wrap filter-tags clearfix">
                                    <div class="checkboxes float-left">
                                        <div class="filter-tags-wrap">
                                            <small>
                                            <input id="checkm" type="checkbox"
                                                class="terms" name="contact">
                                            <label for="checkm"> I agree to the Terms and Conditions</label>
                                            </small>
                                        </div>
                                    </div>
                                </li>
                        </ul>
                    </div>   
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary conditions" id="conditions" data-dismiss="modal" disabled>I Agree</button>
                </div>
                </div>
            </div>
            </div>
        <!-- /terms and conditions modals -->

        <!-- START FOOTER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/t&cpopup.js"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
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
           $(function() {
            $(".terms").click(function(){
                $('.conditions').attr('disabled', !this.checked);
            });
        });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>

</html>