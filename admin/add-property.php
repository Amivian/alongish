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


 ?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Add Listing</title>

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
            <form action="propertyprocess.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="a_id" class="d-none" value="<?php echo $agent_id; ?>">                
                <input type="text" name="staff" class="d-none" value="staff">
                <div class="single-add-property">
                    <?php 
                                    if (isset($_GET['msg'])) {
                                        echo "<h4 class='alert alert-danger'>". $_GET['msg']. "</h4>";
                                    }
                                    ?>
                    <h3>Post Property</h3>
                     <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Property Title</label>
                                    <input required type="text" name="title" id="title"
                                        placeholder="Ex: Newly Built Mini Flat">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Property Description</label>
                                    <textarea id="description" name="pro-desc"
                                        placeholder="Describe the property"></textarea>
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
                                <?php $prop->get_state();?>
                            </div>
                            <div class="col-lg-4 col-md-4 form-group">

                                <label for="city">City</label>
                                <div type="text" name="city" id="citi"></div>

                            </div>
                            <div class="col-lg-4 col-md-4">
                                <p>
                                    <label for="address">Address</label>
                                    <input required type="text" name="address" placeholder="Enter property Address"
                                        id="address">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <h3>Property Media</h3>
                    <div class="property-form-group">                        
                    <i class='fa fa-cloud-upload'></i> Click here to upload Property images <br>
                        <div class="row">
                            <div class="col-md-3 filediv">
                                <input class="mt-2" type="file" name="images[]">
                            </div>
                            <div class="col-md-3">
                                <input class="mt-2" type="file" name="images[]"></div>
                            <div class="col-md-3">
                                <input class="mt-2" type="file" name="images[]"></div>
                            <div class="col-md-3">
                                <input class="mt-2" type="file" name="images[]"></div>
                            <div class="col-md-3">
                                <input class="mt-2" type="file" name="images[]"></div>
                        </div>
                    </div>
                </div>

                <div class="single-add-property">
                    <h3 class="my-3">Property Features</h3>
                    <div class="property-form-group mt-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 dropdown faq-drop">
                                <div class="form-group categories">
                                    <?php 
                                     $prop->getStatus();
                                     ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 dropdown faq-drop">
                                <div class="form-group categories">
                                    <?php 
                                     $prop->getPropertytype();
                                     ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <?php 
                                     $prop->getBedroom();
                                     ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <?php 
                                     $prop->getBathroom();
                                     ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <select name="furnish" id="" class="form-control wide">
                                        <option value="">-- Furnished --</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <select name="service" id="" class="form-control wide">
                                        <option value="">-- Serviced --</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <select name="share" id="" class="form-control wide">
                                        <option value="">-- Shared --</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="pro-feature-add pl-2">
                                    <li class="fl-wrap filter-tags clearfix">
                                        <div class="checkboxes float-left">
                                            <div class="filter-tags-wrap">
                                                <?php $feature=$prop->getAllFeatures();?>
                                            </div>
                                        </div>
                                    </li>
                                 
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 form-group">
                                <p>
                                    <label for="address">Price</label>
                                    <input type="text" name="price" placeholder="NGN" id="price" required>
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <p class="no-mb last">
                                    <label for="area">Area</label>
                                    <input type="text" name="area" placeholder="Sqft" id="area" required>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Submit
                                Property</button>
                            <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                                onClick="document.location.href='admindashboard.php'">Cancel</button>
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