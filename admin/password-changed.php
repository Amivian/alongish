<?php
    session_start();
    
    if($_SESSION['info'] == false){
        header('Location: index.php');  
    }
?>
  
<?php  if(isset($_POST['login-now'])){ header('Location: index.php');  } ?>


<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Password Changed - Find your desired home here</title>
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
                <?php if(isset($_SESSION['info'])){ ?>
                    <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                        <?php echo $_SESSION['info']; ?>
                    </div>
                <?php  } ?>
                <div id="login" class="mb-3">
                    <div class="login" style="max-width:440px !important">
                        <?php   if(isset($_SESSION['info'])){      ?>
                        <div class="alert alert-success text-center" style="padding: 0.4rem 0.4rem">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php  }  ?>
                        <form action="" method="post">                          
                            <div class="form-group">
                                <input  type="submit" id="login" class="button form-control" name="login-now" value="Login">
                            </div>
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