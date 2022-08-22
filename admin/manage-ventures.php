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
$output = $prop->showJointVentures();
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
    <title>All Joint Venture Listing</title>
   
  
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
                                        <th class="pl-1">All Joint Venture</th>
                                        <th class="p-0"></th>                                        
                                        <th>Description</th>
                                        <th>Terms and Conditions</th>
                                        <th>Posted</th>                                        
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php
                                 $count= 1;
                                        foreach($output as $props) {
                                            $img = $prop-> getsponsorshipImage($props['jointventure_id']);
                                            ?>
                                    <tr>
                                    <td><?php echo $count?></td>
                                        <td class="image myelist">
                                            <a href="../sponsorship-details.php?id=<?php echo $props['jointventure_id'] ?>">
                                                <img  src="../images/sponsor/<?php echo $img;?>" alt="<?php echo ucwords($props['joint_title']); ?>" class="img-fluid"></a>
                                        </td>
                                        <td>
                                           <div class="inner">
                                           <a href="../sponsorship-details.php?id=<?php echo $props['jointventure_id'] ?>">
                                                  <h2><b><?php echo ucwords($props['joint_title']); ?></b></h2>
                                                </a>
                                                <figure class="mb-1"><i class="lni-map-marker"></i> <?php echo ucwords($props['address'] );?> , <?php echo ucwords($props['city_name'] )?> , <?php echo $props['states_name'] ?> </figure>
                                                
                                                        <figure class="mb-1">
                                                         Agent : <b> <a href=""></a><?php echo ucwords($props['a_username']) ?> </b> 
                                                         </figure>
                                                         <figure class="mb-1">Offer : <?php echo $props['offer'] ?></figure>
                                            </div>
                                        </td>
                                        <td> <div class="inner">
                                                <figure class="mb-1"><a href=""></a><?php echo ucfirst($props['joint_description']) ?>  
                                                        </figure>
                                             </div>    
                                        </td>
                                        <td><div class="inner">
                                                <figure class="mb-1">         
                                                <?php echo $props['joint_tc'] ?>                    
                                                        </figure>
                                             </div> </td>
                                        <td><?php echo date('F j, Y', strtotime($props['date_posted']));?></td>
                                        <td> <div class="row">
                                            <div class="col-12">
                                                <?php
                                                $idd = $props["jointventure_id"];
                                                $staty = $props["jstatus"];
                                                if($props['jstatus'] == "pending"){
// echo $idd;
// echo $staty;
                                                    
                                                    
                                                    echo "<form  action='jointvapprovepropprocess.php' method='POST'>
                                                     <input value='$idd' name='idd' hidden>
                                                     <input value='$staty' name='staty' hidden>";
                                                    echo "<button type='submit' style='background:teal; color: white; border: teal !important; font-size: 12px;border-radius:5px; padding: 10px; ' class='btn btn-sm'  name='jstatus'>";
                                                    echo "Pending (Click to Approve)";
                                                    echo "</button>";
                                                    echo "</form>";
                                                    
                                                }elseif(($props['jstatus'] == "approved")){
                                                    // echo '$idd = $props["property_id"]';

                                                    echo "<form  action='jointvapprovepropprocess.php' method='POST'>";
                                                    echo "<input value='$idd' name='idd' hidden>";
                                                    echo "<input value='$staty' name='staty' hidden>";
                                                    echo "<button type='submit' style='background: green; color: white; border: green !important; font-size: 12px; border-radius:5px; padding: 10px;' class='btn btn-sm'  name='jstatus'>";
                                                    echo "Approve (Click to Pending)";
                                                    echo "</button>";
                                                    echo "</form>";
                                                }
                                                
                                                ?>

                                            </div>
                                        </div></td><td class='actions'>
                                        <div class='row'>
                                            <div class='col-7'>
                                                <form action='edit-agent-venture.php' method='POST'>
                                                    <input type='text' name='edit_id' class='d-none'
                                                        value="<?php echo $props['jointventure_id']?>">
                                                    <button type='submit' name='edit_data'
                                                        class='btn btn-success btn-sm'>Edit</button>
                                                </form>
                                            </div>
                                            <div class='col-3'><a href='delete.php?id=<?php echo $props['jointventure_id'] ?>' name='delete' onclick="return confirm('You are about to delete  <?php echo $props['joint_title']?> by <?php echo $props['a_fname'] ?> <?php echo $props['a_lname'] ?>')"><i class="far fa-trash-alt"></i></a></div>
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
                                     $get = $prop->pagination_jointventure('manage-ventures.php', $page);?>
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