<?php
session_start();
require('admin.php');
require('forgotpasswordprocess.php');

$admin =new admin\Admin;

?>
<!DOCTYPE html>
<html>
<head>
    <title>Alongish Adim</title>
    <title>Forgot Password - Find your desired home here</title>
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css?version=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <?php
                    if(isset($_SESSION['message'])) {
                        echo "<h6 class='alert alert-danger text-center'>". $_SESSION['message'] ."</h6>";
                        unset($_SESSION['message']);
                    }
                ?>
                <div id="login" class="mb-3">
                    <div class="login" style="max-width:440px !important">
                        <h4 class=" user-login__title mb-0 ">Recovery Your Password</h4>
                        <form action="" method="post">
                            <div class="form-group text-center">
                                <label>Enter Your Email</label>
                                <input type="email" class="form-control  form-control-lg" name="email"
                                    placeholder="name@example.com" required value="">
                            </div>
                            <div class="form-group"><input  type="submit" id="login" class="button form-control" name="forgot" value="Reset"></div>
                        <div class="row mt-1"><div class="col-md-2 "><a href="index.php" >Login</a></div></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>