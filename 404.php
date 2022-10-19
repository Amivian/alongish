<?php
session_start();
if(isset($_SESSION['id'])){
    
    require('users.php');
    $obj = new User;
    
    $k = $obj->getUser($_SESSION['id']);
    $agent_id = $_SESSION['id'];    
    $pix= $k['a_pix'];
    if (empty($pix)) {
        $pix = 'avatar.png';
    } 

}else{

}
?>
<?php 
  require('property.php');
if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));

$obj = new admin\Property;
$output=$obj->newsLetter( $email);
}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>404</title>
    <?php
require('include/head.php');
?>
</head>

<body class="inner-pages hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
        <div id="header">
            <?php
require('include/header002.php');
?>
            </div>
            

        </header>
            <!-- Header / End -->

            <div class="clearfix"></div>
            <!-- Header Container / End -->
            <!-- END SECTION HEADINGS -->

            <!-- START SECTION 404 -->
            <section class="notfound pt-0">
                <div class="container">
                    <div class="top-headings text-center">
                        <img src="images/bg/error-404.jpg" alt="Page 404">
                        <h3 class="text-center">Page Not Found!</h3>
                        <p class="text-center">Oops! Looks Like Something Going Rong We can’t seem to find the page
                            you’re looking for make sure that you have typed the currect URL</p>
                    </div>
                    <div class="port-info">
                        <a href="index.php" class="btn btn-primary btn-lg">Go To Home</a>
                    </div>
                </div>
            </section>
            <!-- END SECTION 404 -->
            <?php include "include/foot.php"?>
           <?php include "include/footer.php"?>