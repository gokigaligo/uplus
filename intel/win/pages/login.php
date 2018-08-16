<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="/logo.png">
<title>Login</title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- animation CSS -->
<link href="css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="css/colors/default.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body>
<!-- Preloader -->
<div class="preloader">
	<div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="new-login-register">
			<div class="lg-info-panel">
							<div class="inner-panel">
									<a href="javascript:void(0)" class="p-20 di"><img src="/logo.png"></a>
									<div class="lg-content">
											<h2>Intelligent automatic warehouse of future</h2>
											<p class="text-muted">developed with blend of cutting edge technologies to allow automation and boost performance </p>
											<a href="/" class="btn btn-rounded btn-danger p-l-20 p-r-20"> See more</a>
									</div>
							</div>
			</div>
			<div class="new-login-box">
								<div class="white-box">
										<h3 class="box-title m-b-0">Sign In to Admin</h3>
										<small>Enter your details below</small>
									<form class="form-horizontal new-lg-form" id="loginform" action="login" method="POST">
										<div class="col-xs-12">
											<?php
												if(!empty($_POST)){
													include_once '../conn.php';
    											include_once '../functions.php';
													$username = $_POST['username']??"";
													$pwd = $_POST['pwd11']??"";
													// die("jkjsdkjsk");

													if(login($username, $pwd)){
														header("location:home");
													}else{
														?>
															<p class="alert text-warning">Invalid username/password</p>
														<?php
													}
												}
											?>
										</div>
										<div class="form-group  m-t-20">
											<div class="col-xs-12">
												<label>Username</label>
												<input class="form-control" type="text" name="username" required="" <?php if(!empty($empty)) echo "value=\'$email\'" ?> placeholder="Username">
											</div>
										</div>
										<div class="form-group">
											<div class="col-xs-12">
												<label>Password</label>
												<input class="form-control" type="password" required="" name="pwd11" placeholder="Password">
											</div>
										</div>
										<div class="form-group">
											<div class="col-md-12">
												<div class="checkbox checkbox-info pull-left p-t-0">
													<input id="checkbox-signup" type="checkbox">
													<label for="checkbox-signup"> Remember me </label>
												</div>
												<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
										</div>
										<div class="form-group text-center m-t-20">
											<div class="col-xs-12">
												<button class="btn btn-info btn-lg btn-block btn-rounded text-uppercase waves-effect waves-light" type="submit">Log In</button>
											</div>
										</div>
										<div class="form-group m-b-0">
											<div class="col-sm-12 text-center">
												<p>Don't have an account? <a href="register.html" class="text-primary m-l-5"><b>Sign Up</b></a></p>
											</div>
										</div>
									</form>
									<form class="form-horizontal" id="recoverform" action="https://wrappixel.com/ampleadmin/ampleadmin-html/ampleadmin-material/index.html">
										<div class="form-group ">
											<div class="col-xs-12">
												<h3>Recover Password</h3>
												<p class="text-muted">Enter your Email and instructions will be sent to you! </p>
											</div>
										</div>
										<div class="form-group ">
											<div class="col-xs-12">
												<input class="form-control" type="text" required="" placeholder="Email">
											</div>
										</div>
										<div class="form-group text-center m-t-20">
											<div class="col-xs-12">
												<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Reset</button>
											</div>
										</div>
									</form>
								</div>
			</div>            
	
	
</section>
<!-- jQuery -->
<script src="../plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="../plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

<!--slimscroll JavaScript -->
<script src="js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/custom.min.js"></script>
<!--Style Switcher -->
<script src="../plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
</body>


</html>
