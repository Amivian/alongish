<?php
session_start();
    require('admin.php');
    require 'resetcodeprocess.php';

    $admin =new admin\Admin;

    $email = $_SESSION['a_email'];
    if($email == false)
    {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Alongish Adim</title>
    <title>Code Verification - Find your desired home here</title>
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
                <div id="login" class="mb-3">
                    <div class="login" style="max-width:440px !important">
                        <h4 class=" user-login__title mb-0 ">Code Verification</h4>
                        <?php
                        if(isset($_SESSION['info'])) {
                            echo "<h6 class='alert alert-success text-center'>". $_SESSION['info'] ."</h6>";
                            unset($_SESSION['info']);
                        }
                    ?>
                    
                    <?php
                        if(isset($_SESSION['error'])) {
                        echo '<div class="alert alert-danger text-center">' . $_SESSION['error'] . '</div>';
                        unset($_SESSION['error']);
                        }
                    ?>
                        <form action="" method="post">
                            <div class="form-group text-center mt-2">
                                <input type="number" class="form-control  form-control-lg" name="code"  placeholder="Enter Code" required value="">
                            </div>
                            <div class="form-group"><input  type="submit" id="login" class="button form-control" name="reset" value="Submit"></div>
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