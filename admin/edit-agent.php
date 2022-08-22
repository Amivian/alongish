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
$k = $obj1->showAgentDetails($id);
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
    <title>Edit Agent</title>

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
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div id="login" class="mb-5">
                        <div class="login">
                            <?php
                                                                if(isset($_GET['msg']))
                                                                {
                                                                    echo '<div class="alert alert-info text-center">' .base64_decode(urldecode($_GET['msg'])) . '</div>';
                                                                }
                                                            
                                                      ?>

<div class="container">
            <form action="editagentprocess.php"  enctype="multipart/form-data" method="POST" id="picture">
                <input type="hidden" name="a_id" class="d-none" value="<?php echo $id; ?>">

                <?php 
                                    if (isset($_GET['msg'])) {
                                        echo "<h4 class='alert alert-danger text-center'>". $_GET['msg']. "</h4>";
                                    }
                                    ?>

                <div class="dashborad-box mb-3">
                            <h3 style="font-weight:lighter" class="mb-3">Edit Agent Data </h3>
                    <div class="section-inforamation">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="<?php echo ucfirst($k['a_fname'])?>" name="fname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo ucfirst($k['a_lname'])?>" name="lname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="text" class="form-control" value="<?php echo ucfirst($k['a_email'])?>" name="email"
                                        disabled>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?php echo ucfirst($k['a_username'])?>" disabled name="uname">
                                </div>
                            </div>
                            <!-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">States</label>
                                    <?php
                                                    $obj->get_state();
                                                    ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <div type="text" name="city" id="citi"></div>
                                </div>
                            </div> -->
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" value="<?php echo ucfirst($k['a_phone'])?>" name="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    

        <div class="dashborad-box mb-3" id="businessname"> 
            <div class="section-inforamation">
                <div class="password-section">
               <h6 class="mb-3">Update Company Information</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Business Name</label>
                                <input type="text" class="form-control"  name="businessname" value="<?php echo $k['businessname']?>">
                            </div>
                        </div>
                               
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Upload Logo</label>
                                <div>
                               <input type="file" name="pix" class="file_input" id="pix" value="">
                                </div>
                           </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>About <?php echo $k['businessname']?></label>
                                <textarea rows="6" class="form-control" name="about" value="<?php echo $k['about']?>"><?php echo $k['about']?>
                                </textarea>        
                            </div>
                        </div>
                </div>
                <button type="button" class="btn btn-primary btn-lg mt-2" onClick="document.location.href='reguser.php'">Cancle</button>
                <button type="submit" class="btn btn-success btn-lg mt-2 " name="update">Update</button>

            </div>
        </div>
        </form>
    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- END SECTION USER PROFILE -->


    <?php
				require('include/dashfooter.php');
				 ?>