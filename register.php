<?php session_start();

if(isset($_SESSION['id'])) {

    require('users.php');
    $obj=new User;

    $k=$obj->getUser($_SESSION['id']);
    $agent_id=$_SESSION['id'];
    $pix=$k['a_pix'];

    if (empty($pix)) {
        $pix='avatar.png';
    }


}

else {
    require('users.php');
    $obj=new User;
}

?>

<?php 
require('property.php');
if(isset($_POST['btn'])) {
	$email = htmlentities(strip_tags($_POST['email']));

$obj = new Property;
$output=$obj->newsLetter( $email);
}
?>

<!DOCTYPE html>
    <html lang="zxx">

    <head>
        <meta name="description" content="Find your desired home here">
        <meta name="author" content="">
        <title>Register</title><?php require('include/head.php');
?>
    </head>

    <body class="inner-pages hd-white about">
         <!-- < !-- Wrapper --> 
            <div id="wrapper">
                <!-- < !-- START SECTION HEADINGS -->
                    <!-- < !-- Header Container================================================== -->
                        <header id="header-container">
                            <div id="header"><?php require('include/header002.php')?></div>
                        </header>
                        <div class="clearfix"></div>
                        <!-- < !-- END SECTION HEADINGS -->
                            <!-- < !-- START SECTION 404 -->
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-8 offset-2">
                                            <div id="login" class="mb-5">
                                                <div class="login">
                                                    <h2 style="font-weight:lighter" class="mb-3">Register</h2>
                                                    <!-- <?php if (isset($_GET['msg'])) {
                                                        echo "<h4 class='alert alert-danger text-center'>". $_GET['msg']. "</h4>";
                                                    }
                                                    ?> -->
                                                     <?php
                                                                if(isset($_GET['msg']))
                                                                {
                                                                    echo '<div class="alert alert-info text-center">' .base64_decode(urldecode($_GET['msg'])) . '</div>';
                                                                }
                                                            
                                                      ?>
                                                    <?php
                                                                if(isset($_GET['verify']))
                                                                {
                                                                    echo '<div class="alert alert-info text-center">' .base64_decode(urldecode($_GET['verify'])) . '</div>';
                                                                }
                                                            
                                                      ?>
                                                       <?php
                                                                if(isset($_GET['res']))
                                                                {
                                                                    echo '<div class="alert alert-danger text-center">' .base64_decode(urldecode($_GET['res'])) . '</div>';
                                                                }
                                                            
                                                      ?>
                                                    <?php if( !empty($_SESSION['guest'])) {
                                                        echo $_SESSION['guest'];

                                                        session_destroy ();
                                                    }

                                                    ?>
                                                    <form action="registerprocess.php" method="POST" id="user_form">
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6"><label>First
                                                                    Name</label><input
                                                                    class="form-control form-control-lg" type="text"
                                                                    placeholder="First Name" id="fname" name="fname"
                                                                    required value=""></div>
                                                            <div class="form-group col-md-6"><label>Last
                                                                    Name</label><input
                                                                    class="form-control form-control-lg" type="text"
                                                                    placeholder=" Last Name" id="lname" name="lname"
                                                                    required value=""></div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-6">
                                                                <label>Username</label><input
                                                                    class="form-control form-control-lg" type="text"
                                                                    placeholder="" id="uname" name="uname" required
                                                                    value=""></div>
                                                            <div class="form-group col-md-6"><label>Email</label><input
                                                                    class="form-control form-control-lg" type="email"
                                                                    placeholder="Ex:example@domain.com" id="email"
                                                                    name="email" required value="">
                                                                <div id="emailStatus"></div>
                                                            </div>
                                                        </div>
                                                        <div class="form-row">
                                                            <div class="form-group col-md-4">
                                                                <label>Password</label><input
                                                                    class="form-control form-control-lg" type="password"
                                                                    name="pwd" id="pwd" placeholder="Password" required
                                                                    value=""><i class="fas fa-eye-slash"
                                                                    id="togglePassword"></i></div>
                                                            <div class="form-group col-md-4"><label>Confirm
                                                                    password</label><input
                                                                    class="form-control form-control-lg" type="password"
                                                                    name="cpwd" id="cpwd" placeholder="Confirm Password"
                                                                    required value="">
                                                                <!-- < !-- <i class="fas fa-eye-slash" id="togglePassword">
                                                                    </i>--> 
                                                            </div>
                                                            <div class="form-group col-md-4"><label for="input-lg">Phone
                                                                    Number</label><input
                                                                    class="form-control form-control-lg input-lg"
                                                                    type="number" placeholder="+234" id="number"
                                                                    name="phone" required value=""><input type="hidden"
                                                                    name="code" value=""><input type="hidden"
                                                                    name="status" value=""></div>
                                                        </div>
                                                        <div class="row mb-2">
                                                            <div class="col-md-6 form-group "><label
                                                                    for="state">States</label><span
                                                                    class="important">*</span><?php $obj->get_state();?></div>
                                                            <div class="col-md-6  form-group "><label
                                                                    for="city">City</label>
                                                                <div type="text" name="city" id="citi"></div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div><label for="agree"><input type="checkbox"
                                                                            name="agree" id="agree" value="yes" />I
                                                                        agree with the <a href="#"
                                                                            title="term of services">term of
                                                                            services</a></label></div>
                                                            </div>
                                                        </div><button class="btn_1 rounded full-width add_top_30 mt-3"
                                                            type="submit" id="regbtn" name="regbtn">Register</button>
                                                        <div class="text-center add_top_10">Already have an acccount?
                                                            <strong><a href="login.php">Sign In</a></strong></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php include "include/foot.php"?>
                                <!-- < !-- END SECTION register -->
                                <?php require('include/footer.php');?>