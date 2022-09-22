<?php 	
  require_once ('include/checks.php');

  require('property.php');

  $property= new \admin\Property;

  $output = $property->getTeamMembers($agent_id);

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
    <title>My Team</title>

    <?php  require('include/dashheaders.php');   ?>

    <?php  require('include/sidebar.php');   ?>

    <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php'); ?>

        <?php
            if(isset($_SESSION['message'])) {
                echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
                unset($_SESSION['message']);
            }
        ?>
        <div class="my-properties">
            <table class="table-responsive">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="pl-2">My Team</th>
                        <th>Full Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>Posted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody> 
                        <?php if(!empty($output)){ $count= 1; foreach($output as $team) { $img = $property->getTeamImage($team['team_id']);?>
                    <tr>
                        <td><?php echo $count?></td>
                        <td class='image myelist'>
                            <img alt=<?php echo $team['t_fname']?> src='../images/team/<?php echo  $img?>'
                                class='img-fluid' style='width: 50%; border-radius:100px; height: auto;'>
                            </a>
                        </td>

                        <td>
                            <div class='inner'>
                                <h2><b><?php echo ucwords($team['t_fname'])?></b></h2>
                            </div>
                        </td>
                        <td> <?php echo ucwords($team['position_held'])?></td>
                        <td> <?php echo $team['email']?></td>
                        <td><?php echo date('F j, Y', strtotime($team['date_add']))?></td>
                        <td class='actions'>
                            <div class='row'>
                                <div class='col-7'>
                                    <a href='manage-team.php?edit_id=<?php echo $team['team_id']?>'
                                        class="btn p-2 text-white btn-success btn-sm">
                                        Edit
                                    </a>
                                </div>
                                <div class='col-3'>
                                    <a href='deleteteam.php?id=<?php echo $team['team_id']?>' name='delete'
                                        onclick="return confirm('You are about to delete this <?php echo ucwords($team['t_fname'])?>')">
                                        <i class='far fa-trash-alt'></i>
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
                        <?php  $get = $property->pagination_six('my-team.php', $page, $agent_id);?>
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