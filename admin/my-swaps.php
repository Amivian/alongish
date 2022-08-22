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
$output = $prop->getAgentSwaps($agent_id);

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
    <title>My Swaps</title>
  
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
                                echo "<h4 class='alert alert-success text-center'>". $_GET['msg'] ."</h4>";}?>

                        <div class="my-properties">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="pl-2">My Swaps</th>
                                        <th class="p-0"></th>                                        
                                        <th>Type</th>
                                        <th>Description</th>                                       
                                        <th>Posted</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                    <?php
                                foreach($output as $props) {
                                            $img = $prop-> getSwapImage($props['swap_id']);
                                            ?>
                    <tr>
                        <td class='image myelist'>
                            <a href='../swap-details.php?id=<?php echo $props['swap_id'] ?>'>
                                <img alt=<?php echo $props['swap_name']?> src='../images/swaps/<?php echo  $img?>'>
                            </a>
                        </td>
                        <td>
                            <div class='inner'>
                                <a href='../swap-details.php?id=<?php echo $props[' swap_id']?>'>
                                    <h2><b><?php echo ucwords($props['swap_name'])?></b></h2>
                                </a>
                                <figure class='mb-1'>
                                    <i class='fa fa-map-marker' aria-hidden='true'></i>
                                    &nbsp;<?php echo  ucwords($props['swap_address'])?>
                                    , <br> <?php echo $props['city_name']?> ,
                                    <?php echo $props['states_name']?>
                                </figure>
                            </div>
                        </td>
                        <td>
                            <div class='inner'><?php $props['swap_item']?>
                                <figure class='mb-1'>
                                    <b> Description </b> :<?php echo ucfirst($props['swap_description'])?>
                                </figure>
                            </div>

                        </td>
                        <td>
                            <div class='inner'>
                                <?php echo $props['swap_need']?>
                                <figure class='mb-1'>
                                    <b> Description </b> :<?php echo ucfirst($props['sitem_description'])?>
                                </figure>
                            </div>

                        </td>
                        <td><?php echo date('F j, Y', strtotime($props['date_posted']))?></td>
                        <td class='actions'>
                            <div class='row'>
                                <div class='col-6'>
                                    <form action='manage-swap.php' method='POST'>
                                        <input type='text' name='edit_id' class='d-none'
                                            value="<?php echo $props['swap_id']?>">
                                        <button type='submit' name='edit_data'
                                            class='btn btn-success btn-sm'>Edit</button>
                                    </form>
                                </div>
                                <div class='col-6'>
                                    <a href='delete-swaps.php?id=<?php echo $props['swap_id']?>' name='delete'
                                        onclick="return confirm('You are about to delete this <?php echo ucwords($props['swap_name'])?>')">
                                        <i class='far fa-trash-alt'></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php    }
    ?>
                </tbody>
            </table>

            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            </div>

            <div class='pagination-container'>
                <nav>

                    <ul class=" pagination">
                        <?php 
                         $get = $prop->pagination_two('my-swaps.php', $page, $agent_id);?>
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