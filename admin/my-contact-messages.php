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
$output = $prop->getContactMessage($agent_id);
if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
  ?>

  
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>My Contact Messages</title>
  
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
                         <?php
                            if(isset($_GET['msg'])) {
                                echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";
                            }?>
                        <div class="my-properties">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                    <th class="pl-2">#</th>
                                        <th class="pl-1">My Contact Messages</th>
                                        <th class="p-0"></th>                                      
                                        <th>Message</th>                                      
                                        <th>Contact</th>
                                        <th>Posted</th>  
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                    
                    $count= 1;
                                foreach($output as $msg) {
                                            ?>
                                    <tr> 
                                                <td><?php echo $count?></td>
                                              <td class='image myelist'><div class='inner'>
                                                <h2><b><?php echo ucwords($msg['fname']) ?></b></h2>
                                                </div></td>
                                              <td><div class='inner'></div></td>
                                			  <td><div class='inner'><figure class='mb-1'><?php echo ucwords($msg['message_content']) ?>  
                                              </figure></div></td>
                                              <td><div class='inner'><figure class='mb-1'> <em> <a href='mailto:<?php echo $msg['email'] ?>'><?php echo $msg['email'] ?></a></em> <br> <a href='tel:<?php echo $msg['phone'] ?> '><?php echo $msg['phone'] ?> </a> 
                                              </figure></div></td>
                                		   	  <td><?php echo date('F j, Y', strtotime($msg['date_posted']))?></td>
                                              <td class='actions' style='text-align: center;padding-right:20px'>     <a href='deletesms.php?id=<?php echo $msg['message_id']?>' name='delete'
                                        onclick="return confirm('You are about to delete this message from <?php echo ucwords($msg['fname'])?>')">
                                        <i class='far fa-trash-alt'></i>
                                    </a>
                                		   	  </tr>
                                                 <?php
                                     $count++; }?>
                            

                </tbody>
            </table>

            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            </div>

            <div class='pagination-container'>
                <nav>

                    
                <ul class=" pagination">
                        <?php 
                         $get = $prop->pagination_sms('my-contact-messages.php', $page, $agent_id);?>
                    </ul>
                </nav>
            </div>

        </div>
    </div>
    </div>
    </div>
    </section>
        <?php
				require('include/dashfooter.php');
				 ?>