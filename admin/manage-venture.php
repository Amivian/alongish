<?php 	
session_start();
require('admin.php');
 
 $obj = new Admin;

 if (empty($_SESSION['uname'])) {
 	header('location:login.php');
 }

 $k = $obj->getUser($_SESSION['id']);
 $agent_id = $_SESSION['id'];
 
$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
} 
require('property.php');
$prop = new Property;
if(isset($_GET['edit_id'])) {
    $id= $_GET['edit_id'];
    $property = $prop->showVentureDetails($id);
    $images=$prop-> getSponsorshipImages($id);
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
    <title>Manage Joint Venture Listing</title>

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
            <form action="editventure.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="p_id" class="d-none" value="<?php echo $id; ?>">
                <div class="single-add-property">
                <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
                    <h3>Edit Joint Venture Property</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="address">Property Title</label>
                                    <input required type="text" name="title" value="<?php echo $property['joint_title'] ? $property['joint_title'] : '';  ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Property Description</label>
                                    <textarea id="description" name="joint_description"><?php echo $property['joint_description']? $property['joint_description'] : '';  ?></textarea>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="single-add-property mb-5">
                    <h3>property Location</h3>
                    <div class="property-form-group">
                    <div class="row">
                            <div class="col-lg-4 col-md-4 form-group">
                                <label for="state">State</label>
                                <?php $stateID = isset($property['states_id']) ? $property['states_id'] : 0; ?> 
                                <?php $prop->get_state($stateID); ?>
                            </div>
                            <div class="col-lg-4 col-md-4 form-group">
                                <label for="city">City</label>
                                <?php $cityID = isset($property['city_id']) ? $property['city_id'] : 0; ?> 
                                <div type="text" name="city" city_info ="<?php echo $cityID ?>" id="citi"></div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <p>
                                    <label for="address">Address</label>
                                    <input type="text" name="address" 
                                        value="<?php echo isset($property['address']) ? $property['address'] : ''; ?>">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>Property Media</h3>
                    <div class="property-form-group">
                    <div class="row">
                            <?php $imagesCount = count($images); $totalImages = 5; ?>
                            <?php foreach ($images as $img) { ?>
                                <div class="col-md-4">
                                    <img src="../images/sponsor/<?php echo $img['image_url'] ?>" class="img-fluid" alt="<?php echo $img['image_url'] ?>" width="200px">
                                    <input class="mt-2" type="file" name="images[<?php echo $img['image_id']; ?>]">
                                </div>
                            <?php } ?>

                            <?php if (($totalImages - $imagesCount) > 0) { ?>
                                <?php for ($a=0; $a < ($totalImages - $imagesCount); $a++) { ?>
                                    <div class="col-md-4 mt-3">
                                        <img src="" class="img-fluid" alt="property" width="200px">
                                        <input class="mt-2" type="file" name="images[]">
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="single-add-property">
                    <h3 class="my-3">Sponsorship Need</h3>
                    <div class="property-form-group mt-4">
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="pro-feature-add pl-0">

                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-a" type="checkbox" name="extra[]"
                                                    value="Land Clearing" >
                                                <label for="check-a">Land Clearing</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-b" type="checkbox" name="extra[]"
                                                    value="Road Construction">
                                                <label for="check-b">Road Construction</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-c" type="checkbox" name="extra[]"
                                                    value="Layout/Survey Documentation">
                                                <label for="check-c">Layout/Survey Documentation</label>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <input id="check-d" type="checkbox" name="extra[]" value="Land Reclaimation">
                                                <label for="check-d">Land Reclaimation</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">                    
                <h3 class="my-3">Terms and Conditions</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Offer (What you will give in return)</label>
                                    <input type="text" name="offer" value="<?php echo ucwords($property['offer']) ? $property['offer'] : ''; ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Terms and Conditions</label>
                                    <textarea id="description" name="joint_t&c"
                                        placeholder="Describe the property"><?php echo $property['joint_tc'] ? $property['joint_tc'] : '';  ?></textarea>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Submit
                            </button>
                            <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                                onClick="document.location.href='my-venture.php'">Cancel</button>
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
 