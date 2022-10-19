<?php
    require 'include/active-user.php';

    require "contact-agent.php";

    $obj = new User;

    $prop = new admin\Property;

    $output = $prop->getRegUsers();

    if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
<meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Agents</title>
<?php require('include/head.php');?>
</head>

<body class="inner-pages agents homepage-4 hd-white">
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

        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION AGENTS -->
        <section class="blog blog-section portfolio pt-5">
            <div class="container">
               <section class="headings-2 pt-0 pb-55">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">

                                    <p class="pb-2"><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Agents</span></p>
                                </div>
                                <h3>All Agents</h3>
                                
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-xs-12">
                    <?php
                        if(isset( $_SESSION['response'])) {
                            echo "<p class='alert alert-success text-center'>".  $_SESSION['response'] ."</p>";
                            unset( $_SESSION['response']);
                        }
                    ?>
                        <div class="row">
                           
                        <?php if(!empty($output)){ 
                                foreach($output as $agent){
                                    $count = $prop->agentApprovedPropertyCount($agent['agent_id']);
                               
                            ?>
                            <div class="col-md-12 col-xs-12 mb-5">
                   
                                <div class="news-item news-item-sm ">
                                    <a href="agent-details.php?id=<?php echo $agent['agent_id']?>"  class="news-img-link ml-5">
                                        <div class="news-item-img homes">
                                            <div class="homes-tag button alt featured"><?php echo $count;?> Listings</div>
                                            <img class="resp-img" src="images/users/<?php if(!empty( $agent['a_pix'] ))
                                    { echo  $agent['a_pix'] ;
                                    } else {
                                        echo "avatar.png";
                                    }?>" alt="$agent['a_username']" style="width:auto">
                                        </div>
                                    </a>
                                    <div class="news-item-text mr-5">
                                        <a href="agent-details.php?id=<?php echo $agent['agent_id']?>"><h3><?php  echo ucwords($agent['a_fname'] );?>  <?php  echo ucfirst($agent['a_lname']) ;?></h3></a>
                                        <p class="my-0"><i class="fa fa-map-marker x2" aria-hidden="true" style="color: #ff385c;"></i>  <?php  echo $agent['city_name'] ;?> , <?php  echo $agent['states_name'] ;?></p>
                                        <p><i class="fa fa-phone" aria-hidden="true" style="color: #ff385c;"></i>  <a href="tel:<?php  echo $agent['a_phone'] ;?> " style="color:#666666"> &nbsp; <?php  echo $agent['a_phone'] ;?> &nbsp; | &nbsp; <i class="fa fa-envelope" aria-hidden="true" style="color: #ff385c;"></i> &nbsp; <a href="mailto:<?php  echo $agent['a_email'] ;?>" style="color:#666666">  &nbsp;<?php  echo $agent['a_email'] ;?></a></p>
                                        <small class="mt-1">Registered  <?php  echo date('F  j , Y', strtotime($agent['datereg'])) ;?></small>
                                        <div class="row">
                                            <div class="col-4">                                            
                                       <button class="mt-3 btn btn-sm" type="submit" style="color:white !important; background:  #ff385c;"><a href="agent-details.php?id=<?php echo $agent['agent_id']?>" name="agent_btn" style="color:white !important" >View Agent Details</a></button> 
                                            </div>
                                        </div>                                  
                                    </div>
                                </div>
                            </div>                            
                        <?php  }?>
                        </div>
                    </div>
                </div>
            
                <nav aria-label="..." class="pt-4">
                <ul class="pagination lis-view">
                <?php 
                 $get = $prop->pagination_agents('agent-listing.php', $page);?>
            </ul>
                </nav>
                <?php }else{ ?>
                <div>  <h4 class="text-danger text-center">No Record Found </h4>  </div>
            <?php }?>
            </div>
        </section>
        <!-- END SECTION AGENTS -->
        <?php include "include/foot.php"?>
  <?php
  require ('include/footer.php')
  ?>
