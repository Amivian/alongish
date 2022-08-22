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
    <title>Create Joint Venture Property</title>

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
            <form action="jointprocess.php" method="POST" enctype="multipart/form-data">
                <div class="single-add-property">
                    <?php 
                                    if (isset($_GET['msg'])) {
                                        echo "<h4 class='alert alert-danger'>". $_GET['msg']. "</h4>";
                                    }
                                    ?>
                    <h3>Create Joint Venture Property</h3>
                    <div class="property-form-group">
                        <input type="text" name="a_id" class="d-none" value="<?php echo $agent_id; ?>">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="address">Property Title</label>
                                    <input required type="text" name="title" placeholder="Ex 5 Arces of Land">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Property Description</label>
                                    <textarea required id="description" name="joint_description"
                                        placeholder="Describe exactly what you Have"></textarea>
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
                                    <input required type="text" name="address" placeholder="Enter property Address">
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
                                <i class='fa fa-cloud-upload'></i> Click here to upload Property images <br> Press down on the ctrl key to
                                 select multiple images <br>
                                <input class="mt-2" type="file" name="images[]" multiple required>
                            </div>
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
                                                    value="Land Clearing">
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
                                    <input required type="text" name="offer" placeholder="Ex: 1 plot of Land">
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <label for="description">Terms and Conditions</label>
                                    <textarea id="description" name="joint_t&c"
                                        placeholder="Describe the property" required></textarea>
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
                                onClick="document.location.href='dashboard.php'">Cancel</button>
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