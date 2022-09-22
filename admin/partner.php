<?php 	
 require_once ('include/checks.php');

 require('property.php');

 require('partnerprocess.php');

 $properties= new \admin\Property;
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Add Partner</title>

    <?php require('include/dashheaders.php');  ?>

    <?php require('include/sidebar.php');  ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php');  ?>

        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">   
                <div class="single-add-property">
                   <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
                    <h3>Add Partner</h3>
                     <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Business Name</label>
                                    <input required type="text" name="name" placeholder="Ex: John Joe">
                                </p>
                                 <i class='fa fa-cloud-upload'></i> Click here to Upload Partner Image <br>
                                <input required  class="mt-2" type="file" name="image" >
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Add Partner</button>
                            <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                                onClick="document.location.href='admindashboard.php'">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php require('include/dashfooter.php');  ?>