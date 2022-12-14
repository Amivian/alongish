<?php 	
    require_once ('include/checks.php');

    require('property.php');

    require('teamprocess.php');

    $property= new admin\Property;
    
 ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Add Team</title>

    <?php require('include/dashheaders.php');  ?>

    <?php require('include/sidebar.php');  ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php');  ?>
        
        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">        
                <input type="text" name="staff" class="d-none" value="staff">
                <div class="single-add-property">
                <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
                    <h3>Add Team Member</h3>
                     <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Full Name</label>
                                    <input required type="text" name="name" placeholder="Ex: John Joe">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="description">Position</label>
                                    <input required id="description" name="position" placeholder="Marketing Manager">
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <label for="description">Email Address</label>
                                    <input required id="description" name="email" placeholder="johnjoe@gmail.com">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <i class='fa fa-cloud-upload'></i> Click here to upload Team Member Image <br>
                                <input required  class="mt-2" type="file" name="image" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Add Team</button>
                            <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                                onClick="document.location.href='admindashboard.php'">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require('include/dashfooter.php');  ?>