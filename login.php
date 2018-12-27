<?php
	session_start();
	$conn=mysqli_connect("localhost","root","esc","esc");
	if($conn->connect_errno){
		printf("failed: %s\n",$mysqli->connect_error);
		exit();
	}	
	if(!empty($_POST['inputEmail']) && !empty($_POST['inputPassword'])){
		if($result = $conn->query("select * from user where id='".$_POST['inputEmail']."';")){
			if($result->num_rows < 1){
				mysqli_close($conn);
				header("Location:login.php?login=fail");
			}
			$row = mysqli_fetch_assoc($result);
			if(password_verify($_POST['inputPassword'], $row['pw'])){
				$_SESSION["user_id"]=$_POST['user_id'];
				$_SESSION["idx"]=$row['idx'];
				header("Location:index.php");
				mysqli_free_result($result);
				mysqli_close($conn);
			}
			else{
				mysqli_free_result($result);
				mysqli_close($conn);
				header("Location:login.php?login=fail");
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ESC-Login</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">
      <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">
          <form action="login.php" method="post">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                <label for="inputEmail">Email address</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
                <label for="inputPassword">Password</label>
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit">Login</button>
          </form>
          <div class="text-center">
            <a class="d-block small mt-3" href="register.php">Register an Account (Student)</a>
            <a class ="d-block small" href = "register_company.php">Register an Account (Company)</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  </body>

</html>
