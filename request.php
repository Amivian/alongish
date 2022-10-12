<?php 
    require 'include/active-user.php';

    require "requestprocess.php";
    
    $prop= new admin\Property;

    $user= new User;

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Post a Request</title>
    <?php require('include/head.php'); ?>
</head>

<body class="inner-pages homepage-4 agents list hp-6 full hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <?php require('include/header002.php'); ?>
            </div>
        </header>
        <div class="clearfix"></div>
        <div class="container my-4">
            <div class="row">
                <div class="col-lg-10 offset-1 request">
                    <form action="" method="POST">
                        <div class="single-add-property">
                            <h4> Post a Request</h4>
                            
                            <?php
                                if(isset($_SESSION['message'])) {
                                    echo "<h6 class='alert alert-success text-center'>". $_SESSION['message'] ."</h6>";
                                    unset($_SESSION['message']);
                                }
                            ?>
                            <div class="property-form-group mt-1">
                                <div class="row">
                                    <div class="col-md-4 ">
                                        <label for="purpose">Property Purpose</label>
                                    </div>
                                    <div class="col-md-6 dropdown faq-drop">
                                        <p class="form-group categories">
                                            <?php $prop ->getStatus(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4 ">
                                        <label for="type">Property Type</label>
                                    </div>
                                    <div class="col-md-6 dropdown faq-drop">
                                        <p class="form-group categories">
                                            <?php $prop ->getPropertytype();  ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4 ">
                                        <label for="bedroom">Number of Bedrooms</label>
                                    </div>
                                    <div class="col-md-6 dropdown faq-drop">
                                        <p class="form-group categories">
                                            <?php  $prop ->getBedroom(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 ">
                                        <label for="title">Property Features</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                        <div class="form-group categories">
                                            <select name="furnish" id="" class="form-control wide">
                                                <option value="">-- Furnished --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                        <div class="form-group categories">
                                            <select name="service" id="" class="form-control wide">
                                                <option value="">-- Serviced --</option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                        <div class="form-group categories">
                                            <select name="share" id="" class="form-control wide">
                                                <option value="">-- Shared -- </option>
                                                <option value="Yes">Yes</option>
                                                <option value="No">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4 ">
                                        <label for="state">State</label>
                                    </div>
                                    <div class="col-md-6 dropdown faq-drop">
                                        <p class="form-group categories">
                                            <?php $user->get_state(); ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4 ">
                                        <label for="city">City</label>
                                    </div>
                                    <div class="col-md-6 dropdown faq-drop">
                                        <div type="text" name="city" id="citi"></div>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4 ">
                                        <label for="address">Address</label>
                                    </div>
                                    <div class="col-md-6  form-group">
                                        <input type="text" name="address" placeholder="Enter property Address"
                                            id="address" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-4 ">
                                        <label for="address">Others</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <textarea class="other" name="other" required></textarea>

                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-12 ">
                                        <h4 for="title">Contact Details</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 form-group">
                                        <input type="text" name="fname" id="" placeholder="Enter Your Ful Name" required
                                            value="" class="form-control">
                                    </div>
                                    <div class="col-lg-3 col-md-3 form-group">
                                        <input type="number" name="phone" id="" placeholder="+234" required value=""
                                            class="form-control">
                                    </div>
                                    <div class="col-lg-5 col-md-5 form-group">
                                        <input type="email" name="email" id="" placeholder="Enter Your Emal Address"
                                            required value="" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <button type="submit" class=" btn btn-success btn-lg mr-5" name="btn"
                                        style="border:none">Submit Request</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>

            </div>
        </div>
    </div>


    <!-- END SECTION PROPERTIES LISTING -->

    <?php include "include/foot.php"?>
    <?php
      require('include/footer.php');
      ?>