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
$output = $prop->getAllProperties();

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
    <title>All Listings</title>
  
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
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                         ?>
                        <div class="my-properties">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="pl-2">#</th>
                                        <th class="pl-1">All Properties</th>
                                        <th class="p-0"></th>                                        
                                        <th>Type</th>
                                        <th>Purpose</th>
                                        <th>Posted</th>                                        
                                        <th>Status</th>  
                                        <th>Featured</th>        
                                        <th>Actions</th>       
                                    </tr>
                                </thead>  <tbody>
                                    
                                <?php
                                 $count= 1;
                                        foreach($output as $props) {
                                            $img = $prop-> getSingleImage($props['property_id']);
                                            ?>
                                    <tr>
                                    <td><?php echo $count?></td>
                                        <td class="image myelist">
                                            <a href="../property-details.php?id=<?php echo $props['property_id'] ?>">
                                                <img <?php echo ucwords($props['property_title']); ?> src="../images/property/<?php echo $img;?>" alt="property" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="property-details.php?id=<?php echo $props['property_id'] ?>">
                                                  <h2><?php echo ucwords($props['property_title']); ?></h2>
                                                </a>
                                                <figure class="mb-1"><i class="lni-map-marker"></i> <?php echo ucwords($props['property_address'] );?> , <?php echo ucwords($props['city_name'] )?> , <?php echo $props['states_name'] ?> </figure>
                                                <figure class="mb-1">Bedrooms: <?php echo $props['bedroom_no'] ?> |
                                                        Bathrooms:  <?php echo $props['bathroom_no'] ?>
                                                </figure>
                                                <figure class="mb-1">
                                                         Shared : <?php echo $props['shared'] ?> |  Furnished : <?php echo $props['furnished'] ?>
                                                </figure>
                                                        <figure class="mb-1">
                                                        Serviced : <?php echo $props['serviced'] ?> |   ₦<?php echo $props['property_price'] ?>
                                                        </figure>
                                                        <figure class="mb-1">
                                                         Agent : <b> <a href=""></a><?php echo ucwords($props['a_fname']) ?>  <?php echo ucwords($props['a_lname']) ?></b> 
                                                        </figure>
                                            </div>
                                        </td>
                                        <td><?php echo $props['ptype_name']?></td>
                                        <td><?php echo $props['pstatus_name']?></td>                                 
                                        <td><?php echo date('F j, Y', strtotime($props['date_posted']));?></td>
                                        <td> <div class="row">
                                            <div class="col-12">
                                                <?php
                                                $idd = $props["property_id"];
                                                $staty = $props["pstatus"];

                                                if($props['pstatus'] == "pending"){                    
                                                    
                                                    echo "<form  action='approvepropprocess.php' method='POST'>
                                                     <input value='$idd' name='idd' hidden>
                                                     <input value='$staty' name='staty' hidden>";
                                                    echo "<button type='submit' style='background:teal; color: white; border: teal !important; font-size: 12px;border-radius:5px; padding: 10px;' class='btn btn-sm' name='pstatus'>";
                                                    echo "Pending";
                                                    echo "</button>";
                                                    echo "</form>";
                                                    
                                                }elseif(($props['pstatus'] == "approved")){
                                                    //  echo '$idd = $props["property_id"]';

                                                    echo "<form  action='approvepropprocess.php' method='POST'>";
                                                    echo "<input value='$idd' name='idd' hidden>";
                                                    echo "<input value='$staty' name='staty' hidden>";
                                                    echo "<button type='submit' style='background: green; color: white; border: green !important; font-size: 12px;border-radius:5px;  padding: 10px;' class='btn btn-sm' name='pstatus'>";
                                                    echo "Approve";
                                                    echo "</button>";
                                                    echo "</form>";
                                                }
                                                
                                                ?>

                                            </div>
                                        </div></td>
                                          
                                    <td><div class="row">
                                            <div class="col-12">
                                                <?php
                                                $feature = $props["feature"];

                                                if($props['feature'] == "0"){                    
                                                    
                                                    echo "<form  action='featuredproperty.php' method='POST'>
                                                     <input value='$idd' name='idd' hidden>
                                                     <input value='$feature' name='feature' hidden>";
                                                    echo "<button type='submit' style='background:red; color: white; border: teal !important; font-size: 12px;border-radius:5px; padding: 10px;' class='btn btn-sm' name='featurebtn'>";
                                                    echo "Not Featured";
                                                    echo "</button>";
                                                    echo "</form>";
                                                    
                                                }elseif(($props['feature'] == "featured")){
                                                    //  echo '$idd = $props["property_id"]';

                                                    echo "<form  action='featuredproperty.php' method='POST'>";
                                                    echo "<input value='$idd' name='idd' hidden>";
                                                    echo "<input value='$feature' name='feature' hidden>";
                                                    echo "<button type='submit' style='background: green; color: white; border: green !important; font-size: 12px;border-radius:5px;  padding: 10px;' class='btn btn-sm' name='featurebtn'></i>";
                                                    echo " Featured";
                                                    echo "</button>";
                                                    echo "</form>";
                                                }
                                                
                                                ?>

                                            </div>
                                        </div>




                                        <!-- <a href='featuredproperty.php?id=<?php echo $props['property_id']?>' name='feature' ><?php echo $props['featured']?><i class="fa fa-check-square-o" aria-hidden="true"></i></i> -->
                                    </a></td>
                                     <td class='actions'>
                                        <div class='row'>
                                            <div class='col-7'>
                                                <a href="edit-agent-listing.php?edit_id=<?php echo $props['property_id']?>" class="btn p-2 text-white btn-success btn-sm">
                                                  Edit
                                                </a>
                                            </div>
                                            <div class='col-3'>
                                                <a href='deleteagent-listing.php?id=<?php echo $props['property_id']?>' name='delete' onclick="return confirm('You are about to delete <?php echo ucwords($props['property_title']);?> by <?php echo ucwords($props['a_username']) ?>')"><i class="far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
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
                                     $get = $prop->pagination_seven('manage-properties.php', $page);?>
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