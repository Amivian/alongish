<?php 	
require_once ('include/checks.php');

require('property.php');

$property= new admin\Property;

$output = $property->getpartners();

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
    <title>Our Partners</title>

    <?php require('include/dashheaders.php'); ?>

    <?php require('include/sidebar.php');?>

    <div class="col-lg-8  col-md-12 col-xs-12 pl-0 user-dash2">

      <?php require('include/mobile-dashboard.php'); ?>
      
       <?php
            if(isset($_SESSION['message'])) {
                echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                unset($_SESSION['message']);
            }
       ?>
        <div class="my-properties">
            <table class="table-responsive">
                <thead class='text-center'>
                    <tr>
                        <th>#</th>
                        <th class="">Parnters</th>
                        <th>Business Name</th>
                        <th>Posted</th>
                        <th class='text-left'>Actions</th>
                    </tr>
                </thead>
                <tbody class='text-center'> 
                <?php   if(!empty($output)){ $count= 1;  foreach($output as $partner) {?>                   
                    <tr>
                        <td><?php echo $count?></td>
                        <td class='image myelist'>
                            <img alt=<?php echo $partner['partner_name']?> src='../images/partner/<?php echo  $partner['image_url']?>'
                                class='img-fluid'>
                            </a>
                        </td>

                        <td>
                            <div class='inner'>
                                <h2><b><?php echo ucwords($partner['partner_name'])?></b></h2>
                            </div>
                        </td>
                        <td><?php echo date('F j, Y', strtotime($partner['date_add']))?></td>
                        <td class='actions'>
                            <div class='row'>
                                <div class='col-4'>
                                    <a href="manage-partner.php?edit_id=<?php echo $partner['partner_id']?>" class="btn p-2 text-white btn-success btn-sm">
                                            Edit
                                     </a>
                                </div>
                                <div class='col-2'>
                                    <a href='deletepartner.php?id=<?php echo $partner['partner_id']?>' name='delete'
                                        onclick="return confirm('You are about to delete <?php echo ucwords($partner['partner_name'])?>')">
                                        <i class='far fa-trash-alt  '></i>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php  $count++;  } ?>
               </tbody>
            </table>

            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
            </div>

            <div class='pagination-container'>
                <nav>

                    <ul class=" pagination">
                        <?php 
                         $get = $property->pagination_partner('our-partner.php', $page);?>
                    </ul>
                </nav>
            </div>            
            <?php }else{ ?>
                    <div>
                    <h4 class="text-danger text-center">No Record Avaliable </h4>
                    </div>
                <?php   }  ?>

        </div>
    </div>
    </div>
    </div>
    </section>
    <?php
				require('include/dashfooter.php');
				 ?>