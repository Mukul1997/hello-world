<?php 
  require 'session/loginValidate.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/png" href="img/Nitte-Logo.png">
	<title>Staff Login</title>
	<link rel="stylesheet" type="text/css" href="css/Stylesheet.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body id="staff_view">
            <h2 id="title" class="h1-responsive page-header" style="padding-top: 1%;">NSAM First Grade College Smart Campus, Nitte</h2>
   <div class="container" id="staff-login-container">
   <div class="row " style="padding-top: 2%;">
			<div class="col-md-4">
				</div>
				<div class="col-md-4 Login-Site" style="margin-top:0%;border-radius: 25px;">
			<img src="img\Teacher-Vector.png" alt="Login-Vector" class="staff-user-avatar img-responsive">
				<h3 class="h3-responsive visible-xs-12" style="text-align: center;">Login Here</h3>
					<form action="#" method="post" onsubmit="ClearOff()" class="ng-pristine ng-valid">				
						<div class="form-content">				
							<div class="form-group"> 				
								<input type="text" class="form-control input-underline input-lg" id="username" placeholder="Enter Username" name="s_name" required/>				
								<i class="fa fa-user" id="staff-user" aria-hidden="true"></i>
							</div>
							<div class="form-group"> 
								<input type="password" class="form-control input-underline input-lg" id="password"
								name="s_pass" placeholder="ENTER PASSWORD" required/>
								<i class="fa fa-lock" id="staff-lock" aria-hidden="true"></i>
							</div>
						<div class="form-group" style="text-align: center;">
						<button type="submit" name="Login" class="btn btn-warning btn-lg" >Log In!</button>
						</div>
						<div class="p3">
                                <h4 class="Invalid-Message text-center"> <?php echo @$_GET["invalid"]; ?> </h4>    
                                <h4 class="Logout-Message text-center"> <?php echo @$_GET["logout"]; ?> </h4>        
                                <h4 class="Invalid-Message text-center"> <?php echo @$_GET["action"]; ?> </h4>    
                        </div>
					</div>	
					</form>								
			</div>
		</div>
</body>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bstrap_jquery.js"></script>
</html>
