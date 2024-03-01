<?php 
 session_start();
  include('vendors/scripts/dbconn.php');

  
//Check for admin//
$query="SELECT role FROM cs_users WHERE role='0'";
$exist1=mysqli_query($conn, $query);
            if ($exist1->num_rows==0){
              $pass='admin';
            $userquery="INSERT INTO `cs_users`(`fname`, `lname`, `username`, `role`, `password`, `recovery_key`, `log_access`, `flog`) VALUES ('System','Administrator','admin','0','".md5($pass)."','".md5(123456)."','1','0')";
            $userresult=mysqli_query($conn, $userquery);
            if ($userresult){
              $successText="Login with username: admin, and password: admin";
            }
          }

 if(isset($_COOKIE['uname']) && isset($_COOKIE['pwd']))
{
  $staffID=$_COOKIE['uname'];
  $staffpwd=$_COOKIE['pwd'];
}
else{
  $staffpwd=$pwd="";
}
//LOGIN
  if(isset($_REQUEST['signin'])){
  
      $username=$_REQUEST['username'];
      $password=md5($_REQUEST['password']);
      //$pass=md5($password);
      //$pass1="";

      $check_login="SELECT * FROM cs_users WHERE username='".$username."' AND password='".$password."'";
      $check_result=mysqli_query($conn, $check_login);
      if(mysqli_num_rows($check_result)>0){
       while($row=mysqli_fetch_assoc($check_result)){
            $user=$row['username'];
            $_SESSION['user']=$user;
            $_SESSION['admin_id']=$row['role'];
        }
        if(isset($_REQUEST['rememberme'])){
          setcookie('uname',$_REQUEST['username'], time()+1440);
          setcookie('pwd',$_REQUEST['password'], time()+1440);
        }
        else{
          setcookie('uname',$_REQUEST['username'], time()-20);
          setcookie('pwd',$_REQUEST['password'], time()-20);
        }
        $_SESSION['active_time']=time();
                header('location: index.php');  
           }
                     
      elseif(mysqli_num_rows($check_result)<=0){
            $errorText="Password/username does not match";
      }
      
}
?>
<!DOCTYPE html>
<html>

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>CSU - Welcome - Login</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/csu_mis_icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="vendors/images/csu_mis_icon.png">
  <link rel="icon" type="image/png" sizes="16x16" href="vendors/images/csu_mis_icon.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="login.html">
					<img src="vendors/images/csu_mis_logo_login.svg" alt="">
				</a>
			</div>
			<div class="login-menu">
				<ul>
					<li><a href="register.html">Register</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-6 col-lg-7">
					<img src="vendors/images/login-page-img.png" alt="">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h2 class="text-center text-primary">Login To CSUMIS</h2>
						</div>

						<?php if(isset($errorText)) { ?>

						<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<strong>Attention!</strong> <?php echo $errorText ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

						<?php } ?>

						<?php if(isset($successText)) { ?>

						<div class="alert alert-success alert-dismissible fade show" role="alert">
								<strong>Attention!</strong> <?php echo $successText ?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

						<?php } ?>

						<form method="POST" action="">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" placeholder="Username" name="username" required="" >
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>

							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" placeholder="**********" name="password" required="">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customCheck1" name="rememberme">
										<label class="custom-control-label" for="customCheck1">Remember</label>
									</div>
								</div>
								<div class="col-6">
									<div class="forgot-password"><a href="forgot-password.html">Forgot Password</a></div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
									<input class="btn btn-primary btn-lg btn-block" type="submit" value="Sign In" name="signin">
									</div>
									<div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR</div>
									<div class="input-group mb-0">
										<a class="btn btn-outline-primary btn-lg btn-block" href="register.html">Register To Create Account</a>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="vendors/scripts/stop_save.js"></script>
</body>

<!-- Mirrored from themewagon.github.io/deskapp2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 30 Oct 2023 12:14:29 GMT -->
</html>