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
$output =  $prop->getRegUsers();

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
                                        <th class="pl-1">Agents</th>
                                        <th class="p-0"></th>                                        
                                        <th>Status</th>
                                        <th>Properties</th>
                                        <th>Registered</th> 
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                     $count= 1;
                                    foreach($output as $user) {
                                        $propcount = $prop-> agentPropertyCount($user['agent_id']);
                                ?>

                                    <tr>
                                    <td><?php echo $count?></td>
                                        <td class="image myelist">
                                            <a href="../agent-details.php?id=<?php echo $user['agent_id'] ?>">
                                            <img  alt="<?php echo ucfirst($user['a_username']) ?>" src="../images/users/<?php echo $user['a_pix'] ?>" alt="property" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="../agent-details.php?id=<?php echo $user['agent_id'] ?>">
                                                  <h2><?php echo ucfirst($user['businessname']) ?></h2>
                                                </a>
                                                <figure class="mb-1"> <b><?php echo ucwords($user['a_fname']); ?>  <?php echo ucwords($user['a_lname']); ?></b></figure>
                                                <figure class="mb-1">Email : <?php echo $user['a_email'] ?></br> Phone No :  <?php echo $user['a_phone'] ?>
                                                </figure>
                                                <figure class="mb-1">
                                                        City : <?php echo $user['city_name'] ?> </br>  State : <?php echo $user['states_name'] ?>
                                                </figure>
                                            </div>
                                        </td>
                                        <td><?php echo $user['status']?></td>
                                        <td><?php echo $propcount; ?></td>
                                        <td><?php echo date('F j, Y', strtotime($user['datereg']));?></td>
                                        <td class="actions">
                                        <div class='row'>
                                            <div class='col-7'>
                                                <form action='edit-agent.php' method='POST'>
                                                    <input type='text' name='edit_id' class='d-none'
                                                        value="<?php echo $user['agent_id']?>">
                                                    <button type='submit' name='edit_data'
                                                        class='btn btn-success btn-sm'>Edit</button>
                                                </form>
                                            </div>
                                            <div class='col-3'>
                                            <a href='deleteuser.php?id=<?php echo $user['agent_id']?>' name='delete' onclick="return confirm('You are about to delete <?php echo ucwords($user['a_fname'])?>  <?php echo ucwords($user['a_lname'])?>')"><i class="far fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </td>
                                        
                                        </td>
                                    </tr>
                                    <?php
                                     $count++; }?>
                                </tbody>
                            </table>
                            <div class="pagination-container">
                                <nav>
                                <ul class=" pagination">
                                    <?php 
                                     $get = $prop->pagination_agents('reguser.php', $page);?>
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