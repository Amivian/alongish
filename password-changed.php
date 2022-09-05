<?php
session_start();
require_once 'users.php';
if(isset($_SESSION['id'])){
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
if($_SESSION['info'] == false){
    header('Location: login.php');  
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
<?php 
  if(isset($_POST['login-now'])){
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="description" content="Find your desired home here">
    <meta name="author" content="">
    <title>Password Changed</title>
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

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 offset-3">
                <div id="login" class="mb-5">
                    <div class="login" style="max-width:440px !important">
                        <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>

                        <form action="login.php" method="post">

                            <button id="login" class="btn_1 rounded full-width" name="login-now">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- END SECTION LOGIN -->
    <?php include "include/foot.php"?>

    <?php
require('include/footer.php');
?>