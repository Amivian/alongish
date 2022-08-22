<?php 	
session_start();
require('admin.php');
 
 $obj = new Admin;

 if (empty($_SESSION['uname'])) {
 	header('location:login.php');
 }

$k = $obj->getUser($_SESSION['id']);
$agent_id=$_SESSION['id'];
 
 $pix= $k['a_pix'];
 if (empty($pix)) {
     $pix = 'avatar.png';
 }
 require('property.php');
 $prop= new Property;
 $property = $prop->getJointVenture($agent_id);
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
    <title>My Listings</title>
  
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
                                        <th class="pl-2">My Joint Ventures</th>
                                        <th class="p-0"></th>                                        
                                        <th>Terms & Conditions </th>
                                        <th>Offer</th>
                                        <th>Status</th>
                                        <th>Posted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        foreach($property as $props) {
                                            $img = $prop-> getsponsorshipImage($props['jointventure_id']);
                                            $type = $prop->getSponsorshipNeed($props['jointventure_id']);
                                            ?>
                                    <tr>
                                        <td class="image myelist">
                                            <a href="../sponsorship-details.php?id=<?php echo $props['jointventure_id'] ?>">
                                                <img alt="<?php echo $props['joint_title'] ?>" src="../images/sponsor/<?php echo $img;?>" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="../sponsorship-details.php?id=<?php echo $props['jointventure_id'] ?>">
                                                  <h2 class="mb-1"><?php echo ucwords($props['joint_title']); ?></h2>
                                                </a>
                                                <figure class="mb-1"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo ucwords($props['address'] );?> , <?php echo ucwords($props['city_name'] )?> , <?php echo $props['states_name'] ?> </figure>
                                                <figure class="mb-1" > <b>Description :  </b> <?php echo $props['joint_description'] ?>,  
                                                </figure>
                                               <figure> <b> Sponsorship:  </b>  <?php                                
                                                    foreach($type as $extras){                                             
                                                    ?>  <?php echo $extras['joint_name']?> <br> <?php }?></figure>
                                            </div>
                                        </td>
                                        <td>  <?php echo $props['joint_tc'] ?>  </td>
                                        <td><?php echo $props['offer']?></td>
                                        <td><?php echo $props['jstatus']?></td>
                                        <td><?php echo date('F j, Y', strtotime($props['date_posted']));?></td>
                                        <td class="actions">
                                         <div class="row">
                                               <div class="col-6">
                                                        <form action="manage-venture.php" method="POST">
                                                <input type="text" name="edit_id" class="d-none" value="<?php echo $props['jointventure_id']?>">
                                               <button type="submit" name="edit_data" class="btn btn-success btn-sm">Edit</button></form></div>
                                             <div class="col-6">
                                        <a href='deleteventure.php?id=<?php echo $props['jointventure_id']?>' name='delete' onclick="return confirm('You are about to delete <?php echo $props['joint_title']?>')"><i class="far fa-trash-alt"></i></a></div>
                                                </div> 
                                        </td>
                                    </tr>
                                    <?php
                                        }?>
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                <nav>
                                <ul class=" pagination">
                        <?php 
                         $get = $prop->pagination_four('my-venture.php', $page, $agent_id);?>
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