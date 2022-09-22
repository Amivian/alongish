<?php 	
session_start();
if (empty($_SESSION['id'])) {
    header('location:login.php');
}else{
   require('users.php');
   $obj = new User;
   $k = $obj->getUser($_SESSION['id']);

   $agent_id = $_SESSION['id'];
   
  $pix= $k['a_pix'];
  if (empty($pix)) {
      $pix = 'avatar.png';
}
require('property.php');
$properties= new Property;
// $property = $prop->getAgentSwaps($agent_id)

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
  <title>Create Swap Item</title>

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
      <form action="swapprocess.php" method="POST" enctype="multipart/form-data">
        <div class="single-add-property">
          <?php
                        if(isset($_SESSION['message'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                            unset($_SESSION['message']);
                        }
                    ?>
          <h3>Create Swap</h3>
          <div class="property-form-group">
            <input type="text" name="a_id" class="d-none" value="<?php echo $agent_id; ?>">
            <div class="row">
              <div class="col-md-8">
                <p>
                  <label for="address">Swap Item</label>
                  <input required type="text" name="swap_name" placeholder="Enter Swap Name" id="address">
                </p>
              </div>
              <div class="col-md-2">
                <p>
                  <label for="address">Swap Type</label>
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
                  <textarea id="description" name="swap_description" placeholder="Describe exactly what you have"
                    required></textarea>
                  <small>If you pick car for swap, Kindly indicate the following: YEAR, CAR BRAND, CAR MODEL,
                    NEW/USED</small>
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
                  <textarea id="description" name="sneed_description" placeholder="Describe exactly what you want"
                    required></textarea>
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
                  <input required type="text" name="address" placeholder="Enter property Address" id="address">
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
                  <ul class="pro-feature-add pl-2">
                    <li class="fl-wrap filter-tags clearfix">
                      <div class="checkboxes float-left">
                        <div class="filter-tags-wrap">
                          <?php $feature=$properties->getSwapDocument();?>
                        </div>
                      </div>
                    </li>

                  </ul>
                <span class="text-danger"><?php echo isset($form_errors['extra']) ? $form_errors['extra'] : '' ?></span>
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