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
$output = $prop->showAgents();
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
    <title>Agents</title>
<?php
require('include/head.php');
?>
</head>

<body class="inner-pages agents homepage-4 hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
        <div id="header">
            <?php
require('include/header002.php');
?>
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
                                if (isset($_GET['msg'])) {
                                        echo "<h5 class='alert alert-info text-center'>". $_GET['msg']. "</h5>";
                                    }
                                    ?>
                        <div class="row">
                           
                        <?php 
                                foreach($output as $agent){
                                    $count = $prop->agentPropertyCount($agent['agent_id']);
                               
                            ?>
                            <div class="col-md-12 col-xs-12 mb-5">
                   
                                <div class="news-item news-item-sm">
                                    <a href="agent-details.php?id=<?php echo $agent['agent_id']?>"  class="news-img-link">
                                        <div class="news-item-img homes">
                                            <div class="homes-tag button alt featured"><?php echo $count;?> Listings</div>
                                            <img class="resp-img" src="images/users/<?php echo $agent['a_pix']?>" alt="blog image">
                                        </div>
                                    </a>
                                    <div class="news-item-text">
                                        <a href="agent-details.php?id=<?php echo $agent['agent_id']?>"><h3><?php  echo ucwords($agent['a_fname'] );?>  <?php  echo ucfirst($agent['a_lname']) ;?></h3></a>
                                        <p class="my-0"><i class="fa fa-map-marker x2" aria-hidden="true" style="color: #ff385c;"></i> ,  <?php  echo $agent['city_name'] ;?> , <?php  echo $agent['states_name'] ;?></p>
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
                <nav aria-label="..." class="pt-0 mt-5">
                    <ul class="pagination disabled">
                        <li class="page-item">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </section>
        <!-- END SECTION AGENTS -->
        <?php include "include/foot.php"?>
  <?php
  require ('include/footer.php')
  ?>
