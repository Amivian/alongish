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
$email = $_SESSION['a_email'];
if($email == false){
  header('Location: login.php');
}?>

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
    <title>Create New Password</title>
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
                    <div id="login"  class="mb-5">
                    <div  class="login" style="max-width:440px !important">
                     <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                     
                    <h1 class=" user-login__title mb-0 ">Create New Password</h1>
                   
                            <form action="newpasswordprocess.php" method="post">
                            <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control  form-control-lg" name="pwd"  placeholder="Password" required value=""> 
                        </div>
                        <div class="form-group">
                            <label>Confirm New Password</label>
                        <input type="password" class="form-control  form-control-lg" name="cpwd"  placeholder="Confirm Password" value="" required>
                    </div>
                    <button id="login" class="btn_1 rounded full-width" name="new-password">submit</button>
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

