<?php 	
    require_once ('include/checks.php');

    require('property.php');

    $prop= new admin\Property;

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

    <?php require('include/dashheaders.php');?>

    <?php require('include/sidebar.php');?>

    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2"> 

        <?php require('include/mobile-dashboard.php');?>

        <div class="dashborad-box stat bg-white">
            <h4 class="title">Manage Dashboard</h4>

            <?php
                if(isset($_SESSION['message'])) {
                    echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
                    unset($_SESSION['message']);
                }
            ?>
            <?php
                if(isset($_GET['msg'])) {
                    echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";
                }
            ?>
            <div class="section-body">
                <div class="row">

                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-success text-light text-center">
                                <div class=" h4 ">
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div><?php echo $prop->agentPropertyCount($agent_id);?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">My Listings</p>
                            </div>
                            <a href="my-listings.php" class="card-link card-footer text-center">Full Detail &nbsp; 
                                <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card ">
                            <div class="card-body bg-secondary text-light text-center">
                                <div class=" h4 ">
                                    <div class="icon">
                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </div><?php echo  $prop->agentMessageCount($agent_id);?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">My Sponsorship Messages</p>
                            </div>
                            <a href="my-messages.php" class="text-center card-footer card-link">Full Detail <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-info text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div><?php echo $obj->propertyCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">Total Property Listings</p>
                            </div>
                            <a href="manage-properties.php" class="card-link card-footer text-center">Full Detail &nbsp;
                                <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body bg-danger text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fas fa-user"></i></div>
                                    <?php echo $obj->agentCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">Total Users</p>
                            </div>
                            <a href="reguser.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-danger text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fas fa-users"></i></div>
                                    <?php echo $obj->teamCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">My Team</p>
                            </div>
                            <a href="my-team.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> 
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-primary text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fa fa-exchange"></i></div>
                                    <?php echo $swap;?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">My Swaps</p>
                            </div>
                            <a href="my-swaps.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> 
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-dark text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fa fa-handshake-o"></i></div>
                                    <?php echo $quest;?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">My Joint Ventures</p>
                            </div>
                            <a href="my-venture.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right" ></i></a>
                        </div>
                    </div> 
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-success text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fa fa-exchange"></i></div>
                                    <?php echo $obj->swapCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">Total Swap</p>
                            </div>
                            <a href="manageswaps.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div> 
                     <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-info text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fa fa-handshake-o"></i></div>
                                    <?php echo $obj->jointVentureCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">Total Joint Venture</p>
                            </div>
                            <a href="manage-ventures.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div><div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-dark text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                    <?php echo $obj->jointMessageCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">Sponsorship Messages</p>
                            </div>
                            <a href="managejointmessages.php" class="card-link card-footer text-center">Full Detail &nbsp; <i
                                    class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <div class="card">
                            <div class="card-body bg-danger text-light  text-center">
                                <div class=" h4 ">
                                    <div class="icon"><i class="fas fa-list"></i></div>
                                    <?php echo $obj->requestCount();?>
                                </div>
                                <p style="font-size:14px;" class="card-title mb-0">Total Request</p>
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

    </div>
    </div>
    </div>
    </section>

    <?php require('include/dashfooter.php'); ?>