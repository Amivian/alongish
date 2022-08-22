<?php
session_start();

if(isset($_SESSION['id'])){
    
    require('admin.php');
    $obj = new Admin;
    
    $k = $obj->getAdmin($_SESSION['id']);
}
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
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="css/admin.css?version=<?php echo time(); ?>">
</head>
<body>

  <div class="container">
   
  		<div class="main">
            
       			<div class="inner">
				<div class="innerbox  mx-auto">	
					<img src="../images/avatar.png" class="avatr" width="100px">
				</div>	
                <?php
                if(isset($_GET['msg'])){
                    echo "<p class='alert alert-info' style='font-size:12px'>".base64_decode(urldecode($_GET['msg'])) . '</p>';
                }
                ?>
				<?php
                if(isset($_GET['res'])){
                    echo "<p class='alert alert-success' style='font-size:12px'>".base64_decode(urldecode($_GET['res'])) . '</p>';
                }
                ?>
				<div class="mt-2">    
					<h2>Admin Login</h2>
				</div>
				<form action="logincheckadmin.php" method="post">
					<div class="m">	
						<label for="" class="mx-3">Email</label>
						<input type="text" class="input-box" placeholder="Enter Email" name="email" required>
					</div>
					<div>	
						<label for="" class="mx-3">Password</label>
						<input type="password" class="input-box" placeholder="Enter Password" name="pass" required>
					</div>	
					<div>	
						<button type="submit" name="submit" class="btn btn-danger">Login</button>
					</div>
					<div class="mx-3">	
						<input type="checkbox">
						<label for=""> Remember Password</label>
					</div>	
                    <div class="row mt-1">
                    <div class="col-md-8 mx-2">	
						<a href="#">Forgotten Password?</a>
					</div>	
                    <div class="col-md-2">
                            <a href="../index.php">Home</a>	
                        </div>
                    </div>
				</form>

			</div>
		 </div>
	</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>