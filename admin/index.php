<?php
session_start();
require('logincheckadmin.php');
?>
<!DOCTYPE html>
<html>

<head>
	<title>Alongish Adim</title>
	<title>Alongish - Find your desired home here</title>
	<!-- FAVICON -->
	<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/admin.css?version=<?php echo time(); ?>">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-4 offset-md-4 form login-form">
				<div class="inner">
					<div class="inner-box  mx-auto">
						<img src="../images/avatar.png" class="avatr" width="100px">
					</div>
					<?php
						if(isset( $_SESSION['message'])) {
							echo "<p class='alert alert-success text-center' style='font-size:12px'>".  $_SESSION['message'] ."</p>";
							unset( $_SESSION['message']);
						}
						// if(isset($_GET['msg'])){
						// 	echo "<p class='alert alert-info' style='font-size:12px'>".base64_decode(urldecode($_GET['msg'])) . '</p>';
						// }
					?>
					   <?php
							if(isset( $_SESSION['change'])) {
								echo "<p class='alert alert-success text-center' style='font-size:12px'>".  $_SESSION['change'] ."</p>";
								unset( $_SESSION['change']);
							}
						?>
					<div class="my-4 text-center">
						<h4>Admin Login</h4>
					</div>
					<form action="" method="post">
						<div class="form-group">
							<input type="text" class="input-box form-control" placeholder="Enter Email" name="email" required>
							<span></span>
						</div>
						<div class="form-group">
							<input type="password" class="input-box form-control" placeholder="Enter Password" name="pass" required>
						</div>
						<div class="form-group">
							<input type="submit" name="submit" class="button form-control" value="Login">
						</div>
						<div class="row mt-1">						
							<div class="col-md-8 mx-2 ">
								<a href="forgot-password.php">Forgotten Password?</a>
							</div>
							<div class="col-md-2 "><a href="../index.php" >Home</a></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

</body>

</html>