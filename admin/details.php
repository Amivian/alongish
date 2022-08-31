<?php 	
session_start();

 


 if (empty($_SESSION['id'])) {
 	header('location:login.php');
 }else{
    require('admin.php');
    $obj = new Admin;
    $k = $obj->getAdmin($_SESSION['id']);

    $agent_id = $_SESSION['id'];
    
   $pix= $k['a_pix'];
   if (empty($pix)) {
       $pix = 'avatar.png';
 }


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
    <title>Update Profile</title>

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
            <form action="update.php" enctype="multipart/form-data" method="POST">
                <input type="hidden" name="a_id" class="d-none" value="<?php echo $agent_id; ?>">

                <?php
                            if(isset($_SESSION['message'])) {
                                echo "<h5 class='alert alert-success text-center'>". $_SESSION['message'] ."</h5>";
                                unset($_SESSION['message']);
                            }
                        ?>

                <div class="dashborad-box mb-3">
                    <h3 class="heading pt-0">Update Profile</h3>
                    <div class="section-inforamation">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_fname']) ? $k['a_fname'] : '';?>" name="fname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_lname']) ? $k['a_lname'] : '';?>" name="lname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_email']) ? $k['a_email'] : '';?>" name="email"
                                        disabled>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_username']) ? $k['a_username'] : '';?>" disabled name="uname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">States</label>
                                <?php $stateID = isset($k['states_id']) ? $k['states_id'] : 0; ?> 
                                <?php $obj->get_state($stateID); ?>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                <?php $cityID = isset($k['city_id']) ? $k['city_id'] : 0; ?> 
                                <div type="text" name="city" city_info ="<?php echo $cityID ?>" id="citi"></div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_phone']) ? $k['a_phone'] : '';?>" name="phone">
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
                                <input type="text" class="form-control" placeholder="Write new password" name="businessname" value="<?php echo isset ($k['businessname']) ? $k['businessname'] : '';?>">
                            </div>
                            <div class="form-group">                               
                                <img src="../images/users/<?php echo $k['a_pix'] ?>" class="img-fluid" alt="<?php echo $k['a_pix'] ?>" width="200px">
                                <input class="mt-2 file_input" type="file" name="pix">
                                </div>
                        </div>
                        <div class="col-sm-6">                            
                            <div class="form-group" id="about">
                                    <label>About Us</label>
                                    <textarea  name="about" rows="7" cols="50"> <?php echo isset ($k['about']) ? $k['about'] : '';?> </textarea>
                                </div>
                        <div class="form-group">
                                <label>Our Vision</label>
                                <textarea  name="vision" rows="7" cols="50"><?php echo isset ($k['vision']) ? $k['vision'] : '';?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Our Mission</label>
                                <textarea  name="mission" rows="7" cols="50"><?php echo isset ($k['mission']) ? $k['mission'] : '';?></textarea>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="dashborad-box mb-3" > 
            <div class="section-inforamation">
                <button type="button" class="btn btn-primary btn-lg mt-2" onClick="document.location.href='admindashboard.php'">Cancle</button>
                <button type="submit" class="btn btn-success btn-lg mt-2 " name="update">Update</button>

            </div>
        </div>
        </form>
    </div>
    </div>




    </div>
    </div>
    </section>
                 <?php
				require('include/dashfooter.php');
				 ?>