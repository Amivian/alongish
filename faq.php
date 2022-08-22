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




<!DOCTYPE html>
<html lang="zxx">

<head>
<meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>FAQ'S</title>
<?php
require('include/head.php');
?>
</head>

<body class="inner-pages hd-white about">
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
        <div class="clearfix"></div>
        <!-- Header Container / End -->
                </div>
            </div>
            <!-- Header / End -->

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>FAQ’S</h1>
                    <h2><a href="index.php">Home </a> &nbsp;/&nbsp; FAQ’S</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION FAQ -->
        <section class="faq service-details bg-white">
            <div class="container">
                <h3 class="mb-5">FREQUENTLY ASKED QUESTIONS</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h5 class="uppercase mb40">Questions about Selling</h5>
                        <ul class="accordion accordion-1 one-open">
                            <li class="active">
                                <div class="title">
                                    <span>What payment methods are available?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>How can i get findhouses aid to live off campus?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Does findhouses share my information with others?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>What kind of real estate advice do you give?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>How do i link multiple accounts with my profile?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>What kind of real estate advice do you give?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Is your advice really be helf full?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>How can i get real estate aid to live off campus?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Does realhome share my information with others?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>
                                </div>
                            </li>
                        </ul>
                        <!--end of accordion-->
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION FAQ -->

    <!-- START FOOTER -->
    <footer class="first-footer">
            <div class="top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="netabout">
                                <a href="index.php" class="logo">
                                    <img src="images/logo.jpg" alt="netcom">
                                </a>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                            </div>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">Federal Complex, Phase 1, Annex II</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+2340908646633</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <p class="in-p ti">support@alongish.com</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="navigation">
                                <h3>Popular Locations</h3>
                                <div class="nav-footer">
                                    <ul>
                                         <li><a href="properties-details.php">Badagry</a></li>
                                        <li><a href="properties-full-grid-1.php">Lekki</a></li>
                                        <li><a href="properties-full-grid-1.php">Igando</a></li>
                                         <li><a href="properties-full-grid-1.php">Gbagada</a></li>
                                        <li><a href="properties-full-grid-1.php">Ogba</a></li>
                                       
                                    </ul>
                                    <ul class="nav-right">
                                                                 
                                         <li><a href="properties-full-grid-1.php">Ikeja GRA</a></li>
                                        <li><a href="properties-full-grid-1.php">Ajah</a></li>
                                        <li><a href="properties-full-grid-1.php">Festac</a></li>
                                        <li><a href="properties-full-grid-1.php">Magodo</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                              <div class="navigation">
                                <h3>Quick Links</h3>
                                <div class="nav-footer">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about.php">About us</a></li>
                                         <li><a href="affiliates.php">Affiliates</a></li>
                                        <li><a href="properties-full-list.php">Properties List</a></li>
                                        <li><a href="agents-listing-grid.php">Agents Listing</a></li>
                                        <li><a href="contact-us.php">Contact Us</a></li>
                                    </ul>
                                    <ul class="nav-right">
                                        <li><a href="properties-details.php">Swap</a></li>                        
                                        <li><a href="about.php">Projects</a></li>
                                        <li><a href="blog.php">Project Sponsorship</a></li>
                                        <li><a href="blog-details.php">Services</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="newsletters">
                                <h3>Newsletters</h3>
                                <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                            </div>
                            <form class="bloq-email mailchimp form-inline" method="post">
                                <label for="subscribeEmail" class="error"></label>
                                <div class="email">
                                    <input class="mb-2" type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                    <input type="submit" value="Subscribe">
                                    <p class="subscription-success"></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-footer">
                <div class="container">
                    <p>2022 © Copyright - All Rights Reserved.</p>
                    <ul class="netsocials">
                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </footer>

        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

    <!--register form -->
    <div class="login-and-register-form modal">
      <div class="main-overlay"></div>
      <div class="main-register-holder">
        <div class="main-register fl-wrap">
          <div class="close-reg"><i class="fa fa-times"></i></div>
          <h3>Welcome to <span>Alongish</span></h3>
           <div id="tabs-container">
            <div class="tab">
                <div class="custom-form">                        
                <form id="user-form" action="loginprocess.php" method="post">
                    <div class="form-group">
                        <label>Email or Username</label>
                        <input type="text" class="form-control  form-control-lg" name="email" id="email" placeholder="name@example.com or username" required value="">
                        </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control  form-control-lg" name="password" id="pwd" value="" required>
                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                    </div>
                    <div class="fl-wrap filter-tags clearfix add_bottom_30">
                        <div class="checkboxes float-left">
                            <div class="filter-tags-wrap d-flex">
                                <input id="check-b" type="checkbox" name="check">
                                <label for="check-b">Remember me</label>
                                
                         </div>
                        </div>
                        <div class="float-right"><a id="forgot" href="javascript:void(0);" style="font-size: 14px">Forgot Password?</a></div>
                    </div>
                    <button class="log-submit-btn" name="login">Login</button>
                </form>
                </div>
                  <div class="text-right mt-5 ">New to Alongish? <strong><a href="register.php">Sign up!</a></strong></div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <!--register form end -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

        <script>
            $(".accordion li").click(function() {
                $(this).closest(".accordion").hasClass("one-open") ? ($(this).closest(".accordion").find("li").removeClass("active"), $(this).addClass("active")) : $(this).toggleClass("active"), "undefined" != typeof window.mr_parallax && setTimeout(mr_parallax.windowLoad, 500)
            });

        </script>

   
    <!-- Wrapper / End -->
</body>

        </html>
