<?php
if(isset($_SESSION['id'])){
    
    require('users.php');
    $obj = new User;
    
    $k = $obj->getUser($_SESSION['id']);
    $agent_id = $_SESSION['id'];    
    $pix= $k['a_pix'];
  

}else{

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
  <title>Our Services</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
  <!-- FONT AWESOME -->
  <link rel="stylesheet" href="css/fontawesome-all.min.css">
  <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- ARCHIVES CSS -->
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/magnific-popup.css">
  <link rel="stylesheet" href="css/lightcase.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/menu.css">
  <link rel="stylesheet" href="css/slick.css">
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/colors/pink.css"> 
  <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages hd-white about">
  <!-- Wrapper -->
  <div id="wrapper">
    <!-- START SECTION HEADINGS -->
    <!-- Header Container ================================================== -->
     <!-- Header -->
            <div id="header">
                <div class="container container-header">
                    <!-- Left Side Content -->
                    <div class="left-side" style=" width:850px">
                        <!-- Logo -->
                        <div id="logo">
                            <a href="index.php"><img src="images/logo.jpg" alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1" style="margin-left:10px">
                            <ul id="responsive">
                                <li><a href="about.php">About Us</a></li>
                                    
                                <li><a href="services.php">Services</a></li>
                                        <li><a href="projects.php">Projects</a></li>
                                        <li><a href="sponsorship.php">Joint Venture</a></li>
                                 <li><a href="affiliates.php">Affiliates</a></li>
                          <li><a href="swap-properties.php">Swaps</a></li>
                                <li><a href="contact-us.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="right-side d-none d-none d-lg-none d-xl-flex">
                        <div class="header-widget">
                            <a href="add-property.php" class="button border">Add Listing<i class="fas fa-laptop-house ml-2"></i></a>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <div class="header-user-menu user-menu add">
                            <div class='header-user-name'>
                                <span><img src="images/users/<?php echo $pix ?> " /></span>Hi, <?php echo $_SESSION['fname']; ?>
                            </div>
                            <ul>
                                <?php if ($_SESSION['user_type'] != 'admin') { ?>
                                    <li><a href='dashboard.php'>Dashboard</a></li>
                                <?php } else { ?>
                                    <li><a href='admin/admindashboard.php'>Dashboard</a></li>
                                <?php } ?>
                                <li><a href='add-property.php'>Add Property</a></li>
                                <li><a href='swaps.php'>Swaps</a></li>
                                <li><a href='venture.php'>Joint Venture</a></li>
                                <li><a href='logout.php'>Log Out</a></li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class='right-side d-none d-none d-lg-none d-xl-flex sign ml-0 mt-3' style='border:none; padding:6px 16px'>
                            <div class='header-widget sign-in d-flex' >
                                <div class='show-reg-form modal-open mx-3'>
                                    <a class='text-dark' href='login.php'>Login</a>
                                </div>

                                <div>
                                    <a class='text-dark' href='register.php'>Register</a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="clearfix"></div>
            <!-- Header Container / End -->