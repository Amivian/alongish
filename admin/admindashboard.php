<?php 	
session_start();
if (empty($_SESSION['uname'])) {
    header('location:index.php');
}

require('admin.php'); 
$obj = new Admin;
$k = $obj->getAdmin($_SESSION['id']);
$agent_id=$_SESSION['id'];

$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
}

require('property.php');
$prop= new Property;
$property = $prop->getAgentProperties($agent_id);
$swap = $prop->agentswapCount($agent_id);
$quest = $prop->agentjointVentureCount($agent_id);

 ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/admin.css">
    <title>My Dashboard</title>

    <?php
				require('include/dashheaders.php');
				 ?>


    <?php
				require('include/sidebar.php');
				 ?>
    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
        <?php
                        require('include/mobile-dashboard.php');
                        ?>
        <div class="dashborad-box stat bg-white">
            <h4 class="title">Manage Dashboard</h4>
            <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
            <?php
                            if(isset($_GET['msg'])) {
                                echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";
                            }?>
            <div class="section-body">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-success text-light text-center">
                                <div class=" h1 ">
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div><?php echo $prop->agentPropertyCount($agent_id);?>
                                </div>
                                <div class="card-title text-uppercase">My Listings</div>
                            </div>
                            <a href="my-listings.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body bg-secondary text-light text-center">
                                <div class=" h1 ">
                                    <div class="icon">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div><?php echo  $prop->agentMessageCount($agent_id);?>
                                </div>
                                <div class="card-title text-uppercase">My Sponsorship Messages</div>
                            </div>
                            <a href="my-messages.php" class="text-center card-footer card-link">Full Detail <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-info text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div><?php echo $obj->propertyCount();?>
                                </div>
                                <div class="card-title text-uppercase">Total Property Listings</div>
                            </div>
                            <a href="manage-properties.php" class="card-link card-footer text-center">Full Detail &nbsp;
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-warning text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fas fa-user"></i></div>
                                    <?php echo $obj->agentCount();?>
                                </div>
                                <div class="card-title text-uppercase">Total Users</div>
                            </div>
                            <a href="reguser.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-danger text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fas fa-users"></i></div>
                                    <?php echo $obj->teamCount();?>
                                </div>
                                <div class="card-title text-uppercase">My Team</div>
                            </div>
                            <a href="my-team.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> 
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-primary text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fa fa-exchange"></i></div>
                                    <?php echo $swap;?>
                                </div>
                                <div class="card-title text-uppercase">My Swaps</div>
                            </div>
                            <a href="my-swaps.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> 
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-light text-dark  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fa fa-handshake-o"></i></div>
                                    <?php echo $quest;?>
                                </div>
                                <div class="card-title text-uppercase">My Joint Ventures</div>
                            </div>
                            <a href="my-venture.php" class="card-link card-footer text-center bg-dark text-white">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right "style="color-white"></i></a>
                        </div>
                    </div> 
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-success text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fa fa-exchange"></i></div>
                                    <?php echo $obj->swapCount();?>
                                </div>
                                <div class="card-title text-uppercase">Total Swap</div>
                            </div>
                            <a href="manageswaps.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> 
                     <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-warning text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fa fa-handshake-o"></i></div>
                                    <?php echo $obj->jointVentureCount();?>
                                </div>
                                <div class="card-title text-uppercase">Total Joint Venture</div>
                            </div>
                            <a href="manage-ventures.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div><div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-dark text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                    <?php echo $obj->jointMessageCount();?>
                                </div>
                                <div class="card-title text-uppercase">Sponsorship Messages</div>
                            </div>
                            <a href="managejointmessages.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-danger text-light  text-center">
                                <div class=" h1 ">
                                    <div class="icon"><i class="fas fa-list"></i></div>
                                    <?php echo $obj->requestCount();?>
                                </div>
                                <div class="card-title text-uppercase">Total Request</div>
                            </div>
                            <a href="request-listing.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="dashborad-box mt-5">
            <h4 class="title">Listing</h4>
            <div class="section-body listing-table">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Listing Name</th>
                                <th>Date Posted</th>
                                <th>status</th>
                                <th>Area</th>
                                <th>City</th>
                                <th>State</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                        foreach($property as $props) {
                                            ?>

                            <tr>
                                <td><?php echo ucwords($props['property_title']);?></td>
                                <td><?php echo date('F j, Y', strtotime($props['date_posted']));?></td>
                                <td class="status"><span class=" active">Active</span></td>
                                <td><?php echo ucwords($props['property_address']);?></td>
                                <td><?php echo $props['city_name'];?></td>
                                <td><?php echo $props['states_name'];?></td>
                            </tr>

                            <?php
                                    }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="dashborad-box">
            <h4 class="title" id="messages">Message</h4>
            <div class="section-body">
                <div class="messages">
                    <div class="message">

                        <div class="thumb">
                            <?php
                                        foreach($msg as $sms) {
                                            ?>
                            <img class="img-fluid" src="images/user/<?php echo $sms['a_lname'];?>" alt="">
                        </div>
                        <div class="body">
                            <h6><?php echo ucwords($sms['a_fname']);?> <?php echo ucwords($sms['a_pix']);?></h6>
                            <p class="post-time"><?php echo date('F j, Y', strtotime($props['date_posted']));?></p>
                            <p class="content mb-0 mt-2"><?php $sms['message_content'];?></p>

                            <div class="controller">
                                <ul>
                                    <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                    <li><a href='delete.php?id=<?php echo $msg['message_id']?>' name='delete'
                                            onclick="return confirm('Do you want to delete')"><i
                                                class="far fa-trash-alt"></i></a></li>
                                </ul>
                            </div>
                            <?php
                                        }?>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

    </div>
    </div>
    </div>
    </section>
    <?php
				require('include/dashfooter.php');
				 ?>