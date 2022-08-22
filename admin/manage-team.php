<?php 	
session_start();
require('admin.php');
 
 $obj= new Admin;

 if (empty($_SESSION['uname'])) {
 	header('location:login.php');
 }

 $k = $obj->getAdmin($_SESSION['id']);
 $agent_id = $_SESSION['id'];
 
$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
} 

require('property.php');
$obj1 = new Property;
if(isset($_POST['edit_data'])) {
$id= $_POST['edit_id'];
$swap = $obj1->showTeamDetails($id);
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
    <title>Manage Team Member</title>

    <?php
				require('include/dashheaders.php');
				 ?>



    <?php
				require('include/sidebar.php');
				 ?>
    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">
        <?php
				require('include/mobile-dashboard.php');
				 ?>
        <div class="container">
            <form action="editteam.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="t_id" class="d-none" value="<?php echo $id; ?>">
                <div class="single-add-property">
                    <?php 
                                    if (isset($_GET['msg'])) {
                                        echo "<h4 class='alert alert-info'>". $_GET['msg']. "</h4>";
                                    }
                                    ?>
                    <h3>Edit Team Member</h3>
                    <?php
                            if(isset($_GET['msg'])) {
                                echo "<h2 class='alert alert-danger text-center'>". $_GET['msg'] ."</h2>";
                            }?>
                     <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Full Name</label>
                                    <input required type="text" name="name" value="<?php echo $swap['t_fname']; ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="description">Position</label>
                                    <input id="description" name="position" placeholder="Marketing Manager"  value="<?php echo $swap['position_held']; ?>">
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="description">Email Address</label>
                                    <input id="description" name="email" placeholder="johnjoe@gmail.com"  value="<?php echo $swap['email']; ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i class='fa fa-cloud-upload'></i> Click here to upload Team Member Image <br>
                                <input required class="mt-2" type="file" name="image" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="submit" class=" btn btn-success btn-lg " name="btn">Submit</button>
                            <button type="button" class=" btn btn-danger  btn-lg mr-5" name="btncancle"
                                onClick="document.location.href='my-team.php'">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END SECTION USER PROFILE -->


    <?php
				require('include/dashfooter.php');
				 ?>