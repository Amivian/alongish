<?php 	
    require_once ('include/checks.php'); 

    require('property.php');

    require('edit-partner.php');

    $properties = new \admin\Property;

    if(isset($_GET['edit_id'])) {
        $id= $_GET['edit_id'];
        $partner = $properties->showPartnerDetails($id);
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
    <title>Edit Partner</title>

    <?php require('include/dashheaders.php'); ?>

    <?php require('include/sidebar.php');  ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php');  ?>

        <div class="container">
            <form action="" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="p_id" class="d-none" value="<?php echo $id; ?>">
                <div class="single-add-property">
                    <?php
                        if(isset($_SESSION['message'])) {
                            echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
                            unset($_SESSION['message']);
                        }
                    ?>
                    <h3>Edit Partner</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    <label for="title">Business Name</label>
                                    <input required type="text" name="name"
                                        value="<?php echo ucwords($partner['partner_name'])?>">
                                </p>
                            </div>
                                <div class="col-md-6">
                                    <img src="../images/partner/<?php echo $partner['image_url'] ?>" class="img-fluid" alt="<?php echo $partner['image_url'] ?>"
                                        style="width:200px !important;height:100px ! important">
                                    <input class="mt-2" type="file" name="image">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Edit Partner</button>
                            <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                                onClick="document.location.href='our-partner.php'">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- END SECTION USER PROFILE -->


    <?php require('include/dashfooter.php');  ?>