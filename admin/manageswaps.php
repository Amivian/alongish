<?php 	
    require_once ('include/checks.php');

    require('property.php');

    $properties= new \admin\Property;

    $admin= new \admin\Admin;

    $output = $properties->getAllSwaps();

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
    <title>All Swap Listing</title>
    <?php require('include/dashheaders.php');  ?>

    <?php   require('include/sidebar.php');    ?>
    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
        <?php require('include/mobile-dashboard.php'); ?>
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
        <div class="my-properties">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th class="pl-2">#</th>
                        <th class="pl-1">All Swap</th>
                        <th class="p-0"></th>
                        <th>Type</th>
                        <th>Need</th>
                        <th>Posted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>     
                            <?php
                                if(!empty($output)){
                                $count= 1;
                                foreach($output as $props) {
                                $img = $properties-> getSwapImage($props['swap_id']);
                            ?>
                     <tr>
                        <td><?php echo $count?></td>
                        <td class="image myelist">
                            <a href="../swap-details.php?id=<?php echo $props['swap_id'] ?>">
                                <img src="../images/swaps/<?php echo $img;?>" alt="<?php echo ucwords($props['swap_name']); ?>" class="img-fluid">
                            </a>
                        </td>
                        <td>
                            <div class="inner">
                                <a href="../swap-details.php?id=<?php echo $props['swap_id'] ?>">
                                    <h2><b><?php echo ucwords($props['swap_name']); ?></b></h2>
                                </a>
                                <figure class="mb-1"><i class="lni-map-marker"></i>
                                    <?php echo ucwords($props['swap_address'] );?> ,
                                    <?php echo ucwords($props['city_name'] )?> , <?php echo $props['states_name'] ?>
                                </figure>

                                <figure class="mb-1">
                                    Agent : <b> <a
                                            href="../agent-detail.php?d=<?php echo $props['agent_id'] ?>"></a><?php echo ucwords($props['a_fname']) ?>
                                        <?php echo ucwords($props['a_lname']) ?> </b>
                                </figure>
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                                <?php echo $props['swap_item']?>
                                <figure class="mb-1">
                                    <b> Description </b> : <a
                                        href=""></a><?php echo ucfirst($props['swap_description']) ?>
                                </figure>
                            </div>
                        </td>
                        <td>
                            <div class="inner">
                                <?php echo $props['swap_need']?>
                                <figure class="mb-1">
                                    <b> Description</b> : <a
                                        href=""></a><?php echo ucfirst($props['sitem_description']) ?>
                                </figure>
                            </div>
                        </td>
                        <td><?php echo date('F j, Y', strtotime($props['date_posted']));?></td>
                        <td class='actions'>
                            <div class='row'>
                                <div class='col-5'>
                                    <a href='edit-agent-swap.php?edit_id=<?php echo $props['swap_id']?>'
                                        class="btn p-2 text-white btn-success btn-sm">
                                        Edit
                                    </a>
                                </div>
                                <div class='col-7'>
                                    <a href='delete-swaps.php?id=<?php echo $props['swap_id']?>' name='delete' onclick="return confirm('You are about to delete this <?php echo $props['swap_name']?>')">
                                    <i class="far fa-trash-alt"></i>
                                   </a>
                                </div>
                        </td>
                    </tr>
                    <?php $count++; }?>
                </tbody>
            </table>
            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            </div>

            <div class='pagination-container'>
                <nav>
                    <ul class=" pagination">
                        <?php $get = $properties->pagination_swaps('manageswaps.php', $page);?>
                    </ul>
                </nav>
            </div>    
            <?php }else{ ?>
                <div>  <h4 class="text-danger text-center">No Record Avaliable </h4>  </div>
            <?php }?>
        </div>
    </div>
    </div>
    </div>
    </section>
    <?php require('include/dashfooter.php');  ?>