<?php 	
session_start();
 if (empty($_SESSION['uname'])) {
 	header('location:index.php');
 }else{

    require('admin.php'); 
    $obj = new Admin;
 $k = $obj->getAdmin($_SESSION['id']);
 $agent_id = $_SESSION['id'];
 
$pix= $k['a_pix'];
if (empty($pix)) {
    $pix = 'avatar.png';
} 
require('property.php');

$obj1 = new Property;
if(isset($_GET['edit_id'])) {
    $id= $_GET['edit_id'];
    $property = $obj1->showPropertyInfo($id);    
    $images = $obj1->getAllImages($id);
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
    <title>Manage Listings</title>

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
            <form action="editlisting.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="p_id" class="d-none" value="<?php echo $id; ?>">
                <div class="single-add-property">
                <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
                    <h3>Edit Property</h3>
                    <div class="property-form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="title">Property Title</label>
                                    <input type="text" name="title" id="title" value="<?php echo isset($property['property_title']) ? $property['property_title'] : ''; ?>">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Property Description</label>
                                    <textarea id="description" name="pro-desc"> <?php echo isset($property['property_description']) ? $property['property_description'] : ''; ?></textarea>
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
                                <?php $obj1->get_state($stateID); ?>
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
                                        value="<?php echo isset($property['property_address']) ? $property['property_address'] : ''; ?>">
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
                                    <img src="../images/property/<?php echo $img['image_url'] ?>" class="img-fluid" alt="<?php echo $img['image_url'] ?>" width="200px">
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
                    <h3 class="my-3">Property Features</h3>
                    <div class="property-form-group mt-4">
                        <div class="row">
                            <div class="col-lg-4 col-md-4 dropdown faq-drop">
                            <div class="form-group categories">                                    
                                <?php $statusID = isset($property['pstatus_id']) ? $property['pstatus_id'] : 0; ?> 
                                    <?php $obj1->getStatus($statusID); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 dropdown faq-drop">
                            <div class="form-group categories">
                                <?php $propertytypeID = isset($property['ptype_id']) ? $property['ptype_id'] : 0; ?> 
                                    <?php $obj1->getPropertytype($propertytypeID ); ?>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                <?php $bedroomID = isset($property['bedroom_id']) ? $property['bedroom_id'] : 0; ?> 
                                    <?php $obj1->getBedroom($bedroomID); ?>

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                <?php $bathroomID = isset($property['bathroom_id']) ? $property['bathroom_id'] : 0; ?> 
                                    <?php $obj1->getBathroom($bathroomID ); ?>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <select name="furnish" id="" class="form-control wide">
                                        <option value="">-- Furnished --</option>
                                        <option value="Yes" <?php if (isset($property['furnished']) && strtolower($property['furnished']) == 'yes') echo 'selected'; ?>>Yes</option>
                                        <option value="No" <?php if (isset($property['furnished']) && strtolower($property['furnished']) == 'no') echo 'selected'; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <select name="service" id="" class="form-control wide">
                                        <option value="">-- Serviced --</option>
                                        <option value="Yes" <?php if (isset($property['serviced']) && strtolower($property['serviced']) == 'yes') echo 'selected'; ?>>Yes</option>
                                        <option value="No" <?php if (isset($property['serviced']) && strtolower($property['serviced']) == 'no') echo 'selected'; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-12 dropdown faq-drop">
                                <div class="form-group categories">
                                    <select name="share" id="" class="form-control wide">
                                        <option value="">-- Shared --</option>
                                        <option value="Yes" <?php if (isset($property['shared']) && strtolower($property['shared']) == 'yes') echo 'selected'; ?>>Yes</option>
                                        <option value="No" <?php if (isset($property['shared']) && strtolower($property['shared']) == 'no') echo 'selected'; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                            <ul class="pro-feature-add pl-0">      
                                    <?php                                    
                                            $amenitiesValue = $obj1>getAllFeatures(); 
                                            echo "<pre>";
                                            echo var_dump($amenitiesValue);
                                            echo"</pre>";
                                            exit();
                                            foreach($amenitiesValue as $amenities) { 
                                                $arrayOfPropertyAmenities[] = $obj1>propertyAmenities($amenities['property_id']);    
                                                                                    
                                                ?>  
                                                               
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">                                                      
                                                <input type="checkbox" <?php if (in_array($amenities['pfeature_id'] , $arrayOfPropertyAmenities['property_id'])) echo 'checked'; ?> id="<?php echo $amenities['pfeature_name'] ?>" > <?php ?>
                                                    <label for="<?php echo $amenities['pfeature_name'] ?>"><?php echo $amenities['pfeature_name'] ?></label>
                                                    </div>
                                                </div>     
                                            </li>    
                                       <?php }?>
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
                                    <input  type="text" name="price" value="<?php echo isset($property['property_price']) ? $property['property_price'] : ''; ?>" id="price">
                                </p>
                            </div>
                            <div class="col-lg-6 col-md-6 form-group">
                                <p class="no-mb last">
                                    <label for="area">Area</label>
                                    <input  type="text" name="area" value="<?php echo isset($property['property_area']) ? $property['property_area'] : ''; ?>" id="area">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="single-add-property">
                    <div class="property-form-group">
                        <div class="row">
                            <button type="button" class=" btn btn-danger  btn-lg mr-5" name="btncancle"
                                onClick="document.location.href='my-listings.php'">Cancel</button>
                            <button type="submit" class=" btn btn-success btn-lg " name="btn">Submit</button>
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