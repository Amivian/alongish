<?php 	
    require_once ('include/checks.php');

    require('property.php');

    require('partnerprocess.php');

    $properties= new \admin\Property;

    $output = $properties->showRequest();

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
    <title>All Requests</title>

    <?php require('include/dashheaders.php');  ?>

    <?php require('include/sidebar.php');  ?>

    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">

        <?php  require('include/mobile-dashboard.php');  ?>

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
                        <th class="pl-1">Requests</th>
                        <th class="p-0"></th>
                        <th>Phone No</th>
                        <th>Purpose</th>
                        <th>Description</th>
                        <th>Sent On</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align:center">
                            <?php 
                                if(!empty($output)){ 
                                $count= 1;
                                foreach($output as $props) { 
                            ?></td>
                        <td><?php echo $count?></td>
                        <td>
                            <div class="inner">
                                <a>
                                    <h2 class="mb-0"><?php echo ucwords($props['fname']); ?></h2>
                                </a>
                                <a href="mailto:<?php echo $props['email']?>" class="mb-2">
                                    <em><?php echo $props['email']?></em>
                                </a>
                                <figure class="mb-1"> <b>Bed</b> : <?php echo $props['bedroom_no'] ?> , &nbsp;<b>Shared
                                    </b> : <?php echo $props['shared'] ?> ,&nbsp; <b> Serviced</b> :
                                    <?php echo $props['serviced'] ?>
                                </figure>
                                <figure class="mb-1">
                                    <b>Furnished </b> : <?php echo $props['furnished'] ?>, &nbsp; <b> Type</b>:
                                    <?php echo $props['ptype_name']?>
                                </figure>
                                <figure class="">
                                    <b>Property Location</b>:<i class="lni-map-marker"></i>
                                    <?php echo ucwords($props['request_address'] );?> ,
                                    &nbsp;<?php echo ucwords($props['city_name'] )?> ,&nbsp;
                                    <?php echo $props['states_name'] ?> </figure>

                            </div>
                        </td>
                        <td><a href="tel:<?php echo $props['phone']?>"><?php echo $props['phone']?></a></td>
                        <td><?php echo $props['pstatus_name']?></td>
                        <td><?php echo $props['other']?></td>
                        <td><?php echo date('F j, Y', strtotime($props['sent']));?></td>
                        <td><a href='deleterequest.php?id=<?php echo $props['request_id']?>' name='delete'
                                onclick="return confirm('You are about to delete <?php echo ucwords($props['fname']) ?> request' )"><i
                                    class="far fa-trash-alt" style="color:red"></i></a>
                        </td>
                     <?php $count++; }?>
                    </tr>
                </tbody>
            </table>
            <div class="pagination-container">
                <nav>
                    <ul class="pagination">
                        <?php  $get = $properties->pagination_request('request-listing.php', $page);?>
                    </ul>
                </nav>
            </div>

        </div>
            <?php }else{ ?>
                <div>
                 <h4 class="text-danger text-center">No Record Avaliable </h4>
                </div>
            <?php   }  ?>
    </div>
    </div>
    </div>
    </section>

    <?php require('include/dashfooter.php');  ?>