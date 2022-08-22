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
$output = $prop->showJointMessage();
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
    <title>All Sponsorship Messages</title>
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
                                        <th class="pl-1">Sponsorship Messages</th>
                                        <th class="p-0"></th>                                        
                                        <th>Message</th>
                                        <th>Agent</th>
                                        <th>Posted</th>                                        
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                 $count= 1;
                                        foreach($output as $props) {
                                            ?>
                                    <tr>
                                    <td><?php echo $count?></td>
                                        <td>
                                           <div class="inner">
                                                  <h2><b><?php echo ucwords($props['fname']); ?></b></h2>

                                                <figure class="mb-1"> <em> <a href="mailto:<?php echo $props['email']?>"> <?php echo ($props['email'] );?></a></em> <br> <a href="tel: <?php echo $props['phone']?>"><?php echo $props['phone'] ?></a> </figure>
                                            </div>
                                        </td>
                                        <td> <div class="inner">
                                             </div>    
                                        </td>
                                        <td> <div class="inner">
                                                <figure class="mb-1"><?php echo ucfirst($props['message_content']) ?>  
                                                        </figure>
                                             </div>    
                                        </td>
                                        <td><div class="inner">
                                                <figure class="mb-1">         
                                                <?php echo $props['a_fname'] ?>   <?php echo $props['a_lname'] ?>             
                                                        </figure>
                                             </div> </td>
                                        <td><?php echo date('F j, Y', strtotime($props['date_posted']));?></td>
                                        <td> <div class="row">
                                            <div class="col-12">
                                                <?php
                                                $idd = $props["message_id"];
                                                $staty = $props["jmstatus"];
                                                if($props['jmstatus'] == "pending"){
// echo $idd;
// echo $staty;
                                                    
                                                    
                                                    echo "<form  action='jointmapprovepropprocess.php' method='POST'>
                                                     <input value='$idd' name='idd' hidden>
                                                     <input value='$staty' name='staty' hidden>";
                                                    echo "<button type='submit' style='background:teal; color: white; border: teal !important; font-size: 12px;border-radius:5px; padding: 10px;' class='btn btn-sm' name='jmstatus'>";
                                                    echo "Pending";
                                                    echo "</button>";
                                                    echo "</form>";
                                                    
                                                }elseif(($props['jmstatus'] == "approved")){
                                                    // echo '$idd = $props["property_id"]';

                                                    echo "<form  action='jointmapprovepropprocess.php' method='POST'>";
                                                    echo "<input value='$idd' name='idd' hidden>";
                                                    echo "<input value='$staty' name='staty' hidden>";
                                                    echo "<button type='submit' style='background: green; color: white; border: green !important; font-size: 12px;border-radius:5px; padding: 10px;' class='btn btn-sm' name='jmstatus'>";
                                                    echo "Approve ";
                                                    echo "</button>";
                                                    echo "</form>";
                                                }
                                                
                                                ?>

                                            </div>
                                        </div></td>
                                        <td class="actions"><a href='delete.php?id=<?php echo $props["message_id"] ?>' name='delete' onclick="return confirm('You are about to delete this sponsorship message sent in by  <?php echo $props['fname'] ?>')"><i class="far fa-trash-alt"></i></a>
                                        </td>
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
                                     $get = $prop->pagination_messages('managejointmessages.php', $page);?>
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