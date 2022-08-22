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
$obj = new Property;
if(isset($_POST['edit_data'])) {
$id= $_POST['edit_id'];
$property= $obj->showSwapsDetails($id);
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
    <title>Manage Swap</title>

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
      <form action="editswap.php" method="POST" enctype="multipart/form-data">
        <div class="single-add-property">
          <?php 
                                    if (isset($_GET['msg'])) {
                                        echo "<h4 class='alert alert-danger'>". $_GET['msg']. "</h4>";
                                    }
                                    ?>
          <h3>Edit Swap Item</h3>
          <div class="property-form-group">
          <input type="text" name="edit_id" class="d-none" value="<?php echo $id ?>">
            <div class="row">
              <div class="col-md-8">
                <p>
                  <label for="address">Swap Item</label>
                  <input required type="text" name="swap_name" 
                 id="address" value="<?php echo $property['swap_name'] ?>">
                </p>
              </div>
              <div class="col-md-2">
                <p>
                  <label for="address"></label>
                  <select name="swap_item" id="">
                    <option value="">Select Type</option>
                  <option value="Car">Car</option>
                  <option value="House">House</option>
                  <option value="Land">Land</option>
                  </select>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p>
                  <label for="description">Swap Item Description</label>
                  <textarea id="description" name="swap_description" value="<?php echo $property['swap_description']?>" required><?php echo $property['swap_description']?></textarea>
                    <small >If you pick car for swap, Kindly indicate the following: YEAR, CAR BRAND, CAR MODEL, NEW/USED</small>
                </p>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 mb-4">
                <select name="swap_need" id="">
                  <option value="">Swap Need</option>
                  <option value="Car">Car</option>
                  <option value="House">House</option>
                  <option value="Land">Land</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <p>
                  <label for="description">Swap Need Description</label>
                  <textarea id="description" name="sneed_description" value="<?php echo $property['sitem_description']?>" required><?php echo $property['sitem_description']?></textarea>
                </p>
              </div>
            </div>
          </div>
        </div>
                                    
        <div class="single-add-property">
          <h3 class="my-3">Documents</h3>
          <div class="property-form-group mt-4">
            <div class="row">
              <div class="col-md-12">
                <ul class="pro-feature-add pl-0">
                  <li class="fl-wrap filter-tags clearfix">
                    <div class="checkboxes float-left">
                      <div class="filter-tags-wrap">
                        <input id="check-a" type="checkbox" name="extra[]" value="Survey">
                        <label for="check-a">Survey</label>
                      </div>
                    </div>
                  </li>
                  <li class="fl-wrap filter-tags clearfix">
                    <div class="checkboxes float-left">
                      <div class="filter-tags-wrap">
                        <input id="check-b" type="checkbox" name="extra[]" value="Purchase Receipt">
                        <label for="check-b">Purchase Receipt</label>
                      </div>
                    </div>
                  </li>
                  <li class="fl-wrap filter-tags clearfix">
                    <div class="checkboxes float-left">
                      <div class="filter-tags-wrap">
                        <input id="check-c" type="checkbox" name="extra[]" value="Family Conveyance">
                        <label for="check-c">Family Conveyance</label>
                      </div>
                    </div>
                  </li>
                  <li class="fl-wrap filter-tags clearfix">
                    <div class="checkboxes float-left">
                      <div class="filter-tags-wrap">
                        <input id="check-d" type="checkbox" name="extra[]" value="Executed Deed of Assignment">
                        <label for="check-d">Executed Deed of Assignment</label>
                      </div>
                    </div>
                  </li>
                  <li class="fl-wrap filter-tags clearfix">
                    <div class="checkboxes float-left">
                      <div class="filter-tags-wrap">
                        <input id="check-e" type="checkbox" name="extra[]" value="Excision">
                        <label for="check-e">Excision </label>
                      </div>
                    </div>
                  </li>
                </ul>
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
                <?php
                                                    $obj->get_state();
                                                     ?>
              </div>
              <div class="col-lg-4 col-md-4 form-group">

                <label for="city">City</label>
                <div type="text" name="city" id="citi"></div>

              </div>
              <div class="col-lg-4 col-md-4">
                <p>
                  <label for="address">Address</label>
                  <input required type="text" name="address"  id="address" value="<?php echo $property['swap_address']?>">
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="single-add-property">
          <h3>Property Media</h3>
          <div class="property-form-group">
            <div class="row">
              <div class="col-md-12">
                <i class='fa fa-cloud-upload'></i> Click here to upload Swap images. <br> Press down on the ctrl key to
                select multiple images <br>
                <input required class="mt-2" type="file" name="images[]" multiple>
              </div>
            </div>
          </div>
        </div>
        <div class="single-add-property">
          <div class="property-form-group">
            <div class="row">
              <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Submit</button>
              <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                onClick="document.location.href='my-swaps.php'">Cancel</button>
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