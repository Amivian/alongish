<?php 	
session_start();
if (empty($_SESSION['id'])) {
    header('location:login.php');
}else{
    require('users.php');
    $obj = new User;
    $k = $obj->getUser($_SESSION['id']);
 
    $agent_id = $_SESSION['id'];
    
    
   $pix= $k['a_pix'];
   if (empty($pix)) {
       $pix = 'avatar.png';
}
require('property.php');
$prop= new Property;
$obj1 = $prop->agentPropertyCount($agent_id);
$property = $prop->getAgentProperties($agent_id);
$chat= $prop->agentMessageCount($agent_id);
$swap= $prop->agentSwapCount($agent_id);
$msg = $prop->showAgentjointMessage($agent_id);
$joint= $prop->agentJointVentureCount($agent_id);
$contact = $prop->showAgentContactMessage($agent_id);

}
 ?>

 
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
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
                            if(isset($_GET['msg'])) {
                                echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";
                            }?>
                            <div class="section-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number"><?php echo $obj1;?></h6>
                                                <p class="type ml-1">Published Property</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fas fa-list"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number"><?php echo $swap;?></h6>
                                                <p class="type ml-1">Total Swap</p>
                                            </div>
                                        </div>
                                   </div>
                                    <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                                        <div class="item">
                                            <div class="icon">
                                                <i class="fa fa-envelope-o" style="color: #fff;"></i>
                                            </div> 
                                            <div class="info">
                                                <h6 class="number"><?php echo $chat;?></h6>
                                                <p class="type ml-1">Joint Venture Messages</p>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="col-lg-3 col-md-6 dar booked col-xs-12 rev ml-3 ">
                                        <div class="item ">
                                            <div class="icon">
                                                <i class="fas fa-handshake-o" style="color: #fff;"></i>
                                            </div>
                                            <div class="info">
                                                <h6 class="number"><?php echo $joint;?></h6>
                                                <p class="type ml-1">Joint Venture</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashborad-box">
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
                        <div class="dashborad-box">
                            <h4 class="title mb-1">Sponsorship Message</h4>
                            <div class="section-body">
                                <div class="messages">
                                    
                                <?php
                                        foreach($msg as $sms) {
                                            ?>
                                    <div class="message">
                                        <div class="body">
                                            <h6  class="mb-0"><?php echo ucwords($sms['fname']);?></h6>                                            
                                            <small class="post-time mt-0"><?php echo date('F j, Y', strtotime($sms['date_posted']));?></small> <br>
                                            <small> <em class="mb-0"><a href="mailto<?php echo ucwords($sms['email']);?>"><?php echo $sms['email'];?></a></em> <br> <a href="tel:<?php echo $sms['phone'];?> "><?php echo $sms['phone'];?></a> </small >
                                            <p class="content mb-0 mt-1"><?php echo $sms['message_content'];?></p>
                                            
                                            <div class="controller">
                                                <ul>
                                                    <li><a href='delete.php?id=<?php echo $sms['message_id']?>' name='delete' onclick="return confirm('You are about to delete a Sponsorship message sent from <?php echo ucwords($sms['fname']);?>')"><i class="far fa-trash-alt"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        }?>
                                </div>
                            </div>
                        </div>
                        <div class="dashborad-box">
                            <h4 class="title mb-1">Contact Message</h4>
                            <div class="section-body">
                                <div class="messages">
                                    
                                <?php
                                        foreach($contact as $mail) {
                                            ?>
                                    <div class="message">
                                        <div class="body">
                                            <h6  class="mb-0"><?php echo ucwords($mail['fname']);?></h6>                                            
                                            <small class="post-time mt-0"><?php echo date('F j, Y', strtotime($mail['date_posted']));?></small> <br>
                                            <small> <em class="mb-0"><a href="mailto<?php echo ucwords($mail['email']);?>"><?php echo $mail['email'];?></a></em> <br> <a href="tel:<?php echo $mail['phone'];?> "><?php echo $mail['phone'];?></a> </small >
                                            <p class="content mb-0 mt-1"><?php echo $mail['message_content'];?></p>
                                            
                                            <div class="controller">
                                                <ul>
                                                    <li><a href='delete.php?id=<?php echo $mail['message_id']?>' name='delete' onclick="return confirm('You are about to delete a Sponsorship message sent from <?php echo ucwords($mail['fname']);?>')"><i class="far fa-trash-alt"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        }?>
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