<?php 	
     require_once ('include/checks.php'); 

     require('property.php');
 
     require('editagentprocess.php');
 
     $properties = new \admin\Property;    
 
     $admin= new \admin\Admin;

    if(isset($_GET['edit_id'])) 
    {
        $id= $_GET['edit_id'];
        $agent = $properties->showAgentDetails($id);
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

    <?php require('include/dashheaders.php');  ?>
   
   <?php require('include/sidebar.php');  ?>
   
    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php');  ?>

        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-2">
                    <div id="login" class="mb-5" style="border:0px">
                        <div class="login">
                            <?php
                                if(isset($_SESSION['message'])) {
                                    echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
                                    unset($_SESSION['message']);
                                }
                            ?>

                            <div class="container">
                                <form action="" enctype="multipart/form-data" method="POST" id="picture">
                                    <input type="hidden" name="a_id" class="d-none" value="<?php echo $id; ?>">
                                    <div class="dashborad-box mb-3">
                                        <h3 style="font-weight:lighter" class="mb-3">Edit Agent Data </h3>
                                        <div class="section-inforamation">
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo ucfirst($agent['a_fname'])?>"
                                                            name="fname">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo ucfirst($agent['a_lname'])?>"
                                                            name="lname">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo $agent['a_email']?>" name="email"
                                                            disabled>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo ucfirst($agent['a_username'])?>" disabled
                                                            name="uname">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="state">State</label>
                                                        <?php $stateID = isset($agent['states_id']) ? $agent['states_id'] : 0; ?>
                                                        <?php $admin->get_state($stateID); ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <?php $cityID = isset($agent['city_id']) ? $agent['city_id'] : 0; ?>
                                                        <div type="text" name="city" city_info="<?php echo $cityID ?>"
                                                            id="citi"></div>
                                                    </div>
                                                </div>


                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control"
                                                            value="<?php echo ucfirst($agent['a_phone'])?>"
                                                            name="phone">
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
                                                    <div class="col-6">
                                                        <div>
                                                            <h5>Business Name</h5>
                                                        </div>
                                                        <input type="text" class="form-control" name="businessname"
                                                            value="<?php echo $agent['businessname']?>">
                                                        <input type="text" class="form-control" hidden name="mission">
                                                        <input type="text" class="form-control" hidden name="vision">
                                                    </div>
                                                    <div class="col-6 mb-2">
                                                        <img src="../images/users/<?php echo $agent['a_pix'] ?>"
                                                            class="img-fluid" alt="<?php echo $agent['a_pix'] ?>"
                                                            width="200px">
                                                        <input type="file" name="pix" class="file_input" id="pix"
                                                            value="">
                                                    </div>
                                                </div>
                                                <div class="row mt-4">
                                                    <div class="col-12">
                                                        <div class="form-group" id="about">
                                                            <div>
                                                                <h5>About <?php echo $agent['businessname'] ?></h5>
                                                            </div>
                                                            <textarea name="about" rows="10"
                                                                cols="70"> <?php echo isset ($agent['about']) ? $agent['about'] : '';?> </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-primary btn-lg mt-2"
                                                    onClick="document.location.href='reguser.php'">Cancle</button>
                                                <button type="submit" class="btn btn-success btn-lg mt-2 "
                                                    name="update">Update</button>

                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require('include/dashfooter.php');  ?>