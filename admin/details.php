<?php 
require_once ('include/checks.php'); 

require('update.php');

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

    <?php require('include/dashheaders.php'); ?>

    <?php require('include/sidebar.php'); ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php'); ?>

        <div class="container">
            <form action="" enctype="multipart/form-data" method="POST">

                <?php
                    if(isset($_SESSION['message'])) {
                        echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
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
                                    <span class="text-danger"><?php echo isset($form_errors['fname']) ? $form_errors['fname'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_lname']) ? $k['a_lname'] : '';?>" name="lname">
                                    <span class="text-danger"><?php echo isset($form_errors['lname']) ? $form_errors['lname'] : '' ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email </label>
                                    <input type="text" class="form-control"
                                        value="<?php echo isset ($k['a_email']) ? $k['a_email'] : '';?>" name="email" disabled>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control"
                                        value="<?php echo isset ($k['a_username']) ? $k['a_username'] : '';?>" disabled name="uname">
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
                                    <div type="text" name="city" city_info="<?php echo $cityID ?>" id="citi"></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control" value="<?php echo isset ($k['a_phone']) ? $k['a_phone'] : '';?>" name="phone">
                                    <span class="text-danger"><?php echo isset($form_errors['phone']) ? $form_errors['phone'] : '' ?></span>
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
                                        <input type="text" class="form-control" placeholder="Write new password"  name="businessname" value="<?php echo isset ($k['businessname']) ? $k['businessname'] : '';?>">
                                        <span class="text-danger"><?php echo isset($form_errors['businessname']) ? $form_errors['businessname'] : '' ?></span>
                                    </div>
                                    <div class="form-group">
                                        <img src="../images/users/<?php echo $k['a_pix'] ?>" class="img-fluid"
                                            alt="<?php echo $k['a_pix'] ?>" width="200px">
                                        <input class="mt-2 file_input" type="file" name="pix">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group" id="about">
                                        <label>About Us</label>
                                        <textarea name="about" rows="7" cols="50"> <?php echo isset ($k['about']) ? $k['about'] : '';?> </textarea>
                                        <span class="text-danger"><?php echo isset($form_errors['about']) ? $form_errors['about'] : '' ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Our Vision</label>
                                        <textarea name="vision" rows="7" cols="50"><?php echo isset ($k['vision']) ? $k['vision'] : '';?></textarea>
                                        <span class="text-danger"><?php echo isset($form_errors['vision']) ? $form_errors['vision'] : '' ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label>Our Mission</label>
                                        <textarea name="mission" rows="7"  cols="50"><?php echo isset ($k['mission']) ? $k['mission'] : '';?></textarea>
                                        <span class="text-danger"><?php echo isset($form_errors['mission']) ? $form_errors['mission'] : '' ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="dashborad-box mb-3">
            <div class="section-inforamation">
                <button type="button" class="btn btn-primary btn-lg mt-2"
                    onClick="document.location.href='admindashboard.php'">Cancle</button>
                <button type="submit" class="btn btn-success btn-lg mt-2 " name="update">Update</button>

            </div>
        </div>
        </form>
    </div>
    </div>




    </div>
    </div>
    </section>

    <?php require('include/dashfooter.php'); ?>