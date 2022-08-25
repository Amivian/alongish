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
 $output = $prop->getAgentProperties($agent_id);

 if(isset($_GET['page']) ? $page = $_GET['page']:$page = 1);
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
    <title>My Listings</title>
  
        <?php require('include/dashheaders.php'); ?>
            <?php require('include/sidebar.php'); ?>
                    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                        <?php require('include/mobile-dashboard.php'); ?>
                        <?php
                            if(isset($_SESSION['message'])) {
                                echo "<h5 class='alert alert-success text-center'>". $_SESSION['message'] ."</h5>";
                                unset($_SESSION['message']);
                            }
                        ?>
                       <?php
                    if(isset($_GET['msg'])){
                        echo "<h5 class='alert alert-info text-center'>".base64_decode(urldecode($_GET['msg'])) . '</h5>';
                    }
                    ?>  
                        <div class="my-properties">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="pl-2">My Properties</th>
                                        <th class="p-0"></th>                                        
                                        <th>Type</th>
                                        <th>Purpose</th>
                                        <th>Status</th>
                                        <th>Posted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                    <?php foreach($output as $props) { ?>
                        <?php $img =$prop-> getSingleImage($props['property_id']); ?>
                        <tr>
                            <td class='image myelist'>
                                <a href='property-details.php?id=<?php echo $props['property_id'] ?>'>
                                    <img alt=<?php echo $props['property_title']?> src='images/property/<?php echo $img?>'>
                                </a>
                            </td>
                            <td>
                                <div class='inner'>
                                    <a href='property-details.php?id=<?php echo $props['property_id']?>'>
                                        <h2><b><?php echo ucwords($props['property_title'])?></b></h2>
                                    </a>
                                    <figure class='mb-1'>
                                        <i class='fa fa-map-marker' aria-hidden='true'></i>
                                        &nbsp;<?php echo  ucwords($props['property_address'])?>
                                        , <br> <?php echo $props['city_name']?> ,
                                        <?php echo $props['states_name']?>
                                    </figure>
                                    <figure class='mb-1'>
                                    Bedrooms : <?php echo $props['bedroom_no']?>
                                        , Bathrooms : <?php echo $props['bathroom_no']?>
                                    </figure>
                                    <figure class='mb-1'>
                                    ₦<?php echo $props['property_price']?>
                                    </figure>
                                </div>
                            </td>
                            <td><?php echo $props['ptype_name']?></td>
                            <td><?php echo $props['pstatus_name']?>
                            <td><?php echo $props['pstatus']?>
                            <td><?php echo date('F j, Y', strtotime($props['date_posted']))?></td>
                            <td class='actions'>
                                <div class='row'>
                                    <div class='col-7'>
                                        <a href="manage-listings.php?edit_id=<?php echo $props['property_id']?>" class="btn p-2 text-white btn-success btn-sm">
                                            Edit
                                        </a>
                                    </div>
                                    <div class='col-3'>
                                        <a href='deleteproperty.php?id=<?php echo $props['property_id']?>' name='delete'
                                            onclick="return confirm('You are about to delete this <?php echo ucwords($props['property_title'])?>')">
                                            <i class='far fa-trash-alt'></i>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            </div>

            <div class='pagination-container'>
                <nav>

                    <ul class=" pagination">
                        <?php 
                         $get = $prop->pagination_three('my-listings.php', $page, $agent_id);?>
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