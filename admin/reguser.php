<?php 		
    require_once ('include/checks.php'); 

    include('property.php');

    require('suspend_user.php');

    $properties = new admin\Property;    

    $admin = new admin\Admin;

    $output =  $properties->getRegUsers();

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
    <title>All Agents</title>
  
        <?php  require('include/dashheaders.php');   ?>
        <?php require('include/sidebar.php');  ?>
        <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
            <?php require('include/mobile-dashboard.php'); ?> 
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
                            <th class="pl-1">Agents</th>
                            <th class="p-0"></th>                                        
                            <th>Verified</th>                                     
                            <th>Status</th>
                            <th>Properties</th>
                            <th>Registered</th> 
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                       if(!empty($output)){ 
                        $count= 1;
                        foreach($output as $user) {
                        $propcount = $properties-> agentPropertyCount($user['agent_id']);
                    ?>

                        <tr>
                        <td><?php echo $count?></td>
                            <td class="image myelist">
                                <div>
                                <a href="../agent-details.php?id=<?php echo $user['agent_id'] ?>">
                                <img  alt="<?php echo ucfirst($user['a_username']) ?>" src="../images/users/<?php echo $user['a_pix'] ?>" alt="property" class="img-fluid"></a>
                                </div>
                            </td>
                            <td>
                                <div class="inner">
                                    <div><a href="../agent-details.php?id=<?php echo $user['agent_id'] ?>">
                                        <h2><?php echo ucfirst($user['businessname']) ?></h2>
                                    </a>
                                    <figure class="mb-1"> <b><?php echo ucwords($user['a_fname']); ?>  <?php echo ucwords($user['a_lname']); ?></b></figure>
                                    <figure class="mb-1">Email : <?php echo $user['a_email'] ?></br> Phone No :  <?php echo $user['a_phone'] ?>
                                    </figure>
                                    <figure class="mb-1">
                                            City : <?php echo $user['city_name'] ?> </br>  State : <?php echo $user['states_name'] ?>
                                    </figure></div>
                                </div>
                            </td>
                            <td><div><?php echo $user['status']?></div></td>
                            <td>
                            <div class="row">
                                <div class="col-12">                                    
                                    <?php 
                                        $idd = $user["agent_id"];
                                    
                                        $feature = $user["handle"]; 
                                        if($user['handle'] == "active"){?>
                                    <form  action='' method='POST'>
                                        <input value='<?php echo $idd?>' name='idd' hidden>
                                        <input value='<?php echo $feature?>' name='handle' hidden>
                                        <button type='submit' style='background: green; color: white; border: green !important; font-size: 12px;border-radius:5px;  padding: 10px;' class='btn btn-sm' name='featurebtn'>Active </button>
                                    </form>
                                    
                                    <?php }elseif(($user['handle'] == "suspend")){?>
                                    <form  action='' method='POST'>
                                    <input value='<?php echo $idd?>' name='idd' hidden>
                                    <input value='<?php echo $feature?>' name='handle' hidden>
                                    <button type='submit' style='background: green; color: white; border: green !important; font-size: 12px;border-radius:5px;  padding: 10px;' class='btn btn-sm' name='featurebtn'>Suspended</button>
                                    </form>
                                    <?php } ?>
                                </div>
                            </div>
                            </td>
                            <td><div><?php echo $propcount; ?></div></td>
                            <td><div><?php echo date('F j, Y', strtotime($user['datereg']));?></div></td>
                            <td class="actions">
                            <div class='row'>
                                <div class='col-7'>  
                                    <a href='edit-agent.php?edit_id=<?php echo $user['agent_id']?>' class="btn p-2 text-white btn-success btn-sm">
                                    Edit
                                    </a>
                                </div>
                                <div class='col-3'>
                                <a href='deleteuser.php?id=<?php echo $user['agent_id']?>' name='delete' onclick="return confirm('You are about to delete <?php echo ucwords($user['a_fname'])?>  <?php echo ucwords($user['a_lname'])?>')"><i class="far fa-trash-alt"></i></a>
                                </div>
                            </div>
                        </td>
                            
                            </td>
                        </tr>                      
                    <?php $count++; }?>
                        
                    </tbody>
                </table>
                <div class="pagination-container">
                    <nav>
                        <ul class=" pagination">
                            <?php $get = $properties->pagination_agents('reguser.php', $page);?>
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
<?php require('include/dashfooter.php'); ?>