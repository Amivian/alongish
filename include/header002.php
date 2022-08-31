<div class="container container-header">
    <!-- Left Side Content -->
    <div class="left-side">
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
                <li><a href="services.php">Our Services</a></li>
                <li><a href="projects.php">Our Projects</a></li>
                <li><a href="request.php">Request</a></li>
                <li><a href="sponsorship.php">Joint Venture</a></li>
                <li><a href="affiliates.php">Affiliates</a></li>
                <li><a href="swap-properties.php">Swaps</a></li>
                <li><a href="contact-us.php">Contact</a></li>
            </ul>
        </nav>
        <!-- Main Navigation / End -->
    </div>
    <!-- Left Side Content / End -->

    <!-- Right Side Content / End -->
    <div class="right-side d-none d-none d-lg-none d-xl-flex">
        <!-- Header Widget -->
        <div class="header-widget">
            <a href="add-property.php" class="button border">Add Listing<i class="fas fa-laptop-house ml-2"></i></a>
        </div>
        <!-- Header Widget / End -->
    </div>
    <!-- Right Side Content / End -->

    <!-- Right Side Content / End -->
    <div class="header-user-menu user-menu add">
        <?php
  
  
  if(isset($_SESSION['id'])){
  
    echo"                        <div class='header-user-name'>";
                          echo"  <span><img src='images/users/". $pix . "'></span>Hi, " . $_SESSION['fname'] . "
                        </div>";
        echo"           <ul>
                            <li><a href='dashboard.php'>Dashboard</a></li>
                            <li><a href='add-property.php'>Add Property</a></li>
                            <li><a href='swaps.php'>Swaps</a></li>
                            <li><a href='venture.php'>Joint Venture</a></li>
                        <li><a href='logout.php'>Log Out</a></li>
                      </ul>
                   </div>";
  }else{
    echo"   <!-- Right Side Content / End -->";

    echo"       <div class='right-side d-none d-none d-lg-none d-xl-flex sign ml-0 mt-2' style='border:none'>
                        <!-- Header Widget -->
                        <div class='header-widget sign-in d-flex' >
                        <div class='show-reg-form modal-open mx-3'><a class='text-dark' href='login.php'>Login</a></div>
                            <div ><a class='text-dark' href='register.php'>Register</a></div>
                        </div>
                        <!-- Header Widget / End -->
                    </div>";
  }
  ?>
    </div>