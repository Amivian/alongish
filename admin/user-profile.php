<?php 	
session_start();
if (empty($_SESSION['uname'])) {
    header('location:index.php');
}
require('admin.php'); 
$obj = new Admin;
$k = $obj->getUser($_SESSION['id']);
$agent_id=$_SESSION['id'];

$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
}
require('property.php');
$prop= new Property;
$property = $prop->getAgentProperties($agent_id);


 ?>

 
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>My Profile</title>

                <?php
				require('include/dashheaders.php');
				 ?>


                    <?php
				require('include/sidebar.php');
				 ?>
                        <div class="col-lg-9 col-md-9 col-xs-6 widget-boxed mt-33 mt-0 ">
                        <?php
                                                                                        
                            if(isset($_GET['msg'])) {
                               echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";
                            }
                        ?>
                        <?php
				require('include/mobile-dashboard.php');
				 ?>
                            <div class="widget-boxed-header pb-0 mb-0">
                                <div class="container pb-0 mb-0">
                                    <div class="row">
                                        <div class="col-md-4">
                                         
                                            <h4>Profile Details</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <span>Registered: <?php date_default_timezone_set("Africa/Lagos"); 
                                             echo date('F j, Y', strtotime($k['datereg'])); ?></span>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="details.php"><i class="fas fa-edit"></i></a>
                                        </div>
<!--                                          
                  <?php
                if(isset($_GET['res'])){
                    echo "<div class='alert alert-danger'>".base64_decode(urldecode($_GET['res'])) . '</div>';
                }
                ?> -->
                                    </div>
                                </div>

                            </div>
                            <div class="sidebar-widget author-widget2 mt-3">
                                <div class="author-box clearfix">
                                    <!-- <span><b><?php echo "Welcome ". ucfirst($k['a_fname'])."!";
                                ?></b></span><br> -->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="../images/users/<?php echo $pix ?>" width="100" alt="profile"><br>
                                        </div>
                                        <div class="col-md-6">
                                            <?php
                                            if ($k['a_pix'] =='') {
                                                ?>
                                            <form action="uploadprofile.php" method="post"
                                                enctype="multipart/form-data">

                                                <input type="file" name="pix" class="file_input" id="pix"><br>
                                                <div class="mt-2">
                                                    <button type="submit" class="btn btn-sm btn-danger">Upload
                                                        Picture</button>
                                                </div>
                                            </form>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <h4 class="author__title"><?php echo ucfirst($k['a_fname'])?>
                                        <?php echo ucfirst($k['a_lname'])?></h4>
                                </div>
                                <ul class="author__contact">
                                    <li><span class="la la-map-marker"><i
                                                class="fa fa-map-marker"></i></span>
                                                

                                           


                                                <?php echo $k['city_name']?>,
                                        <?php echo $k['states_name']?>
                                    
                                    
                                    </li>
                                    <li><span class="la la-phone"><i class="fa fa-phone"
                                                aria-hidden="true"></i></span><a href="#">
                                            <?php echo $k['a_phone']?></a></li>
                                    <li><span class="la la-envelope-o"><i class="fa fa-envelope"
                                                aria-hidden="true"></i></span><a href="#">
                                            <?php echo $k['a_email']?></a></li>
                                </ul>
                                <div class="agent-contact-form-sidebar">
                                    <h4>Request Inquiry</h4>
                                    <form name="contact_form" method="post" action="functions.php">
                                        <input type="text" id="fname" name="full_name" placeholder="Full Name"
                                            required />
                                        <input type="number" id="pnumber" name="phone_number" placeholder="Phone Number"
                                            required />
                                        <input type="email" id="emailid" name="email_address"
                                            placeholder="Email Address" required />
                                        <textarea placeholder="Message" name="message" required></textarea>
                                        <input type="submit" name="sendmessage" class="multiple-send-message"
                                            value="Submit Request" />
                                    </form>
                                </div>
                            </div>
                            <div class="container-fluid mt-5">
                                <div class="widget-boxed-header pb-0">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <h4 class="mb-">Company Information</h4>
                                        </div>
                                        <div class="col-md-2"><a href="details.php#businessname"><i class="fas fa-edit"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="sidebar-widget author-widget2">
                                    <div class="author-box clearfix">
                                        <div class="row">
                                            <div class="col-md-6 mt-3">
                                                <p>Business Name:  <?php echo $k['businessname']?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        </section>
        <?php
				require('include/dashfooter.php');
				 ?>
       
