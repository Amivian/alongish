<?php 		
    require_once ('include/checks.php'); 

    require('property.php');

    require('editswaps.php');

    $properties = new \admin\Property;

    $admin= new \admin\Admin;

    if(isset($_GET['edit_id'])) {
    $id= $_GET['edit_id'];
    $property = $properties->showSwapsDetails($id);
    $images=$properties->getSwapImages($id);
    $swapdocument= $properties->getAgentSwapDocument($id);
    $document=$properties->getDocumentSwap();
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

    <?php require('include/dashheaders.php');  ?>

    <?php require('include/sidebar.php');  ?>

    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

        <?php require('include/mobile-dashboard.php');  ?>

     <div class="container">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="single-add-property">
            <?php
                if(isset($_SESSION['message'])) {
                    echo "<p class='alert alert-success text-center'>". $_SESSION['message'] ."</p>";
                    unset($_SESSION['message']);
                }
            ?>
            <h3>Edit Swap Item</h3>
            <div class="property-form-group">
              <input type="text" name="edit_id" class="d-none" value="<?php echo $id ?>">
              <div class="row">
                <div class="col-md-8">
                  <p>
                    <label for="address">Swap Item</label>
                    <input required type="text" name="swap_name" id="address"  value="<?php echo isset($property['swap_name']) ? $property['swap_name'] : ''; ?>">
                  </p>
                </div>
                <div class="col-md-2">
                  <p>
                    <label for="address"></label>
                    <select name="swap_item" id="">
                      <option value="">Select Type</option>
                    <option value="Car" <?php if (isset($property['swap_item']) && strtolower($property['swap_item']) == 'car') echo 'selected'; ?>>Car</option>
                    <option value="House"  <?php if (isset($property['swap_item']) && strtolower($property['swap_item']) == 'house') echo 'selected'; ?>>House</option>
                    <option value="Land" <?php if (isset($property['swap_item']) && strtolower($property['swap_item']) == 'land') echo 'selected'; ?>>Land</option>
                    </select>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p>
                    <label for="description">Swap Item Description</label>
                    <textarea id="description" name="swap_description"  required><?php echo isset($property['swap_description']) ? $property['swap_description'] : ''; ?></textarea>
                      <small >If you pick car for swap, Kindly indicate the following: YEAR, CAR BRAND, CAR MODEL, NEW/USED</small>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mb-4">
                  <select name="swap_need" id="">
                    <option value="">Swap Need</option>
                    <option value="Car" <?php if (isset($property['swap_need']) && strtolower($property['swap_need']) == 'car') echo 'selected'; ?>>Car</option>
                    <option value="House" <?php if (isset($property['swap_need']) && strtolower($property['swap_need']) == 'house') echo 'selected'; ?>>House</option>
                    <option value="Land" <?php if (isset($property['swap_need']) && strtolower($property['swap_need']) == 'land') echo 'selected'; ?>>Land</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <p>
                    <label for="description">Swap Need Description</label>
                    <textarea id="description" name="sneed_description"  required><?php echo isset($property['sitem_description']) ? $property['sitem_description'] : ''; ?></textarea>
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
                            <?php  
                            foreach($document as $documents)
                            { ?>
                              <input type="checkbox"<?php if (in_array($documents['document_id'], $swapdocument)) echo 'checked'; ?> name="extra[]" id="<?php echo $documents['document_name'] ?>"><label for="<?php echo $documents['document_name'] ?>"><?php echo $documents['document_name'] ?></label>
                            <?php }?> 
                          </div>
                        </div>
                      </li>

                    </ul>
                  </div>
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
                        <?php $admin->get_state($stateID); ?>
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
                                value="<?php echo isset($property['swap_address']) ? $property['swap_address'] : ''; ?>">
                        </p>
                    </div>
                </div>
            </div>
          </div>
          <div class="single-add-property">
            <h3>Property Media</h3>
            <div class="property-form-group">
            <div class="row">
                <?php $imagesCount = count($images); $totalImages =  5; ?>
                <?php foreach ($images as $img) { ?>
                    <div class="col-md-4">
                        <img src="../images/swaps/<?php echo $img['image_url'] ?>" class="img-fluid" alt="<?php echo $img['image_url'] ?>" width="200px">
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
            <div class="property-form-group">
              <div class="row">
                <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn">Submit</button>
                <button type="button" class=" btn btn-danger  btn-lg" name="btncancle"
                  onClick="document.location.href='manageswaps.php'">Cancel</button>
              </div>
            </div>
          </div>
        </form>
    </div>
  </div>

    <?php require('include/dashfooter.php');  ?>